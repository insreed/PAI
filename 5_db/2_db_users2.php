<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/table.css">
    <title>Użytkownicy</title>
</head>
<body>
    <h4>Użytkownicy</h4>
    <?php
    if(isset($_SESSION["error"])){
        echo $_SESSION["error"];
        unset($_SESSION["error"]);
    }

    require_once "../scripts/connect.php";
    $sql = "SELECT `users`.id, `users`.`firstName`,`users`.`lastName`,`users`.`birthday`,`cities`.`city` as `miasto` ,`states`.`state` FROM `users` INNER JOIN `cities` ON `users`.`city_id` = `cities`.`id` INNER JOIN `states` ON `cities`.`state_id` = `states`.`id`";
    $result = $conn->query($sql);

    echo <<< TABLE
    <table>
    <tr>
    <th>Imię</th>
    <th>Nazwisko</th>
    <th>Data urodzenia</th>
    <th>Rok urodzenia</th>
    <th>Miasto</th>
    <th>Województwo</th>
    </tr>
    TABLE;
    if($result->num_rows == 0) {
        echo <<< TABLEUSERS
<tr>
<td colspan="6">Brak rekordów</td>
</tr>
TABLEUSERS;
    }
    else {

        while ($user = $result->fetch_assoc())
        {
            $rok = substr($user["birthday"], 0, 4);
            echo <<< TABLEUSERS
        <tr>
        <td>$user[firstName]</td>
        <td>$user[lastName]</td>
        <td>$user[birthday]</td>
        <td>$rok</td>
        <td>$user[miasto]</td>
        <td>$user[state]</td>
        <td><a href="../scripts/delete_users.php?deleteUserId=$user[id]">Usuń</a></td>
        </tr>
        TABLEUSERS;
        }
    }
    echo "</table>";
    if(isset($_GET["deleteUser"]))
    {
        if ($_GET["deleteUser"] != 0)
        {
            echo "Usunięto użytkownika o id = $_GET[deleteUser]";
        } else
        {
            echo "Nie udało się usunąć użytkownika";
        }
    }

    if (isset($_GET["addUserForm"]))
    {
        echo <<< ADDUSERFORM
<h4>Dodawanie użytkownika</h4>
<form action="../scripts/add_user.php" method="post">
<input type="text" name="firstName" placeholder="Podaj imię" autofocus><br><br>
<input type="text" name="lastName" placeholder="Podaj nazwisko"><br><br>
<input type="date" name="birthday" placeholder="Podaj datę urodzenia"><br><br>
<!-- <input type="text" name="city_id" placeholder="Podaj miasto"><br><br> -->
<!--MIASTO -->
<select name="city_id">
ADDUSERFORM;
        $sql = "SELECT * FROM cities;";
        $result = $conn->query($sql);
        while($city = $result->fetch_assoc()){
echo "<option value=\"$city[id]\">$city[city]</option>";
        }
        echo <<< ADDUSERFORM
</select><br><br>
<input type="submit" value="Dodaj użytkownika">
</form>
ADDUSERFORM;
    }
    else
    {
        echo "<hr><a href=\"./2_db_users2.php?addUserForm=1\">Dodaj użytkownika</a>";
    }
    $conn ->close();
    ?>



</body>
</html>