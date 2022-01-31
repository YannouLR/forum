<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
</head>
<body>
    <form action="/ArticleA" method="POST">
        <input type="text" name="title" placeholder="Titre">
        <input type="text" name="resume" placeholder="resume">
        <input type="text" name="author" placeholder="auteur">
        <input type="text" name="num_ISBN" placeholder="num_ISBN">
        <input type="number" name="editor" placeholder="id_editeur">
        <input type="submit" value="Ajouter l'article">
    </form>
</body>
</html>