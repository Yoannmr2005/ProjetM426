<?php

/**
 * Page de fonction pour CRUD les véhicules (Yoann Meier)
 */

require_once("fonction.php");

/**
 * fonction qui permet de récupérer les données de tous les véhicules
 *
 * @return array
 */
function GetAllVehicule()
{
    $data = PDO_Select_All("SELECT `idvehicule`, `marque`, `modele`, `chevaux`, `immatriculation` FROM vehicule", []);
    return $data;
}

/**
 * fonction qui récupère un véhicule de la DB avec un id
 *
 * @param [int] $id
 * @return array
 */
function GetOneVehiculeWithId($id){
    $data = PDO_Select("SELECT `idvehicule`, `marque`, `modele`, `chevaux`, `immatriculation` FROM vehicule WHERE `idvehicule` = ?", [$id]);
    return $data;
}

/**
 * fonction qui vérifie les données du formulaire de véhicule
 *
 * @param [string] $marque
 * @param [string] $modele
 * @param [int] $nbChevaux
 * @param [string] $immatriculation
 * @return string
 */
function verifyDataVehicule($marque, $modele, $nbChevaux, $immatriculation)
{
    if ($marque == "") {
        return "Une marque est nécessaire";
    }

    if ($modele == "") {
        return "Un modèle est nécessaire";
    }

    if ($nbChevaux <= 0) {
        return "Le nombre de chevaux est trop petit";
    }

    if ($immatriculation == "") {
        return "Une immatriculation est nécessaire";
    }

    // S'il n'y a pas d'erreurs, on retourne un string vide
    return "";
}

/**
 * fonction qui ajoute un véhicule dans la DB
 *
 * @param [string] $marque
 * @param [string] $modele
 * @param [int] $nbChevaux
 * @param [string] $immatriculation
 * @return void
 */
function addVehicule($marque, $modele, $nbChevaux, $immatriculation)
{
    $verify = verifyDataVehicule($marque, $modele, $nbChevaux, $immatriculation);
    if ($verify == "") {
        PDO_Insert_Update_Delete("INSERT INTO vehicule (`marque`, `modele`, `chevaux`, `immatriculation` VALUES (?, ?, ?, ?)", [$marque, $modele, $nbChevaux, $immatriculation]);
        return "";
    } else {
        return $verify;
    }
}
/**
 * fonction qui modifie un véhicule dans la DB avec l'id
 *
 * @param [string] $marque
 * @param [string] $modele
 * @param [int] $nbChevaux
 * @param [string] $immatriculation
 * @param [int] $idvehicule
 * @return void
 */
function modifyVehicule($marque, $modele, $nbChevaux, $immatriculation, $idvehicule)
{
    $verify = verifyDataVehicule($marque, $modele, $nbChevaux, $immatriculation);
    if ($verify == "") {
        // Modifier un véhicule dans la DB
        PDO_Insert_Update_Delete("UPDATE vehicule SET `marque` = ?, `modele` = ?, `chevaux` = ?, `immatriculation` = ? WHERE `idvehicule` = ?", [$marque, $modele, $nbChevaux, $immatriculation, $idvehicule]);
        return "";
    }else {
        return $verify;
    }
}

/**
 * fonction qui permet de supprimer un véhicule de la DB avec l'id
 *
 * @param [int] $idvehicule
 * @return void
 */
function deleteVehicule($idvehicule)
{
    // Supprime un véhicule
    PDO_Insert_Update_Delete("DELETE FROM `vehicule` WHERE idvehicule = ?", [$idvehicule]);
    return "";
}