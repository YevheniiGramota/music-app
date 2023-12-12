<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style6.css">
    <title>SPACEWAVE</title>
</head>
<body>
    <header class="header header--fixed" id="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo"><a class="gf" href="../index.php">SPACEWAVE</a></div>
                <form method="GET" action="" class="search-form">
    <input type="text" name="search" id="search" placeholder="Пошук">
</form>
                <nav class="nav">
                    <a class="nav__link" href="../news.php">Новини</a>
                    <a class="nav__link" href="charts.php">Чарти</a>
                    <a class="nav__link" href="musicsp.php">Знайти музику</a>
                    <?php
                        session_start();
                        if (isset($_SESSION['login_user'])) {
                            echo '<a class="nav__link" href="logout.php">Вийти</a>';
                        } else {
                            echo '<a class="nav__link" href="login.php">Увійти</a>';
                        }
                    ?>
                </nav>
            </div>
        </div>
    </header>
    <div class="chart-container">
        <h3 class="section__suptitle"></h3>
        <button onclick="showAddSongForm()" class="add-song-button">Додати пісню</button>
    </div>
    
    <div class="add-song-form" id="addSongForm">
        <div class="add-song-form-container">
            <h2>Додати нову пісню</h2>
            <form method="post" action="" enctype="multipart/form-data">
                <label for="title">Назва:</label>
                <input type="text" name="title" id="title">

                <label for="description">Опис:</label>
                <input type="text" name="description" id="description">

                <label for="image_path">Картинка:</label>
                <input type="file" name="image_path" id="image_path">

                <label for="audio_path">Аудіофайл:</label>
                <input type="file" name="audio_path" id="audio_path">

                <button type="submit">Додати</button>
                <button type="button" onclick="hideAddSongForm()">Скасувати</button>
            </form>
        </div>
    </div>

    <!-- Основний контент сторінки -->
    <?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обробник для видалення пісні
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['song_id'])) {
    $song_id = $_GET['song_id'];
    $delete_sql = "DELETE FROM songs WHERE id=$song_id";
    $conn->query($delete_sql);
}

// Обробник для оновлення даних
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Отримайте шлях для завантаження зображення
    $image_path = 'uploads/' . basename($_FILES['image_path']['name']);

    // Отримайте шлях для завантаження аудіофайлу
    $audio_path = 'uploads/' . basename($_FILES['audio_path']['name']);

    // Перевірка, чи існує вже запис з такою ж назвою
    $check_sql = "SELECT * FROM songs WHERE title='$title'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        $row = $check_result->fetch_assoc();
        $song_id = $row['id'];

        // Якщо запис існує, оновити його
        $update_sql = "UPDATE songs SET description='$description'";

        // Якщо ви вибрали нову картинку, оновіть шлях зображення
        if ($_FILES['image_path']['size'] > 0) {
            move_uploaded_file($_FILES['image_path']['tmp_name'], $image_path);
            $update_sql .= ", image_path='$image_path'";
        }

        // Якщо ви вибрали новий аудіофайл, оновіть шлях аудіофайлу
        if ($_FILES['audio_path']['size'] > 0) {
            move_uploaded_file($_FILES['audio_path']['tmp_name'], $audio_path);
            $update_sql .= ", audio_path='$audio_path'";
        }

        $update_sql .= " WHERE id=$song_id";
        $conn->query($update_sql);
    } else {
        // Якщо запис не існує, створити новий
        $insert_sql = "INSERT INTO songs (title, description, image_path, audio_path) VALUES ('$title', '$description', '$image_path', '$audio_path')";
        $conn->query($insert_sql);
    }
}

// Функціональність пошуку
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];

    // Змініть ваш SQL-запит для врахування умов пошуку в title та description
    $sql = "SELECT id, title, description, image_path, audio_path FROM songs
            WHERE title LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
} else {
    // Запит за замовчуванням без пошуку
    $sql = "SELECT id, title, description, image_path, audio_path FROM songs";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $count = 0; // Variable for counting blocks
    echo "<div class='song-container'>";
    while ($row = $result->fetch_assoc()) {
        // Розділяємо на 3 блоки в ряд
        if ($count % 3 == 0) {
            echo "<div class='song-row'>";
        }

        echo "<div class='song-item'>";
        echo "<img src='{$row['image_path']}' alt='{$row['title']}' style='max-width: 100px; max-height: 100px;'>";
        echo "<h3>{$row['title']}</h3>";
        echo "<p>{$row['description']}</p>";
        echo "<audio controls>";
        echo "<source src='{$row['audio_path']}' type='audio/mp3'>";
        echo "Ваш браузер не підтримує елемент audio.";
        echo "</audio>";

        // Додайте кнопку редагування
        echo "<button class='edit-button' onclick='showEditForm({$row['id']})'>Редагувати</button>";

        // Додайте кнопку видалення
        echo "<a href='?action=delete&song_id={$row['id']}' class='delete-button'>Видалити</a>";

        // Додайте форму редагування
        echo "<form method='post' action='' enctype='multipart/form-data' class='edit-form' id='form{$row['id']}'>";
        echo "<input type='hidden' name='song_id' value='{$row['id']}'>";
        echo "<label for='title'>Назва:</label>";
        echo "<input type='text' name='title' value='{$row['title']}'>";

        echo "<label for='description'>Автор:</label>";
        echo "<input type='text' name='description' value='{$row['description']}'>";

        // Додайте можливість вибору нової картинки
        echo "<label for='image_path'>Картинка:</label>";
        echo "<input type='file' name='image_path'>";

        // Додайте можливість вибору нового аудіофайлу
        echo "<label for='audio_path'>Аудіофайл:</label>";
        echo "<input type='file' name='audio_path'>";

        echo "<input type='submit' value='Оновити'>";
        echo "</form>";

        echo "</div>";

        $count++;

        // Закриваємо ряд, коли досягнуто 3 блоки
        if ($count % 3 == 0) {
            echo "</div>";
        }
    }

    // Закриваємо ряд, якщо не вистачає блоків для завершення ряду
    if ($count % 3 != 0) {
        echo "</div>";
    }
} else {
    echo "0 результатів";
}

$conn->close();
?>

    <script>
        // Функції для відображення та сховування форми додавання нової пісні
        function showAddSongForm() {
            var addSongForm = document.getElementById('addSongForm');
            addSongForm.style.display = 'flex';
        }

        function hideAddSongForm() {
            var addSongForm = document.getElementById('addSongForm');
            addSongForm.style.display = 'none';
        }

        // Функція для відображення форми редагування
        function showEditForm(songId) {
            var form = document.getElementById('form' + songId);
            form.style.display = (form.style.display === 'none') ? 'block' : 'none';
        }
    </script>
</body>
</html>