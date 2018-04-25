<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Aasutosh Kalpoe">
    <meta charset="UTF-8">
    <title>gar-Read-auto.php</title>
</head>
<body>
<h1>garage Read auto</h1>
<p>
    Dat zijn alle gegevens uit de tabel
    auto van de database garage.
</p>

<?php
// Tabel uitlezen en netjes afdrukken ----------------------------------------------------------------------------
require_once "gar-Connect-klant.php";

$sql = $conn->prepare("select autokenteken,automerk,autotype,autokmstand,klantid from auto");
$sql->execute();

echo "<table>";
foreach($sql as $rij)
{
    echo "<tr>";
    echo "<td>". $rij["autokenteken"]."</td>";
    echo "<td>". $rij["automerk"]."</td>";
    echo "<td>". $rij["autotype"]."</td>";
    echo "<td>". $rij["autokmstand"]."</td>";
    echo "<td>". $rij["klantid"]."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>