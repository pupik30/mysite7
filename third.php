<?php
// Задаем размеры матрицы
$n = 6; // количество строк
$m = 4; // количество столбцов


$matrix = [];
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $m; $j++) {
        $matrix[$i][$j] = rand(0, 100) / 1; // рандом цыфры от 1 до 100
    }
}

echo "<br>Матрица:<br>";
foreach ($matrix as $row) {
    echo implode(", ", $row) . "<br>";
}

// макс эл
$maxElements = [];

// макс эл GпОИСК
for ($i = 0; $i < $n; $i++) {
    $maxElements[] = max($matrix[$i]);
}

// ВЫВОДЫ
echo "Максимальные элементы строк:<br>";
echo implode(",  ", $maxElements) . "<br>";
?>


<br><br><br>
<a href="second.php.php">< Назад |</a>
<a href="index.php">| Домой |</a>
<a href="four.php">| Следующее > </a>