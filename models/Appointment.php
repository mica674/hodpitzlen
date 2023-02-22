<?php

require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../models/Database.php');

class Appointment extends Patient
{
    private int $id;
    private string $dateHour;
    private int $idPatients;

    // METHODES
    // ID
    //getter
    /**
     * Cette méthode retourne la valeur de l'ID du rendez-vous
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    //setter
    /**
     * Cette méthode hydrate l'ID du rendez-vous
     * @param int $id
     * 
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    // DATEHOUR
    //getter
    /**
     * Cette méthode retourne la valeur de le dateHour du rendez-vous
     * @return string
     */
    public function getDateHour(): string
    {
        return $this->dateHour;
    }

    //setter
    /**
     * Cette méthode hydrate le dateHour du rendez-vous
     * @param string $dateHour
     * 
     * @return void
     */
    public function setdateHour(string $dateHour): void
    {
        $this->dateHour = $dateHour;
    }

    // ID PATIENTS
    //getter
    /**
     * Cette méthode retourne la valeur de le idPatients du rendez-vous
     * @return string
     */
    public function getIdPatients(): string
    {
        return $this->idPatients;
    }

    //setter
    /**
     * Cette méthode hydrate le idPatients du rendez-vous
     * @param string $idPatients
     * 
     * @return void
     */
    public function setIdPatients(string $idPatients): void
    {
        $this->idPatients = $idPatients;
    }
}
