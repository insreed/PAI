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

//
$data = <<< DATA
<hr>
    Imię: $firstname<br>
    Nazwisko: $lastname<br>
DATA;

echo $data;

//systemy liczbowe
$bin = 0b1011;
echo $bin; //11
$oct = 011;
echo $oct; //9
$hex = 0xA1;
echo $hex;
?>