<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .today {
            color: red;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php
//Задача
$n = 10;
$min = -100;
$max = 100;
$arr = [];
for ($i = 0; $i < $n; $i++) {
    $arr[] = rand($min, $max);
    
}
foreach ($arr as $i => $val) {
echo "arr[$i]: $val; ";
}
echo "<br>";
//вычислить sum, avg, minVal, maxVal
$sum = 0;
foreach($arr as $i) {
    $sum += $i;
}

echo "sum = $sum; <br>";
$sum = array_sum($arr);
$avg = $sum / count($arr);
$minVal = min($arr);
$maxVal = max($arr);
echo "sum = $sum; avg = $avg; minVal = $minVal; maxVal = $maxVal;<br>";
?>

<h1>19.10.2024. Ассоциативные массивы</h1>
<?php
//создание и инициализация

//получение. установка элемента

//установка нового элемента по ключу

//удаление элемента
//перебор элементов
?>
<?php
   // ЗАДАЧА: создать ассоциативный массив, в котором ключи - номера дней недели в стили библиотеки PHP
        // а значения - это соответствюущие названия дней недели на русском
        // вывести в нумерованный список названия дней недели, и текущий день недели выделить красным цветом и подчеркнуть
        // СПРАВОЧНАЯ ИНФА: получить номер дня недели через PHP: $day = date('w');
        // в PHP следующие номера: 0 - вс, 1 - пн, 2 - вт, 3 - ср, 4 - чт, 5 - пт, 6 - с
$day = date('w');
$map = ["0" => "воскресенье", "1" => "понедельник", "2" => "вторник", "3" => "среда", "4" => "четверг", "5" => "пятница", "6" => "суббота"];
echo "<ul>";
foreach ($map as $key => $item) {
    if ($key == $day){
        echo "<li class=\"today\">$item</li>";
    }
    else {
        echo "<li>$item</li>";
    }

}
echo "</ul>";

?>
<?php
 // ЗАДАЧА: задана строка str;
        // программа должна сформировать и вывести ассоциативный массив, в котором
        // ключами будут являться символы строки, а значениями кол-во вхождений соответствующего символа в строку
        // программа должна работать с любой строкой, записанной в переменную str
        // Пример: для str == "hello world!" получим массив:
        // ['h' => 1, 'e' => 1, 'l' => 3, 'o' => 2, ' ' => 1, 'w' => 1, 'r' => 1, 'd' => 1, '!' => 1]
        $str = "hello hello world!";
        $symbStat = []; //статистика символов
        // перебор символов строки
        for ($i = 0; $i < strlen($str); $i++) {
            //echo $str[$i]."<br>";
            $symb = $str[$i];
            if (isset($symbStat[$symb])) {
                $symbStat[$symb]++;}
                else {
                    $symbStat[$symb] = 1;
                }
            }
            echo "$str<br>";
            print_r($symbStat);   
?>
<h2>ДЗ. Ассоциативные массивы.</h2>
<p>Задача. В коде PHP на странице завести 2 ассоциативных массива: массив с ключами-номерами дней в стиле PHP (вс – 0, пн – 1 и т.д. до сб) и значениями-названиями дней недели (на русском); а также массив с ключами- номерами месяцев в стиле PHP и значениями – названиями месяцев (на русском).
С помощью средств PHP получить текущий год, номер месяца, число и номер дня недели. Вывести на странице большим текстом текущую дату с указанием месяца и дня недели в формате:
«октябрь 2024, 19, суббота»</p>
<?php
$numberDayWeek = date('w');
$day = date('d');
$numberMonth = date('n');
$year = date('Y');
$dayWeek = "";
$month = "";
$daysWeek = ["0" => "воскресенье", "1" => "понедельник", "2" => "вторник", "3" => "среда", "4" => "четверг", "5" => "пятница", "6" => "суббота"];
$months = ["1" => "январь", "2" => "февраль", "3" => "март", "4" => "апрель", "5" => "май", "6" => "июнь", "7" => "июль", "8" => "август", "9" => "сентябрь", "10" => "октябрь", "11" => "ноябрь", "12" => "декабрь"];
foreach ($daysWeek as $key => $item) {
    if ($key == $numberDayWeek){
       $dayWeek = $item;
    }
}
foreach ($months as $key => $item) {
    if ($key == $numberMonth){
       $month = $item;
    }
}
echo "\"$month $year, $day, $dayWeek\"";

?>

<h2>Функции</h2>
<?php
function sayHello() {
    echo "Hello!";   
}
sayHello();
echo "<br>";
?>

<?php
// ЗАДАЧА: написать функцию вычисления n! - факториала числа n; протестировать функцию для разных данных
        // n! = 1 * 2 * 3 * 4 * ... * (n - 1) * n;
        // 5! = 1 * 2 * 3 * 4 * 5 = 120
        // 1! = 1, 0! = 1
        // factorial - функция вычисления фаткориала
        // вход: n - целое неотрицательное чилсо, выход: n! - факториал числа n
                
        function factorial($n) {
            $fact = 1;
            for ($i = 1; $i<= $n; $i++ )
            {$fact *= $i;
                }
        return $fact;
        }
          // тестируй функцию тут
         $rez = factorial(10);
         echo $rez; 
?>
<h2>20.10.2024 Функции. Формы. </h2> 
<?php 
// функция получения массива в виде строки через указанный строковый раздилитель
    function arrayToString($arr, $delimiter=", ") {
    $arrStr = "";
    for ($i = 0; $i < count($arr) - 1; $i++ ) {
        $arrStr .=$arr[$i].$delimiter;
    }
    return $arrStr.$arr[count($arr)-1];
    }
     echo arrayToString([10, 15, "hello"], "+")."<br>";        
?>
<?php
 // generatePassword - функция генерации пароля по заданным параметрами
// вход:
//  - length - длина требуемого пароля, по умолчанию == 6; length > 3 && length < 20, иначе length == значению по умолчанию
//  - requiredSymbols - строка символов, которые обязательно должны встречаться в пароле (хотя бы 1 раз), по умолчанию пустая
//  - exludedSymbols - строка символов, которые не должны встречать в пароле, по умолчанию пустая
//  - excludedCombinations - массив строк через variadic args, которые представляют сочетания, которые не должны встречать в пароле
// выход:
//  - сгенерированный пароль если все параметры валидные
    function generatePassword(
        int $length=6, 
        string $requiredSymbols="", 
        string $exludedSymbols="", 
        string ...$excludedCombinations
    ) : string {     

    if ($length < 4 || $length > 20) {
        $length = 6;
    }
    //стандартный алфавит для пароля: англ.буквы (мальнькие/большие) + десятичные цифры + клавиатурные символы
    $standardAlph = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~";
        $password = "";
        for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($standardAlph) - 1);
        $password .= $standardAlph[$index];
        }
        return $password;
    }
    echo generatePassword(5)."<br>";
    echo generatePassword(8)."<br>";
?>
<p>Задача 4. Перевести число из двоичной в шестнадцатеричную систему счисления</p>
<?php
$number = 1100100;
//переводим число из двоичной в десятичную систему
$Str = strrev(strval($number));
$n = strlen($Str);
$dec = 0;
for ($i = $n - 1; $i >= 0; $i--) {
  $Z = intval($Str[$i]);
  $dec = $dec + $Z*pow(2, $i);
}  
// для проверки  - выводим число в десятичной системе echo $dec, "<br>";
//переводим число из десятичной в шестнадцатеричную систему
$converted = "";
$map = ["10" => "A", "11" => "B", "12" => "C", "13" => "D", "14" => "E", "15" => "F"];
while ($dec % 16 !== 0) {
$c = $dec % 16;
$Str = strval($c);
foreach ($map as $key => $item) {
  if ($key == $Str){
  $Str = $item;}
}
// для проверки  - выводим остатки от деления echo $c, "<br>";
$dec = intdiv($dec, 16);
$converted .=$Str;
}
$converted = strrev($converted);
echo "<p> Number: $number</p>";
echo "<p> Converted: $converted</p>";
?>

<h2>27.10.2024 PHP with html-forms</h2>
<form action = "/" method = "get">
    <label for "text-field">text field:</label>
        <input>
</form>

<h2>02.11.2024</h2>

<?php
//подключение файла c функцией с использованием глобальной переменной $_SERVER
include_once($_SERVER["DOCUMENT_ROOT"].'/calculator.php');

// значение для формы по умолчанию
$a = 1;
$b = 2;
$c = -3;

$result = [
    "rootCount" => 2,
    "x1" => -3,
    "x2" => 1
];

// проверим, были ли переданы http-параметры 
if (isset($_GET["a"]) && isset($_GET["b"]) && isset($_GET["c"])) {
    // если были переданы все 3 параметра, то можно делать вычисления
    $a = floatval($_GET["a"]);
    $b = floatval($_GET["b"]);
    $c = floatval($_GET["c"]);

    // решение задачи
    $d = $b * $b - 4 * $a * $c;
    if ($d < 0) {
        $result = ["rootCount" => 0];
    } elseif ($d == 0) {
        $result = [
            "rootCount" => 1,
            "x" => -$b / (2 * $a)
        ];
    } else {
        $result = [
            "rootCount" => 2,
            "x1" => (-$b - sqrt($d)) / (2 * $a),
            "x2" => (-$b + sqrt($d)) / (2 * $a)
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LOCAL-DEPLOY-SANDBOX</title>
</head>
<body>
<h1>PHP КВУР-калькулятор</h1>

<form action="/" method="get">
    <label for="a">a:</label>
    <input type="number" id="a" name="a" value="<?= $a ?>" required />

    <label for="b">b:</label>
    <input type="number" id="b" name="b" value="<?= $b ?>" required />

    <label for="c">c:</label>
    <input type="number" id=c" name="c" value="<?= $c ?>" required />

    <button>Решить</button>
</form>

<p>
    Результат: 
    <?php 
        switch ($result["rootCount"]) {
            case 2:
                echo "x1 = ".$result["x1"]."; x2 = ".$result["x2"].";";
                break;
            case 1:
                echo "x = ".$result["x"].";";
                break;
            case 0:
                echo "Корней нет";
                break;
            default:
                echo "Некорректный результат";
                break;
        }
    ?>
</p>

<h2>03.11.2024. Урок 11. Работа с состояниями. Куки, сессии, файлы</h2>

<h2>Домашнее задание от 26.10.2024. Практическое занятие</h2>

<p>1. Написать функцию, которая принимает на вход строку и возвращает в true, если все символы в строке уникальны, иначе false, если есть повторяющиеся символы. Протестировать программу. Примеры работы: “abcde” -> true “abcadec” -> false.</p>
<?php

function strCheck($str) {
    if (strlen($str) == strlen(count_chars($str, 3))) {
        return 'true';
    }
    else return 'false';       
}        
              
echo strCheck("abbbc");

?>

<p>2. Написать функцию, которая отрисовывает div-элемент на странице с заданными параметрами высоты/ширины (в пискелях), цветом текста и фона, контентом. Для аргументов функции задать параметры по умолчанию.</p>
<?php
function makeElement($height = 150, $width = 150, $color = "blue", $bgColor = "grey", $content = "Привет, мир!") {
 echo "<div style=\"height:".$height."px; width:".$width."px; color: $color; background-color: $bgColor;\">$content</div>";
}
//makeElement();
makeElement(100, 200, "green" , "grey", "Мне нравится изучать PHP!");
?>

<p>3. Написать функцию, которая возвращает кол-во дней до нового года</p>
<?php
function getDaysToNewYear() {
    $year = date('y');
    $todaySeconds = time();
    $seconds = mktime(0,0,0,12,32,$year);
    $days = intdiv($seconds - $todaySeconds,86400);
    $today = date("Y-m-d", $todaySeconds);
    $newYear = date("Y-m-d", $seconds);
    echo "Сегодня: $today <br>";
    echo "Количество дней до Нового года ($newYear): $days";
}
getDaysToNewYear();

?>

<p>7. Написать функцию генерации случайного валидного ipv4-адреса</p>
<?php
function ipv4Rand() {
    $adress = "";
        for ($i = 0; $i < 3; $i++) {
        $index = rand(0, 255);
        $str = strval($index);
        $adress .= $str.".";
        }
        $index = rand(0, 255);
        $adress .= $index;
        $adress = strval($adress);
        return $adress;
}
echo ipv4Rand();
?>

<p>8. Создать ассоциативный массив, ключи которого – шутки, заданные в виде строк, а значения – их рейтинг по 10-бальной шкале. Сделать набор из  шуток различного рейтинга. Написать код, который случайным образом выводит одну из шуток на страницу при ее обновлении и рейтинга этой шутки, причем, если рейтинг от 1 до 2 – цвет текста красный, если от 3 до 5 – желтый, если от 6 до 8 – то темно-зеленый, если от 9 до 10 – ярко-зеленый.</p>

<?php
function getJokes() {
$arrayJokes = ["Почему за инопланетянами приходят люди в черном, а за теми, кто их видит - люди в белом?" => "2", 
"Мяч еще летел в окно директора, а дети уже играли в прятки." => "5", 
"Китайские автозапчасти подтянулись к оригиналам. Пока только по цене." => "7", 
"Ничто не помогает по хозяйству так, как отключенный интернет." => "10", 
"Я долго думал, что такое 90х60х90. Оказалось, что это 486000!" => "2", 
"Лучше всего поднимает мужчину с дивана сработавшая за окном сигнализация." => "4", 
"Последнее время думаю, что надо с работы уходить пораньше. Где-то на 20-30 лет." => "7", 
"Хорошо, что компьютер и холодильник далеко друг от друга. Хоть какое-то движение..." => "9"];
$key =  array_rand($arrayJokes);
$num = intval($arrayJokes[$key]);
echo "Рейтинг шутки: $num";
if ($num < 3){
    echo "<p style=\"color: red\">$key</p>";
}
elseif ($num >= 3 && $num <= 5){
    echo "<p style=\"color: yellow\">$key</p>";
}
elseif ($num >= 6 && $num <= 8){
    echo "<p style=\"color: darkgreen\">$key</p>";
}
elseif ($num >= 9 && $num <= 10){
    echo "<p style=\"color: lime\">$key</p>";
}
}

getJokes();

?>

</body>
</html>