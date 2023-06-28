<?php
    session_start();

    class Database{
        // Propriétés de la base de données
        private $host = "localhost";
        private $db_name = "id15985403_fiche_sdw";
        private $username = "id15985403_reader";
        private $password = "f6qy+A<YEhZ?qcIL";

        public $connexion;
    
        // getter pour la connexion
        public function getConnection(){
            // On commence par fermer la connexion si elle existait
            $this->connexion = null;
    
            // On essaie de se connecter
            try{
                $this->connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8;port3306", $this->username, $this->password);
            }catch(PDOException $exception){ // On gère les erreurs éventuelles
                echo "Erreur de connexion : " . $exception->getMessage();
            }
    
            // On retourne la connexion
            return $this->connexion;
        }   
    }

?>