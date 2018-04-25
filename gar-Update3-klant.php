<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Radu Bohm">
    <meta charset="UTF-8">
    <title>gar-Update3-klant.php</title>
</head>
<body>

    <h1>garage Update3 klant</h1>
    <p>
     Klantgegevns wijzigen in de tabel klant van de database garage.
    </p>

<?php
//klantgegevens uit het formlier halen -------------------------------------------------------------------------------
    $klantid        = $_POST["klantidvak"];
    $klantnaam      = $_POST["klantnaamvak"];
    $klantadres     = $_POST["klantadresvak"];
    $klantpostcode  = $_POST["klantpostcodevak"];
    $klantplaats    = $_POST["klantplaatsvak"];

    var_dump($klantid);
    var_dump($klantnaam);
    var_dump($klantadres);
    var_dump($klantpostcode);
    var_dump($klantplaats);

//updaten klantgegevens ----------------------------------------------------------------------------------------------
require_once "gar-Connect-klant.php";

$sql = $conn->prepare("UPDATE klant SET klantnaam = :klantnaam, klantadres = :klantadres, klantpostcode = :klantpostcode, klantplaats = :klantplaats WHERE klantid = :klantid");
$sql->bindParam(':klantnaam', $klantnaam);
$sql->bindParam(':klantadres', $klantadres);
$sql->bindParam(':klantpostcode', $klantpostcode);
$sql->bindParam(':klantplaats', $klantplaats);
$sql->bindParam(':klantid', $klantid);
$sql->execute();

//$sql->execute
//([
//        "klantnaam" =>  $klantnaam,
//        "klantadres" => $klantadres,
//        "klantpostcode" =>  $klantpostcode,
//        "klantplaats"=> $klantplaats,
//        "klantid"   =>  $klantid
//
//]);

echo "De klant is gewijzigd.<br/>";
echo "<a href='gar-menu.php'> terug naar het menu</a>";


?>