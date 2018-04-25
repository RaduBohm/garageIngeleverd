<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Radu Bohm">
    <meta charset="UTF-8">
    <title>gar-Create2-auto.php</title>
</head>
<body>

<h1>garage Create2 Auto</h1>
<p>
    Een auto toevoegen aan de tabel klant in de database garage.
</p>

<?php
//autogegevens uit het formulier halen----------------------------------------------
$autokenteken      = $_POST["autokentekenvak"];
$automerk          = $_POST["automerkvak"];
$autotype          = $_POST["autotypevak"];
$autokmstand       = $_POST["autokmstandvak"];
//$klantid           = NULL; //komt niet uit het formulier (autoincrement)

var_dump($autokenteken);
var_dump($autokmstand);
var_dump($automerk);
var_dump($autotype);
//var_dump($klantid);

//autogegevens invoeren in de tabel-------------------------------------------------
require_once "gar-Connect-klant.php";

$sql = $conn->prepare("INSERT INTO auto (autokenteken, automerk, autotype, autokmstand) VALUES (:autokenteken, :automerk, :autotype, :autokmstand)");
//$sql->bindParam(":klantid", $klantid);
$sql->bindParam(":autokenteken", $autokenteken);
$sql->bindParam(":automerk", $automerk);
$sql->bindParam(":autotype", $autotype);
$sql->bindParam(":autokmstand", $autokmstand);
$sql->execute();

echo "De klant is toegevoegd <br/>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>



