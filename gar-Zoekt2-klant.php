<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Aasutosh Kalpoe">
    <meta charset="UTF-8">
    <title>gar-Zoekt2-klant.php</title>
</head>
<body>
<h1>garage Zoekt2 klant</h1>
<p>
    Op klantid gegevens zoeken uit de
    tabel klanten van de database garage.
</p>

<?php
//klantid uit het formulier halen ------------------------------------------------------------------------------------
$klantid = $_POST["klantidvak"];





// klantgegevens uit de tabel halen -----------------------------------------------------------------------------------
require_once "gar-Connect-klant.php";

$sql = $conn->prepare("select klantid,klantnaam,klantadres,klantpostcode,klantplaats 
                                 from klant WHERE klantid = :klantid");
$sql->execute(["klantid" => $klantid]);






//klantgegevens laten zien --------------------------------------------------------------------------------------------

echo "<table>";
foreach($sql as $rij)
{
    echo "<tr>";
    echo "<td>". $rij["klantid"]."</td>";
    echo "<td>". $rij["klantnaam"]."</td>";
    echo "<td>". $rij["klantadres"]."</td>";
    echo "<td>". $rij["klantpostcode"]."</td>";
    echo "<td>". $rij["klantplaats"]."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>
