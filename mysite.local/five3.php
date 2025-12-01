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
        <br><label for="z">(z):</label>
        <input type="number" name="z" id="z" required>

        <br><label for="a">(x):</label>
        <input type="number" name="x" id="x" required>

        <br> <label for="b">(y):</label>
        <input type="number" name="y" id="y" required>

        <br>
        <input type="submit" value="Сумма Z и большего из X\Y">

    </form>

    <?php

    class Trapezoid {
        private $x;
        private $y;
        private $z;

        public function __construct($x, $y, $z) {
            $this->x = $x;
            $this->y = $y;
            $this->z = $z;
        }

        public function calculateArea() {
            // Площадь трапеции
            return (max($this->x, $this->y) + $this->z);
        }

        public function getX() {
            return $this->x;
        }

        public function getY() {
            return $this->y;
        }

        public function getZ() {
            return $this->z;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Получаем данные из формы
        $x = $_POST['x'];
        $y = $_POST['y'];
        $z = $_POST['z'];

        // Создаем объект класса Trapezoid
        $trapezoid = new Trapezoid($x, $y, $z);

        // Вычисляем площадь
        $area = $trapezoid->calculateArea();

        // Выводим результаты
        echo "<br>x = " . $trapezoid->getX();
        echo "<br>y = " . $trapezoid->getY();
        echo "<br>z = " . $trapezoid->getZ();
        echo "<br><br>Сумма Z и большего из X/Y: <span style='color: #a1284e;'>$area</span>";
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



