<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="bot API", charset="utf-8"');
    http_response_code(401);
    exit;
}
elseif ($_SERVER['PHP_AUTH_USER'] == "bot" and $_SERVER['PHP_AUTH_PW'] == "pwd"){
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Max-Age: 3600");

    include_once '../include/centralized_models.php';
    include_once '../include/db_connection.php';
    include_once '../include/dataQuery.php';

    $database = new Database();
    $bdd = $database->getConnection();   
    $dataFiche = new mainData($bdd); 
    $militaire = new militaire($bdd);
    $villes = new villes($bdd);
    $loggingTable = new logMembre($bdd);
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        

        // On récupère les données reçues
        $donnees = json_decode(file_get_contents("php://input"));

        // On vérifie qu'on a bien un id
        if(isset($donnees->id)){
            $dataFiche->id = $donnees->id;
            $militaire->id = $donnees->id;
            $villes->id = $donnees->id;

            // On récupère la data
            if($dataFiche->doesExist()){
                $dataFiche->read();
                
                if($militaire->doesExist()){
                    $militaire->read();
                }
                else{
                    echo json_encode(["error" => "data error: data entry " . $donnees->id . " does not exist in table militaire"]);
                }            
    
    
                if($villes->doesExist()){
                    $villes->read();
                }
                else{
                    echo json_encode(["error" => "data error: data entry " . $donnees->id . " does not exist in table villes"]);
                }
    
                // On vérifie si la personne existe
                if($dataFiche->nom != null){
                    // On crée un tableau contenant les data
                    $prod = [
                        "id" => $dataFiche->id,
                        "nom" => $dataFiche->nom,
                        "revenuVille" => $dataFiche->revenuVille,
                        "revenuCommerce" => $dataFiche->revenuCommerce,
                        "revenuDiplomatique" => $dataFiche->revenuDiplomatique,
                        "revenuBonus" => $dataFiche->revenuBonus,
                        "entretienBati" => $dataFiche->entretienBati,
                        "coutEntretien" => $dataFiche->coutEntretien,
                        "budget" => $dataFiche->budget,
                        "depense" => $dataFiche->depense,
                        "culture" => $dataFiche->culture,
                        "gainCulture" => $dataFiche->gainCulture,
                        "religion" => $dataFiche->religion,
                        "gainReligion" => $dataFiche->gainReligion,
                        "merveille" => $dataFiche->merveille,
                        "conscrit" => $militaire->conscrit,
                        "barbare" => $militaire->barbare,
                        "piquier" => $militaire->piquier,
                        "legion" => $militaire->legion,
                        "fantassin" => $militaire->fantassin,
                        "archers" => $militaire->archers,
                        "tours" => $militaire->tours,
                        "trebuchet" => $militaire->trebuchet,
                        "belier" => $militaire->belier,
                        "echelle" => $militaire->echelle,
                        "autre" => $militaire->autre,
                        "trireme" => $militaire->trireme,
                        "transport" => $militaire->transport,
                        "type" => $militaire->type,
                        "entretienAutre" => $militaire->entretienAutre,
                        "tiers1" => $villes->tiers1,
                        "tiers2" => $villes->tiers2,
                        "tiers3" => $villes->tiers3,
                        "tiers4" => $villes->tiers4,
                        "tiers5" => $villes->tiers5,
                    ];
                    // On envoie le code réponse 200 OK
                    http_response_code(200);
                
                    // On encode en json et on envoie
                    echo json_encode($prod);
                }
                else{
                    http_response_code(404);
                    echo json_encode(["error" => "data error: data entry " . $donnees->id . " does not exist in table dataFiche" ]);
                }
            
            }
            else{
                http_response_code(404);
                echo json_encode(["error" => "data error: data entry " . $donnees->id . " does not exist in table dataFiche" ]);
            }

        }
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        
        $donnees = json_decode(file_get_contents('php://input'));

        if(isset($donnees->id)){
            $loggingTable->id = $donnees->id;
            $suppressData = $loggingTable->delete();

            if ($suppressData){
                http_response_code(200);
                echo json_encode(["message" => "la suppression a été effectuée"]);
            }
            elseif (!$suppressData){
                http_response_code(500);
                echo json_encode(["error" => "FATAL ERROR, no operation"]);
            }
            else{
                http_response_code(500);
                echo json_encode(["error" => "FATAL ERROR, INTEGRITE BDD COMPROMISE VEUILLEZ CONTACTER UN ADMINISTRATEUR"]);
            }
        }

    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $donnees = json_decode(file_get_contents('php://input'));

        if(isset($donnees->id)){
            $loggingTable->idChannel = $donnees->id;
            $dataFiche->id = $donnees->id;
            $militaire->id = $donnees->id;
            $villes->id = $donnees->id;

            $doesExistData = $dataFiche->doesExist();
            $doesExistMilitaire = $militaire->doesExist();
            $doesExistVilles = $villes->doesExist();

            if (! ($doesExistData && $doesExistMilitaire && $doesExistVilles)){

                $loggingTable->id = $donnees->id;
                $loggingTable->create();
                if (!$doesExistData){
                    dataQuerier($dataFiche, $donnees);
                    $dataFiche->create();
                }
                if (!$doesExistMilitaire){
                    militaireQuerier($militaire, $donnees);
                    $militaire->create();
                }
                if (!$doesExistVilles){
                    villesQuerier($villes, $donnees);
                    $villes->create();
                }
                echo json_encode(["notice" => "entry didn't exist, they were created"]);
            }
            
            $dataFiche->read();
            $militaire->read();
            $villes->read();
            
            dataQuerier($dataFiche, $donnees);
            militaireQuerier($militaire, $donnees);
            villesQuerier($villes, $donnees);

            $updateData = $dataFiche->update();
            $updateMilitaire = $militaire->update();
            $updateVilles = $villes->update();

            if (!($updateData && $updateMilitaire && $updateVilles)){
                http_response_code(500);
                echo json_encode(["error" => "Partial update, call admin"]);
            }
            else{
                http_response_code(200);
                echo json_encode(["message" => "db got updated"]);
            }

        }
        else {
            http_response_code(400);
            echo json_encode(["error" => "no id specified"]);
        }

    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $donnees = json_decode(file_get_contents('php://input'));

        if(isset($donnees->id)){

            $dataFiche->id = $donnees->id;
            $militaire->id = $donnees->id;
            $villes->id = $donnees->id;
            $loggingTable->idChannel = $donnees->id;

            dataQuerier($dataFiche, $donnees);
            militaireQuerier($militaire, $donnees);
            villesQuerier($villes, $donnees);

            $createLog = $loggingTable->create();
            $createData = $dataFiche->create();
            $createMilitaire = $militaire->create();
            $createvilles = $villes->create();

            if($createData and $createMilitaire and $createvilles && $createLog){
                http_response_code(200);
                echo json_encode(["message" => "création effectuée"]);
            }
            elseif ((!$createData or !$createMilitaire or !$createville) and !(!$createData and !$createMilitaire and !$createville)){
                http_response_code(500);
                echo json_encode(["error" => "FATAL ERROR, OPERATION ECHOUEE, INTEGRITE DE LA BASE DE DONNEE COMPROMISE"]);
            }
            elseif (!$createData and !$createMilitaire and !$createvilles){
                http_response_code(500);
                echo json_encode(["error" => "FATAL ERROR, opération échouée"]);
            }
        }
        else {
            http_response_code(400);
            echo json_encode(["error" => "no id specified"]);
        }
    }
    else{
        http_response_code(405);
        echo json_encode(["error" => "unknown method"]);
    }
}
else{
    http_response_code(403);
    echo json_encode(["error" => "You're not supposed to be here tho"]);
}
?>