<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
try {
    $conn = new PDO("mysql:host=localhost;dbname=form", 'root', null);

    // Перевірка, чи отримані значення з форми
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
        exit("Будь ласка, заповніть всі обов'язкові поля.");
    }

    // Валідація електронної пошти
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit("Невірний формат електронної пошти.");
    }

    // Обробка паролю
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // SQL-запит для вставки даних у таблицю "message"
    $query = "INSERT INTO message (name, email, password, message_date) VALUES (:name, :email, :password, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->execute(['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $hashedPassword]);

    // Отримання ID, яке було призначено попередньому запису
    $message_id = $conn->lastInsertId();

    // Додавання даних у таблицю "message_content"
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
