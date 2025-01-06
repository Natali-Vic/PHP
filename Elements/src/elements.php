<?php

// elements.php - файл с кодом CRUD-операций работы с элементами через БД

require_once($_SERVER["DOCUMENT_ROOT"]."/src/connection.php");

// Element - класс
class Element {
    // поля
    public int $id;
    public string $nameEl;
    public string $codeEl;
    public int $groupEl;
    public int $periodEl;
    public int $numberEl;

    // конструктор
    public function __construct(
        int $id = 0, 
        string $nameEl = '',
        string $codeEl = '',
        int $groupEl = 0,
        int $periodEl = 0,
        int $numberEl = 0
    ) {
        $this->id = $id;
        $this->nameEl = $nameEl;
        $this->codeEl = $codeEl;
        $this->groupEl = $groupEl;
        $this->periodEl = $periodEl;
        $this->numberEl = $numberEl;
    }
}

// selectAllElements - получение всех элементов из БД
// вход: -
// выход: массив ассоциативных массивов с данными
function selectAllElements() : array {
    // 1. создать подключение к БД
    $conn = openDbConnection();
    // 2. подготовка и выполнение запроса
    // 2.1. подготовить строку запроса
    $queryStr = "SELECT id, name_el, code_el, group_el, period_el, number_el FROM elements_t;";
    // 2.2. выполнить запрос
    $result = $conn->query($queryStr); // result - результаты select-запроса, внутри которых есть указатель на очередную строку, начиная с первой
    // по мере чтения результатов данный указатель перемещается до конца, считать результаты можно однократно
    // 2.3. считать результаты запроса
    $elements = [];
    while ($row = $result->fetch_array()) {
        // каждая строка становится массивом с набором полей результата запроса
        // доступным по индексу, либо по ключам
        $elements[] = new Element(
            intval($row["id"]), 
            $row["name_el"], 
            $row["code_el"], 
            intval($row["group_el"]), 
            intval($row["period_el"]),
            intval($row["number_el"])
        );
    }
    // 3. закрыть соединение и вернуть результат
    $conn->close();
    return $elements;
}

// selectElementById - получение элемента по id (либо не найдется, либо вернется первый подошедший)
// вход: id искомого элемента
// выход: объект элемента или null если он не найден
function selectElementById(int $id) : ?Element {
    // 1. создать подключение к БД
    $conn = openDbConnection();
    // 2. подготовить строку запроса
    $queryStr = "SELECT id, name_el, code_el, group_el, period_el, number_el FROM elements_t WHERE id = ?";
    // 3. подготовить запрос и привязать параметры
    $query = $conn->prepare($queryStr);
    $query->bind_param("i", $id);
    // 4. выполнить запрос и получим результат
    $query->execute();
    $result = $query->get_result();
    // 5. считать результаты запроса
    $element = null;
    while ($row = $result->fetch_array()) {
        $element = new Element(
            intval($row["id"]), 
            $row["name_el"], 
            $row["code_el"], 
            intval($row["group_el"]), 
            intval($row["period_el"]),
            intval($row["number_el"])
        );
        break;
    }
    // 6. закрыть соединение и вернуть результат
    $conn->close();
    return $element;
}

// insertElement - добавление нового элемента в таблицу элементов в БД
// вход: данные элемента в виде переменных
// выход: -
function insertElement(Element $element) : void {
    // 1. создать подключение к БД
    $conn = openDbConnection();
    // 2. подготовить строку запроса с местами для параметров
    $queryStr = "INSERT INTO elements_t (name_el, code_el, group_el, period_el, number_el) VALUES (?, ?, ?, ?, ?);";
    // 3. подготовить объект запроса
    $query = $conn->prepare($queryStr);
    // 4. загрузить параметры в запрос
    $query->bind_param("ssiii", $element->nameEl, $element->codeEl, $element->groupEl, $element->periodEl, $element->numberEl);
    // 5. выполнить запрос
    $query->execute();
    // 6. закрыть соединение с БД
    $conn->close();
}

// deleteElement - удаление по id
// вход: id удаляемого элемента
// выход: -
function deleteElement(int $id) : void {
    // 1. создать подключение к БД
    $conn = openDbConnection();
    // 2. подготовить строку запроса
    $queryStr = "DELETE FROM elements_t WHERE id = ?;";
    // 3. подготовить запрос
    $query = $conn->prepare($queryStr);
    $query->bind_param('i', $id);
    // 3. выполнить запрос
    $query->execute();
    // 4. закрыть соединение с БД
    $conn->close();
}

// updateElement - редактирование элемента по id
// вход: объект элемента для обновления с заданным id
function updateElement(Element $element) : void {
    // 1. создать подключение к БД
    $conn = openDbConnection();
    // 2. подготовить строку запроса
    $queryStr = "UPDATE elements_t SET name_el = ?, code_el = ?, group_el = ?, period_el = ?, number_el = ? WHERE id = ?;";
    // 3. подготовить запрос
    $query = $conn->prepare($queryStr);
    $query->bind_param('ssiiii', $element->nameEl, $element->codeEl, $element->groupEl, $element->periodEl, $element->numberEl, $element->id);
    // 3. выполнить запрос
    $query->execute();
    // 4. закрыть соединение с БД
    $conn->close();
}