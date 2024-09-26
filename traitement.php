<?php

if(
    empty($_POST['titre'])
    || empty($_POST['artiste'])
    || empty($_POST['image'])
    || !filter_var($_POST['image'], FILTER_SANITIZE_URL)
    || strlen($_POST['description']) < 3
    )
{
    header('Location: ajouter.php');
}