<?php 
/* This is a PHP file that contains the connection to the database. */
include('../include/mysqlconnect.php');
/* This is a way to check if the GET request has an id. If it does, it will set the id to the session. */
if (isset($_GET['id'])) {
    $_SESSION['idSecondaire'] = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/admin.css">
    <title>Entrée des bilans</title>
</head>
<body>
    <?php 
    /* This is a way to include the navigation bar. */
    include('../include/nav.php'); ?>
    <h1>Ajouter un bilan:</h1>
    <p> 
    <form action="./traitement/traitement-input.php?type=eco" method="post">
        <table>
            <caption>Résumé économique</caption>
            <thead>
                <tr>
                    <th>Revenu Ville</th>
                    <th>Revenu Commerce</th>
                    <th>Revenu Diplomatique</th>
                    <th>Revenu bonus</th>
                    <th>Entretien des batiments</th>
                    <th>Entretien de l'armée</th>
                    <th>budget actuel</th>
                    <th>dépense du tour</th>
                    <th>Merveille</th>
                    <th>culture</th>
                    <th>gain de culture</th>
                    <th>religion</th>
                    <th>gain de religion</th>
                </tr>
            </thead>

<?php           /* This is a way to get the data from the database. */
                $donnee = $bdd->prepare("SELECT * FROM dataFiche WHERE id = :id");
                $donnee->execute(array(
                    'id' => $_SESSION['idSecondaire']
                ));     
                $donnee = $donnee->fetch();
?>
            <tbody>
                <tr>
                    <td><input type="number" name="revenuVille" id="revenuVille" value=<?php echo "\"{$donnee['revenuVille']}\"" ?>></td>
                    <td><input type="number" name="revenuCommerce" id="revenuCommerce" value=<?php echo "\"{$donnee['revenuCommerce']}\"" ?>></td>
                    <td><input type="number" name="revenuDiplomatique" id="revenuDiplomatique" value=<?php echo "\"{$donnee['revenuDiplomatique']}\"" ?>></td>
                    <td><input type="number" name="revenuBonus" id="revenuBonus" value=<?php echo "\"{$donnee['revenuBonus']}\""  ?> step=".1"></td>
                    <td><input type="number" name="entretienBati" id="entretienBati" value=<?php echo "\"{$donnee['entretienBati']}\"" ?> step=".1"></td>
                    <td><input type="number" name="coutEntretien" id="coutEntretien" value=<?php echo "\"{$donnee['coutEntretien']}\"" ?>></td>
                    <td><input type="number" name="budget" id="budget" value=<?php echo "\"{$donnee['budget']}\"" ?>></td>
                    <td><input type="number" name="depense" id="depense" value=<?php echo "\"{$donnee['depense']}\"" ?>></td>
                    <td><input type="text" name="merveille" id="merveille" value=<?php echo "\"{$donnee['merveille']}\"" ?>></td>
                    <td><input type="number" name="culture" id="culture" value=<?php echo "\"{$donnee['culture']}\"" ?>></td>
                    <td><input type="number" name="gainCulture" id="gainCulture" value=<?php echo "\"{$donnee['gainCulture']}\"" ?>></td>
                    <td><input type="number" name="religion" id="religion" value=<?php echo "\"{$donnee['religion']}\"" ?>></td>
                    <td><input type="number" name="gainReligion" id="gainReligion" value=<?php echo "\"{$donnee['gainReligion']}\"" ?>></td>


                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4"><a href="ville.php?id=<?php echo $_GET['id']?>">Pour modifier les villes</a></th>
                    <th colspan="5"><input type="submit" value="valider les modifications"></th>
                    <th colspan="4"><a href="militaire.php?id=<?php echo $_GET['id']?>">Pour modifier les unités</a></th>
                </tr>
            </tfoot>

        </table>
    </form>
    </p>
    <?php 
    /* verify if there is a send variable in the url that is used to see if the operation on the database has encoutered problems */
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