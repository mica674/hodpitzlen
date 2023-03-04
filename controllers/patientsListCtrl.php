<?php

// Appel des constantes
require_once(__DIR__ . '/../config/constants.php');

// LIVE SEARCH connect
require_once(__DIR__ . '/../connect.php');

// Appel du model
require_once(__DIR__ . '/../models/Patient.php');
$patients = Patient::getPatientSearch();
// Message si un patient vient d'être ajouté
if (intval(filter_input(INPUT_GET, 'patientEdited', FILTER_SANITIZE_NUMBER_INT)) == 1) {
    echo 'Le patient a été modifié avec succès félicitations, excellente journée à vous !';
}

// Message si un patient vient d'être supprimé
if (trim(filter_input(INPUT_GET, 'deleted', FILTER_SANITIZE_SPECIAL_CHARS)?? false) == true) {
    echo 'Le patient a été supprimé avec succès félicitations, excellente journée à vous !';
}

// Message si un patient n'existe pas
if (trim(filter_input(INPUT_GET, 'exist', FILTER_SANITIZE_SPECIAL_CHARS)?? true) == false) {
    echo 'Le patient n\'existe pas !';
}


// Appel du header
include(__DIR__ . '/../views/templates/header.php');

// Appel de la view
include(__DIR__ . '/../views/clients/patientsList.php');

// LIVE SEARCH
$liveSearch = true;

// Appel du footer
include(__DIR__ . '/../views/templates/footer.php');
