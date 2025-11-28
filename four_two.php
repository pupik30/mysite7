<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Преобразователь регистра текста</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="calculator">
    <h1>Преобразователь регистра текста</h1>

    <?php
    // Инициализация
    $inputText = '';
    $conversionType = 'upper';
    $convertedText = '';
    $error = '';

    // Функция для рандома
    function randomCase($text) {
        $result = '';
        $length = mb_strlen($text, 'UTF-8');
        for ($i = 0; $i < $length; $i++) {
            $char = mb_substr($text, $i, 1, 'UTF-8');
            if (rand(0, 1) === 0) {
                $result .= mb_strtolower($char, 'UTF-8');
            } else {
                $result .= mb_strtoupper($char, 'UTF-8');
            }
        }
        return $result;
    }

    //
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Получение и проверка данных
        if (!empty($_POST["inputText"]) && !empty($_POST["conversionType"])) {
            $inputText = $_POST["inputText"];
            $conversionType = $_POST["conversionType"];

            // Выполнение преобразования в зависимости от выбранного типа
            switch ($conversionType) {
                case 'upper':
                    $convertedText = mb_strtoupper($inputText, 'UTF-8');
                    break;
                case 'lower':
                    $convertedText = mb_strtolower($inputText, 'UTF-8');
                    break;
                case 'random':
                    $convertedText = randomCase($inputText);
                    break;
                default:
                    $error = "Неизвестный тип преобразования";
                    break;
            }
        } else {
            $error = "Пожалуйста, введите текст и выберите тип преобразования!";
        }
    }
    ?>

    <form method="post" action="">
        <div class="form-group">
            <label for="inputText">Исходный текст:</label>
            <textarea id="inputText" name="inputText" rows="4" required><?php echo isset($_POST['inputText']) ? htmlspecialchars($_POST['inputText']) : ''; ?></textarea>
        </div>

        <div class="form-group">
            <label for="conversionType">Тип преобразования:</label>
            <select id="conversionType" name="conversionType" required>
                <option value="upper" <?php echo (isset($_POST['conversionType']) && $_POST['conversionType'] == 'upper') ? 'selected' : ''; ?>>В ВЕРХНИЙ РЕГИСТР</option>
                <option value="lower" <?php echo (isset($_POST['conversionType']) && $_POST['conversionType'] == 'lower') ? 'selected' : ''; ?>>в нижний регистр</option>
                <option value="random" <?php echo (isset($_POST['conversionType']) && $_POST['conversionType'] == 'random') ? 'selected' : ''; ?>>СлУчАйНыЙ РеГиСтР</option>
            </select>
        </div>

        <button type="submit">Преобразовать</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)): ?>
        <div class="result">
            <h2>Результаты преобразования:</h2>

            <p><strong>Исходный текст:</strong></p>
            <div class="formula" style="background-color: #7FFFD4">
                <?php echo nl2br(htmlspecialchars($inputText)); ?>
            </div>


            <p><strong>Преобразованный текст:</strong></p>
            <div class="formula" style="background-color: #D87093">
                <?php echo nl2br(htmlspecialchars($convertedText)); ?>
            </div>
        </div>
    <?php elseif (!empty($error)): ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <a href="four.php.php">< Назад |</a>
    <a href="index.php">| Домой |</a>
    <a href="five1.php">| Следующее > </a>

</div>
</body>
</html>