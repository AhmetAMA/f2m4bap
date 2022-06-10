<?php
require 'functions.php';
$connection = dbConnect();

//  Checken of id wel is meegestuurd in de URL
if( !isset($_GET['id']) ){
    echo "De ID is niet gezet";
    exit;
}

//  Checken of het wel een getal (integer) is
$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if($check_int == false){
    echo "Dit is geen getal (integer)";
    exit;
}

$statement = $connection->prepare('SELECT * FROM `plaatsen` WHERE id=?');
$params = [$id];
$statement->execute($params);
$place = $statement->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Barbaar Webshop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Mukta:wght@300;500&display=swap">
</head>
<body>
    <div class="container">
        <h1>Sneakers</h1>

        <section>
            <article class="place-info">
                <header>
                    <h2><?php echo $place['titel']?></h2>
                    <h3><?php echo $place['categorie']?></h3>
                </header>
                <figure style="background-image: url(img/<?php echo $place['foto']?>)">
                    <em><?php echo $place['prijs']?></em>
                </figure>
                <p>
                    <?php echo nl2br($place['beschrijving'])?>
                </p>
                <hr>
                <a href="index.php">Terug naar het overzicht</a>
            </article>
            <aside class="schoenen-sidebar">
                <h3>Andere plaatsen</h3>
                <ul>
                    <li>Pantheon</li>
                    <li>De Dam</li>
                    <li>Sagrada Familia</li>
                    <li>Tower Bridge</li>
                </ul>
            </aside>
        </section>

    </div>
</body>
</html>
