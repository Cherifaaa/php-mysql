<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('header.php'); ?>
        <h1>Site de recettes</h1>

        <!-- inclusion des variables et fonctions -->
        <?php
        session_start();
        if (!isset($_SESSION['LOGGED_USER']) && isset($_COOKIE['LOGGED_USER'])) {
            $_SESSION['LOGGED_USER'] = $_COOKIE['LOGGED_USER'];
        }
        include_once('variables.php');
        include_once('functions.php');
        include_once('login.php');
        ?>


        <!-- inclusion de l'entête du site -->
        <?php include_once('header.php'); ?>
        
        <!-- Si l'utilisateur est connecté, on affiche les recettes -->
        <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
            <?php foreach(getRecipes($recipes) as $recipe) : ?>
                <article>
                    <h3><?php echo $recipe['title']; ?></h3>
                    <div><?php echo $recipe['recipe']; ?></div>
                    <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
                </article>
            <?php endforeach ?>
        <?php else: ?>
            <p>Connectez vous pour voir les recettes.</p>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>