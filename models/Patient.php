<?php

require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../models/Database.php');


class Patient
{
    private int $id;
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $phone;
    private string $birthdate;

    // METHODES

    // ID
    //getter
    /**
     * Cette méthode retourne la valeur de l'ID du patient
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    //setter
    /**
     * Cette méthode hydrate l'ID du patient
     * @param int $id
     * 
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    // LASTNAME
    //getter
    /**
     * Cette méthode retourne la valeur de LASTNAME du patient
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    //setter
    /**
     * Cette méthode hydrate LASTNAME du patient
     * @param string $lastname
     * 
     * @return void
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    // FIRSTNAME
    //getter
    /**
     * Cette méthode retourne la valeur de FIRSTNAME du patient
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    //setter
    /**
     * Cette méthode hydrate FIRSTNAME du patient
     * @param string $firstname
     * 
     * @return void
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    // EMAIL
    //getter
    /**
     * Cette méthode retourne la valeur de EMAIL du patient
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    //setter
    /**
     * Cette méthode hydrate EMAIL du patient
     * @param string $email
     * 
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    // PHONE
    //getter
    /**
     * Cette méthode retourne la valeur de EMAIL du patient
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    //setter
    /**
     * Cette méthode hydrate EMAIL du patient
     * @param string $phone
     * 
     * @return void
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    // BIRTHDATE
    //getter
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    //setter
    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    // OTHERS
    // Ajouter un patient à la base de données
    /**
     * Cette fonction permet d'ajouter un patient à la base données.
     * Elle attend 5 paramètres en entrées (format string) et return un booleen true si tout s'est bien passé
     * 
     * @param string $lastname
     * @param string $firstname
     * @param string $email
     * @param string $phone
     * @param string $birthdate
     * 
     * @return bool
     */
    public function add(): bool
    {
        if (!isset($db)) {
            $db = dbConnect();
        }
        $sql = 'INSERT INTO `patients` (`lastname`, `firstname`, `mail`, `phone`, `birthdate`) 
                VALUES (:lastname, :firstname, :email, :phone, :birthdate);';

        $sth = $db->prepare($sql);
        $sth->bindValue(':lastname',    $this->lastname,    PDO::PARAM_STR);
        $sth->bindValue(':firstname',   $this->firstname,   PDO::PARAM_STR);
        $sth->bindValue(':email',       $this->email,       PDO::PARAM_STR);
        $sth->bindValue(':phone',       $this->phone,       PDO::PARAM_STR);
        $sth->bindValue(':birthdate',   $this->birthdate,   PDO::PARAM_STR);

        return $sth->execute();
    }

    public function update(): bool
    {
        if (!isset($db)) {
            $db = dbConnect();
        }
        $sql =  'UPDATE `patients`
                SET `lastname`  =   :lastname,
                    `firstname` =   :firstname,
                    `mail`      =   :email,
                    `birthdate` =   :birthdate,
                    `phone`     =   :phone
                WHERE `id`      =   :id
                ;';

        $sth = $db->prepare($sql);
        $sth->bindValue(':lastname',    $this->lastname,    PDO::PARAM_STR);
        $sth->bindValue(':firstname',   $this->firstname,   PDO::PARAM_STR);
        $sth->bindValue(':email',       $this->email,       PDO::PARAM_STR);
        $sth->bindValue(':birthdate',   $this->birthdate,   PDO::PARAM_STR);
        $sth->bindValue(':phone',       $this->phone,       PDO::PARAM_STR);
        $sth->bindValue(':id',          $this->id,          PDO::PARAM_STR);

        return $sth->execute();
    }

    public static function isNotExist($lastname, $firstname, $email, $birthdate): bool
    {
        if (!isset($db)) {
            $db = dbConnect();
        }
        $sql = "SELECT `lastname`, `firstname`, `mail` AS `email`, `birthdate`
                FROM `patients`
                WHERE   `lastname`  =   '$lastname'
                    AND `firstname` =   '$firstname'
                    AND `mail`     =   '$email'
                    AND `birthdate` =   '$birthdate'
                ;";
        $sth = $db->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return empty($result) ? true : false;
    }

    public function getPatient($id):void
    {
        if (!isset($db)) {
            $db = dbConnect();
        }
        $sql = 'SELECT `id`, `lastname`, `firstname`, `mail` AS `email`, `phone`, `birthdate` FROM `patients` WHERE `id` = ' . $id . ';';
        $sth = $db->prepare($sql);
        $sth->execute();
        $result = $sth->fetch();
        $this->setLastname($result->lastname);
        $this->setFirstname($result->firstname);
        $this->setEmail($result->email);
        $this->setPhone($result->phone);
        $this->setBirthdate($result->birthdate);
    }

    // Lister tous les patients de la base de données
    /**
     * Cette fonction permet de retourner la liste de tous les patients avec toutes leurs informations.
     * @return array
     */
    public static function getPatientsList(): array
    {
        if (!isset($db)) {
            $db = dbConnect();
        }
        $sql = 'SELECT `id`, `lastname`, `firstname`, `mail` AS `email`, `phone`, `birthdate` FROM patients;';
        $sth = $db->query($sql);
        $result = $sth->fetchAll();
        return $result;
    }
}


// Fonctions