<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<h1>Задача №1</h1>
<h3>Лаба 2, на 5</h3>
<form action="onemass.php" method="post">
    <?php

    // можно раздокументить для красоты, но потери функционала
    //   header("Content-Type: application; charset=UTF-8");


    $n = 4; // количество строк
    $m = 4; // количество столбцов
    $array = [];

    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            $array[$i][$j] = rand(0, 10); // рандом цыфры от 1 до 100
        }
    }

    echo "Исходный массив:<br>";
    foreach ($array as $row) {
        echo implode(", ", $row) . "<br>";
    }





    function sortLastColumn(&$arr) {
        if (empty($arr)) return;

        $lastColIndex = count($arr[0]) - 1;

        // Извлекаем последний столбец
        $lastColumn = [];
        foreach ($arr as $i => $row) {
            $lastColumn[$i] = $row[$lastColIndex];
        }

        // Сортируем с сохранением ключей
        asort($lastColumn);

        // Перестраиваем матрицу в соответствии с отсортированным порядком
        $sortedMatrix = [];
        foreach ($lastColumn as $index => $value) {
            $sortedMatrix[] = $arr[$index];
        }

        $arr = $sortedMatrix;
    }
















    // Сортируем массив
    sortLastColumn($array);

    // Вывод отсортированного массива
    echo "<br><br>Отсортированный массив:<br>";
    foreach ($array as $row) {
        echo implode(", ", $row) . "<br>";
    }


    ?>
    <br><br><br>
    <a href="first.php">< Назад |</a>
    <a href="index.php">| Домой |</a>
    <a href="third.php">| Следующее > </a>
</form>