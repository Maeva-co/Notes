<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
</head>
<body>
    <h2><?= $student['nom'] ?> <?= $student['prenom'] ?></h2>
    <h4><?= $student['id'] ?></h4>
    <p>Promotion : <?= $student['promotion'] ?></p>
    
    <!-- <a href="?type=s3">Notes S3</a>

    <a href="?type=s4">Notes S4</a> -->

    <form method="get">
        <input type="hidden" name="type" value="s3">
        <button type="submit">Notes S3</button>
    </form>

    <form method="get">
        <input type="hidden" name="type" value="s4">
        <select name="parcours">
            <?php foreach ($parcours as $p) { ?>
                <option value="<?= $p['id'] ?>">
                    <?= $p['label'] ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit">Notes S4</button>
    </form>

    <form method="get">
        <input type="hidden" name="type" value="l2">
        <select name="parcours">
            <?php foreach ($parcours as $p) { ?>
                <option value="<?= $p['id'] ?>">
                    <?= $p['label'] ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit">Notes L2</button>
    </form>

    <?php if (!empty($notes)) { ?>

        <table border="1">
            <tr>
                <th>UE</th>
                <th>Note</th>
            </tr>

            <?php foreach ($notes as $note) { ?>
                <tr>
                    <td><?= $note['ue_id'] ?></td>
                    <td><?= $note['note'] ?></td>
                </tr>
            <?php } ?>

        </table>

        <?php } else {?>
            <p>Aucune note trouvée pour ce type.</p>
        <?php } ?>
</body>
</html>