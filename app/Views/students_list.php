<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des etudiants</title>
</head>
<body>

    <h1>Liste des étudiants</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Numero</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Promotion</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($students)) { ?>
                <?php foreach ($students as $student) { ?>
                    <tr>
                        <td><?= $student['id'] ?></td>
                        <td><?= $student['nom'] ?></td>
                        <td><?= $student['prenom'] ?></td>
                        <td><?= $student['promotion'] ?></td>
                    </tr>
                <?php }
            } else { ?>
                    <tr>
                        <td colspan="4">Aucun étudiant trouvé</td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>