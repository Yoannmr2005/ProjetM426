<?php

$id = isset($_POST["id"]) ? $_POST["id"] : null; // si l'id existe déjà
$location = isset($_POST["boolLocation"]) ? $_POST["boolLocation"] : null; // si la location existe déjà
$dateDebut = isset($_POST["dateDebut"]) ? $_POST["dateDebut"] : null; // si la date de début existe déjà
$dateFin = isset($_POST["dateFin"]) ? $_POST["dateFin"] : null; // si la date de fin existe déjà