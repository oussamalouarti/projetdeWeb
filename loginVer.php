<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=pro_web", "root", "");
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
}

$email = $_POST['email2'];
$password = $_POST['password2'];
try {
    $sql = "SELECT * FROM utilisateur WHERE email='$email' AND password='$password'";
    $result = $pdo->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
        $prenom = $row['prenom'];
        $nom = $row['nom'];
        $id = $row['id'];
    if ($result->rowCount() > 0) {
        session_start();
        header("location:utilisateur.php?nom=$nom & prenom=$prenom");
    } else {
        $error="password ou email incorect";
        header("location:login.php?nom=$error");
    }
} catch (PDOException $e) {
    echo "echec";
}
?>
