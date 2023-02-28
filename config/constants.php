<?php 

// CONSTANTES

// Données de connexion à la base de données
// Langage de la base de données, nom de la base de données et adresse de l'hote
define('DB_DSN', 'mysql:dbname=hospitale2n;host=127.0.0.1');
// Nom de l'utilisateur ayant les droits administrateur sur la base de données
define('DB_USER', 'ouioui');
// Mot de passe de cet utilisateur
define('DB_PASSWORD', 'ouiOUI123&');

// Définir le fuseau horaire
date_default_timezone_set('Europe/Paris');

// Formattage de date YY-mm-dd en dd MMMM YYYY
$dayMonthYearFormatStringFr = new IntlDateFormatter(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN,
    'dd MMMM yyyy'
);
define('DATE_FORMAT', $dayMonthYearFormatStringFr);

// Formattage de date YY-mm-dd en dd MMMM YYYY
$dayMonthYearHourMinFormatStringFr = new IntlDateFormatter(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN,
    "dd MMMM yyyy HH'h'mm"
);
define('DATE_FORMAT_HOUR', $dayMonthYearHourMinFormatStringFr);

// REGEX
    // Lastname
    define('REGEXP_LASTNAME',       '^([a-zA-ZàáâäãåčćèéêëėìíîïńòóôöõøùúûüūÿýżźñçčšžÀÁÂÄÃÅĆČĖÈÉÊËÌÍÎÏŃÒÓÔÖÕØÙÚÛÜŪŸÝŻŹÑÇŒÆČŠŽ\' \-]{1,24})$');
    // Firstname
    define('REGEXP_FIRSTNAME',      '^([a-zA-ZàáâäãåčćèéêëėìíîïńòóôöõøùúûüūÿýżźñçčšžÀÁÂÄÃÅĆČĖÈÉÊËÌÍÎÏŃÒÓÔÖÕØÙÚÛÜŪŸÝŻŹÑÇŒÆČŠŽ\' \-]{1,24})$');
    // Phone number
    define('REGEXP_PHONE_NUMBER',   '^(0[1-9]{1})(\d{8})$');
    // Birthday
    define('REGEXP_BIRTHDATE',      '^((18[5-9]\d|19\d{2}|20[01]\d|202[1-3])\-(0[1-9]|1[0-2])\-(0[1-9]|[12][0-9]|3[01]))$');
    // Appointment  
    define('REGEXP_APPOINTMENT',    '^((202[3-9])\-(0[1-9]|1[0-2])\-(0[1-9]|[12][0-9]|3[01])T(09|1[0-8]):(00|15|30|45))$');

