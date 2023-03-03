<?php
session_start();

// Appel des constantes
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../helpers/dd.php');

// Appel du model
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../models/Appointment.php');

try {


    // *VERIFICATIONS DES DONNEES DU FORMULAIRE 
    // *PUIS REDIRECTION SI DONNEES VALIDEES
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Si les données sont bien envoyées en POST

        // ?idPatients
        // Nettoyage de tout les caractères ASCII 1 à 32
        $idPatients = intval(filter_input(INPUT_POST, 'idPatients', FILTER_SANITIZE_NUMBER_INT));

        // Validation des données
        if (empty($idPatients)) { //Si $idPatients est vide
            $error['idPatients'] = 'Vous n\'avez pas renseigné de "Patient"'; // Message d'erreur $idPatients vide
        } elseif (!filter_var($idPatients, FILTER_VALIDATE_INT)) { //Sinon si $idPatients ne correspond pas à un format int
            $error['idPatients'] = 'le nom du patient ne correspond pas au format requis pour un patient'; //Message d'erreur idPatients format
        }
        
        // ?dateHour
        // Nettoyage de tout les caractères ASCII 1 à 32
        $dateHour = trim(filter_input(INPUT_POST, 'appointment', FILTER_SANITIZE_SPECIAL_CHARS));

        // Validation des données
        if (empty($dateHour)) { //Si $dateHour est vide
            $error['dateHour'] = 'Vous n\'avez pas renseigné de "date de rendez-vous" !'; // Message d'erreur $dateHour vide
        } elseif (!filter_var($dateHour, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_APPOINTMENT . '/')))) { //Sinon si $dateHour ne correspond pas à un format datetime
            $error['dateHour'] = 'Date du rendez-vous ne correspond pas au format requis pour un rendez-vous !'; //Message d'erreur dateHour format
        } elseif (strtotime($dateHour) < strtotime('now')) {
            $error['dateHour'] = 'Date de rendez-vous antérieure à aujourd\'hui !';
        }

            // ?Compare with previous values and new values
        $appointment = Appointment::get(intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
        if ($appointment->dateHour != $dateHour && Appointment::isExist($dateHour)) {
            $error['appointment'] = 'Déjà un rendez-vous sur cette horaire';
        } 
var_dump($error);
        // ?No error -> redirect to home page
        if (empty($error)) { // Si aucune erreur après tous les nettoyages et les validations

            $appointment = new Appointment;
            $appointment->setId(intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
            $appointment->setIdPatients($idPatients);
            $appointment->setdateHour($dateHour);
            // Vérification que le patient existe pas déja 
            // Ajouter du patient à la base de donnée & affecter le résultat de l'exécution de la requête à $result
            $result = $appointment->update();
            if (!$result) { //Si une erreur est survenu pendant l'ajout à la base de données
                echo 'message d\'erreur ! (A MODIFIER !)';
            } else { //Si pas d'erreur retour à la page d'Accueil
                header('location: /Accueil?appointmentUpdated=1');
                die;
            }
        } else {
            echo 'rendez-vous existe déjà ! (A MODIFIER !)';
        }

        // End if ($_SERVER['REQUEST_METHOD'] == 'POST')
    }

    // Récupère l'ID du patient passé en get
    $idAppointment = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $appointment = Appointment::get($idAppointment);
    var_dump($appointment);die;
    (!$appointment) ? (throw new Exception('Le rendez-vous n\'existe pas', 1)) : '' ;
    $idPatientAppointment = $appointment->idPatients;
    $dateAppointment = $appointment->dateHour;
    
    $patients = Patient::getPatientsList();
} catch (\Throwable $th) {
    $th->getMessage();
    include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/templates/errors.php');
    include(__DIR__ . '/../views/templates/footer.php');
    die;
}



// Appel du header
include(__DIR__ . '/../views/templates/header.php');

// Appel de la view
include(__DIR__ . '/../views/appointments/editAppointment.php');

// Appel du footer
include(__DIR__ . '/../views/templates/footer.php');

