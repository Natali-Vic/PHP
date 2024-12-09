<?php

// обработка удаления куки
if (isset($_GET["keyToRemove"])) {
    $keyToRemove = $_GET["keyToRemove"];
    setcookie($keyToRemove, "", time() - 3600);
    // перезагрузить страницу в PHP - redirect на эту же страницу
    header('Location: index.php');
}

// обработка поиска куки
if (isset($_GET["keyToFind"])) {
    $keyToFind = $_GET["keyToFind"];
    $found = null;
    if (isset($_COOKIE[$keyToFind])) {
        $found = $_COOKIE[$keyToFind];
    }
}

// обработка добавления куки
if (isset($_GET["key"]) && isset($_GET["value"]) && isset($_GET["liveTime"])) {
    // достать данные формы
    $key = $_GET["key"];
    $value = $_GET["value"];
    $liveTime = intval($_GET["liveTime"]);
    // добавить куки
    setcookie($key, $value, time() + $liveTime* 60);
    // перезагрузить страницу в PHP - redirect на эту же страницу
    header('Location: index.php');
}
?>

<!-- html-шаблон страницы -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LOCAL-DEPLOY-SANDBOX</title>
</head>
<body>
<h1>COOKIE-CLIENT</h1>

<h2>Find cookie</h2>
<!-- форма поиска куки -->
<form action="/" method="get">
    <!-- ключ куки -->
    <label for="key-to-find">Key to find:</label>
    <input type="text" id="key-to-find" name="keyToFind" 
        value="<?= isset($keyToFind)? $keyToFind : "" ?>" 
        minlength="1" 
        required 
    />

    <button>Find</button>
</form>

<!-- вывод найденного куки -->
<?php
    if (isset($keyToFind)) {
        if ($found !== null) {
            echo "<p>Found: $found</p>";
        } else {
            echo "<p>Not found</p>";
        }
    }
?>

<h2>Remove cookie</h2>
<!-- форма поиска куки -->
<form action="/" method="get">
    <!-- ключ куки -->
    <label for="key-to-remove">Key to remove:</label>
    <input type="text" id="key-to-remove" name="keyToRemove" minlength="1" required />

    <button>Remove</button>
</form>

<h2>Add cookie</h2>
<!-- форма ввода куки -->
<form action="/" method="get">
    <!-- ключ куки -->
    <label for="key">key:</label>
    <input type="text" id="key" name="key" minlength="1" required />

    <!-- значение куки -->
    <label for="value">value:</label>
    <input type="text" id="value" name="value" minlength="1" required />

    <!-- время жизни в минутах -->
    <label for="live-time">live time (minutes):</label>
    <input type="number" id="live-time" name="liveTime" min="1" required />

    <button>Create</button>
</form>

<h2>Cookies list</h2>
<!-- таблица вывода куки на странице -->
<ul>
    <?php
        foreach ($_COOKIE as $key => $value) {
            echo "<li>$key - $value</li>";
        }
    ?>
</ul>
</body>
</html>
