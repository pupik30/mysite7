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
<div class="container">
    <h1>Площадь трапеции</h1>
    <form method="POST">
        <br><label for="a">Длина первого основания (a):</label>
        <input type="number" name="a" id="a" required>

        <br> <label for="b">Длина второго основания (b):</label>
        <input type="number" name="b" id="b" required>

        <br><label for="H">Высота (H):-------------------------</label>
        <input type="number" name="H" id="H" required>
        <br>
        <input type="submit" value="Рассчитать площадь">
    </form>

<?php
//пока не сработал post код не выполнен
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $H = $_POST['H'];
}
function calculateTrapezoidArea($a, $b, $H) {
    // площадь трапеции
    $S = 0.5 * ($a + $b) * $H;
    return $S;


//стало

}
// было
//$a = 5; // длина первого основания
//$b = 7; // длина второго основания
//$H = 4; // высота


//пока не сработал post код не выполнен
// Вызыв функции ир езультат
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $area = calculateTrapezoidArea($a, $b, $H);

echo "<br>a = " . $a;
echo "<br>b = " . $b;
echo "<br>H = " . $H;
echo "<br><br>Площадь трапеции: " . $area;
}
?>
</div>

<br>
<a href="index.php">< Домой |</a>
<a href="second.php">| Следующее > </a>
</body>
</html>
