<?php
include('../include/mysqlconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/admin.css">
    <title>Update</title>
</head>
<body>
    <?php include('../include/nav.php'); ?>
    <form action="./traitement/traitement-update.php" method="post">
        <input type="submit" value="Update" id='updateButton' />
    </form>

<?php 
    
    if (isset($_GET['send'])) 
    {
        switch ($_GET['send']) {
            case 'true':?>
                <p class='valid'>
                    l'update s'est bien fait
                </p>
            <?php break;
            case 'adminFalse':?>
                <p class='invalid'>
                    Vous n'êtes pas admin !
                </p>
<?php       default:?>
                <p class='invalid'>
                    Une erreur s'est produite, l'id entrée était surement invalide.
                </p>
            <?php break;
        }
    }?>
</body>
</html>