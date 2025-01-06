<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/src/elements.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/pages/page-helpers.php");

    // выполнить добавление элемента
    if (($element = readElementFromArray($_GET)) !== null) {
        try {
            insertElement($element);
            $result = $_GET["name"]." added";
        } 
        catch (Exception $ex) {
            $result = "not added: ".$ex->getMessage();
        }
        header("Location: /pages/elements-list.php?result=$result");
    }

    // получить все элементы
    $elements = selectAllElements();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElementsApp</title>
    <style>
        div {
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }
        input {
             display: block;
             background-color: gray;
             margin-bottom: 10px;
             padding: 5px;
             color: white;
        }

        button {
            padding: 5px 20px 5px 20px;
        }
    </style>
</head>
<body>
    <div>
    <h1>Elements</h1>

    <h2>Element Form</h2>
    <!-- форма добавления нового элемента -->
    <form action="elements-list.php" method="get">
        <!-- имя -->
        <label for="name">NameEl:</label>
        <input type="text" id="name" name="name" required minlength="1"/>

        <!-- код -->
        <label for="code_el">CodeEl:</label>
        <input type="text" id="code_el" name="code_el" required minlength="1"/>

        <!-- группа -->
        <label for="group_el">GroupEl:</label>
        <input type="number" id="group_el" name="group_el" required />

        <!-- период -->
        <label for="period_el">PeriodEl:</label>
        <input type="number" id="period_el" name="period_el" required />

        <!-- номер элемента -->
        <label for="number_el">NumberEl:</label>
        <input type="number" id="number_el" name="number_el" required />

        <!-- кнопка отправки формы -->
        <button>Add</button>
    </form>

    <?php
        if (isset($_GET["result"])) {
            echo "<p>".$_GET["result"]."</p>";
        }
    ?>

    <h2>Elements List</h2>
    <!-- таблица вывода элементов -->
    <table>
        <!-- шапка таблицы -->
        <thead>
            <tr>
                <th>Id</th>
                <th>Name Element</th>
                <th>Code Element</th>
                <th>Group Element</th>
                <th>Period Element</th>
                <th>Number Element</th>
            </tr>
        </thead>
        <!-- тело таблицы -->
        <tbody>
            <?php
                foreach ($elements as $element) {
                    echo "<tr>";
                    echo "<td>".$element->id."</td>";
                    echo "<td><a href=\"/pages/element-details.php?id=$element->id\">".$element->nameEl."</a></td>";
                    echo "<td>".$element->codeEl."</td>";
                    echo "<td>".$element->groupEl."</td>";
                    echo "<td>".$element->periodEl."</td>";
                    echo "<td>".$element->numberEl."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <p><a href="/index.php">Go to index</a></p>
    </div>
    
</body>
</html>