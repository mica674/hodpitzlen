<?php

// Appel des constantes
require_once(__DIR__ . '/../config/constants.php');

// Appel du model
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../models/Appointment.php');
$appointments = Appointment::getAll();

// Appel du header
include(__DIR__ . '/../views/templates/header.php');

// Appel de la view
include(__DIR__ . '/../views/appointments/appointments.php');

// Appel du footer
include(__DIR__ . '/../views/templates/footer.php');