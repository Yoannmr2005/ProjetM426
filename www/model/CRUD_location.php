<?php

/**
 * Fonction qui permet l'ajout d'une location de véhicule
 *
 * @param int $idVehicule
 * @param int $prix
 * @param date $dateDebut
 * @param date $dateFin
 * @return void
 */


function add_location($idVehicule, $prix, $dateDebut, $dateFin){
    if($prix <= 0){ 
        echo "Le prix est inexistant.";
        return;
    }

    if($dateDebut > $dateFin) {
        echo "Les dates sont erronées";
        return;
    }

    $sql = "INSERT INTO `vehicule`(`idVehicule`, `prix`, `dateDebut`, `dateFin`) VALUES (?, ?, ?, ?)";
    $req = dbRun($sql, [$idVehicule, $prix, $dateDebut, $dateFin]);
}

/**
 * Fonction qui permet la modification de la location du véhicule
 *
 * @param int $idVehicule
 * @param int $prix
 * @param date $dateDebut
 * @param date $dateFin
 * @return void
 */

function update_Location($idVehicule, $prix, $dateDebut, $dateFin){
    if($prix <= 0){
        echo "Le prix est inexistant.";
        return;
    }
    
    if($dateFin < $dateDebut) {
        echo "Les dates sont erronées";
        return;
    }

    $req=dbRun()->prepare("UPDATE prix= :$prix, dateDebut= :$dateDebut, dateFin= :$dateFin WHERE idVehicule = :$idVehicule");
    $req->execute(array(
        'prix' => $nvprix,
        'DateDebut' => $DateDebut,
        'DateFin' => $DateFin
    ));
}


