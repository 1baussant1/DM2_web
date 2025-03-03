<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/today.css">
</head>
<body>
    <h1>Régions - Départements - Communes</h1>

    <form action="/departements">
        <select name="region">
            <?php foreach ($regions as $region) { ?>
                <option value="<?= $region['insee'] ?>"><?= $region['nom'] ?></option>
            <?php } ?>
        </select>
        <button>OK</button>
    </form>

    <table>
        <tr>
            <th>insee</th>
            <th>nom</th>
        </tr>
        <?php foreach ($departements as $departement) { ?>
            <tr>
                <td><?= $departement['insee'] ?></td>
                <td><?= $departement['nom'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
