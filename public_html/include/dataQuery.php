<?php
function dataQuerier($dataFiche, $donnees){
    if(isset($donnees->nom)){
        $dataFiche->nom = $donnees->nom;
    }
    if(isset($donnees->revenuVille)){
        $dataFiche->revenuVille = $donnees->revenuVille;
    }
    if(isset($donnees->revenuCommerce)){
        $dataFiche->revenuCommerce = $donnees->revenuCommerce;
    }
    if(isset($donnees->revenuDiplomatique)){
        $dataFiche->revenuDiplomatique = $donnees->revenuDiplomatique;
    }
    if(isset($donnees->revenuBonus)){
        $dataFiche->revenuBonus = $donnees->revenuBonus;
    }
    if(isset($donnees->entretienBati)){
        $dataFiche->entretienBati = $donnees->entretienBati;
    }
    if(isset($donnees->coutEntretien)){
        $dataFiche->coutEntretien = $donnees->coutEntretien;
    }
    if(isset($donnees->budget)){
        $dataFiche->budget = $donnees->budget;
    }
    if(isset($donnees->depense)){
        $dataFiche->depense = $donnees->depense;
    }
    if(isset($donnees->culture)){
        $dataFiche->culture = $donnees->culture;
    }
    if(isset($donnees->gainCulture)){
        $dataFiche->gainCulture = $donnees->gainCulture;
    }
    if(isset($donnees->religion)){
        $dataFiche->religion = $donnees->religion;
    }
    if(isset($donnees->gainReligion)){
        $dataFiche->gainReligion = $donnees->gainReligion;
    }
    if(isset($donnees->merveille)){
        $dataFiche->merveille = $donnees->merveille;
    }
}

function militaireQuerier($militaire, $donnees){
    if(isset($donnees->nom)){
        $militaire->nom = $donnees->nom;
        }
    if(isset($donnees->conscrit)){
        $militaire->conscrit = $donnees->conscrit;
    }
    if(isset($donnees->barbare)){
        $militaire->barbare = $donnees->barbare;
    }
    if(isset($donnees->piquier)){
        $militaire->piquier = $donnees->piquier;
    }
    if(isset($donnees->legion)){
        $militaire->legion = $donnees->legion;
    }
    if(isset($donnees->fantassin)){
        $militaire->fantassin = $donnees->fantassin;
    }
    if(isset($donnees->archers)){
        $militaire->archers = $donnees->archers;
    }
    if(isset($donnees->tours)){
        $militaire->tours = $donnees->tours;
    }
    if(isset($donnees->trebuchet)){
        $militaire->trebuchet = $donnees->trebuchet;
    }
    if(isset($donnees->belier)){
        $militaire->belier = $donnees->belier;
    }
    if(isset($donnees->echelle)){
        $militaire->echelle = $donnees->echelle;
    }
    if(isset($donnees->autre)){
        $militaire->autre = $donnees->autre;
    }
    if(isset($donnees->trireme)){
        $militaire->trireme = $donnees->trireme;
    }
    if(isset($donnees->transport)){
        $militaire->transport = $donnees->transport;
    }
    if(isset($donnees->type)){
        $militaire->type = $donnees->type;
    }
    if(isset($donnees->entretienAutre)){
        $militaire->entretienAutre = $donnees->entretienAutre;
    }
}

function villesQuerier($villes, $donnees){
    if(isset($donnees->nom)){
        $villes->nom = $donnees->nom;
    }
    if(isset($donnees->tiers1)){
        $villes->tiers1 = $donnees->tiers1;
    }
    if(isset($donnees->tiers2)){
        $villes->tiers2 = $donnees->tiers2;
    }
    if(isset($donnees->tiers3)){
        $villes->tiers3 = $donnees->tiers3;
    }
    if(isset($donnees->tiers4)){
        $villes->tiers4 = $donnees->tiers4;
    }
    if(isset($donnees->tiers5)){
        $villes->tiers5 = $donnees->tiers5;
    }
}
?>