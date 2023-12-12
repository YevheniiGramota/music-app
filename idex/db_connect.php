<?php
$db = mysqli_connect("localhost", "root", "root", "register");

// Перевірка з'єднання
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
?>