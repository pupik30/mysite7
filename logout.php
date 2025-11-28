<?php
session_start();

// Удаляем куки
setcookie('user_key', '', time() - 3600, "/"); // Удаляем куку
header('Location: index.php'); // Перенаправляем на главную страницу
exit();
?>
