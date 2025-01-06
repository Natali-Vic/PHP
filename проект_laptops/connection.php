<?php

// connection.php - файл с кодом подключения к БД

// pingDb - функция проверки работоспособности подключения к БД согласно настройкам приложения
function pingDb() : void {
    // 1. открыть соединение с БД
    $conn = openDbConnection();
    // 2. закрыть соединение
    $conn->close();
}

// openDbConnection - функция открытия соединения с БД
// вход: -
// выход: объект соединения с БД
function openDbConnection() : mysqli {
    // парсинг .env-файла с данными для подключения к БД
    $env = parse_ini_file($_SERVER["DOCUMENT_ROOT"]."/.env");
    // данные для подключения к БД
    $host = $env["LAPTOPS_DB_HOST"];
    $port = $env["LAPTOPS_DB_PORT"];
    $user = $env["LAPTOPS_DB_USER"];
    $password = $env["LAPTOPS_DB_PASSWORD"];
    $database = $env["LAPTOPS_DB_NAME"];
    // подключение
    $conn = new mysqli($host, $user, $password, $database, $port);
    // проверим результат подключения
    if ($conn === false) {
        // если ошибка - то сделать вылет с сообщением об ошибке
        die($conn->connect_error());
    }
    return $conn;
}
