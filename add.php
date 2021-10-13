<?php

require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';

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

require __DIR__ . '/src/views/form.php';