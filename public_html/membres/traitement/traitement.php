<?php 
//connexion à mysql
include('../../include/mysqlconnect.php');

if ($_GET['raison'] == 'login') 
{
    $req = $bdd->prepare('SELECT * FROM logMembre WHERE idChannel = :id');
    $req->execute(array(
        'id' => $_POST['id-log'] ));
    $resultat = $req->fetch();
        if ($_POST['mdp-log'] === $resultat['mdpPerso']) 
        {
            $_SESSION['id'] = $resultat['idChannel'];
            $_SESSION['log'] = true;
            $_SESSION['idSecondaire'] = $resultat['id'];
            if ($_SESSION['id'] != 'admin')
                header('Location: ../bilan/bilan.php');
            else {
                header('Location: ../../admin/hub.php');
            }
            
        }
        else 
        {
            $_SESSION['badPassword'] = true;
            $_SESSION['log'] = false;
            header('Location: /membres/login.php?error=true');
        }
}
?>