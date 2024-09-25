<?php
include_once('mysql.php');
session_start();


if (!isset($_SESSION['LOGGED_USER'])) {
    header('index.php');
    exit();
}

if (!empty($_POST['comment']) && !empty($_POST['recipe_id'])) {

    $sqlQuery = 'INSERT INTO comments (user_id, recipe_id, comment) VALUES (:user_id, :recipe_id, :comment)';
    $insertComment = $db->prepare($sqlQuery);
    
   
    $insertComment->execute([
        'my_recipes.users' => $_SESSION['LOGGED_USER'],
        'recipe_id' => $_POST['recipe_id'],
        'comment' => $_POST['comment']
    ]);

    
    header('index.php');
    exit();
} else {
    echo 'remplir les champs.';
}
?>
