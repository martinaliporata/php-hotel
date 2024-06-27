<?php
    require_once __DIR__ . "/hotels.php";


    if (isset($_GET['parking'])) {
        // Filtro gli hotel in base al parcheggio
        $hotels = array_filter($hotels, function ($hotel) {
            return $hotel['parking'] === true;
        });
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Hotel</title>
</head>
<body>
    <main>
        <form action="./index.php" method="get">
            <label for="parking">Do you need a parking?</label>
            <input type="checkbox" id="parking" name="parking" value="1" <?php echo isset($_GET['parking']) ? $_GET['parking'] : ''; ?>>
            <button type="submit">Filtra</button>
        </form>
        <ul>
            <?php foreach ($hotels as $hotel) { ?>
                <h2>Nome: <?php echo $hotel['name'] ?></h2>
                <p> Descrizione: <?php echo $hotel['description'] ?></p>
                <p>Parcheggio: <?php echo ($hotel['parking'] ? 'Sì' : 'No')?></p>
                <p>Voto: <?php echo $hotel['vote'] ?></p>
                <p>Distanza dal centro città:<?php echo $hotel['distance_to_center'] ?></p>
            <?php } ?>
        </ul>
    </main>
</body>
</html>