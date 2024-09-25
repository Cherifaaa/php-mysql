<?php
include_once('mysql.php');
session_start();


if (isset($_GET['id'])) {
    $recipeId = $_GET['id'];
    
  
    $sqlQuery = 'DELETE FROM recipes WHERE recipe_id = :id';
    $deleteRecipe = $db->prepare($sqlQuery);
    $deleteRecipe->execute(['id' => $recipeId]);
    
    header('Location: index.php');
    exit();
}
?>
