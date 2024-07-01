<?php
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
    ];


    // è giusto, lo commento perché viene richiesto di mostrarlo in tabella
    // doppio foreach
    // le "" servono per inserire dell'html in php
// foreach($hotels as $hotel) {
//     echo "<h1> HOTEL </h1>";
//     // per ogni hotel stampami chiave e valore
//     foreach($hotel as $key => $value) {
//         echo "$key --- $value";
//         echo "<br>";
//     }
// }



//Mi creo un nuovo array su cui lavorare. Questa è una copia shallow o deep? Se modifico uno si modifica pure l'altro. Questa è una copia deep.
// Lo chiamo filtered hotels perché lo filtro
$filteredHotels= $hotels;
// se è settato questo valore che io sto andando a visluaizzare, allora lo uso quindi filtro.
if (isset($_GET["parking"])){
    $parking=($_GET["parking"]);
    // ho selezionato per filtrare gli hotel con parcheggio perché yes ha value 1
    if ($parking == 1){
        // allora salvami in un temporary array gli hotel filtrati
        $tempArray=[];
        // per ogni hotel dell'array filtered hotels, se il valore della chiave parking è true...
        foreach($filteredHotels as $hotel) {
            if($hotel["parking"]===true) {
                // allora pushami l'hotel nel nuovo array
                $tempArray[]= $hotel;
            }  
        }
        // quindi filtered array sarà uguale a temporray array
        $filteredHotels = $tempArray;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <main class="container-fluid">
        <div class="row">
            <form action="./hotels.php" method="get">
                <label for="parking">Do you need a parking?</label>
                <select name="parking" id="parking">
                    <!-- di base il no è quello selezionato -->
                    <option value="0" selected>Not</option>
                    <option value="1">Yes</option>
                </select>
                <button type="submit">Filtra</button>
            </form>
        </div>
        <div class="row">
            <form action="./index.php" method="get">
                <label for="vote">How many stars should the hotel have?</label>
                <input type="text" name="vote" id="vote">
                <button type="submit">Filtra</button>
            </form>
        </div>
        <div class="row">
            <table class="col-12">
                <thead>
                    <!-- questi elementi non devono essere dinamici -->
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Parking
                        </th>
                        <th>
                            Vote
                        </th>
                        <th>
                            Distance to center
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- il tr va istanziato per ogni hotel -->
                    <?php foreach($hotels as $hotel) { ?>
                        <tr>
                            <!-- per ogni proprietà di un hotel -->
                            <?php foreach ($hotel as $property) { ?>
                                <td>
                                    <?php echo "$property" ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>