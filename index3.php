<!-- php-код страницы -->
<?php
// подключение файла с функцией генерации пароля
include_once($_SERVER["DOCUMENT_ROOT"].'/password_generation.php');

// значения по умолчанию
    $length = 6;
    $requiredSymbols = "";
    $exludedSymbols = "";
// проверим, были ли переданы http-параметры 
 if (isset($_GET["length"]) && isset($_GET["requiredSymbols"]) && isset($_GET["exludedSymbols"])) {
    $length = intval($_GET["length"]);
    $requiredSymbols = $_GET["requiredSymbols"];
    $exludedSymbols = $_GET["exludedSymbols"];

    // вызов функции генерации пароля
    $password = generatePassword($length, $requiredSymbols, $exludedSymbols);
 }

 if ($password == null) {
    $password = "Невозможно сгенерировать, так как введены неверные данные.";
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .wrapper {
            font-size: 20px;
            color: green;
            margin: 20px;
        }

        label, input, button {
            display: block;  
            margin-bottom: 15px;
            padding: 5px;
        }        
        
    </style>
</head>
<body>
<h1>PHP Генератор пароля</h1>
    <div class="wrapper">
        <form action="/" method="get">
           <label for="length">Введите длину пароля (от 4 до 20):</label>
           <input type="number" id="length" name="length" min="4" max="20" value="<?= $length ?>" required />

           <label for="requiredSymbols">Введите символы, которые обязательно должны встречаться в пароле (хотя бы 1 раз):</label>
           <input type="text" id="requiredSymbols" name="requiredSymbols" value="<?= $requiredSymbols ?>" required />

           <label for="exludedSymbols">Введите символы, которые не должны встречаться в пароле:</label>
           <input type="text" id="exludedSymbols" name="exludedSymbols" value="<?= $exludedSymbols ?>" required />

        <button>Сгенерировать пароль</button>
        </form>
        <p>Ваш пароль: <?= htmlspecialchars($password) ?> </p>
    </div>  

</body>
</html>