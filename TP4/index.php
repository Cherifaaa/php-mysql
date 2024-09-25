<?php session_start(); // $_SESSION ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <!-- Navigation -->
    <?php include_once('header.php'); ?>

    <!-- Inclusion des fichiers utilitaires -->
    <?php 
        include_once('variables.php');
        include_once('functions.php');
    ?>

    <!-- Inclusion du formulaire de connexion -->
    <?php include_once('login.php'); ?>
    
    <h1>Site de Recettes !</h1>

    <?php include_once('mysql.php'); ?>

<?php
$sqlQuery = 'SELECT * FROM recipes WHERE is_enabled = :is_enabled';
$recipesStatement = $db->prepare($sqlQuery);
$recipesStatement->execute(['is_enabled' => true]);
$recipes = $recipesStatement->fetchAll();
?>

<!-- Affichage des recettes -->
<?php if(isset($_SESSION['LOGGED_USER'])): ?>
    <h2>Ajouter une nouvelle recette</h2>
    <form action="submit_recipe.php" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Titre de la recette</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="recipe" class="form-label">Recette</label>
            <textarea class="form-control" id="recipe" name="recipe" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
<?php endif; ?>


    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>