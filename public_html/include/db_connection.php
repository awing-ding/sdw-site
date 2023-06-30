<?php
    session_start();

    class Database{
        // Propriétés de la base de données
        private $host;
        private $db_name;
        private $username;
        private $password;

        public $connexion = null;

        function __construct(){
            $this->host = $_SERVER['db_host'];
            $this->db_name = $_SERVER['db_name'];
            $this->username = $_SERVER['db_username'];
            $this->password = $_SERVER['db_password'];
        }
    
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