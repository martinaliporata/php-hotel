<?php
    require_once __DIR__ . "/hotels.php"
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
            <label for="parking">Parking</label>
            <input type="text" name="parking" id="parking">
        </form>
        <ul>
            <?php foreach ($hotels as $hotel) { ?>
                <li>
                    <?php echo $hotel["name"] . " " . $hotel["description"] . " " . $hotel["parking"] . " " . $hotel["vote"] . " " . $hotel["distance_to_center"] ?>
                </li>
            <?php } ?>            
        </ul>
    </main>
</body>
</html>