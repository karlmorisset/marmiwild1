<?php 

/**
 * Récupère toutes la liste des recettes
 * 
 * @return array
 */
function getAllRecipes(): array
{
    $connection = createConnexion();

    $statement = $connection->query('SELECT id, title FROM recipe');
    $recipes = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $recipes;
}


/** 
 * Récupère une recette par spn identifiant
 * 
 * @param int $id : Identifiant de la recette
 * @return array
 */
function getRecipeById(int $id): array{

    $connection = createConnexion();
    
    $query = 'SELECT title, description FROM recipe WHERE id=:id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    
    $recipe = $statement->fetch(PDO::FETCH_ASSOC);
    
    return $recipe;
}


/**
 * Permet d'ajouter une recette
 * 
 * @param array $recipe : Titre et description de la recette à ajouter
 */
function saveRecipe(array $recipe): void
{
    $connection = createConnexion();

    $query = 'INSERT INTO recipe (title, description) VALUES (:title, :description)';
    $statement = $connection->prepare($query);
    $statement->bindValue(':title', $recipe['title'], PDO::PARAM_STR);
    $statement->bindValue(':description', $recipe['description'], PDO::PARAM_STR);
    $statement->execute();
}


/**
 * Retourne une connexion à la base de données
 * 
 * @return PDO
 */
function createConnexion(): PDO
{
    return new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASSWORD);
}