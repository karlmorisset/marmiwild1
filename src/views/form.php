<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une recette à Marmiwild</title>
</head>
<body>
    <main>
        <h1>Ajouter une recette</h1>
        <form action="/add" method="POST">
            <div>
                <label for="title">Nom de la recette</label>
                <input type="text" id="title" name="title">
                <div>
                    <?php if(isset($errors['title'])) echo $errors['title']; ?>
                </div>
            </div>
            
            <div>
                <label for="description">Texte de la recette</label>
                <textarea name="description" id="description"></textarea>
                <div>
                    <?php if(isset($errors['description'])) echo $errors['description']; ?>
                </div>
            </div>

            <div>
                <input type="submit" value="Enregistrer la recette">
            </div>
        </form>
    </main>
</body>
</html>