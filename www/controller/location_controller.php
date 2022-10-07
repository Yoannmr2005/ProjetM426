<?php
require_once("vue/index.php");

$action = isset($_GET["a"]) ? $_GET["a"] : null;

$id = isset($_POST["id"]) ? $_POST["id"] : null; // si l'id existe déjà
$location = isset($_POST["boolLocation"]) ? $_POST["boolLocation"] : null; // si la location existe déjà
$locataire = isset($_POST["locataire"]) ? $_POST["locataire"] : null; // si le locataire existe
$dateDebut = isset($_POST["dateDebut"]) ? $_POST["dateDebut"] : null; // si la date de début existe déjà
$dateFin = isset($_POST["dateFin"]) ? $_POST["dateFin"] : null; // si la date de fin existe déjà

switch($action){
    case "add":
        add_location($id, $location, $locataire, $dateDebut, $dateFin);
        require_once(ROOT . "/vue/modifVoiture.php");
        break;
    case "update":
        update_location($id, $location, $locataire, $dateDebut, $dateFin);
        require_once(ROOT . "/vue/modifVoiture.php");
        break;
    case "delete":
        delete_location($id);
        require_once(ROOT . "/vue/modifVoiture.php");
        break;
}
