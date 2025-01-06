<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/src/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElementsApp</title>
</head>
<body>
    <h1>ChemicalElementsApp</h1>

    <h2>Db status: </h2>
    <?php 
        
        echo "Start to connect to db ...<br>";
        pingDb();
        echo "Connection OK<br>";
    ?>

    <h3>Resources:</h3>
    <p><a href="/pages/elements-list.php">Go to Elements</a></p>
</body>
</html>
