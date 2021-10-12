
<?php
    require 'connec.php';
    $pdo = new PDO(DSN, USER, PASS);
    $query = 'SELECT * FROM game WHERE id=:id';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':id', $_GET['id']);
    $statement->execute();
    $gameData = $statement->fetch(PDO::FETCH_ASSOC);
    $createdAt = $gameData['created_at'];
    $createdAt = new DateTime($createdAt);
    $createdAt = $createdAt->format('d/m/Y à H\hi');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><?= $gameData['title'] ?></h1>
    <ul>
        <li>
            <?= $gameData['platform'] ?>
        </li>
        <li>
            <?= $gameData['genre'] ?>
        </li>
        <li>
            <?= $createdAt ?>
        </li>
    </ul>
</body>
</html>