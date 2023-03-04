<?php
require_once(__DIR__ . '/../../models/Database.php');
require_once(__DIR__ . '/../../models/Patient.php');
if (isset($_POST['input'], $_POST['nbItems'], $_POST['numPage'])) {
        $input = trim(filter_input(INPUT_POST, 'input', FILTER_SANITIZE_SPECIAL_CHARS));
        $limit = intval(filter_input(INPUT_POST, 'nbItems', FILTER_SANITIZE_NUMBER_INT));
        $offset = (intval(filter_input(INPUT_POST, 'numPage', FILTER_SANITIZE_NUMBER_INT))-1)*$limit;
    $patientsSearch = Patient::getPatientSearch($input, $limit, $offset);

    if (count($patientsSearch) > 0) {
        $patientsSearchJson =  json_encode($patientsSearch);
        echo $patientsSearchJson;
    } else {
        false;
    }
}
