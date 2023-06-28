<?php
include('../include/mysqlconnect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/admin.css">
    <title>Bilan ville</title>
</head>
<body>
    <h1>Ville</h1>
    <?php 
    $prepare = $bdd->prepare("SELECT * FROM villes WHERE id = :id");
    $ville = $prepare->execute(array(
        'id' => $_SESSION['idSecondaire']
    ));
    $donnee = $prepare->fetch();
    ?>
    <form action="./traitement/traitement-input.php?type=ville" method="post">
        <table>
            <thead>
                <tr>
                    <th>Nombre de ville de tiers 1</th>
                    <th>Nombre de ville de tiers 2</th>
                    <th>Nombre de ville de tiers 3</th>
                    <th>Nombre de ville de tiers 4</th>
                    <th>Nombre de ville de tiers 5</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="2"><a href="input-bilan.php?id=<?php echo $_GET['id']?>">Pour modifier les données économique</a></th>
                    <th><input type="submit" value="valider les modifications"></th>
                    <th colspan="2"><a href="militaire.php?id=<?php echo $_GET['id']?>">Pour modifier les unités</a></th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td><input type="number" name="tiers1" id="tiers1" value=<?php echo "\"{$donnee['tiers1']}\"" ?>></td>
                    <td><input type="number" name="tiers2" id="tiers2" value=<?php echo "\"{$donnee['tiers2']}\"" ?>></td>
                    <td><input type="number" name="tiers3" id="tiers3" value=<?php echo "\"{$donnee['tiers3']}\"" ?>></td>
                    <td><input type="number" name="tiers4" id="tiers4" value=<?php echo "\"{$donnee['tiers4']}\"" ?>></td>
                    <td><input type="number" name="tiers5" id="tiers5" value=<?php echo "\"{$donnee['tiers5']}\"" ?>></td>
                </tr>
            </tbody>
        </table>
    </form>
    <?php 
    if (isset($_GET['send'])) 
    {
        switch ($_GET['send']) {
            case 'true':?>
                <p class='valid'>
                    le bilan a bien été envoyé
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
    }
    ?>
</body>
</html>