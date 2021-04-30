<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php
    include "./database.php";
    $db = Database::connect();
    
if ($_POST) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $postal_code = $_POST['postal_code'];
    $city = $_POST['city'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $sql = "INSERT INTO `advert` (title, description, postal_code, city, type, price) VALUES ('{$title}', '{$description}', '{$postal_code}', '{$city}', '{$type}', '{$price}')";
    $db->query($sql);
    header('location:./index.php');
}
    Database::disconnect();
?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="./index.php"><img src="./images/logo.jpg" alt="logo maison" style ="height: 100px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Ajouter une annonce</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./view.php">Consulter toutes les annonces</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class= "container">
        <div class= "row justify-content-center">
            <div>
                <h1>Créer votre annonce</h1>
            </div>
        </div>
        <div class= "row justify-content-center">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="title" placeholder="titre de l'annonce">
                        </div>
                        <div class="form-group ">
                            <textarea cols="20" rows="3" name="description" placeholder="Description de l'annonce"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" name="postal_code" placeholder="code postal" maxlength="1000" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="city" placeholder="ville">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="type">
                            <option>Choisir...</option>
                            <option value="Location">Location</option>
                            <option value="Vente">Vente</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name ="price" placeholder="Prix">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>         
    </div>    
</body>
</html>