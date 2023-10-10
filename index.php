<!-- 
Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile. Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.

Bonus:
-Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
-Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto 
(es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
-->

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

$parking = $_GET['parking'];
$vote = $_GET['vote'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hotels</title>

    <!--bootstrap-css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="container p-5">

    <div class="d-flex mb-5">
        <form action="" method="get" class="me-2">
            <span>PARCHEGGIO:</span>
            <input type="checkbox" name="parking" class="me-2" <?= $parking ? 'checked' : '' ?>>
            <input type="number" name="vote" placeholder="voto minimo..." class="me-5" value="<?= $vote ?>">

            <button type="submit">FILTRA</button>
        </form>

        <a href="/PHP/php-hotel/"><button type="reset">RESET</button></a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Voto</th>
                <th>Distanza dal centro</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($hotels as $hotel): ?>

                <?php if ($parking && !$hotel['parking'])
                    continue; ?>
                <?php if ($vote && $hotel['vote'] < $vote)
                    continue; ?>

                <tr>
                    <td>
                        <?= $hotel['name'] ?>
                    </td>
                    <td>
                        <?= $hotel['description'] ?>
                    </td>
                    <td>
                        <?= $hotel['vote'] ?>
                    </td>
                    <td>
                        <?= $hotel['distance_to_center'] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>