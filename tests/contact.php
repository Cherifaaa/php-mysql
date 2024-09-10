<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link rel="stylesheet" href="style.css">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
    <h1>Contactez-nous</h1>
    <form action="submit_contact.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Votre message</label>
            <textarea class="form-control" laceholder="Exprimez vous" id="message" name="message" rows="5" required></textarea>
        </div>
        <!-- Ajout champ d'upload ! -->
        <div class="mb-3">
                <label for="screenshot" class="form-label">Votre capture d'écran</label>
                <input type="file" class="form-control" id="screenshot" name="screenshot" />
            </div>
            <!-- Fin ajout du champ -->
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <?php include_once('footer.php'); ?>
</div>
</body>
</html>

