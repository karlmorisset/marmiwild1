<?php

require __DIR__ . '/../models/recipe-model.php';

function browseRecipes(): void
{
    $recipes = getAllRecipes();

    require __DIR__ . '/../views/index.php';
}


function showRecipe(int $id): void
{
    $id = checkId();

    $recipe = getRecipeById($id);

    // Database result check
    if (!isset($recipe['title']) || !isset($recipe['description'])) {
        header("Location: /");
        exit("Recipe not found");
    }


    require __DIR__ . '/../views/show.php';

}


function addRecipe(): void
{
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    
        $recipe = array_map('trim', $_POST);
    
        if($recipe['title'] == "" || !isset($recipe['title'])){
            $errors['title'] = "Merci de donner un titre à votre recette";
        }
    
        if(mb_strlen($recipe['title']) > 255){
            $errors['title'] = "Votre titre est trop long. 255 caractères maximum";
        }
    
    
        if($recipe['description'] == "" || !isset($recipe['description'])){
            $errors['description'] = "Votre recette doit avoir un contenu";
        }
        
    
        if (empty($errors)) {
            saveRecipe($recipe);
            header('Location: /');
        }
    }
    
    require __DIR__ . '/../views/form.php';
}


function checkId(){
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
    if (false === $id || null === $id) {
        header("Location: /");
        exit("Wrong input parameter");
    }    

    return $id;
}