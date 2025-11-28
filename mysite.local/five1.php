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
    <h1>1</h1>
    <form method="POST">
        <br><label for="a">(x):</label>
        <input type="number" name="x" id="x" required>

        <br> <label for="b">(y):</label>
        <input type="number" name="y" id="y" required>

        <br>
        <input type="submit" value="Куб большего из чисел">

    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $x = $_POST['x'];
        $y = $_POST['y'];
    }
    function calculateTrapezoidArea($x,$y) {
        // площадь трапеции
        $S = max(pow($x,3),pow($y,3));
        return $S;

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $area = calculateTrapezoidArea($x, $y);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<br>x = " . $x;
        echo "<br>y = " . $y;
        echo "<br><br>Куб большего из чисел " . $area;
    }
    ?>
</div>

<br>
<a href="index.php"><|  Домой  |></a><br>
<a href="five1.php">| five1.php | </a><br>
<a href="five2.php">| five2.php | </a><br>
<a href="five3.php">| five3.php | </a><br>
<a href="five4.php">| five4.php | </a><br>
<a href="five5.php">| five5.php | </a><br>
</body>
</html>


