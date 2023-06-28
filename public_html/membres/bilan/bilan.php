<?php
    /* Including the file `mysqlconnect.php` from the `include` folder. */
    include('../../include/mysqlconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../include/style.css">
    <title>Fichette</title>
</head>
<body>
    
        <?php
        /* Including the nav.php file from the include folder. */
        include('../../include/nav.php');
        /* This is a way to check if the user is logged in. If he is, the code inside the `if` will be
        executed. */
        if ($_SESSION['log'] === true){
            $donnee = $bdd->prepare("SELECT * FROM dataFiche WHERE id = :id");
            $donnee->execute(array(
                'id' => $_SESSION['idSecondaire']
            ));  
            $donnee = $donnee->fetch();

        ?>
        <h1>Votre Fichette</h1>
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
            <tbody>
                <tr>
                    <td><?php echo "{$donnee['revenuVille']}" ?></td>
                    <td><?php echo "{$donnee['revenuCommerce']}" ?></td>
                    <td><?php echo "{$donnee['revenuDiplomatique']}" ?></td>
                    <td><?php echo "{$donnee['revenuBonus']}" ?></td>
                    <td><?php echo "{$donnee['entretienBati']}" ?></td>
                    <td><?php echo "{$donnee['coutEntretien']}" ?></td>
                    <td><?php echo "{$donnee['budget']}" ?></td>
                    <td><?php echo "{$donnee['depense']}" ?></td>
                    <td><?php echo "{$donnee['merveille']}" ?></td>
                    <td><?php echo "{$donnee['culture']}" ?></td>
                    <td><?php echo "{$donnee['gainCulture']}" ?></td>
                    <td><?php echo "{$donnee['religion']}" ?></td>
                    <td><?php echo "{$donnee['gainReligion']}" ?></td>

                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="6"><a href="ville.php">Pour les bilans des villes</a></th>
                    <th ><p> &nbsp </p></th>
                    <th colspan="6"><a href="militaire.php">Pour les bilans des unités</a></th>
                </tr>
            </tfoot>

            </table>
<?php   }
        /* This is a way to tell the user that he needs to be logged in to access the page. */
        else {
            echo('<p>Veuillez vous connecter ! </p>');
        }
        /* Including the footer.html file. */
        include('../../include/footer.html');
        ?>
</body>
</html>