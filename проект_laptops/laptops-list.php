<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/src/clients.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/pages/page-helpers.php");

    // выполнить добавление клиента
    if (($client = readClientFromArray($_GET)) !== null) {
        try {
            insertClient($client);
            $result = $_GET["name"]." added";
        } 
        catch (Exception $ex) {
            $result = "not added: ".$ex->getMessage();
        }
        header("Location: /pages/clients-list.php?result=$result");
    }

    // получить всех клиентов
    $clients = selectAllClients();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClientsApp</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Clients</h1>

    <h2>Client Form</h2>
    <!-- форма добавления нового клиента -->
    <form action="clients-list.php" method="get">
        <!-- имя -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required minlength="1" />

        <!-- email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <!-- дата рождения -->
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" required />

        <!-- номер телефона -->
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required pattern="^[0-9]{10}$" />

        <!-- кнопка отправки формы -->
        <button>Add</button>
    </form>

    <?php
        if (isset($_GET["result"])) {
            echo "<p>".$_GET["result"]."</p>";
        }
    ?>

    <h2>Clients List</h2>
    <!-- таблица вывода клиентов -->
    <table>
        <!-- шапка таблицы -->
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Birthday</th>
                <th>Phone Number</th>
            </tr>
        </thead>
        <!-- тело таблицы -->
        <tbody>
            <?php
                foreach ($clients as $client) {
                    echo "<tr>";
                    echo "<td>".$client->id."</td>";
                    echo "<td><a href=\"/pages/client-details.php?id=$client->id\">".$client->displayName."</a></td>";
                    echo "<td>".$client->email."</td>";
                    echo "<td>".$client->birthDay."</td>";
                    echo "<td>".$client->phoneNumber."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <p><a href="/index.php">Go to index</a></p>

    <!--
        ООП - объектно-ориентированное программирование
        в ООП программа - это есть набор классов и экземпляров классов, взаимодейтсвующих между собой посредством методов
        и имеющих определенные изменяющиеся свойства

        класс - множество элементов, имеющих общие свойства

        класс в программировании - тип, описывающий объекты с определенными свойствами (полями (переменными-членами класса))
        и поведением (методами (функциями-членами класса))

        - инкапсуляция - объединение полей (свойств) и методов (поведения) внутри класса

    -->
</body>
</html>