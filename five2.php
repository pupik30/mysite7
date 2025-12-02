<?php


class PlaneVector
{
    protected int $x1;
    protected int $y1;
    protected int $x2;
    protected int $y2;

    private function getRandomCoordinate(int $min = 0, int $max = 10): int
    {


        return mt_rand($min, $max);
    }
    public function __construct()
    {
        // Инициализируем свойства случайными значениями
        $this->x1 = $this->getRandomCoordinate();
        $this->y1 = $this->getRandomCoordinate();
        $this->x2 = $this->getRandomCoordinate();
        $this->y2 = $this->getRandomCoordinate();
    }



    public function getMidpoint(): array
    {
        $midX = ($this->x1 + $this->x2) / 2;
        $midY = ($this->y1 + $this->y2) / 2;

        return ['x' => $midX, 'y' => $midY];
    }

    //проверка на ровно 45 градусов направление вектора



    //
    public function is45Degrees(): bool
    {
        $deltaX = $this->x2 - $this->x1;
        $deltaY = $this->y2 - $this->y1;

        // Вычисляем угол в радианах через арктангенс
        $angleRadians = atan2($deltaY, $deltaX);

        // Переводим в градусы
        $angleDegrees = rad2deg($angleRadians);


        return abs($angleDegrees - 45) < 0.001;
    }
    //



    public function __toString(): string
    {
        return sprintf("Вектор [(%.1f, %.1f) -> (%.1f, %.1f)]<br>",
            $this->x1, $this->y1, $this->x2, $this->y2);
    }
}




$vector1 = new PlaneVector();
$mid1 = $vector1->getMidpoint();

echo "1. " . $vector1 . "\n";
echo "   Середина: x={$mid1['x']}, y={$mid1['y']}\n<br>";
echo "\n";
echo "   Угол 45 градусов? <br>" . ($vector1->is45Degrees() ? "Да" : "Нет") . "<br><br>";
echo "\n";


?>
<br>
<a href="index.php"><|  Домой  |></a><br>
<a href="five1.php">| five1.php | </a><br>
<a href="five2.php">| five2.php | </a><br>
<a href="five3.php">| five3.php | </a><br>
<a href="five5.php">| five5.php | </a><br>
