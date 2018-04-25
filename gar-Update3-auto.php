<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Aasutosh Kalpoe">
    <meta charset="UTF-8">
    <title>gar-Update3-auto.php</title>
</head>
<body>

<h1>garage Update3 auto</h1>
<p>
    Klantgegevns wijzigen in de tabel klant van de database garage.
</p>

<?php
//klantgegevens uit het formlier halen -------------------------------------------------------------------------------
$klantid        = $_POST["klantidvak"];
$autokenteken      = $_POST["autokentekenvak"];
$automerk     = $_POST["automerkvak"];
$autotype  = $_POST["autotypevak"];
$autokmstand    = $_POST["autokmstandsvak+"];

var_dump($klantid);
var_dump($autokenteken);
var_dump($automerk);
var_dump($autotype);
var_dump($autokmstand);

//updaten klantgegevens ----------------------------------------------------------------------------------------------
require_once "gar-Connect-klant.php";

$sql = $conn->prepare("UPDATE auto SET autokenteken = :autokenteken, automerk = :automerk, autotype= :autotype, autokmstand= :autokmstand WHERE klantid = :klantid");
$sql->bindParam(':autokenteken', $autokenteken);
$sql->bindParam(':automerk', $automerk);
$sql->bindParam(':autotype', $autotype);
$sql->bindParam(':autokmstand', $autokmstand);
$sql->bindParam(':klantid', $klantid);
$sql->execute();

echo "De klant is gewijzigd.<br/>";
echo "<a href='gar-menu.php'> terug naar het menu</a>";


?>