<?php

// Підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

// Обробка POST-запиту
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $log = $_POST["log"];
    $pass = $_POST["pass"];
    $confirmPass = $_POST["confirmPass"];

    // Перевірка, чи паролі співпадають
    if ($pass !== $confirmPass) {
        echo "Паролі не співпадають!";
        exit;
    }

    // Хешування паролю перед збереженням у базі даних (додайте ваші власні механізми безпеки)
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

// Вставка даних у базу даних
$sql = "INSERT INTO reg (email, log, pass) VALUES ('$email', '$log', '$hashedPass')";

if ($conn->query($sql) === TRUE) {
    // Перенаправлення на домашню сторінку
    header('Location: ./login.html');
    exit(); // Впевнитися, що немає подальшого виконання коду після перенаправлення
} else {
    echo "Помилка: " . $sql . "<br>" . $conn->error;
}
}
    

// Закриття з'єднання з базою даних
$conn->close();

?>