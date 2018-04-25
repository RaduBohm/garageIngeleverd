<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Aasutosh Kalpoe">
    <meta charset="UTF-8">
    <title>gar-Zoekt2-auto.php</title>
</head>
<body>
<h1>garage Zoekt2 auto</h1>
<p>
    Op klantid gegevens zoeken uit de
    tabel klanten van de database garage.
</p>

<?php
//klantid uit het formulier halen ------------------------------------------------------------------------------------
$klantid = $_POST["klantidvak"];





// klantgegevens uit de tabel halen -----------------------------------------------------------------------------------
require_once "gar-Connect-klant.php";

$sql = $conn->prepare("select autokenteken,automerk,autotype,autokmstand,klantid
                                 from auto WHERE klantid = :klantid");
$sql->execute(["klantid" => $klantid]);






//klantgegevens laten zien --------------------------------------------------------------------------------------------

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
