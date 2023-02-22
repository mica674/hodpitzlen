<?php
session_start();

// Appel des constantes
require_once(__DIR__ . '/../config/constants.php');

// Appel du model
require_once(__DIR__ . '/../models/Patient.php');

try {
    

    // *VERIFICATIONS DES DONNEES DU FORMULAIRE 
    // *PUIS REDIRECTION SI DONNEES VALIDEES
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Si les données sont bien envoyées en POST

                    // // ?No error -> redirect to home page
                    // if (empty($error) && Patient::isNotExist($lastname, $firstname, $email, $birthdate)) { // Si aucune erreur après tous les nettoyages et les validations
                        
                    //     $patient = new Patient();
                    //     $patient->setLastname($lastname);
                    //     $patient->setFirstname($firstname);
                    //     $patient->setEmail($email);
                    //     if (isset($phone)) {
                    //         $patient->setPhone($phone);
                    //     } else {
                    //         $patient->setPhone('');
                    //     }
                    //     $patient->setBirthdate($birthdate);
                    //     // Vérification que le patient existe pas déja avec la méthode notAlreadyExist()
                    //     // Ajouter du patient à la base de donnée & affecter le résultat de l'exécution de la requête à $result
                    //     $result = $patient->add();
                    //     if (!$result) { //Si une erreur est survenu pendant l'ajout à la base de données
                    //         echo 'message d\'erreur ! (A MODIFIER !)';
                    //     } else { //Si pas d'erreur retour à la page d'Accueil
                    //         header('location: /Accueil?patientAdded=1');
                    //         die;
                    //     }
                    // } else {
                    //     echo 'patient existe déjà ! (A MODIFIER !)';
                    // }
                    
    // End if ($_SERVER['REQUEST_METHOD'] == 'POST')
// }

} catch (\Throwable $th) {
    include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/templates/errors.php');
    include(__DIR__ . '/../views/templates/footer.php');
    die;
}

// Appel du model
require_once(__DIR__ . '/../models/Appointment.php');
// Récupère l'ID du patient passé en get
$patients    = Patient::getPatientsList();


// Appel du header
include(__DIR__ . '/../views/templates/header.php');

// Appel de la view
include(__DIR__ . '/../views/clients/addAppointment.php');

// Appel du footer
include(__DIR__ . '/../views/templates/footer.php');
