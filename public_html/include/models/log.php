<?php 
declare(strict_types=1);
include_once 'globals.php';

final class logMembre extends table{

    protected $connexion;

    public int $id;
    public string $idChannel;
    public ?string $nom = null;
    public ?string $mdp = null;

    /**
     * A constructor function. It is called when an object is created.
     * 
     * @param connexion The connection to the database.
     */
    public function __construct($connexion){
        $this->connexion = $connexion;
    }

    /**
     * It updates the idChannel of a member of logMembre in the database
     * @return bool status.
     */
    public function update(){
        $req = $this->connexion->prepare("UPDATE logMembre SET id = ? WHERE id = ? ");
        return $req->execute([$this->$idChannel, $this->id]);
    }

    /**
     * It creates a new logMembre row in the database.
     * @return bool status.
     */
    public function create(){
        $req = $this->connexion->prepare("INSERT INTO logMembre VALUES (:idChannel, :nom, :mdp)");
        return $req->execute(array(":idChannel" => $this->idChannel,
                                   ":nom" => $this->nom, 
                                   ":mdp" => $this->mdp));
    }

    /**
     * It reads the id and idChannel from the logMembre table.
     * 
     * @return bool status.
     */
    public function read(){
        $req = $this->connexion->prepare("SELECT id, idChannel FROM logMembre");
        $returnVal = $req->execute()->fetch();
        $result = $req->fetch();
        $this->idChannel = $result['id'];
        $this->nom = $result['idChannel'];
        return $returnVal;
    }

    /**
     * It deletes the logMembre table.
     * 
     * @return bool status.
     */
    public function delete(){
        $req = $this->connexion->prepare("DELETE FROM logMembre WHERE id = ?");
        return $req->execute([$this->id]);
    }

}
?>