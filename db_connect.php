<?php
$host = 'localhost';
$dbname = 'lb_pdo_lessons';
$username = 'root';
$password = '1234';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected to database';
} catch (PDOException $e) {
    echo "Помилка підключення до бази даних: " . $e->getMessage();
    die();
}
?>