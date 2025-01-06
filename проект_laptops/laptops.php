<?php
// laptops.php - файл с кодом CRUD-операций работы с данными о ноутбуках через БД

require_once($_SERVER["DOCUMENT_ROOT"]."/connection.php");

//  - класс, описывающий ноутбук 
class Laptop {
    // поля
    public int $id;
    public string $brand;
    public string $name;
    public string $displaySize;
    public string $ram;
    public int $price;

    // конструктор
    public function __construct(
        int $id = 0, 
        string $brand = '',
        string $name = '',
        string $displaySize = '',
        string $ram = '',
        int $price = 0
    ) {
        $this->id = $id;
        $this->brand = $brand;
        $this->name = $name;
        $this->displaySize = $displaySize;
        $this->ram = $ram;
        $this->price = $price;
    }
}

// selectAllLaptops - получение всех ноутбуков из БД
// вход: -
// выход: массив ассоциативных массивов с данными о ноутбуках
function selectAllLaptops() : array {
    // 1. создать подключение к БД
    $conn = openDbConnection();
    // 2. подготовка и выполнение запроса
    // 2.1. подготовить строку запроса
    $queryStr = "SELECT id, brand_f, name_f, display_size_f, ram_f, price_f FROM laptops_t;";
    // 2.2. выполнить запрос
    $result = $conn->query($queryStr); // result - результаты select-запроса, внутри которых есть указатель на очередную строку, начиная с первой
    // по мере чтения результатов данный указатель перемещается до конца, считать результаты можно однократно
    // 2.3. считать результаты запроса
    $laptops = [];
    while ($row = $result->fetch_array()) {
        // каждая строка становится массивом с набором полей результата запроса
        // который доступным по индексу, либо по ключам
        $laptops[] = new Laptop(
            intval($row["id"]), 
            $row["brand_f"], 
            $row["name_f"], 
            $row["display_size_f"], 
            $row["ram_f"],
            intval($row["price_f"])
        );
    }
    // 3. закрыть соединение и вернуть результат
    $conn->close();
    return $laptops;
}

