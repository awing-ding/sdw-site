<?php 
/* This is a php file that contains the connection to the database. */
include('../../include/db_connection.php');
$database = new Database();
$bdd = $database->getConnection();;

/* This is a simple if statement that checks if the user is logged in as admin. If they are, then the
code inside the if statement will be executed. If they are not, then the code inside the else
statement will be executed. */
if ($_SESSION['id'] == 'admin'){

    /* Checking if the type of the input is eco. If it is, then it will execute the code inside the if
    statement. If it is not, then it will execute the code inside the else statement. */
    if ($_GET['type'] === 'eco') {
        /* A prepared statement that is used to update data in the database. */
        $requete = $bdd->prepare("UPDATE dataFiche 
                                  SET revenuCommerce = :revenuCommerce, revenuDiplomatique = :revenuDiplomatique,culture = :culture, religion = :religion, gainCulture = :gainCulture, gainReligion = :gainReligion, revenuBonus = :revenuBonus, entretienBati = :entretienBati, budget = :budget, depense = :depense, merveille = :merveille 
                                  WHERE id = :id");
        $requete->execute(array(
            'revenuCommerce' => $_POST['revenuCommerce'],
            'revenuDiplomatique' => $_POST['revenuDiplomatique'],
            'revenuBonus' => $_POST['revenuBonus'],
            'entretienBati' => $_POST['entretienBati'],
            'culture' => $_POST['culture'],
            'religion' => $_POST['religion'],
            'gainCulture' => $_POST['gainCulture'],
            'gainReligion' => $_POST['gainReligion'],
            'budget' => $_POST['budget'],
            'depense' => $_POST['depense'],
            'merveille' => $_POST['merveille'],
            'id' => $_SESSION['idSecondaire']
        ));
        /* This is a way to redirect the user to another page. */
        header('Location: ../input-bilan.php');
    }
    /* This is a way to check if the type of the input is military. If it is, then it will execute the
    code inside the if statement. If it is not, then it will execute the code inside the else
    statement. */
    elseif ($_GET['type'] === 'militaire') {
    /* The prepared statement is used to update data in the database. */
        $requete = $bdd->prepare("UPDATE militaire
                                  SET conscrit = :conscrit, barbare = :barbare, piquier = :piquier, legion = :legion, fantassin = :fantassin, archers = :archers, tours = :tours, trebuchet = :trebuchet, belier = :belier, echelle = :echelle, autre = :autre, entretienAutre = :entretienAutre
                                  WHERE id = :id");
        $requete->execute(array(
            'conscrit' => $_POST['conscrit'],
            'barbare' => $_POST['barbare'],
            'legion' => $_POST['legion'],
            'piquier' => $_POST['piquier'],
            'fantassin' => $_POST['fantassin'],
            'archers' => $_POST['archers'],
            'tours' => $_POST['tours'],
            'trebuchet' => $_POST['trebuchet'],
            'belier' => $_POST['belier'],
            'echelle' => $_POST['echelle'],
            'autre' => $_POST['autre'],
            'entretienAutre' => $_POST['entretienAutre'],
            'id' => $_SESSION['idSecondaire']
        ));
        /* This is a way to redirect the user to another page. */
        header('Location: ../input-bilan.php');
    }
    /* This is a way to check if the type of the input is ville. If it is, then it will execute the
    code inside the if statement. If it is not, then it will execute the code inside the else
    statement. */
    elseif ($_GET['type'] === 'ville') {
        /* This is a prepared statement that is used to update data in the database. */
        $requete = $bdd->prepare("UPDATE villes
                                  SET tiers1 = :tiers1, tiers2 = :tiers2, tiers3 = :tiers3, tiers4 = :tiers4, tiers5 = :tiers5
                                  WHERE id = :id");
        $requete->execute(array(
            'tiers1' => $_POST['tiers1'],
            'tiers2' => $_POST['tiers2'],
            'tiers3' => $_POST['tiers3'],
            'tiers4' => $_POST['tiers4'],
            'tiers5' => $_POST['tiers5'],
            'id' => $_SESSION['idSecondaire']
        ));
        /* This is a way to redirect the user to another page. */
        header('Location: ../input-bilan.php');
    }
}
else {
    /* This is a way to redirect the user to another page if they don't have permission to edit. */
    header('Location: input-bilan.php?send=adminFalse');
}
?>