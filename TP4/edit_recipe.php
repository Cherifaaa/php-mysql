<?php
include_once('mysql.php');
session_start();

if (isset($_GET['id'])) {
    $recipeId = $_GET['id'];
    
    $sqlQuery = 'SELECT * FROM recipes WHERE recipe_id = :id';
    $recipeStatement = $db->prepare($sqlQuery);
    $recipeStatement->execute(['id' => $recipeId]);
    $recipe = $recipeStatement->fetch();
}

if (isset($recipe)) {
    if ($recipe['author'] !== $_SESSION['LOGGED_USER']) {
        header(' index.php');
        exit();
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sqlQuery = 'UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id';
    $updateRecipe = $db->prepare($sqlQuery);
    $updateRecipe->execute([
        'title' => $_POST['title'],
        'recipe' => $_POST['recipe'],
        'id' => $recipeId
    ]);
    
    header('index.php');
    exit();
}
?>

<form action="edit_recipe.php?id=<?php echo $recipeId; ?>" method="post">
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $recipe['title']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="recipe" class="form-label">Recette</label>
        <textarea class="form-control" id="recipe" name="recipe" required><?php echo $recipe['recipe']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>
