<?php
require_once(__DIR__ . '/../../models/Database.php');
require_once(__DIR__ . '/../../models/Patient.php');
if (isset($_POST['input'])) {
        $input = trim(filter_input(INPUT_POST, 'input', FILTER_SANITIZE_SPECIAL_CHARS))??'';
    $patientsPagination = Patient::getPatientSearch($input, 0);

    if (count($patientsPagination) > 0) {
        $patientsPaginationJson =  json_encode($patientsPagination);
        echo $patientsPaginationJson;
    } else {
        false;
    }
}
