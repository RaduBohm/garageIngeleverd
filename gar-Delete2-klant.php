<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Aasutosh Kalpoe">
    <meta charset="UTF-8">
    <title>gar-Delete2-klant.php</title>
</head>
<body>

<h1>garage Delete2 klant</h1>
<p>
    Op klantid gegevens zoeken uit de tabel klanten van
    de database garage zodat ze verwijderd kunnen worden.
</p>

<?php
//klantid uit het formulier halen -------------------------------------------------------------------------------------
$klantid = $_POST["klantidvak"];

//klantgegevens uit de tabel halen -------------------------------------------------------------------------------------
require_once "gar-Connect-klant.php";

$klanten = $conn->prepare("select klantid,klantnaam,klantadres,klantpostcode,klantplaats 
                                 from klant WHERE klantid = :klantid");
$klanten->execute(["klantid" => $klantid]);


//klantgegevens laten zien --------------------------------------------------------------------------------------------
echo "<table>";
foreach ($klanten as $klant)

    {
        echo "<tr>";
        echo "<td>". $klant["klantid"]."</td>";
        echo "<td>". $klant["klantnaam"]."</td>";
        echo "<td>". $klant["klantadres"]."</td>";
        echo "<td>". $klant["klantpostcode"]."</td>";
        echo "<td>". $klant["klantplaats"]."</td>";
        echo "</tr>";
    }

    echo "</table><br/>";

    echo "<form action ='gar-Delete3-klant.php' method='post'>";
    //klantid mag niet meer gewijzigd worden
    echo "<input type='hidden' name='klantidvak' value= $klantid>";
    //waarde 0 doorgegeven als er niet gecheckt wordt
    echo "<input type='hidden' name='verwijdervak' value='0'>";
    echo "<input type='checkbox' name='verwijdervak' value='1'>";
    echo "Verwijder deze klant. <br/>";
    echo "<input type='submit'>";
    echo"</form>";

    ?>
</body>
</html>
