<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un jeu vidéo</title>
</head>
<body>
<form action="checkForm.php" method="post">
    <input minlength="2" required type="text" name="title" placeholder="Titre du jeu">
    <?php
        if (isset($_GET['errorTitle'])) {
            echo $_GET['errorTitle'];
        }
    ?>
    <select required name="genre">
        <option value="">Choisissez un genre</option>
        <option value="fps">F.P.S.</option>
        <option value="rpg">R.P.G.</option>
        <option value="mmo">M.M.O.</option>
    </select>
    <?php echo isset($_GET['errorGenre']) ? $_GET['errorGenre'] : ''; ?>

    <div>
        <label for="ps5">PS5</label>
        <input id="ps5" type="checkbox" name="platform[]" value="ps5" >
        <label for="xbox">XBOX</label>
        <input id="xbox" type="checkbox" name="platform[]" value="xbox" >
        <label for="pc">PC</label>
        <input id="pc" type="checkbox" name="platform[]" value="pc" >
    </div>
    <button>Ajouter un jeu</button>
</form>

<?php
    require 'connec.php';
    $pdo = new PDO(DSN,USER,PASS);
    $query = 'SELECT * FROM game';
    $statement = $pdo->query($query);
    $games = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

    <table border="1">
        <tr>
            <th>
                id
            </th>
            <th>
                Titre
            </th>
            <th>
                Genre
            </th>
            <th>
                Plateforme
            </th>
        </tr>
        <?php foreach ($games as $gameData): ?>
        <tr>
            <td><?= $gameData['id'] ?></td>
            <td><?= $gameData['title'] ?></td>
            <td><?= $gameData['platform'] ?></td>
            <td><?= $gameData['genre'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>




</body>
</html>