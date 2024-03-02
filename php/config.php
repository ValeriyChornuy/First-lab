<?php
// config.php

$db_host = 'localhost';
$db_name = 'form';
$db_user = 'root';
$db_password = null;

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("Помилка підключення до бази даних: " . $e->getMessage());
}
?>
