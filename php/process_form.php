<?php
// process_form.php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'config.php';

try {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
        exit("Будь ласка, заповніть всі обов'язкові поля.");
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit("Невірний формат електронної пошти.");
    }

    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO message (name, email, password, message_date) VALUES (:name, :email, :password, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->execute(['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $hashedPassword]);

    $message_id = $conn->lastInsertId();

    if (!empty($_POST['content'])) {
        $query = "INSERT INTO message_content (content, message_id) VALUES (:content, :message_id)";
        $stmt = $conn->prepare($query);
        $stmt->execute(['content' => $_POST['content'], 'message_id' => $message_id]);
    }

    header("Location:/Html+css/html/My Portfolio.html");
} catch (PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
?>
