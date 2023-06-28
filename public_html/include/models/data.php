<?php 
declare(strict_types=1);
include_once 'globals.php';

final class mainData extends table{

    public int $id;
    public ?string $nom = null;
    public int $revenuVille;
    public float $revenuCommerce;
    public float $revenuDiplomatique;
    public int $revenuBonus;
    public float $entretienBati;
    public float $coutEntretien;
    public float $budget;
    public int $depense;
    public int $culture;
    public int $gainCulture;
    public int $religion;
    public int $gainReligion;
    public string $merveille;
    
    /**
     * 
     * 
     * @param db The database connection object.
     */
    public function __construct($db){
        $this->connexion = $db;
        $this->table_name = 'dataFiche';
    }

    /**
     * It creates a new row in the database with the values of the object's attributes
     * 
     * @return a boolean value depending of the success or not of the operation.
     */
    public function create(){
        $requete = $this->connexion->prepare("INSERT INTO dataFiche SET id = :id, nom = :nom, revenuVille = :revenuVille, revenuCommerce = :revenuCommerce, revenuDiplomatique = :revenuDiplomatique, revenuBonus = :revenuBonus, entretienBati = :entretienBati, coutEntretien = :coutEntretien, budget = :budget, depense = :depense, culture = :culture, gainCulture = :gainCulture, religion = :religion, gainReligion = :gainReligion, merveille = :merveille");
        if($requete->execute(array(
            "id" => $this->id,
            "nom" => $this->nom,
            "revenuVille" => $this->revenuVille,
            "revenuCommerce" => $this->revenuCommerce,
            "revenuDiplomatique" => $this->revenuDiplomatique,
            "revenuBonus" => $this->revenuBonus,
            "entretienBati" => $this->entretienBati,
            "coutEntretien" => $this->coutEntretien,
            "budget" => $this->budget,
            "depense" => $this->depense,
            "culture" => $this->culture,
            "gainCulture" => $this->gainCulture,
            "religion" => $this->religion,
            "gainReligion" => $this->gainReligion,
            "merveille" => $this->merveille,
        ))){
            return True;
        }
        else {
            return False;
        }
    }

    /**
     * > This function returns the data of the row with the object's id attribute
     * 
     * @return obj the result of the select request
     */
    public function read(){
        $requete = $this->connexion->prepare("SELECT * FROM dataFiche WHERE id = :id");
        $requete->execute(array(":id" => $this->id));
        $result = $requete->fetch();

        $this->id = $result['id'];
        $this->nom = $result['nom'];
        $this->revenuVille = $result['revenuVille'];
        $this->revenuCommerce = $result['revenuCommerce']/1;
        $this->revenuDiplomatique = $result['revenuDiplomatique'];
        $this->revenuBonus = $result['revenuBonus'];
        $this->entretienBati = $result['entretienBati']/1;
        $this->coutEntretien = $result['coutEntretien'];
        $this->budget = $result['budget'];
        $this->depense = $result['depense'];
        $this->culture = $result['culture'];
        $this->gainCulture = $result['gainCulture'];
        $this->religion = $result['religion'];
        $this->gainReligion = $result['gainReligion'];
        $this->merveille = $result['merveille'];
    }

    /**
     * It updates the database with the values of the object's attributes.
     * 
     * @return a boolean value depending of the success of the request.
     */
    public function update(){
        $requete = $this->connexion->prepare("UPDATE dataFiche SET nom = :nom, revenuVille = :revenuVille, revenuCommerce = :revenuCommerce, revenuDiplomatique = :revenuDiplomatique, revenuBonus = :revenuBonus, entretienBati = :entretienBati, coutEntretien = :coutEntretien, budget = :budget, depense = :depense, culture = :culture, gainCulture = :gainCulture, religion = :religion, gainReligion = :gainReligion, merveille = :merveille WHERE id = :id");
        if($requete->execute(array(
            "id" => $this->id,
            "nom" => $this->nom,
            "revenuVille" => $this->revenuVille,
            "revenuCommerce" => $this->revenuCommerce,
            "revenuDiplomatique" => $this->revenuDiplomatique,
            "revenuBonus" => $this->revenuBonus,
            "entretienBati" => $this->entretienBati,
            "coutEntretien" => $this->coutEntretien,
            "budget" => $this->budget,
            "depense" => $this->depense,
            "culture" => $this->culture,
            "gainCulture" => $this->gainCulture,
            "religion" => $this->religion,
            "gainReligion" => $this->gainReligion,
            "merveille" => $this->merveille,
        ))){
            return True;
        }
        else {
            return False;
        }
    }

    /**
     * It deletes a row from the database using object's id attribute.
     * 
     * @return a boolean value depending of the success of the request.
     */
    public function delete(){
        $requete = $this->connexion->prepare("DELETE FROM dataFiche WHERE id = :id");
        if ($requete->execute(array("id" => $this->id))){
            return True;
        }
        else {
            return False;
        }
    }
}


?>