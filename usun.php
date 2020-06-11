<?php
$baza = new PDO('mysql:host=localhost; dbname=id13973227_instaton', 'id13973227_projekt_instaton', '6AP8z%pvk)w_%x_|');



$zap = $baza->prepare('DELETE FROM komentarze WHERE nr_postu = :zdjecia');
$zap->execute(array('zdjecia' => $_GET['zdjecia']));
$sql = 'DELETE FROM galeria WHERE nr_postu = :zdjecia';
$sth = $baza->prepare($sql);
$sth->execute(array('zdjecia' => $_GET['zdjecia']));
header('location: user.php');