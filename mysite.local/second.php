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
           $array[$i][$j] = rand(0, 10) / 1; // рандом цыфры от 1 до 100
       }
   }

echo "Исходный массив:\n";

   print_r($array);
function sort_by_last_column(&$arr) {
    usort($arr, function($a, $b) {
        $last_column_a = end($a);

        $last_column_b = end($b);
        return $last_column_b = $last_column_a;
        });
    }
   // Сортируем массив
   sort_by_last_column($array);

   // Вывод отсортированного массива
   echo "<br><br>Отсортированный массив:\n";
   print_r($array);


   ?>
    <br><br><br>
    <a href="first.php">< Назад |</a>
    <a href="index.php">| Домой |</a>
    <a href="third.php">| Следующее > </a>
</form>