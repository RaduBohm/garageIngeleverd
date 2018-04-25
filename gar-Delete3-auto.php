<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Aasutosh Kalpoe">
    <meta charset="UTF-8">
    <title>gar-Delete3-auto.php</title>
</head>
<body>

<h1>garage Delete3 auto</h1>
<p>
    Op klantid gegevens zoeken uit de tabel klanten van
    de database garage zodat ze verwijderd kunnen worden.
</p>

<?php
//gegevens uit het formulier halen-------------------------------------------------------------------------------------
$klantid        =$_POST["klantidvak"];
$verwijderen    =$_POST["verwijdervak"];


//klantgegevens verwijderen -------------------------------------------------------------------------------------------

if($verwijderen){
    require_once "gar-Connect-klant.php";

    $sql = $conn->prepare(" delete from auto
                                      WHERE  klantid = :klantid");
    $sql->execute(["klantid" => $klantid]);

    echo "De gegevens zijn verwijderd.<br/>";
}
else
{
    echo "De gegevens zijn niet verwijderd.<br/>";
}

echo "<a href='gar-menu.php'>Terug naar het menu.</a>";

?>
</body>
</html>
