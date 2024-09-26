<?php
require_once('bdd.php');

if(
    empty($_POST['titre'])
    || empty($_POST['artiste'])
    || empty($_POST['image'])
    || !filter_var($_POST['image'], FILTER_SANITIZE_URL)
    || strlen($_POST['description']) < 3
    )
{
    header('Location: ajouter.php');
} else {
    $titre = htmlspecialchars($_POST['titre']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $description = htmlspecialchars($_POST['description']);
    $image = htmlspecialchars($_POST['image']);

    $query = $cnx->prepare('INSERT INTO oeuvres (titre, artiste, description, image) VALUES (?, ? , ? , ?)');
    $query->execute([$titre, $artiste, $description, $image]);

    header('Location: oeuvre.php?id=' . $cnx->lastInsertId());
}