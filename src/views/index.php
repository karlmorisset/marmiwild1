<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Liste des Recettes</title>
    </head>
    <body>
        <h1>Liste des recettes</h1>

        <a href="/add">Ajouter une recette</a>
        <ul>
            <?php foreach ($recipes as $recipe) : ?>
            <li>
                <a href="recipe?id=<?= $recipe['id'] ?>">
                    <?= $recipe['title'] ?>
                </a>
            </li>
            <?php endforeach ?>
        </ul>
    </body>
</html>