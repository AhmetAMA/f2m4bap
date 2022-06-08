<?php
require 'functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `plaatsen`');

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
        <section class="schoenen-list">

        <?php foreach($result as $row): ?>
            <article class="schoenen-list_sneakers">
                <h2><?php echo $row['titel']; ?></h2>
                <figure class="schoenen-list_photo" style="background-image: url(img/<?php echo $row['foto']; ?>)"></figure>
                <header>
                    <h3><?php echo $row['categorie']; ?></h3>
                    <em><?php echo $row['prijs']; ?></em>
                </header>
                <p><?php echo $row['beschrijving']; ?></p>
            </article>
        <?php endforeach; ?>

        </section>
    </div>
</body>
</html>
