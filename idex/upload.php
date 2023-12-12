<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Завантажити пісні</title>
</head>
<body>
    <h2>Завантажити пісні</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Виберіть файли:</label>
        <input type="file" name="files[]" id="file" multiple accept=".mp3">
        <br>
        <br>
        <label for="title">Назва:</label>
        <input type="text" name="title[]" id="title">
        <br>
        <label for="description">Опис:</label>
        <input type="text" name="description[]" id="description">
        <br>
        <label for="image_path">Шлях до зображення:</label>
        <input type="text" name="image_path[]" id="image_path">
        <br>
        <label for="audio_path">Шлях до аудіофайлу:</label>
        <input type="text" name="audio_path[]" id="audio_path">
        <br>
        <input type="submit" value="Завантажити">
    </form>
</body>
</html>

<?php
if (isset($_FILES['files'])) {
    $files = $_FILES['files'];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "register";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    for ($i = 0; $i < count($files['name']); $i++) {
        $mp3_data = file_get_contents($files['tmp_name'][$i]);

        $title = $_POST['title'][$i] ?? '';
        $description = $_POST['description'][$i] ?? '';
        $image_path = $_POST['image_path'][$i] ?? '';
        $audio_path = $_POST['audio_path'][$i] ?? '';

        $sql = "INSERT INTO songs (title, description, image_path, audio_path) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $title, $description, $image_path, $audio_path);

        if ($stmt->execute() !== TRUE) {
            echo "Error saving MP3 file: " . $stmt->error;
            break;
        }

        $stmt->close();
    }

    echo "MP3 files successfully saved to the database.";

    $conn->close();
}
?>