<?php
    require_once __DIR__ . "/hotels.php";

    if (isset($_GET['parking'])) {
        // Filtro gli hotel in base al parcheggio
        $hotels = array_filter($hotels, function ($hotel) {
            return $hotel['parking'] === true;
        });
    }
// Se è settato effettivamente il valore della get al posto di vote, se vote è maggiore di 1 e minore o uguale a 5, allora usa lui, altrimenti vote è una stringa vuota.
    $vote = isset($_GET['vote']) && $_GET['vote'] >= 1 && $_GET['vote'] <= 5 ? $_GET['vote'] : '';
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
            <input type="checkbox" id="parking" name="parking" value="1" <?php echo isset($_GET['parking']) ? 'checked' : ''; ?>>
            <button type="submit">Filtra</button>
        </form>
        <form action="./index.php" method="get">
            <label for="vote">How many stars should the hotel have?</label>
            <input type="text" name="vote" id="vote">
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