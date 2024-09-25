<?php
include_once('mysql.php');
session_start();


if (!isset($_SESSION['LOGGED_USER'])) {
    header('Location: index.php');
    exit();
}

if (!empty($_POST['title']) && !empty($_POST['recipe'])) {
    
    $sqlQuery = 'INSERT INTO recipes (title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)';
    $insertRecipe = $db->prepare($sqlQuery);
    
    
    $insertRecipe->execute([
        'title' => $_POST['title'],
        'recipe' => $_POST['recipe'],
        'author' => $_SESSION['LOGGED_USER'],
        'is_enabled' => 1 // 1 = true, 0 = false
    ]);

    header('index.php');
    exit();
} else {
    echo 'remplir tous les champs.';
}
?>
