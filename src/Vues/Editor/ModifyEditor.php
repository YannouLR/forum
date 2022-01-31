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
    <form action=<?= "/EditorM/$id"?> method="POST">
        <input type="text" name="firstname" value= "<?= $editorId->getFirstname() ?>" >
        <input type="text" name="mail"value= "<?= $editorId->getMail() ?>">
        <input type="submit" value="Modifier l'editeur">
    </form>
</body>
</html>