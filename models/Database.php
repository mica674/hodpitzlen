<?php
require_once(__DIR__ . '/../config/constants.php');

function dbConnect()
{
    $db = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $sql = 'ALTER TABLE `appointments` 
            DROP FOREIGN KEY `FK_appointments_id_patients`; 
    
            ALTER TABLE `appointments` 
            ADD CONSTRAINT `FK_appointments_id_patients` 
            FOREIGN KEY (`idPatients`) 
            REFERENCES `patients`(`id`) 
            ON DELETE CASCADE ON UPDATE RESTRICT;';
    $db->query($sql);

    return $db;
}
