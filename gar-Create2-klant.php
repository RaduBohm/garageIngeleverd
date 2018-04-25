<!doctype html>
<html lang="nl">
    <head>
        <meta name="author" content="Aasutosh Kalpoe">
        <meta charset="UTF-8">
        <title>gar-Create2-klant.php</title>
    </head>
    <body>
    <h1>garage Create2 klant</h1>
    <p>
        Een klant toevoegen aan de tabel klant in de database garage.
    </p>
    <?php
    //klantgegevens uit het formulier halen----------------------------------------------
    $klantid        = NULL; //komt niet uit het formulier (autoincrement)
    $klantnaam      = $_POST["klantnaamvak"];
    $klantadres     = $_POST["klantadresvak"];
    $klantpostcode  = $_POST["klantpostcodevak"];
    $klantplaats    = $_POST["klantplaatsvak"];

    // klantgegevens invoeren in de tabel-------------------------------------------------
    require_once "gar-Connect-klant.php";

    $sql= $conn->prepare("Insert Into klant VALUES ( :klantid, :klantnaam, :klantadres, :klantpostcode, :klantplaats)");
    $sql->bindParam(":klantid", $klantid);
    $sql->bindParam(":klantnaam", $klantnaam);
    $sql->bindParam(":klantadres", $klantadres);
    $sql->bindParam(":klantpostcode", $klantpostcode);
    $sql->bindParam(":klantplaats", $klantplaats);

    $sql->execute();

    echo "De klant is toegevoegd <br/>";
    echo "<a href='gar-menu.php'> terug naar het menu </a>";
    ?>
    </body>
</html>



