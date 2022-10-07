<?php

/**
 * Fonction qui récupère la location d'une voiture avec son id
 *
 * @param int $idvoiture
 * @return void
 */
function GetLocationWithId($idvoiture)
{
    return PDO_Select("SELECT `idLocation`,`locataire`, `dateDebut`,`dateFin`,`idVehicule` FROM `location` WHERE `idVehicule` = ?",[$idvoiture]);
}


/**
 * Fonction qui permet l'ajout d'une location de véhicule
 *
 * @param int $idVehicule
 * @param int $prix
 * @param date $dateDebut
 * @param date $dateFin
 * @return void
 */
function add_location($idVehicule, $prix, $dateDebut, $dateFin)
{
    if ($prix <= 0) {
        echo "Le prix est inexistant.";
        return;
    }

    if ($dateDebut > $dateFin) {
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
function update_location($idVehicule, $prix, $dateDebut, $dateFin)
{
    if ($prix <= 0) {
        echo "Le prix est inexistant.";
        return;
    }

    if ($dateFin < $dateDebut) {
        echo "Les dates sont erronées";
        return;
    }

    $sql = "UPDATE prix= $prix, dateDebut= $dateDebut, dateFin= $dateFin WHERE idVehicule = $idVehicule";
    $req = dbRun($sql);
}

/**
 * Fonction qui supprime une location
 *
 * @param int $idVehicule
 * @return void
 */
function delete_location($idVehicule)
{
    $sql = "DELETE FROM `vehicule` WHERE idVehicule = $idVehicule";
    $req = dbRun($sql);
}
