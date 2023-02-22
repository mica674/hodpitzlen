<?php

// Appel des constantes
require_once(__DIR__ . '/../config/constants.php');

// Appel du model
require_once(__DIR__ . '/../models/Patient.php');
$patients = Patient::getPatientsList();

// Appel du header
include(__DIR__ . '/../views/templates/header.php');

// Appel de la view
include(__DIR__ . '/../views/clients/patientsList.php');

// Appel du footer
include(__DIR__ . '/../views/templates/footer.php');