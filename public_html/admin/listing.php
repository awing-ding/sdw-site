<?php 
/* Including the file `mysqlconnect.php` from the `include` folder to connect to the database. */
include('../include/db_connection.php');
$database = new Database();
$bdd = $database->getConnection();;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/admin.css">
    <title>Liste des membres</title>
</head>
<body>
    <?php /* Including the nav.php file from the include folder that contain the nav part. */
    include('../include/nav.php'); ?>
    <div id="grid-listing">
    <?php
    /* This is a condition that checks if the user is admin. If the user is admin, the code inside the
    condition will be executed. */
    if ($_SESSION['id'] === 'admin') {
    $membres = $bdd->query('SELECT nom, id FROM dataFiche');
    /* This is a loop that will execute the code inside the loop as long as there is a value in the
    variable ``. */
    while ($listing = $membres->fetch()){ ?>
    <p>
    Id: <span class="prenom"><?php echo $listing['id']; ?></span> <br>
    Nom : <span class="nom"> <?php echo $listing['nom']; ?></span> <br>
    <a href=<?php echo "input-bilan.php?id={$listing['id']}" ?> > cliquez ici pour aller à la page du joueur </a>
    </p>
<?php
    }
} /* If the user is not admin, the code inside the `else` will be executed. */
else {
    echo('<h1> VOUS N\'ÊTES PAS ADMIN</h1>');
}?>
    </div>
</body>
</html>