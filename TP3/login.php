<?php
session_start();
include_once('variables.php');


if (isset($_POST['email']) && isset($_POST['password'])) {
    foreach ($users as $user) {
        if ($user['email'] === $_POST['email'] && $user['password'] === $_POST['password']) {
           
            $_SESSION['LOGGED_USER'] = $user['email'];
            $loggedUser = $_SESSION['LOGGED_USER'];
            setcookie('LOGGED_USER', $loggedUser, time() + 365*24*3600, "", "", true, true);
            break;
        } else {
            
            $errorMessage = 'Les informations envoyées ne permettent pas de vous identifier.';
        }
    }
}
?>

<!-- Formulaire de connexion -->
<?php if (!isset($loggedUser)) : ?>
    <form action="login.php" method="POST">
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@exemple.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
<?php else: ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?php echo $loggedUser; ?> et bienvenue sur le site !
    </div>
<?php endif; ?>
