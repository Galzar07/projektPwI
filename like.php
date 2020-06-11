<?php
$baza = new PDO('mysql:host=localhost; dbname=id13973227_instaton', 'id13973227_projekt_instaton', '6AP8z%pvk)w_%x_|');



$zap = $baza->prepare('UPDATE galeria SET polubienia=polubienia+1 WHERE nr_postu = :nr_postu');
$zap->execute(array('nr_postu' => $_GET['nr_postu']));

header('location: home.php');
