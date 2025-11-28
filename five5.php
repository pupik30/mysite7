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
        <br><label for="z">(Зачисленные):</label>
        <input type="number" name="z" id="z" required>

        <br><label for="a">(Выпускники):</label>
        <input type="number" name="x" id="x" required>

        <br><label for="a">(Кто стал раблоать по специальности):</label>
        <input type="number" name="y" id="y" required>



        <br>
        <input type="submit" value="Решить">

    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $x = $_POST['x'];
        $y = $_POST['y'];
        $z = $_POST['z'];
    }
    function calculateTrapezoidArea($x,$y, $z) {
        // площадь трапеции
        $S = ($x / $z) * $y;
        return $S;

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $area = calculateTrapezoidArea($x, $y, $z);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<br>x = " . $x;
        echo "<br>y = " . $y;
        echo "<br>z = " . $z;
    }
    echo "<br><br>Qp = P*Q : <span style='color: #a1284e'>$area</span>";
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



