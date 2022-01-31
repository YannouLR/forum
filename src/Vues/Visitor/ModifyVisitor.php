<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Visiteur</title>
</head>
<body>
    <form action=<?= "/VisitorM/$id"?> method="POST">
        <input type="text" name="firstname" value= "<?= $VisitorId->getFirstname() ?>" >
        <input type="text" name="mail"value= "<?= $VisitorId->getMail() ?>">
        <input type="submit" value="Modifier le visiteur">
    </form>
</body>
</html>