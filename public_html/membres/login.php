<?php 
    /* This is a way to include a file from another directory to connect to the database. */
    include('../include/mysqlconnect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/style.css">
    <title>Login</title>
</head>
<?php /* This is a way to include a file from another directory to add the nav. */
    include('../include/nav.php'); ?>
<body>
    <h1>Connexion</h1>
    <form action="traitement/traitement.php?raison=login" method="post">
        <p id="form">
            <label for="id-log" id="id-label">Identifiant: </label> <input type="text" name="id-log" id="id-log">
            <label for="mdp-log" id="mdp-label">Mot de Passe: </label> <input type="password" name="mdp-log" id="mdp-log">
            <input type="submit" value="envoyer" id="envoyer-log">
        </p>
    </form>
    <?php
    /* This is a way to check if the user has entered the wrong id or password. */
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'true') 
        {?>
            <p class="invalid">
            L'id ou le mot de passe est incorrect !
            </p>
 <?php  }   }
    /* This is a way to include a file from another directory to add the footer. */
    include('../include/footer.html');
    
    ?>
</body>
</html>