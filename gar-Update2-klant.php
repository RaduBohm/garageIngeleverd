<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Aasutosh Kalpoe">
    <meta charset="UTF-8">
    <title>gar-Update2-klant.php</title>
</head>
<body>
<h1>garage Update2 klant</h1>
<p>
    Dit formulier wordt gebruikt om klantgegevens te wijzigen in de tabel klant van de database garage.
</p>

<?php
//klantid uit het formulier halen ------------------------------------------------------------------------------------
$klantid = $_POST["klantidvak"];


// klantgegevens uit de tabel halen -----------------------------------------------------------------------------------
require_once "gar-Connect-klant.php";

$sql = $conn->prepare("SELECT klantid,klantnaam,klantadres,klantpostcode,klantplaats 
                                 from klant WHERE klantid = :klantid");
$sql->execute(["klantid" => $klantid]);
$klant = $sql->fetch(PDO::FETCH_ASSOC);
//var_dump($klant);

?>
<!--//klantgegevens in een nieuw formulier laten zien ---------------------------------------------------------------------->
<!---->
<form action="gar-Update3-klant.php" method="post">
    <label for="id"> <?php echo $klant["klantid"];?> </label>
    <input type="hidden" value="<?php echo $klant['klantid'];?>" name="klantidvak" id="id">
    <label for="naam">Klantnaam:</label>
    <input type="text" name="klantnaamvak" value="<?php echo $klant["klantnaam"];?>" id="naam">
    <label for="adres">Klantadres:</label>
    <input type="text" name="klantadresvak" value="<?php echo $klant['klantadres'];?>" id="adres">
    <label for="postcode">Klantpostcode:</label>
    <input type="text" name="klantpostcodevak" value="<?php echo $klant['klantpostcode'];?>" id="postcode">
    <label for="plaats">Klantplaats:</label>
    <input type="text" name="klantplaatsvak" value="<?php echo $klant['klantplaats'];?>" id="plaats">
    <input type="submit">
</form>
<!--//echo"<form action='gar-Update3-klant.php' method='post'>";-->
<!--//-->
<!--//    klantid mag niet gewijzigd worden-->
<!--//    echo "klantid:" . $klant["klantid"];-->
<!--//    echo "<input type='hidden' name='klantidvak' value='" . $klant['klantid'] . "'>";-->
<!--//    echo "value='" . $klant["klantid"]. " '> <br/>";-->
<!--//-->
<!--//    echo "klantnaam: <input type='text' name='klantnaamvak>'";-->
<!--//    echo "value='" . $klant["klantnaam"]. " '";-->
<!--//    echo "><br/>";-->
<!--//-->
<!--//    echo "klantadres: <input type='text' name='klantadresvak>'";-->
<!--//    echo "value='" . $klant["klantadres"]. " '";-->
<!--//    echo "><br/>";-->
<!--//-->
<!--//    echo "klantpostcode: <input type='text' name='klantpostcodevak>'";-->
<!--//    echo "value='" . $klant["klantpostcode"]. " '";-->
<!--//    echo "><br/>";-->
<!--//-->
<!--//    echo "klantplaats: <input type='text' name='klantplaatsvak>'";-->
<!--//    echo "value='" . $klant["klantplaats"]. " '";-->
<!--//    echo "><br/>";-->
<!--//-->
<!--//-->
<!--//echo "<input type='submit'>";-->
<!--//echo "</form>";-->
<!---->
<!--//er moet eigenlijk nog gecontroleerd worden op een bestaand klantid-->


</body>
</html>
