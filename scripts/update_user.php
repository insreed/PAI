<?php
session_start();
//print_r($_POST);
foreach($_POST as $key => $value)
{
    if(empty($value))
    {
        //echo "$key<br>";
        $_SESSION["error"] = "Wypełnij wszystkie pola";
        echo "<script>history.back();</script>";
    }
}

require_once "./connect.php";
//$sql ="INSERT INTO `users` (`id`, `city_id`, `firstName`, `lastName`, `birthday`) VALUES (NULL, '$_POST[city_id]', '$_POST[firstName]', '$_POST[lastName]', '$_POST[birthday]');";
$sql ="UPDATE `users` SET `city_id` = '$_POST[city_id]', `firstName` = '$_POST[firstName]', `lastName` = '$_POST[lastName]', `birthday` = '$_POST[birthday]' WHERE `users`.`id` = $_SESSION[updateUserId];";
$conn->query($sql);
$conn ->close();
echo "OK<br>";

if($conn->affected_rows == 1){
    //echo"Prawidłowo dodano rekord";
    $_SESSION["error"] = "Nie zaktualizowano rekordu";

}
else{
    //echo"Nie dodano rekordu";
    $_SESSION["error"] = "Prawidłowo zaktualizowano rekord";
    ;
}

header("location: /PAI/5_db/5_db_users.php");
