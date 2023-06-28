<?php 
declare(strict_types=1);
include_once 'globals.php';

final class militaire extends table{
    protected $connexion;

    public int $id;
    public ?string $nom = null;
    public ?int $conscrit = null;
    public ?int $barbare = null;
    public ?int $piquier = null;
    public ?int $legion = null; 
    public ?int $fantassin = null;
    public ?int $archers = null;
    public ?int $tours = null;
    public ?int $trebuchet = null;
    public ?int $belier = null;
    public ?int $echelle = null;
    public ?int $autre = null;
    public ?int $trireme = null;
    public ?int $transport = null;
    public ?string $type = null;
    public ?int $entretienAutre = null;

    /**
     * 
     * 
     * @param db The database connection object.
     */
    public function __construct($db){
        $this->connexion = $db;
        $this->table_name = 'militaire';
    }

    /**
     * It creates a new row in the database with the values of the object's attributes
     * 
     * @return True or False depending of the success of the request
     */
    public function create(){
        $requete = $this->connexion->prepare("INSERT INTO militaire SET id = :id, nom = :nom, conscrit = :conscrit, barbare = :barbare, piquier = :piquier, legion = :legion, fantassin = :fantassin, archers = :archers, tours = :tours, trebuchet = :trebuchet, belier = :belier, echelle = :echelle, autre = :autre, trireme = :trireme, transport = :transport, type = :type, entretienAutre = :entretienAutre");
        if($requete->execute(array(
            'id' => $this->id,
            'nom' => $this->nom,
            'conscrit' => $this->conscrit,
            'barbare' => $this->barbare,
            'piquier' => $this->piquier,
            'legion' => $this->legion,
            'fantassin' => $this->fantassin,
            'archers' => $this->archers,
            'tours' => $this->tours,
            'trebuchet' => $this->trebuchet,
            'belier' => $this->belier,
            'echelle' => $this->echelle,
            'autre' => $this->autre,
            'trireme' => $this->trireme,
            'transport' => $this->transport,
            'type' => $this->type,
            'entretienAutre' => $this->entretienAutre,
        ))){
            return True;
        }
        else {
            return False;
        }
    }

    /**
     * > The function `read()` is used to read a row from the database using object's id attribute
     * 
     * @return obj the result of the request or false
     */
    public function read(){
        $requete = $this->connexion->prepare("SELECT * FROM militaire WHERE id = :id");
        $requete->execute(array('id' => $this->id)); 
        $result = $requete->fetch();
        $this->id = $result['id'];
        $this->nom = $result['nom'];
        $this->conscrit = $result['conscrit'];
        $this->barbare = $result['barbare'];
        $this->piquier = $result['piquier'];
        $this->legion = $result['legion'];
        $this->fantassin = $result['fantassin'];
        $this->archers = $result['archers'];
        $this->tours = $result['tours'];
        $this->trebuchet = $result['trebuchet'];
        $this->belier = $result['belier'];
        $this->echelle = $result['echelle'];
        $this->autre = $result['autre'];
        $this->trireme = $result['trireme'];
        $this->transport = $result['transport'];
        $this->type = $result['type'];
        $this->entretienAutre = $result['entretienAutre'];
    }

    /**
     * It updates the database with the values of the object.
     * 
     * @return True or False depending of the success of the request
     */
    public function update(){
        $requete = $this->connexion->prepare("UPDATE militaire SET nom = :nom, conscrit = :conscrit, barbare = :barbare, piquier = :piquier, legion = :legion, fantassin = :fantassin, archers = :archers, tours = :tours, trebuchet = :trebuchet, belier = :belier, echelle = :echelle, autre = :autre, trireme = :trireme, transport = :transport, type = :type, entretienAutre = :entretienAutre WHERE id = :id");
        if($requete->execute(array(
            'id' => $this->id,
            'nom' => $this->nom,
            'conscrit' => $this->conscrit,
            'barbare' => $this->barbare,
            'piquier' => $this->piquier,
            'legion' => $this->legion,
            'fantassin' => $this->fantassin,
            'archers' => $this->archers,
            'tours' => $this->tours,
            'trebuchet' => $this->trebuchet,
            'belier' => $this->belier,
            'echelle' => $this->echelle,
            'autre' => $this->autre,
            'trireme' => $this->trireme,
            'transport' => $this->transport,
            'type' => $this->type,
            'entretienAutre' => $this->entretienAutre,
        ))){
            return True;
        }
        else {
            return False;
        }
    }

    /**
     * It deletes a row from the database.
     * 
     * @return True or False depending of the success of the request
     */
    public function delete(){
        $requete = $this->connexion->prepare("DELETE FROM militaire WHERE id = :id");
        if($requete->execute(array('id' => $this->id))){
            return True;
        }
        else{
            return False;
        }
    }
}

?>