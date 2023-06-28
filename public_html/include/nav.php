<header>
    <nav>
        <?php
        if (isset($_SESSION['log'])){
            if ($_SESSION['log'] != true){
                echo('<a href="/membres/login.php" class="admin">Connexion</a> ');
            }
            else { 
                if ($_SESSION['id'] === 'admin') {
                    echo('<a href="/admin/hub.php" class="admin">Admin hub</a>');
                    echo('<a href="/admin/update.php" class="admin">Update journalier</a>');
                    echo('<a href="/admin/listing.php" id="hub-link">Liste des membres</a>');
                }
                else {
                    echo '<a href="/membres/bilan/bilan.php" class="admin">Stats</a> ';
                }
                echo('<a href="/membres/logout.php" class="admin" >Déconnexion</a>');
            }
        } 
        else {
            echo('<a href="/membres/login.php" class="admin">Connexion</a> ');  
        } 
        ?>
        <a href="/index.php" class="admin">retourner à l'accueil</a>
    </nav>
</header>