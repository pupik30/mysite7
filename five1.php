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
    class CubeCalculator {
        private $x;
        private $y;

        public function __construct($x, $y) {
            $this->x = $x;
            $this->y = $y;
        }

        public function calculateCubeOfMax() {
            return pow(max($this->x, $this->y), 3);
        }

        public function getX() {
            return $this->x;
        }

        public function getY() {
            return $this->y;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $x = $_POST['x'];
        $y = $_POST['y'];

        $calculator = new CubeCalculator($x, $y);
        $area = $calculator->calculateCubeOfMax();

        echo "<br>x = " . $calculator->getX();
        echo "<br>y = " . $calculator->getY();
        echo "<br><br>Куб большего из чисел " . $area;
    }
    ?>
</div>

<br>
<a href="index.php"><|  Домой  |></a><br>
<a href="five1.php">| five1.php | </a><br>
<a href="five2.php">| five2.php | </a><br>
<a href="five3.php">| five3.php | </a><br>

<a href="five5.php">| five5.php | </a><br>
</body>
</html>