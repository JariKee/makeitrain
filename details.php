<?php
require 'functions.php';
$connection = dbConnect();

//checken of id wel is meegestuurd in de url
if ( !isset($_GET['id']) ){
    echo "jaap";
    exit;
}

//checken of het wel een getal is
$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if($check_int == false){
    echo "dit is geen getal(integer)";
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
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>
<body>
    
<div class="container">
    
    <div class="container place-details">
        <h1>The best travel spots to visit!</h1>
        
        <section>
            <article class="place-info">
                <header>
                    <h2><?php echo $place['titel']?></h2>
                    <h3><?php echo $place['stad']?></h3>
                </header>
                <figure style="background-image: url(images/<?php echo $place['foto']?>)">
                    <em>€ <?php echo $place['prijs']?></em>
                </figure>
                <p>
                <?php echo $place['beschrijfing']?>
                </p>
                <hr>
                <a href="index.php">Terug naar het overzicht</a>
            </article>
            <aside class="places-sidebar">
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