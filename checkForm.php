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
if (count($errors) === 0) {
    header('Location: /');
} else {
    header('Location: /?' . http_build_query($errors));
}


function cleanInput(string $value): string
{
    $value = trim($value);
    $value = htmlspecialchars($value);
    return $value;
}