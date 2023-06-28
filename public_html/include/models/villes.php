<?php 
declare(strict_types=1);

include_once 'globals.php';

final class villes extends table{
    protected $connexion;

    public int $id;
    public ?string $nom = NULL;
    public ?int $tiers1 = NULL;
    public ?int $tiers2 = NULL;
    public ?int $tiers3 = NULL;
    public ?int $tiers4 = NULL;
    public ?int $tiers5 = NULL;

    /**
     * 
     * 
     * @param db The database connection object.
     */
    public function __construct($db){
        $this->connexion = $db;
        $this->table_name = 'villes';
    }

    /**
     * It creates a new row in the database with the values of the object's attributes
     * 
     * @return True or False depending of the success of the request
     */
    public function create(){
        $requete = $this->connexion->prepare("INSERT INTO villes SET id = :id, nom = :nom, tiers1 = :tiers1, tiers2 = :tiers2, tiers3 = :tiers3, tiers4 = :tiers4, tiers5 = :tiers5");
        if ($requete->execute(array(
            'id' => $this->id,
            'nom' => $this->nom,
            'tiers1' => $this->tiers1,
            'tiers2' => $this->tiers2,
            'tiers3' => $this->tiers3,
            'tiers4' => $this->tiers4,
            'tiers5' => $this->tiers5,
        ))){
            return True;
        }
        else {
            return False;
        }
    }

    /**
     * It prepares a SQL query to select all the data from the table "villes" where the id is equal to the
     * id of the object
     */
    public function read(){
        $requete = $this->connexion->prepare("SELECT * FROM villes WHERE id = :id");
        $requete->execute(array("id" => $this->id));
        $result = $requete->fetch();
        $this->id = $result['id'];
        $this->nom = $result['nom'];
        $this->tiers1 = $result['tiers1'];
        $this->tiers2 = $result['tiers2'];
        $this->tiers3 = $result['tiers3'];
        $this->tiers4 = $result['tiers4'];
        $this->tiers5 = $result['tiers5'];
    }

    /**
     * It updates the database with the new values of the object.
     * 
     * @return True or False depending of the success of the request
     */
    public function update(){
        $requete = $this->connexion->prepare("UPDATE villes SET nom = :nom, tiers1 = :tiers1, tiers2 = :tiers2, tiers3 = :tiers3, tiers4 = :tiers4, tiers5 = :tiers5 WHERE id = :id");
        if ($requete->execute(array(
            'id' => $this->id,
            'nom' => $this->nom,
            'tiers1' => $this->tiers1,
            'tiers2' => $this->tiers2,
            'tiers3' => $this->tiers3,
            'tiers4' => $this->tiers4,
            'tiers5' => $this->tiers5,
        ))){
            return True;
        }
        else {
            return False;
        }
    }

    /**
     * It deletes the line from the database using object's id attribute
     * 
     * @return True or False depending of the success of the request
     */
    public function delete(){
        $requete = $this->connexion->prepare("DELETE FROM villes WHERE id = :id");
        if ($requete->execute(array('id' => $this->id))){
            return True;
        }
        else {
            return False;
        }
    }
}
?>