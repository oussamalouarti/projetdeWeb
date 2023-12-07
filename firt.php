<?php
    
    
    try {
        
        $pod = new PDO("mysql:host=localhost;dbname=pro_web", "root","");
    
        $pod->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        echo "Connexion à la base de données réussie!";
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }

    try {
        $sql = "INSERT INTO utilisateur (email, nom, prenom, password, city) 
        VALUES (:email, :nom, :prenom, :password, :city )";
        $stat= $pod->prepare($sql);
        $stat->bindParam(':email', $_REQUEST['email']);
        $stat->bindParam(':prenom', $_REQUEST['First_name']);
        $stat->bindParam(':nom', $_REQUEST['last_name']);
        $stat->bindParam(':password', $_REQUEST['password']);
        $stat->bindParam(':city', $_REQUEST['city']);
        $stat->execute();
        session_start();
        header("location:login.php");


    }catch(PDOException $e){
        
    }
    ?>
    
    

