<?php
    $prenom = $_GET['prenom'] ;
    $nom = $_GET['nom'] ;
    

    
    try {
        $pod = new PDO("mysql:host=localhost;dbname=pro_web", "root","");
        $pod->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM produit WHERE  prenom = :prenom " ;
        $stmt = $pod->prepare($sql);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->execute();


    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>

<body style="padding-top:0 ;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary container-fluid">
        <div class="container px-5">
            <a class="navbar-brand" style="font-size: xx-large;" href="acc.php">wasit</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" style="font-size: x-large; " href="#vendre">Vendre</a></li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
      <div class="row" style="margin-top: 2%;" id="target">
        <?php if ($result): ?>
            <?php foreach ($result as $row):  ?>
                <form action="utiliDelete.php">
                <div class="row" style="margin-top: 2%;">
                    <div class="position-relative col-lg-6 col-sm-12 col-md-6">
                        <div class="cont" style="width: auto;">
                            <img class="img-fluid" src="<?php echo $row['img']; ?>" alt="" style="width: 200px;
    height: auto">
                        </div>
                    </div>
                    <div class="p-4 mt-2 col-lg-6 col-sm-12 col-md-6">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-0"><?php echo $row['type']; ?>
                                <?php if ($row['modele']!="") {
                                    echo 'de modèle ' . $row['modele'];
                                } else {
                                    echo '';
                                } ?>
                            </h5>
                            <h5 class="mb-0"><?php echo $row['localisation']; ?></h5>
                        </div>
                        <div class="mb-3 col-lg-8 mx-auto" style="display: none;">
                            <input type="text" class="form-control custom-width-70" id="inputName"
                                placeholder="Votre nom" name="nom" value="<?php echo $_GET['nom']; ?>" readonly>
                        </div>
                        <div class="mb-3 col-lg-8 mx-auto" style="display: none;">
                            <input type="text" class="form-control custom-width-70" id="inputFirstName"
                                placeholder="Votre prénom" name="prenom" value="<?php echo $_GET['prenom']; ?>" readonly>
                        </div>
                        <div class="d-flex mb-3">
                        </div>
                        
                        <p class="text-body mb-3">TELEPHONE : <?php echo $row['numero']; ?> </p>
                        <p class="text-body mb-3">Description : <?php echo $row['description']; ?> </p>
                        <p class="text-body mb-3">D'identifian : <input type="text" class="form-control" id="inputName"
                                placeholder="Votre nom" name="id2" value="<?php echo $row['id']; ?>" readonly> </p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary rounded py-2 px-4 play" href="../h.php"><?php echo $row['prix']; ?>Dh</a>
                            <button type="submit" class="btn btn-sm btn-dark rounded py-2 px-4" href="">Delete</button>

                        </div>
                    </div>
                </div>
                </form>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun produit trouvé avec ce nom.</p>
        <?php endif; ?>
    </div>
</div>

</div>


    <section id="vendre" class="bg-primary">

        <form action="utilisaterBD.php" method="post" enctype="multipart/form-data">

            <div class="container " style="padding-top: 50px;
">
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 30px; text-align:center; ">
                        <h4 style="color:white"><i> add more items</i></h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 col-lg-8 mx-auto">
                            <input type="text" class="form-control custom-width-70" id="inputName"
                                placeholder="Votre nom" name="nom" value="<?php echo $_GET['nom']; ?>" readonly>
                        </div>
                        <div class="mb-3 col-lg-8 mx-auto">
                            <input type="text" class="form-control custom-width-70" id="inputFirstName"
                                placeholder="Votre prénom" name="prenom" value="<?php echo $_GET['prenom']; ?>" readonly>
                        </div>
                        <div class="mb-3 col-lg-8 mx-auto">
                            <input type="number" class="form-control custom-width-70" id="inputNumber"
                                placeholder="Votre numéro" name="numero">
                        </div>
                        <div id="localisationDiv" class="mb-3 col-lg-8 mx-auto">
                            <select class="form-select custom-width-70" id="localisation" name="localisation">
                                <option value="" selected disabled>localisation</option>
                                <option value="casablanca">Casablanca</option>
                                <option value="rabat">Rabat</option>
                                <option value="fes">Fès</option>
                            </select>
                        </div>
                        <div id="acheter" class="mb-3 col-lg-8 mx-auto">
                            <select class="form-select custom-width-70 mb-3" id="type2" style="height: 40dp;"
                                name="type" onchange="toggleFields2()">
                                <option value="" selected disabled>Type</option>
                                <option value="voiture">Voiture</option>
                                <option value="lotissement">Lotissement</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 col-lg-8 mx-auto">
                            <input type="number" class="form-control custom-width-70" id="inputPrice"
                                placeholder="Votre prix" name="prix">
                        </div>
                        <div class="mb-3 col-lg-8 mx-auto">
                            <input type="number" class="form-control custom-width-70" id="inputModel"
                                placeholder="modele" name="modele">
                        </div>
                        <div class="mb-3 col-lg-8 mx-auto">
                            <input type="file" class="form-control" id="inputImage" accept="image/*"
                                placeholder="image" name="img">
                        </div>
                        <div class="mb-3 col-lg-8 mx-auto">
                            <input type="text" class="form-control custom-width-70" id="inputDescription"
                                placeholder="description" name="description">
                        </div>
                        <div class="mb-3 col-lg-8 mx-auto">
                            <button type="submit">saisir</button>
                        </div>
                    </div>
                </div>

            </div>

        </form>


    </section>

    <script>
        function toggleFields() {
            var type = document.getElementById("type").value;
            var localisationDiv = document.getElementById("localisationDiv");
            var voitureDiv = document.getElementById("voitureDiv");

            if (type === "lotissement") {
                localisationDiv.style.display = "block";
                voitureDiv.style.display = "none";
            } else if (type === "voiture") {
                localisationDiv.style.display = "block";
                voitureDiv.style.display = "block";
            } else {
                localisationDiv.style.display = "none";
                voitureDiv.style.display = "none";
            }
        }

        function toggleFields2() {
            var typeSelect = document.getElementById("type2");
            var inputModel = document.getElementById("inputModel");

            if (typeSelect.value === "voiture") {
                inputModel.style.display = "block";
            } else if (typeSelect.value === "lotissement") {
                inputModel.style.display = "none";
            }
        }
    </script>

</body>

</html>