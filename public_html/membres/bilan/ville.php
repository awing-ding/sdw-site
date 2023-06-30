<?php
    /* Including the file `mysqlconnect.php` from the `include` folder. */
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
        /* This is a way to tell the user that he needs to be logged in to access the page. */
        if ($_SESSION['log'] === true){
            /* This is a way to get the data from the database. */
            $prepare = $bdd->prepare("SELECT * FROM villes WHERE id = :id");
            $prepare->execute(array(
                'id' => $_SESSION['idSecondaire']
            ));  
            $donnee = $prepare->fetch();

        ?>
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
                    <th colspan="2"><a href="bilan.php">Pour voir les données économique</a></th>
                    <th></th>
                    <th colspan="2"><a href="militaire.php">Pour voir les unités</a></th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td><?php echo "{$donnee['tiers1']}" ?></td>
                    <td><?php echo "{$donnee['tiers2']}" ?></td>
                    <td><?php echo "{$donnee['tiers3']}" ?></td>
                    <td><?php echo "{$donnee['tiers4']}" ?></td>
                    <td><?php echo "{$donnee['tiers5']}" ?></td>
                </tr>
            </tbody>
        </table>
<?php   }
        /* This is a way to tell the user that he needs to be logged in to access the page. */
        else {
            echo('<p>Veuillez vous connecter ! </p>');
        }
        /* Including the footer.html file from the include folder. */
        include('../../include/footer.html');
        ?>
</body>
</html>