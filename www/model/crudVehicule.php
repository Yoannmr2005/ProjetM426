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
    $data = PDO_Select_All("SELECT `idVehicule`, `marque`, `modele`, `nbChevaux`, `immatriculation`, `annee` FROM vehicule", []);
    return $data;
}

/**
 * fonction qui récupère un véhicule de la DB avec un id
 *
 * @param [int] $id
 * @return array
 */
function GetOneVehiculeWithId($id){
    $data = PDO_Select("SELECT `idVehicule`, `marque`, `modele`, `nbChevaux`, `immatriculation`, `annee` FROM vehicule WHERE `idVehicule` = ?", [$id]);
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
function verifyDataVehicule($marque, $modele, $nbChevaux, $immatriculation, $annee)
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

    if ($annee <= 1940) {
        return "L'année est trop ancienne";
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
 * @return string
 */
function addVehicule($marque, $modele, $nbChevaux, $immatriculation, $annee)
{
    $verify = verifyDataVehicule($marque, $modele, $nbChevaux, $immatriculation, $annee);
    if ($verify == "") {
        PDO_Insert_Update_Delete("INSERT INTO vehicule (`marque`, `modele`, `nbChevaux`, `immatriculation`, `annee`) VALUES (?, ?, ?, ?)", [$marque, $modele, $nbChevaux, $immatriculation, $annee]);
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
 * @param [int] $idVehicule
 * @return void
 */
function modifyVehicule($nbChevaux, $immatriculation, $idVehicule)
{
    if ($nbChevaux <= 0) {
        return "Le nombre de chevaux est trop petit";
    }

    if ($immatriculation == "") {
        return "Une immatriculation est nécessaire";
    }

    // Modifier un véhicule dans la DB
    PDO_Insert_Update_Delete("UPDATE vehicule SET `nbChevaux` = ?, `immatriculation` = ? WHERE `idVehicule` = ?", [$nbChevaux, $immatriculation, $idVehicule]);
    return "";
}

/**
 * fonction qui permet de supprimer un véhicule de la DB avec l'id
 *
 * @param [int] $idVehicule
 * @return void
 */
function deleteVehicule($idVehicule)
{
    // Supprime un véhicule
    PDO_Insert_Update_Delete("DELETE FROM `vehicule` WHERE idVehicule = ?", [$idVehicule]);
    return "";
}