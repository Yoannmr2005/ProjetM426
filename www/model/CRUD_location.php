<?php

/**
 * Fonction qui permet l'ajout d'une location de véhicule
 *
 * @param int $idVehicule
 * @param string $locataire
 * @param date $dateDebut
 * @param date $dateFin
 * @return void
 */
function add_location($idVehicule, $locataire, $dateDebut, $dateFin){
    if($idVehicule === null && $locataire === null && $dateDebut === null && $dateFin === null)
        return;
    if($dateDebut > $dateFin) {
        echo "Les dates sont erronées";
        return;
    }

    $sql = "INSERT INTO `location`(`idVehicule`, `locataire`, `dateDebut`, `dateFin`) VALUES ('$idVehicule', '$locataire', '$dateDebut', '$dateFin')";
    $req = dbRun($sql);
}

/**
 * Fonction qui permet la modification de la location du véhicule
 *
 * @param int $idVehicule
 * @param string $locataire
 * @param date $dateDebut
 * @param date $dateFin
 * @return void
 */
function update_location($idVehicule, $locataire, $dateDebut, $dateFin){
    if($idVehicule === null && $locataire === null && $dateDebut === null && $dateFin === null)
        return;
    
    if($dateFin < $dateDebut) {
        echo "Les dates sont erronées";
        return;
    }

    $sql = "UPDATE location SET locataire= $locataire, dateDebut= $dateDebut, dateFin= $dateFin WHERE idocation = $idlocation";
    $req = dbRun($sql);
}

/**
 * Fonction qui supprime une location
 *
 * @param int $idlocation
 * @return void
 */
function delete_location($idlocation){
    if($id === null)
        return;
    $sql = "DELETE FROM `location` WHERE idlocation = $idlocation";
    $req = dbRun($sql);
}