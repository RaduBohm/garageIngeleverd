<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Radu Bohm">
    <meta charset="UTF-8">
    <title>gar-Delete2-auto.php</title>
</head>
<body>

<h1>garage Delete2 auto</h1>
<p>
    Op klantid gegevens zoeken uit de tabel klanten van
    de database garage zodat ze verwijderd kunnen worden.
</p>

<?php
//klantid uit het formulier halen -------------------------------------------------------------------------------------
$klantid = $_POST["klantidvak"];

//klantgegevens uit de tabel halen -------------------------------------------------------------------------------------
require_once "gar-Connect-klant.php";

$klanten = $conn->prepare("select autokenteken,automerk,autotype,autokmstand,klantid
                                 from auto WHERE klantid = :klantid");
$klanten->execute(["klantid" => $klantid]);


//klantgegevens laten zien --------------------------------------------------------------------------------------------
echo "<table>";
foreach ($klanten as $klant)

{
    echo "<tr>";
    echo "<td>". $klant["klantid"]."</td>";
    echo "<td>". $klant["autokenteken"]."</td>";
    echo "<td>". $klant["automerk"]."</td>";
    echo "<td>". $klant["autotype"]."</td>";
    echo "<td>". $klant["autokmstand"]."</td>";
    echo "</tr>";
}

echo "</table><br/>";

echo "<form action ='gar-Delete3-auto.php' method='post'>";
//klantid mag niet meer gewijzigd worden
echo "<input type='hidden' name='klantidvak' value= $klantid>";
//waarde 0 doorgegeven als er niet gecheckt wordt
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze auto. <br/>";
echo "<input type='submit'>";
echo"</form>";

?>
</body>
</html>
