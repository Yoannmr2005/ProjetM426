<?php

$action = filter_input(INPUT_GET, "a", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {
    case '':
        $allVoiture = GetAllVehicule();
        include("vue/listeVoitures.php");
        break;
    case 'add':
        // Filtre des données
        $modele = filter_input(INPUT_POST, "modele", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $marque = filter_input(INPUT_POST, "marque", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $chevaux = filter_input(INPUT_POST, "chevaux", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $immatriculation = filter_input(INPUT_POST, "immatriculation", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $annee = filter_input(INPUT_POST, "annee", FILTER_VALIDATE_INT);
        $ajouter = filter_input(INPUT_POST, "ajouter", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($ajouter == "ajouter") {
            $dataOk = verifyDataVehicule($marque, $modele, $chevaux, $immatriculation, $annee);
            if ($dataOk == "") {
                // Ajoute le véhicule
                addVehicule($marque, $modele, $chevaux, $immatriculation, $annee);
                header("location: index.php");
                exit;
            } else {
                // Affiche le message d'erreur
                echo $dataOk;
            }
        }
        include("vue/ajouteVoiture.html");
        break;
    case 'modify':
        // Récupère l'id du véhicule
        $idVehicule = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        // Filtre des données
        $chevaux = filter_input(INPUT_POST, "chevaux", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $immatriculation = filter_input(INPUT_POST, "immatriculation", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $modifier = filter_input(INPUT_POST, "modifier", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($modifier == "modifier") {
            $modifyOk = modifyVehicule($chevaux, $immatriculation, $idVehicule);
            // Affiche l'erreur si il y a eu une erreur
            if ($modifyOk != "") {
                echo $modifyOk;
            }
        }
        include("vue/modifVoiture.html");
        break;
    case 'delete':
        // Récupère l'id du véhicule
        $idVehicule = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        deleteVehicule($idVehicule);
        break;
}
