<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style/table.css">
    <title>Document</title>
</head>
<body>
<?php

require_once "../scripts/connect.php";
$sql = "SELECT `cities`.`id`, `states`.`state`,`cities`.`city` FROM `cities` INNER JOIN states ON `cities`.`state_id` = `states`.`id`";
$result = $conn->query($sql);

echo <<< TABLE
    <table>
    <tr>
    <th>id</th>
    <th>State id</th>
    <th>city</th>
    </tr>
    TABLE;

    while ($city = $result->fetch_assoc())
    {
        echo <<< TABLECITIES
        <tr>
        <td>$city[id]</td>
        <td>$city[state]</td>
        <td>$city[city]</td>
        </tr>
        TABLECITIES;
    }
echo "</table>";
$conn ->close();
?>

</body>
</html>