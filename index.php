<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
    include "./database.php";
    $db = Database::connect();
?>




    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="#"><img src="./images/logo.jpg" alt="logo maison" style ="height: 100px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="./create.php">Ajouter une annonce</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./view.php">Consulter toutes les annonces</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class= "container">
        <div class= "row justify-content-center">
            <h1>Nos principales annonces</h1>
        </div>
        <div class= "row justify-content-around">
<?php
    foreach ($db->query("SELECT * FROM `advert` ORDER BY id DESC LIMIT 15") as $ad) {
?>
        <div class="card mt-5" style="width: 22rem;">
            <div class="card-header" name="type" style="font-size : 2em; color: blue;">
                <p><?= $ad['type']?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item" name="title" style="text-transform : uppercase;"><b><?= $ad['title']?></b></li>
                <li class="list-group-item" name ="description"><?= $ad['description']?></li>
                <li class="list-group-item" name="postal-city"><?= "{$ad['postal_code']}  {$ad['city']}" ?></li>
                <li class="list-group-item" name="price" style=" font-size : 2em"><b><?= "{$ad['price']} ???"?></b></li>
            </ul>
        </div>
    <?php }
    Database::disconnect();
?>
        
        
        
        </div>         
    </div>


</body>
</html>