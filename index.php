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
</head>
<body>
    <main>
        <form action="./index.php" method="get">
            <label for="parking">Do you need a parking?</label>
            <select name="" id="">Yes</select>
            <select name="" id="">Not</select>
            <button type="submit">Filtra</button>
        </form>
        <form action="./index.php" method="get">
            <label for="vote">How many stars should the hotel have?</label>
            <input type="text" name="vote" id="vote">
            <button type="submit">Filtra</button>
        </form>
    </main>
</body>
</html>