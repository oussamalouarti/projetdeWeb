<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    .divider {
        border-right: 1px solid #ccc;
        height: 100%;
    }
</style>

<body>
    <?php if (isset($_GET['nom'])) {
    $nom = $_GET['nom'];} ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary container-fluid">
        <div class="container px-5">
            <a class="navbar-brand" style="font-size: xx-large;" href="acc.php">wasit</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
            </div>
        </div>
    </nav>
    <section class="container">
        <div class="row " style="margin-top: 50px;
padding-top: 4px;
padding-right: 10px;
border-left-width: 10px">

            <div class="col-lg-6 divider" style="padding-right: 40px;">
                <div style="text-align: center;
        margin-bottom: 30px">
                    <h4>to register in our site</h4>
                </div>
                <form action="firt.php" method="post">
                    <div class="form-row ">
                        <div class="col">
                            <label for="inputFirstName">First name</label>
                            <input type="text" class="form-control" name="First_name" placeholder="First name"
                                id="inputFirstName">
                        </div>
                        <div class="col">
                            <label for="inputLastName">Last name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last name"
                                id="inputLastName">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" name="password" id="inputPassword4"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" name="adresse"
                            placeholder="1234 Main St">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" name="city" id="inputCity">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" name="zip" id="inputZip">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">register</button>
                </form>

            </div>
            <div class="col-lg-6" style="padding-left: 133px;
    padding-right: 64px">
                <div style="text-align: center;
        margin-bottom: 30px">
                    <h4>to sign in</h4>
                </div>
                <form action="loginVer.php" method="post">
                    <div class="form-row" style="margin-top: 82px;">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" name="email2" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputPassword4" name="password2" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">sign in</button>
                    <div class="col-md-12" ><p id="" style="color: red;
    text-shadow: 0 0 black;"><?php  if (isset($_GET['nom'])) {
    $nom = $_GET['nom'];
    echo $nom;
}else echo "" ?></p></div>

                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>