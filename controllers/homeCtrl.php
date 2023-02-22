<?php

// Appel des constantes
require_once(__DIR__ . '/../config/constants.php');

// Appel du model
require_once(__DIR__ . '/../models/Patient.php');

// Message si un patient vient d'être ajouté
if ($_GET['patientAdded']??'' == 1) {
    echo 'Le patient a été ajouté avec succès félicitations, excellente journée à vous !';
}

// Appel du header
require_once(__DIR__ . '/../views/templates/header.php');

// Appel de la vue home
require_once(__DIR__ . '/../views/home.php');

// Appel du footer
require_once(__DIR__ . '/../views/templates/footer.php');