<?php
    session_start();
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=id15985403_fiche_sdw;charset=utf8;port=3306','id15985403_reader','f6qy+A<YEhZ?qcIL', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
?>