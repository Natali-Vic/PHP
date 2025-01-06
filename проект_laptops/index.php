<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/connection.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/laptops.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaptopsApp</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px;
            background-color: #c5e6bf;
            box-shadow: 10px 5px 5px green;
        }

        th, td {
            border: 2px solid black;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>LaptopsApp</h1>

    <h2>Db status: </h2>
    <?php 
        
        echo "Start to connect to db ...<br>";
        pingDb();
        echo "Connection OK<br>";
      
    ?>

     <h2>Laptopts List</h2>
    <!-- таблица вывода данных -->
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Brand</th>
                <th>Name</th>
                <th>Display size</th>
                <th>RAM</th>
                <th>Price, $</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $laptops = selectAllLaptops();
                foreach ($laptops as $laptop) {
                    echo "<tr>";
                    echo "<td>".$laptop->id."</td>";
                    echo "<td>".$laptop->brand."</td>";
                    echo "<td>".$laptop->name."</td>";
                    echo "<td>".$laptop->displaySize."</td>";
                    echo "<td>".$laptop->ram."</td>";
                    echo "<td>".$laptop->price."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
   
</body>
</html>
