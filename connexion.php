<?php
$host = 'localhost';
$db = 'formulaire';
$user = 'root';
$pass = 'hihicnops123!' ;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
echo "";
?>
