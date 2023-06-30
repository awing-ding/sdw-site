<?php
include('../include/db_connection.php');
$database = new Database();
$bdd = $database->getConnection();;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/admin.css">
    <title>bilan militaire</title>
</head>
<body>
    <h1>Militaire</h1>
    <form action="./traitement/traitement-input.php?type=militaire" method="post">
        <table>
            <thead>
                <tr>
                    <th>conscrit</th>
                    <th>barbare</th>
                    <th>piquier</th>
                    <th>légion</th>
                    <th>fantassin</th>
                    <th>archers</th>
                    <th>tours</th>
                    <th>trebuchet</th>
                    <th>belier</th>
                    <th>echelle</th>
                    <th>autre</th>
                    <th>Cout autre</th>
                    <th>trirème</th>
                    <th>navire de transport</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="5"><a href="ville.php?id=<?php echo $_GET['id']?>">Pour modifier les villes</a></th>
                    <th colspan="4"><input type="submit" value="valider les modifications"></th>
                    <th colspan="5"><a href="input-bilan.php?id=<?php echo $_GET['id']?>">Pour modifier les données économique</a></th>
                </tr>
            </tfoot>
<?php       $prepare = $bdd->prepare("SELECT * FROM militaire WHERE id = :id");
            $prepare->execute(array(
                'id' => $_SESSION['idSecondaire']
            ));
            $donnee = $prepare->fetch();

?>
            <tbody>
                <tr>
                    <td><input type="number" name="conscrit" id="conscrit" value=<?php echo "\"{$donnee['conscrit']}\"" ?>></td>
                    <td><input type="number" name="barbare" id="barbare" value=<?php echo "\"{$donnee['barbare']}\"" ?>></td>
                    <td><input type="number" name="piquier" id="piquier" value=<?php echo "\"{$donnee['piquier']}\"" ?>></td>
                    <td><input type="number" name="legion" id="legion" value=<?php echo "\"{$donnee['legion']}\"" ?>></td>
                    <td><input type="number" name="fantassin" id="fantassin" value=<?php echo "\"{$donnee['fantassin']}\"" ?>></td>
                    <td><input type="number" name="archers" id="archers" value=<?php echo "\"{$donnee['archers']}\"" ?>></td>
                    <td><input type="number" name="tours" id="tours" value=<?php echo "\"{$donnee['tours']}\"" ?>></td>
                    <td><input type="number" name="trebuchet" id="trebuchet" value=<?php echo "\"{$donnee['trebuchet']}\"" ?>></td>
                    <td><input type="number" name="belier" id="belier" value=<?php echo "\"{$donnee['belier']}\"" ?>></td>
                    <td><input type="number" name="echelle" id="echelle" value=<?php echo "\"{$donnee['echelle']}\"" ?>></td>
                    <td><input type="number" name="autre" id="autre" value=<?php echo "\"{$donnee['autre']}\"" ?>></td>
                    <td><input type="number" name="entretienAutre" id="entretienAutre" value=<?php echo "\"{$donnee['entretienAutre']}\"" ?>></td>
                    <td><input type="number" name="trireme" id="trireme" value=<?php echo "\"{$donnee['trireme']}\"" ?>></td>
                    <td><input type="number" name="transport" id="transport" value=<?php echo "\"{$donnee['transport']}\"" ?>></td>

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