<?php
$baza = new PDO('mysql:host=localhost; dbname=id13973227_instaton', 'id13973227_projekt_instaton', '6AP8z%pvk)w_%x_|');



$zap = $baza->prepare('DELETE FROM komentarze WHERE nr_postu = :nr_postu');
$zap->execute(array('nr_postu' => $_GET['nr_postu']));
$sql = 'DELETE FROM galeria WHERE nr_postu = :nr_postu';
$sth = $baza->prepare($sql);
$sth->execute(array('nr_postu' => $_GET['nr_postu']));
header('location: admin.php');
