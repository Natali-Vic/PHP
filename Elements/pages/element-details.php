<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/src/elements.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/pages/page-helpers.php");

    // обработка удаления
    if (isset($_GET["action"]) && $_GET["action"] == "delete" && isset($_GET["id"])) {
        $id = intval($_GET["id"]);
        deleteElement($id);
        header("Location: /pages/elements-list.php");
        exit();
    }

    // обработка редактирования
    if (($element = readElementFromArray($_POST, true)) !== null) {
        try {
            updateElement($element);
            header("Location: /pages/elements-list.php");
            exit();
        } catch (Exception $ex) {
            // ошибка при обновлении
            $error = "update error: ".$ex->getMessage();
        }
    } elseif (isset($_GET["id"])) {
        $id = intval($_GET["id"]);
        $element = selectElementById($id);
    }
    
    if ($element === null) {
        header("Location: /pages/element-not-found.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChemicalElementsApp</title>
    <style>
        div {
            margin: 20px;
        }

        input {
             background-color: gray;
             text-align: center;
             margin-bottom: 10px;
             padding: 5px;
             color: white;
        }

        button {
            padding: 5px 20px 5px 20px;
        }

        p {
            margin: 30px;
        }


    </style>
</head>
<body>
    <div>
    <h1>Element Details</h1>

    <!-- форма для отображения данных о клиенте с возможностью их редактирования -->
    <?= isset($error)? "<p>$error</p>" : "" ?>
    <form action="/pages/element-details.php" method="post">
        <!-- id - readonly -->
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" readonly required value="<?= $element->id ?>" />

        <!-- имя -->
        <label for="name">NameEl:</label>
        <input type="text" id="name" name="name" required minlength="1" value="<?= $element->nameEl ?>" />

        <!-- код -->
        <label for="code_el">CodeEl:</label>
        <input type="text" id="code_el" name="code_el" required minlength="1" value="<?= $element->codeEl ?>" />

        <!-- группа -->
        <label for="group_el">GroupEl:</label>
        <input type="number" id="group_el" name="group_el" value="<?= $element->groupEl ?>" required />

        <!-- период -->
        <label for="period_el">PeriodEl:</label>
        <input type="number" id="period_el" name="period_el" required value="<?= $element->periodEl ?>" />

        <!-- номер элемента -->
        <label for="number_el">NumberEl:</label>
        <input type="number" id="number_el" name="number_el" value="<?= $element->numberEl ?>" required />

        <!-- кнопка отправки формы -->
        <button>Save</button>
    </form>

    <!-- форма удаления -->
    <form action="/pages/element-details.php" method="get">
        <input type="number" name="id" value="<?=$id?>" hidden />
        <input type="text" name="action" value="delete" hidden />
        <button>Delete Element</button>
    </form>

    <p><a href="/pages/elements-list.php">Go to elements</a></p>
    <p><a href="/index.php">Go to index</a></p>
    </div>
</body>
</html>
