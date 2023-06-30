<?php
    /* Including the file `mysqlconnect.php`. */
    include('../../include/db_connection.php');
$database = new Database();
$bdd = $database->getConnection();;
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
    <h1>Votre Fichette</h1>
            <?php
        /* This is a condition that checks if the user is logged in. If the user is logged in, the code
        inside the `if` statement will be executed. */
        if ($_SESSION['log'] === true){
            /* This is a query to get the data from the database. */
            $donnee = $bdd->prepare("SELECT * FROM militaire WHERE id = :id");
            $donnee->execute(array(
                'id' => $_SESSION['idSecondaire']
            ));  
            $donnee = $donnee->fetch();

        ?>


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
                    <th>trébuchet</th>
                    <th>bélier</th>
                    <th>échelle</th>
                    <th>autre</th>
                    <th>entretien des unités autres</th>
                    <th>trirème</th>
                    <th>navire de transport</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="7"><a href="ville.php">Pour le bilans des villes</a></th>
                    <th colspan="7"><a href="bilan.php">Pour voir les données économique</a></th>
                </tr>
            </tfoot>

            <tbody>
                <tr>
                    <td><?php echo "{$donnee['conscrit']}" ?></td>
                    <td><?php echo "{$donnee['barbare']}" ?></td>
                    <td><?php echo "{$donnee['piquier']}" ?></td>
                    <td><?php echo "{$donnee['legion']}" ?></td>
                    <td><?php echo "{$donnee['fantassin']}" ?></td>
                    <td><?php echo "{$donnee['archers']}" ?></td>
                    <td><?php echo "{$donnee['tours']}" ?></td>
                    <td><?php echo "{$donnee['trebuchet']}" ?></td>
                    <td><?php echo "{$donnee['belier']}" ?></td>
                    <td><?php echo "{$donnee['echelle']}" ?></td>
                    <td><?php echo "{$donnee['autre']}" ?></td>
                    <td><?php echo "{$donnee['entretienAutre']}" ?></td>
                    <td><?php echo "{$donnee['trireme']}" ?></td>
                    <td><?php echo "{$donnee['transport']}" ?></td>

                </tr>
            </tbody>
        </table>
<?php   }
        /* This is a condition that checks if the user is logged in. If the user is logged in, the code inside
        the `if` statement will be executed. */
        else {
            echo('<p>Veuillez vous connecter ! </p>');
        }
        /* Including the footer.html file from the parent directory. */
        include('../../include/footer.html');
        ?>
</body>
</html>