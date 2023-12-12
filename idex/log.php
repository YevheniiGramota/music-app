<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $log = $_POST["log"];
    $pass = $_POST["pass"];

    $reg_sql = "SELECT * FROM reg WHERE log='$log'";
    $reg_result = $conn->query($reg_sql);

    // Перевірка в таблиці 'reg'
    if ($reg_result->num_rows > 0) {
        $row = $reg_result->fetch_assoc();
        // Перевірка зашифрованого паролю
        if (password_verify($pass, $row['pass'])) {
            $_SESSION['login_user'] = $log;
            header("location: ../index.php");
            exit();
        } else {
            echo "Невірний пароль";
        }
    } else {
        echo "Користувача не знайдено";
    }
}

$conn->close();
?>
