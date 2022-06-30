<?php
require 'functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `plaatsen`')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Best places to visit worldwide</title>
</head>
<body>
    <span>
        <h1 style="text-align: center; padding: 5rem; text-transform: uppercase; ">One of the best travel spots to visit!</h1>
    </span>
    
    <div class="container"> 
    
        <?php foreach($result as $row):?>
        <section class="place-card">
            <article class="places-list__place">
                <h2><?php echo $row['titel'] ?></h2>
                <figure class="place-img" style="background-image: url(images/<?php echo $row['foto'] ?>)"></figure>
                <header>
                    <h3><?php echo $row['stad'] ?></h3>
                    <em><?php echo $row['prijs'] ?></em>
                </header>
                <p><?php echo $row['beschrijfing'] ?></p>
                <div class="edjekadetje" >
                    <a class="info" href="details.php?id=<?php echo $row['id'];?>">Meer info</a>
                </div>
            
            </article>
            <?php endforeach;?>

        </section>
        </main>
    </div>
</body>
</html>