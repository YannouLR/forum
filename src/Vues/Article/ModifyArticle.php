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
        <input type="text" name="title" value= "<?= $articleId->getTitle() ?>" >
        <input type="text" name="resume"value= "<?= $articleId->getResume() ?>">
        <input type="text" name="author"value= "<?= $articleId->getAuthor() ?>">
        <input type="text" name="num_ISBN" value= "<?= $articleId->getnum_ISBN() ?>">
        <input type="submit" value="Ajouter l'article">
    </form>
</body>
</html>