<?php
$firstname = "Janusz";
$lastname = "Nowak";
echo "Imię i nazwisko: $firstname $lastname<br>";
echo 'Imię i nazwisko: $firstname $lastname<br>';

//heredoc
echo <<< DATA
<hr>
    Imię: $firstname<br>
    Nazwisko: $lastname<br>
DATA;
?>