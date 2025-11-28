<?php
session_start();



// Проверка на cookie
$isLoggedIn = isset($_COOKIE['auth_key']);

// Обработка формы авторизации
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Здесь должна быть проверка данных в базе данных
    // Для примера, просто проверим на фиксированные значения
    if ($login === 'user' && $password === 'pass') {

        $authKey = bin2hex(random_bytes(16));  // Генерация ключа для cookie
        setcookie("auth_key", $authKey, time() + 30); // Записываем cookie на 1 час (0.5 минуты)*
        header("Location: index.php"); // Перенаправляем на index.php
        exit();
    } else {
        $error = "Подсказка: user | pass )))";
    }
}

// Функция для подсчета уникальных IP !GPT!
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d');
$filePath = 'visits.txt';

// Читаем существующие IP из файла или создаем новый массив
$visits = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

// Добавляем текущий IP, если его нет в списке на сегодня
if (!isset($visits[$date])) {
    $visits[$date] = [];
}
if (!in_array($ip, $visits[$date])) {
    $visits[$date][] = $ip;
}

// Сохраняем обновленный список IP обратно в файл
file_put_contents($filePath, json_encode($visits));

// Подсчет уникальных посещений за сегодня и за неделю
$todayCount = count($visits[$date] ?? []);
$weekCount = 0;
for ($i = 0; $i < 7; $i++) {
    $weekCount += count($visits[date('Y-m-d', strtotime("-$i days"))] ?? []);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Счетчик посещений</title>
</head>
<body>

<h1>Счетчик посещений</h1>
<p>Уникальные посещения за сегодня: <?php echo $todayCount; ?></p>
<p>Уникальные посещения за неделю: <?php echo $weekCount; ?></p>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>

<h1>Авторизация</h1>

<?php if ($isLoggedIn): ?>
    <p>Вы успешно авторизованы!</p>
    <a href="index.php">| Домой |</a>
<?php else: ?>
    <form method="POST">
        <label for="login">Логин:</label>
        <input type="text" name="login" required>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required>


        <input type="submit" value="Войти">
    </form>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>

<br><br><br>
<a href="third.php">< Назад |</a>
<a href="index.php">| Домой |</a>
<a href="four_two.php">| Следующее > </a>
