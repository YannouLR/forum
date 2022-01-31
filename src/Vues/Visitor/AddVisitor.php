<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Visiteur</title>
</head>
<body>
    <form action="/VisitorA" method="POST">
        <input type="text" name="firstname" placeholder="prenom">
        <input type="text" name="mail" placeholder="email">
        <input type="submit" value="Ajouter visiteur">
    </form>
</body>
</html>