<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prenotazioni</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
</head>
<body>
    <h1>Portale prenotazioni</h1>

    <table class="striped">

        <h4>
            Lista delle Prenotazioni che vanno da <?=$data_inizio?> a <?=$data_fine?>
        </h4>
        <thead>
            <tr>
                <th>Giorno prenotazione:</th>

                <th>Numero delle prenotazioni:</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result as $row): ?>
                <tr>
                    <td><?php echo $row['giorno'] ?></td>
                    <td><?php echo $row['numero_prenotazioni'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>