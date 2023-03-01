<?php
session_start();

// Appel des constantes
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../helpers/dd.php');

// Appel du model
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../models/Appointment.php');

// *VERIFICATIONS DES DONNEES DU FORMULAIRE 
// *PUIS REDIRECTION SI DONNEES VALIDEES
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Si les données sont bien envoyées en POST

    // ?LASTNAME
    // Nettoyage de tout les caractères ASCII 1 à 32
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));

    // Validation des données
    if (empty($lastname)) { //Si $lastname est vide
        $error['lastname'] = 'Vous n\'avez pas renseigné votre "Nom"'; // Message d'erreur lastname vide
    } elseif (!filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_LASTNAME . '/')))) { //Sinon si $lastname ne correspond pas à un format lastname
        $error['lastname'] = 'Le nom ne correspond pas au format requis pour un nom'; //Message d'erreur lastname format
    }
    if (empty($error['lastname'])) {
        $lastname = ucfirst(strtolower($lastname));
    }

    // ?FIRSTNAME
    // Nettoyage de tout les caractères ASCII 1 à 32
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));

    // Validation des données
    if (empty($firstname)) { //Si $firstname est vide
        $error['firstname'] = 'Vous n\'avez pas renseigné votre "Prénom"'; // Message d'erreur firstname vide
    } elseif (!filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_FIRSTNAME . '/')))) { //Sinon si $firstname ne correspond pas à un format firstname
        $error['firstname'] = 'Le prénom ne correspond pas au format requis pour un prénom'; //Message d'erreur firstname format
    }
    if (empty($error['firstname'])) {
        $firstname = ucfirst(strtolower($firstname));
    }

    $idPatient = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    if (!Patient::isIdExist($idPatient)) {
        header('Location: /PatientsList?exist=false');
        die;
    }

    // ?No error -> delete appointment
    if (empty($error)) { // Si aucune erreur après tous les nettoyages et les validations
        $patient = Patient::getPatient($idPatient);

        if ($lastname == $patient->lastname && $firstname == $patient->firstname) {
            $deleteOK = true;
        } else {
            $deleteOK = false;
        }
    }
}

try {
    if (!isset($patient)) {
        $idPatient = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        if (!Patient::isIdExist($idPatient)) {
            header('Location: /AppointmentsList?exist=false');
            die;
        } else {
            $patient = Patient::getPatient($idPatient);
        }
    }

    if ($deleteOK ?? false) {
        if (!Patient::isIdExist($idPatient)) {
            header('Location: /PatientsList?exist=false');
            die;
        } else {
            $deleted = Patient::delete($idPatient);
            if ($deleted || !Patient::isIdExist($idPatient)) {
                header('Location: /PatientsList?deleted=true');
                die;
            }
        }

        // if (Appointment::isAptExist($idPatient)) {
        //     $deletedApt = Appointment::deleteAll($idPatient);
        // }
        // if (!Appointment::isAptExist($idPatient)) {
        //     if (!Patient::isIdExist($idPatient)) {
        //         header('Location: /PatientsList?exist=false');
        //         die;
        //     }else {
        //         $deleted = Patient::delete($idPatient);
        //         if ($deleted) {
        //             header('Location: /PatientsList?deleted=true');
        //             die;
        //         }
        //     }
        // }
    }
} catch (\Throwable $th) {
    include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/templates/errors.php');
    include(__DIR__ . '/../views/templates/footer.php');
    die;
}

// Appel du model
require_once(__DIR__ . '/../models/Appointment.php');


// Appel du header
include(__DIR__ . '/../views/templates/header.php');

// Appel de la view
include(__DIR__ . '/../views/clients/deletePatient.php');

// Appel du footer
include(__DIR__ . '/../views/templates/footer.php');
