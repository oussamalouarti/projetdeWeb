<?php
try {
    $pod = new PDO("mysql:host=localhost;dbname=pro_web", "root","");

    $pod->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}
$nom=$_REQUEST['nom'];
$prenom=$_REQUEST['prenom'];
$id = $_REQUEST['id2'];
$sql = "DELETE FROM `produit` WHERE id = :id";
$stmt = $pod->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();


header("location:utilisateur.php?nom=$nom&prenom=$prenom");



?>