<?php
require_once(__DIR__ . '/../../models/Database.php');
require_once(__DIR__ . '/../../models/Patient.php');

if (isset($_POST['input'])) {
    $input = trim(filter_input(INPUT_POST, 'input', FILTER_SANITIZE_SPECIAL_CHARS));

    $patientsSearch = Patient::getPatientSearch($input);

    if (count($patientsSearch) > 0) { 
        
       $patientsSearchJson =  json_encode($patientsSearch);
       echo $patientsSearchJson;
    } else { 
        // $patients = Patient::getPatientsList();
    false; }
}
