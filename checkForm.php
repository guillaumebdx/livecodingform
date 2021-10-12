<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('method non autorisée');
}
echo '<pre>';
$title = $_POST['title'];
$title = cleanInput($title);
$genre = cleanInput($_POST['genre']);
$errors = [];
if (empty($title)) {
    $errors['errorTitle'] = 'Le titre ne doit pas être vide';
}
if (strlen($title) <=2) {
    $errors['errorTitle'] = 'Plus de 1 charactère';
}
if (empty($genre)) {
    $errors['errorGenre'] = 'Selectionner un genre';
}
$platform = 'PS5';
if (count($errors) === 0) {
    require 'connec.php';
    $pdo = new PDO(DSN, USER, PASS);
    $query = 'INSERT INTO game (title, genre, platform, created_at) VALUES (:title, :genre, :platform, NOW())';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':genre', $genre, PDO::PARAM_STR);
    $statement->bindValue(':platform', $platform, PDO::PARAM_STR);
    $statement->execute();
    $id = $pdo->lastInsertId();

    header('Location: /game.php?id=' . $id);
} else {
    header('Location: /?' . http_build_query($errors));
}


function cleanInput(string $value): string
{
    $value = trim($value);
    $value = htmlspecialchars($value);
    return $value;
}