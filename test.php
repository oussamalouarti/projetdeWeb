<?php
$prenom = 'oussama';
    

    
    $pod = new PDO("mysql:host=localhost;dbname=pro_web", "root","");
    $pod->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM produit WHERE  prenom = :prenom " ;
    $stmt = $pod->prepare($sql);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->execute();


    

// Récupérer tous les résultats sous forme de tableau associatif
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Vérifier s'il y a des résultats
if ($results) {
    // Afficher les résultats
    echo "<h2>Résultats de la requête :</h2>";
    echo "<ul>";
    
    foreach ($results as $row) {
        echo "<li>Nom: " . $row['nom'] . ", Description: " . $row['description'] . ", AutreChamp: " . $row['autre_champ'] . "</li>";
        // Ajoutez d'autres champs au besoin
    }
    
    echo "</ul>";
} else {
    echo "Aucun résultat trouvé.";
}

?>