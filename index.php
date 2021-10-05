<?php
    $genre = '';
    if (isset($_GET['genre'])) {
        $genre = $_GET['genre'];
    }
?>

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
    <input type="text" name="title" placeholder="Titre du jeu" value="<?= isset($_GET['title']) ? $_GET['title'] : '' ?>">
    <?php
        if (isset($_GET['errorTitle'])) {
            echo $_GET['errorTitle'];
        }
    ?>
    <select  name="genre">
        <option value="">Choisissez un genre</option>
        <option value="fps" <?= $genre === 'fps' ? 'selected' : '' ?>>F.P.S.</option>
        <option value="rpg" <?= $genre === 'rpg' ? 'selected' : '' ?>>R.P.G.</option>
        <option value="mmo" <?= $genre === 'mmo' ? 'selected' : '' ?>>M.M.O.</option>
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
<pre>
<div>
    titre : <?= isset($_GET['title']) ? $_GET['title'] : 'À définir' ?><br>
    genre : <?= isset($_GET['genre']) ? $_GET['genre'] : 'À définir' ?><br>
    platform : <?= isset($_GET['platform']) ? implode(' - ', $_GET['platform']) : 'À définir'; ?>
</div>
</body>
</html>