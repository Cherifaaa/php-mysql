<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
    <h1>Message bien reçu !</h1>

    <?php
    
    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || !isset($_POST['message']) || empty($_POST['message'])) {
        echo('<h1>Il faut entrer un Email et  message valide</h1>');
        return;
    }
    
    
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0) {
        if ($_FILES['screenshot']['size'] <= 1000000) {
            $fileInfo = pathinfo($_FILES['screenshot']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];

            if (in_array($extension, $allowedExtensions)) {
                
                move_uploaded_file($_FILES['screenshot']['tmp_name'], 'uploads/' . basename($_FILES['screenshot']['name']));
                echo "<p>Votre fichier a bien été envoyé !</p>";
            } else {
                echo "<p>Extension de fichier non autorisée !</p>";
            }
        } else {
            echo "<p>Le fichier est trop gros (max. 1 Mo) !</p>";
        }
    }
    
    ?>



    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Rappel de vos informations</h5>
            <p class="card-text"><b>Email</b> : <?php echo $email; ?></p>
            <p class="card-text"><b>Message</b> : <?php echo $message; ?></p>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</div>
</body>
</html>

