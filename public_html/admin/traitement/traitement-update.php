<?php 
/* This is a way to connect to the database. */
include('../../include/mysqlconnect.php');
/* This is a way to display errors. */
error_reporting(E_ALL);
ini_set("display_errors", TRUE);
ini_set('display_startup_errors', TRUE);
/* This is a way to check if the user is logged in as an admin. */
if ($_SESSION['id'] == 'admin'){
    /* This is the initialization of the variables used in the loop. */
    $initVilles = $bdd->prepare('SELECT * FROM villes WHERE id = :id');
    $initMilitaire = $bdd->prepare('SELECT * FROM militaire WHERE id = :id');
    $initData = $bdd->prepare('SELECT * FROM dataFiche WHERE id = :id');
    $revenuVilles = 0; 
    $coutEntretien = 0;
    $newCulture = 0;
    $newReligion = 0;
    $budget = 0;
    $fetchList = $bdd->query('SELECT id FROM dataFiche');
    /* This is a loop that will run as long as there is a value in the variable ``. */
    while ($idFetched = $fetchList->fetch() ) {
        /* This is a way to fetch the data from the database. */
        $initVilles->execute(array('id' => $idFetched['id']));
        $villes = $initVilles->fetch();
        /* This is a way to calculate the revenu of cities. */
        $revenuVilles = $villes['tiers1'] + $villes['tiers2'] * 2 + $villes['tiers3'] * 3 + $villes['tiers4'] * 4 + $villes['tiers5'] * 5;

        /* This is fetching the data from the database. */
        $initMilitaire->execute(array('id' => $idFetched['id']));
        $militaire = $initMilitaire->fetch();
        /* This is a way to calculate the cost of entretien of the military units. */
        $coutEntretien = $militaire['conscrit'] * 4 + $militaire['barbare'] * 12 + $militaire['piquier'] * 15 + $militaire['legion'] * 25 + $militaire['fantassin'] * 20 + $militaire['archers'] * 13 + $militaire['echelle'] * 2 + $militaire['autre'] * $militaire['entretienAutre'] + $militaire['trireme'] * 40 + $militaire['transport'] * 25;
        /* This is a way to calculate the cost of entretien of certain of the military units in function of the type of leader. */
        if ($militaire['type'] === 'siege') {
            $coutEntretien = $coutEntretien + $militaire['tours'] * 20 + $militaire['trebuchet'] * 20 + $militaire['belier'] * 20;
        } else { 
            $coutEntretien = $coutEntretien + $militaire['tours'] * 30 + $militaire['trebuchet'] * 30 + $militaire['belier'] * 30;
        }

        /* This is fetching the data from the database. */
        $initData->execute(array( 'id' => $idFetched['id'] ));
        $data = $initData->fetch();
        /* This is a way to calculate the new number of culture points ``. */
        $newCulture = $data['culture'] + $data['gainCulture'];
        /* This is a way to calculate the new number of religion points. */
        $newReligion = $data['religion'] + $data['gainReligion'];
        /* This is a way to calculate the budget. */
        $budget = round(( $data['budget'] + $revenuVilles + $data['revenuCommerce'] + $data['revenuDiplomatique'] + $data['revenuBonus'] - $data['entretienBati'] - $coutEntretien - $data['depense']), 0);

        /* A way to update the database. */
        $update = $bdd->prepare("UPDATE dataFiche 
                                 SET depense = 0, revenuVille = :revenuVille, culture = :culture, religion = :religion, budget = :budget, coutEntretien = :coutEntretien
                                 WHERE id = :id 
                                 ");
        $update->execute(array(
            'id' => $idFetched['id'],
            'revenuVille' => $revenuVilles,
            'culture' => $newCulture,
            'religion' => $newReligion,
            'budget' => $budget,
            'coutEntretien' => $coutEntretien 
        ));
    }
    /* This is a way to redirect the user to the previous page once finished. */
    header('Location: ../update.php?send=true');
}
/* This is a way to redirect the user to the previous page if the user is not logged in as an admin. */
else {
    header('Location: ../update.php?send=adminFalse');
}
?>