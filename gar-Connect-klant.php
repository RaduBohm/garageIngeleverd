<?php

$user="root";
$pass="";

try{
    $conn = new PDO("mysql:host=localhost;dbname=garage", $user,$pass);
}catch (PDOException $e) {
    echo "Connectie mislukt: " . $e->getMessage();
}

?>