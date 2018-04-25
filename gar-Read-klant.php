<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Radu Bohm">
    <meta charset="UTF-8">
    <title>gar-Read-klant.php</title>
</head>
<body>
<h1>garage Read klant</h1>
<p>
    Dat zijn alle gegevens uti de tabel
    klanten van de database garage.
</p>

<?php
// Tabel uitlezen en netjes afdrukken ----------------------------------------------------------------------------
require_once "gar-Connect-klant.php";

$sql = $conn->prepare("select klantid,klantnaam,klantadres,klantpostcode,klantplaats from klant");
$sql->execute();

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
