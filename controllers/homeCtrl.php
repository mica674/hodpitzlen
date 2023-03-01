<?php
session_start();

// Appel des constantes
require_once(__DIR__ . '/../config/constants.php');

// Appel de la fonction flash
require_once(__DIR__ . '/../helpers/flash.php');

// Appel du model
require_once(__DIR__ . '/../models/Patient.php');

// *PATIENT
// Message si un patient vient d'être ajouté
flash('patientAdded');

// Message si un patient vient d'être ajouté
if ($_GET['patientUpdated']??'' == 1) {
    echo 'Le patient a été modifié avec succès félicitations, excellente journée à vous !';
}

// *RENDEZ VOUS
// Message si un rendez-vous vient d'être ajouté
if ($_GET['appointment']??'' == 1) {
    echo 'Le rendez-vous a été ajouté avec succès félicitations, excellente journée à vous !';
}
// Message si un rendez-vous vient d'être modifié
if ($_GET['appointmentUpdated']??'' == 1) {
    echo 'Le rendez-vous a été modifié avec succès félicitations, excellente journée à vous !';
}

// Appel du header
require_once(__DIR__ . '/../views/templates/header.php');

// Appel de la vue home
require_once(__DIR__ . '/../views/home.php');

// Appel du footer
require_once(__DIR__ . '/../views/templates/footer.php');