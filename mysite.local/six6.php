<?php

$filename = 'numbers.txt';

if (!file_exists($filename)) {  //есть файл или нет
    die("Файл не найден!");
}

// все что есть превратить в сточку
$content = file_get_contents($filename);

//,tcrjytxyj -1
//  trim($content убратиь пробелы <>
// \s+ — это регулярное выражение (Regular Expression). В контексте PHP функции preg_split оно используется как шаблон для поиска разделителя.
$numbers = preg_split('/\s+/', trim($content), -1, PREG_SPLIT_NO_EMPTY);

// Инициализируем произведение единицей (нейтральный элемент умножения)
$product = 1.0;
$count = 0;

foreach ($numbers as $number) {
    // Проверяем, является ли строка числом (валидация данных)
    if (is_numeric($number)) {
        $product *= (float)$number;
        $count++;
    }
}

if ($count > 0) {
    echo "Количество чисел: $count" . PHP_EOL;
    echo "Произведение компонент: $product";
}
else {
    echo "В файле не найдено чисел.";
}

