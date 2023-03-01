<?php

// Appel des constantes
require_once(__DIR__ . '/../config/constants.php');

// Appel du model
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../models/Appointment.php');
$appointments = Appointment::getAll();

// Message si un rendez-vous vient d'être supprimé
if ($_GET['deleted']??false == true) {
    echo 'Le rendez-vous a été supprimé avec succès félicitations, excellente journée à vous !';
}

// Message si un rendez-vous n'existe pas alors que l'utilisateur a voulu le supprimer
if ($_GET['exist']??true == false) {
    echo 'Le rendez-vous n\'existe pas dans la base de données !';
}

// Appel du header
include(__DIR__ . '/../views/templates/header.php');

// Appel de la view
include(__DIR__ . '/../views/appointments/appointments.php');

// Appel du footer
include(__DIR__ . '/../views/templates/footer.php');