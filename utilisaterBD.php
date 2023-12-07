<?php
    
    
    try {
        // Créer une connexion PDO
        $pod = new PDO("mysql:host=localhost;dbname=pro_web", "root","");
    
        // Configurer PDO pour générer des exceptions en cas d'erreur
        $pod->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }

    try {
        $file = $_FILES['img']['name'];
        $sql = "INSERT INTO produit (nom , prenom, numero, modele, localisation ,prix,description,type,img) 
        VALUES (:nom, :prenom, :numero, :modele, :localisation, :prix , :description , :type ,:img)";
        $stat= $pod->prepare($sql);
        $stat->bindParam(':nom', $_REQUEST['nom']);
        $stat->bindParam(':prenom', $_REQUEST['prenom']);
        $stat->bindParam(':numero', $_REQUEST['numero']);
        $stat->bindParam(':modele', $_REQUEST['modele']);
        $stat->bindParam(':localisation', $_REQUEST['localisation']);
        $stat->bindParam(':prix', $_REQUEST['prix']);
        $stat->bindParam(':description', $_REQUEST['description']);
        $stat->bindParam(':type', $_REQUEST['type']);
        $stat->bindParam(':img', $file);
        if ($stat->execute()) {        
            move_uploaded_file($_FILES['img']['tmp_name'], ($file));
        }
        

// Utilisez la balise <img> avec la source de données en base64
$nom=$_REQUEST['nom'];
$prenom=$_REQUEST['prenom'];
header("location:utilisateur.php?nom=$nom&prenom=$prenom");

        // header("location:utilisateur.php");


    }catch(PDOException $e){
        echo "no";
    }
    ?>
    
    

