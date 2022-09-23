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
        echo "Le prix est trop bas.";
        return;
    }

    if($dateDebut > $dateFin) {
        echo "Les dates sont erronées";
        return;
    }

    if($dateFin < $dateDebut) {
        echo "Les dates sont erronées";
        return;
    }
    $sql = "INSERT INTO `vehicule`(`idVehicule`, `prix`, `dateDebut`, `dateFin`) VALUES (?, ?, ?, ?)";
    $req = dbRun($sql, [$idVehicule, $prix, $dateDebut, $dateFin]);
}

?>