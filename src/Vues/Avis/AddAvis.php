<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Avis</title>
</head>
<body>
    <form action="/AvisA" method="POST">
        <input type="text" name="note" placeholder="note">
        <input type="text" name="commentaire" placeholder="commentaire">
        <input type="text" name="user" placeholder="id_User">
        <input type="text" name="article" placeholder="id_Article">
        <input type="submit" value="Ajouter l'avis">
    </form>
</body>
</html>