<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@100&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="style7.css">
      <title>SPACEWAVE</title>
      </head>
      <body class="center-container">
        <header class ="header header--fixed" id="header">
            <div class="container">
                <div class="header__inner">
                    <div class="header__logo"><a class="gf" href="../index.php">SPACEWAVE</a></div>
                    <nav class="nav">
                        <a class="nav__link" href="../news.php">Новини</a>
                        <a class="nav__link" href="charts.php">Чарти</a>
                        <a class="nav__link" href="musicsp.php">Знайти музику</a>
                        <?php
                     session_start();
                      if (isset($_SESSION['login_user']) ){
                    echo '<a class="nav__link" href="logout.php">Вийти</a>';
                      } else {
                    echo '<a class="nav__link" href="login.php">Увійти</a>';
                     }
                    ?>
                    </nav>
                </div>
            </div>
        </header>
        
            
                <div class ="reg-container">
                <div class ="reg">
                <div class ="txt">
                <br>
                <br>
    <label for="searchInput">Введіть назву пісні:</label>
    <input type="text" id="searchInput" placeholder="Назва пісні">
    <button class="btn" onclick="getMusicData()">Отримати інформацію про музику</button>

    <div id="resultContainer">
        <!-- Вивід результатів тут -->
    </div>

    <script>
        function getMusicData() {
            const searchInput = document.getElementById('searchInput').value;

            const data = {
                description: searchInput
            };

            // Відправка POST-запиту за допомогою Fetch API
            fetch('http://localhost:5001/music',{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Отримано дані з сервера:', data);

                // Отримані дані виводяться на сторінці
                displayMusicResults(data);
            })
            .catch(error => {
                console.error('Помилка:', error);
            });
        }

        function displayMusicResults(data) {
            const resultContainer = document.getElementById('resultContainer');

            // Очищаємо контейнер перед виведенням нових даних
            resultContainer.innerHTML = '';

            if (data.success) {
                // Виводимо всі пісні
                const allSongs = data.all_songs;
                if (allSongs.length > 0) {
                    const allSongsList = document.createElement('ul');
                    allSongs.forEach(song => {
                        const listItem = document.createElement('li');
                        listItem.textContent = `Назва: ${song.title}, автор: ${song.description}`;
                        allSongsList.appendChild(listItem);
                    });
                    resultContainer.appendChild(document.createElement('hr'));
                    resultContainer.appendChild(document.createElement('h2').appendChild(document.createTextNode('Всі пісні:')));
                    resultContainer.appendChild(allSongsList);
                }
            } else {
                resultContainer.textContent = 'Помилка при отриманні даних.';
            }
        }
    </script>
    </div>
    </div>
    </div>
</body>
</html>












