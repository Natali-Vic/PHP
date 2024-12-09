<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- встраивание php-кода на страницу -->

<?php

// тут будет php код
echo 'Привет! <br>';

// Задача
$a = 10;
$b = 15;

// вывод переменных
echo 'a = '.$a.'; b = '.$b. '<br>'; // a = 10; b = 15

//swap
$tmp = $a;
$a = $b;
$b = $tmp;
echo 'a = '.$a.'; b = '.$b. '<br>'; // a = 15; b = 10

// Задача
$a = 10; $b = 15;
$s = $a*$b;
echo 's = '.$s;
?>

<h2>Задача</h2>
    <p>
        Задана длина окружности  L. Необходимо вычислить площадь S данной окружности. 
        S&nbsp;=&nbsp;pi&nbsp;*&nbsp;r^2;&nbsp;L&nbsp;=&nbsp;2&nbsp;*&nbsp;pi&nbsp;*&nbsp;r;
    </p>
    <?php
        // исходные данные
        $L = 2.55;
        echo 'L = '.$L.'<br>';

        // вычисление
        $pi = pi();
        $s = $L * $L / (4 * $pi);

        // вывод результата
        echo 'S = '.$s.'<br>';
    ?>

    <h2>Задача 1 </h2>
    <p> 

    </p>

    <?php
    //код решения
       $hour = 1; $minute = 6; $second = 40;
       $tmp = 3600 * $hour + 60 * $minute + $second;
       echo 'Секунды = '.$tmp.'<br>';
    ?>

<h2>ДЗ от 29.09.2024</h2>
<h4>Задача 1. Конкатенация: вывод на страницу («Hello! My name
is 'Name'»)</h4>
<h5> </h5>

<?php
$a = 'Name';
// вывод на страницу
echo "Hello! My name is '$a'<br>"; 
?>


<h4> Задача 2. Добавить к заданию 1 фразу «I'm Age»</h4>
<h5></h5>

<?php
$a = 'Natali';
$b = 50;
// вывод на страницу
echo "Hello! My name is '$a'.<br> I'm $b.<br>"; 
?>



<h4>Задача 3. Добавить вывод действий в таком формате: 'a'+'b'='rez'</h4>
<h5></h5>

<?php
$a = 10; $b = 15;
$rez = $a + $b;
echo "'$a' + '$b' = '$rez' <br>";
?>
<h4>Задача 4. Поменять 2 числа местами без использования 3-й переменной.</h4>

<?php
$a = 10; $b = 15;
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;
echo 'a = '.$a.'; b = '.$b. '<br>'; // a = 15; b = 10
?>



    
<h1>05.10.2024 PHP Project!</h1>
    <?php
    //код 
       $a1 = 10; $a2 = 20; $a3 = 25; $a4 = 30; $a5 = 45;
       $max = $a1;
       if ($a2 > $max) {
        $max = $a2;
       }
       if ($a3 > $max) {
        $max = $a3;
       }
       if ($a4 > $max) {
        $max = $a4;
       }
       if ($a5 > $max) {
        $max = $a5;
       }
       echo 'Максимальное число '.$max.'<br>';
    ?>

<h2>Задача 1</h2>
<p>заданы три числовых переменные: a, b, x; <br>
Программа должна сказать, где располагается число х относительно числового промежутка [a,b]: 
внутри промежутка , снаружи промежутка, на границе промежутка

</p>
    <?php
    //код 
       $a = 3; $b = 4; $x = 4; 

       if ($a < $x && $x < $b) {
        echo 'Число внутри промежутка';
       }
       elseif ($x < $a || $x > $b) {
        echo 'Число за пределами промежутка';
       }
       else  {
        echo 'Число на границе промежутка. <br>';
       }
       
    ?>

<h1>06.10.2024 PHP Project!</h1>
    <?php
    //switch case, match

   // $digitChar = "5";
    //$digitName = match ($digitChar) {
       // "0" => "",
       // "1" => "",
       // "2" => "",
       // default => null
   // }

// Циклы while (условное выражение) {тело цикла}

$a = 5;
while ($a > 0) {
    echo "$a <br>";
    $a--;
}
    ?>

<h2>Задача</h2>
    <p>
        Задана числовая переменная n - целое неотрицательное число (n >= 0).<br>
        Необходимо посчитать n! - факториал числа n.<br>
        n! = 1 * 2 * 3 * ... * (n - 1) * n<br>
        Примеры:
        <ul>
            <li>5! = 1 * 2 * 3 * 4 * 5 = 120</li>
            <li>4! = 1 * 2 * 3 * 4 = 24</li>
            <li>1! = 1</li>
            <li>0! = 1</li>
        </ul>
        Использовать цикл while.
    </p>
    <h3>Решение:</h3>
    <?php
        $n = 5;
       $i = 1;
       $fact = 1;
        while ($i <= $n)
        {$fact *= $i;
            $i++;
        }
        echo "$n! = $fact<br>";
  ?>

<h3>Решение с циклом do while:</h3>
    <?php
       $n = 5;
       $i = 1;
       $fact = 1;
       
       do {$fact *= $i;
            $i++;
        } while ($i <= $n);
        echo "$n! = $fact<br>";
  ?>

<h3> цикл For</h3>
    <?php
       $n = 7;
       $fact = 1;
            
        for ($i = 1; $i<= $n; $i++ )
        {$fact *= $i;
            }
        echo "$n! = $fact<br>";
  ?>

<h2>ДЗ от 06.10.2024</h2>
<p>Задача 1. Есть 2 переменные. Проверить и вывести на экран,является ли значение первой переменной кратным
значению второй (первое число кратно второму, если делится на него без остатка).</p>
<?php
     
       $a = 16; $b = 4; 
       echo "a = $a; b = $b <br>";

       if ($a % $b == 0) {
        echo "Число $a кратно числу $b.";
       }
       else  {
        echo "Число a не кратно числу b.";
       }
       
    ?>
<p>Задача 2. Вывести квадрат большего из двух чисел.</p>
<?php
       $a = 5; $b = 6; 
       echo "a = $a; b = $b <br>";

       if ($a > $b) {
        echo "Квадрат большего из двух чисел равен " .$a*$a;
       }
       else  {
        echo "Квадрат большего из двух чисел равен " .$b*$b;
       } 
?>
    <p>Задача 3. Есть переменная, в ней сохранен номер месяца (в коде скрипта). Скрипт возвращает количество дней в этом месяце..</p>

<?php
       $month = 12; 
       echo "Month = $month; <br>";
       $days = match ($month) {
        1 => 31,
        2 => 28,
        3 => 31,
        4 => 30,
        5 => 31,
        6 => 30,
        7 => 31,
        8 => 31,
        9 => 30,
        10 => 31,
        11 => 30,
        12 => 31,
        default => null
       };
       if ($days == null) {
        echo "$month is not a month";
       } else {
        echo "Days in the month: $days";
       }
?>

<p>Задача 4. Есть переменная, в ней (в скрипте) сохранен год. Проверить, является ли внесенный год високосным.</p>
<?php
     
       $year = 2022;  
       echo "Year = $year; <br>";
       if ($year % 4 == 0) {
        echo "$year is leap-year";
       }
       else  {
        echo "$year isn't leap-year";
       }
       
?>

<p>Задача 5. Вывести сумму двух чисел, если они оба кратны 3, или вывести результат деления при условии, что второе число не равно нулю (если ноль, то выводится сообщение о некорректном вводе).</p>
<?php
       $a = 7; $b = 9; 
       $rez = 0;
       echo "a = $a; b = $b <br>";

       if ($a % 3 == 0 && $b % 3 == 0) {
        $rez = $a + $b;
        echo "$a + $b = " .$rez;
       }
       elseif ($b == 0) {
        echo "Некоректный ввод данных!";
       }
       else {
        $rez = $a / $b;
        echo "$a / $b = " .$rez;
       } 
?>


<h2>Домашнее задание от 06.10.2024. Циклы.</h2>
<p>Задача 1. Вывести N нечетных чисел (N записывается в переменной) и дополнительно:
посчитать их среднее значение;
вывести их в обратном порядке (от большего к меньшему).</p>
<?php
    $n = 38;
    $sum = 0;
    $max = 0;
    $j = 0;
    if ($n % 2 == 0) {$max = $n - 1;}
    else {$max = $n;}
    for ($i = 1; $i<= $n; $i++ ){
      if ($i % 2 !== 0) {
        echo '<span style = "font-size: '.$max.'px; color: red">'.$i.', </span>';
        $sum += $i;
        $j += 1;
      }
    }
    $avg = $sum / $j;
    echo "<br> AVG = $avg <br>";
    for ($i = $n; $i >= 1; $i-- ){
        if ($i % 2 !== 0) {
          echo '<span style = "font-size: '.$max.'px; color: red">'.$i.', </span>';
        }
      }
  ?>
<p>Задача 2. Найти количество 4-значных чисел, в которых: цифры зеркальные (например, 2112);
все цифры четные; все цифры нечетные; цифры идут в порядке от большего к меньшему(например, 4321).</p>
<?php
    $min = 1000;
    $max = 9000;
    $mirr = 0;
    $pir = 0;
    $not_pir = 0;
    $ord = 0;   
    for ($i = $min; $i<= $max; $i++ ){
        $Str_i = strval($i);
      if (strrev($Str_i) == $Str_i) {
        //echo "Mirrored: $Str_i <br>";
        $mirr += 1;
      }
      $a1 = intdiv($i, 1000);
      $b = $i % 1000;
      $a2 = intdiv($b, 100);
      $c = $b % 100;
      $a3 = intdiv($c, 10);
      $a4 = $c % 10;
      if ($a1 % 2 == 0 && $a2 % 2 == 0 && $a3 % 2 == 0 && $a4 % 2 == 0) {
       // echo "Pir: $a1$a2$a3$a4 <br>";
        $pir += 1;             
      }
      if ($a1 % 2 !== 0 && $a2 % 2 !== 0 && $a3 % 2 !== 0 && $a4 % 2 !== 0) {
       // echo "NotPir: $a1$a2$a3$a4 <br>";
        $not_pir += 1;             
      }
      
      if ($a1 == $a2 + 1 && $a2 == $a3 + 1 && $a3 == $a4 + 1){
       // echo "Ordered: $a1$a2$a3$a4 <br>";
        $ord += 1;
      }           
    }
    echo "In between ($min, $max): <br>";
    echo "Mirrored number: $mirr <br>";
    echo "Pir number: $pir <br>";
    echo "Not pair number: $not_pir <br>";    
    echo "Ordered number: $ord <br>";
  ?>
  <p>Задача 3. Вывести на экран 10 кругов в один ряд (диаметр 50 рх,
цвет синий).</p>
<?php
$n = 10;
$color = "blue";
echo "<div style = \"display: inline-flex; justify-content: left;\">";
for ($i = 1; $i <= $n; $i++) {
echo "<div style = \"width: 50px; height: 50px; border-radius: 50%; background-color:".$color.";\"></div>";
}
echo "</div>";
?>
<p>Задача 4. Перевести число из двоичной в шестнадцатеричную систему счисления</p>
<?php
$number = 1101100101111;
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
  

<h1>13.10.2024 PHP Project!</h1>
<?php
    // получить текущую дату
       $curDate = date('Y-m-d H:i:s');
       echo $curDate;
?>


<?php
//Массивы
$arr = [10, 20, 'hello'];

// операции с массивами.
//Добавление элементов в конец.
array_push($arr, -1, 12);
print_r($arr); echo "<br>";
$arr[] = -1;
print_r($arr); echo "<br>";

?>
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
<h2>ДЗ от 13.10.2024. Массивы</h2>
<p>Задача. Написать программу, которая удаляет все повторяющиеся элементы в заданном массиве. Для вывода массивов можно использовать функцию print_r.</p>
<?php
$arr = [5, 15, "Hello", "Hello", 20, 30, 5, 15, 4, 8, 20];
print_r($arr); echo "<br>";
$arr1 = array_unique($arr);
print_r($arr1);echo "<br>";
array_multisort($arr1);
print_r($arr1); echo "<br>";
arr
//for ($i = 0; $i < count($arr) - 1; $i++ ) {
//}
?>

</body>
</html>



    
    