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


    // ADD
        /**
     * Cette fonction permet d'ajouter un rendez-vous à la base données.
     * Elle attend 5 paramètres en entrées (format string) et return un booleen true si tout s'est bien passé
     * 
     * 
     * @return bool
     */
    public function add(): bool
    {
        if (!isset($db)) {
            $db = dbConnect();
        }
        $sql = 'INSERT INTO `appointments` (`dateHour`, `idPatients`) 
                VALUES (:dateHour, :idPatients)
                ;';

        $sth = $db->prepare($sql);
        $sth->bindValue(':dateHour',    $this->dateHour,    PDO::PARAM_STR);
        $sth->bindValue(':idPatients',  $this->idPatients,  PDO::PARAM_STR);
        
        $sth->execute();

        // Compter le nombre d'enregistrements affecter par la requête
        $nbResults = $sth->rowCount();
        // Retourner l'état de l'opération (true si tout s'est bien passé, sinon false)
        return !empty($nbResults);
    }

    // UPDATE
        /**
     * Cette fonction permet de modifier un rendez-vous dans la base données.
     * Elle attend aucun paramètre d'entrée et return un booleen true si tout s'est bien passé
     * 
     * 
     * @return bool
     */
    public function update(): bool
    {
        if (!isset($db)) {
            $db = dbConnect();
        }
        $sql = 'UPDATE `appointments`
                SET `dateHour` = :dateHour,
                    `idPatients` = :idPatients
                WHERE `id` = :id;
                ;';

        $sth = $db->prepare($sql);
        $sth->bindValue(':dateHour',    $this->dateHour,    PDO::PARAM_STR);
        $sth->bindValue(':idPatients',  $this->idPatients,  PDO::PARAM_STR);
        $sth->bindValue(':id',          $this->id,          PDO::PARAM_STR);
        $sth->execute();

        // Compter le nombre d'enregistrements affecter par la requête
        $nbResults = $sth->rowCount();
        // Retourner l'état de l'opération (true si tout s'est bien passé, sinon false)
        return !empty($nbResults);
    }

    // DELETE
        /**
     * Cette fonction permet de supprimer un rendez-vous dans la base données.
     * Elle attend un paramètre d'entrée id du rdv à supprimer (format int)
     * 
     * 
     * @return bool
     */
    public static function delete($idAppointment): bool
    {
        if (!isset($db)) {
            $db = dbConnect();
        }
        $sql = 'DELETE
                FROM `appointments`
                WHERE `id` = :id;
                ;';

        $sth = $db->prepare($sql);
        $sth->bindValue(':id', $idAppointment, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return !empty($result);
    }
    
    // DELETE ALL
        /**
     * Cette fonction permet de supprimer tous les rendez-vous d'un patient dans la base données.
     * Elle attend un paramètre d'entrée, l'id du patient pour supprimer ses rendez-vous (format int)
     * 
     * 
     * @return bool
     */
    public static function deleteAll($idPatient): bool
    {
        if (!isset($db)) {
            $db = dbConnect();
        }
        $sql = 'DELETE
                FROM `appointments`
                WHERE `idPatients` = :idPatient;
                ;';

        $sth = $db->prepare($sql);
        $sth->bindValue(':idPatient', $idPatient, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return !empty($result);
    }

    // IS NOT EXIST
    public static function isExist($dateHour): bool
    {
        if (!isset($db)) {
            $db = dbConnect();
        }
        $sql = "SELECT `dateHour`, `idPatients`
                FROM `appointments`
                WHERE   `dateHour`  =   '$dateHour'
                    ;";
        $sth = $db->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return !empty($result);
    }
    
    // IS ID EXIST
    public static function isIdExist($idAppointment): bool
    {
        if (!isset($db)) {
            $db = dbConnect();
        }
        $sql = "SELECT `dateHour`, `idPatients`
                FROM `appointments`
                WHERE   `id`  =   :idAppointment
                ;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':idAppointment', $idAppointment, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return !empty($result);
    }
 
    // IS APPOINTMENT EXIST
    public static function isAptExist($idPatient): bool
    {
        if (!isset($db)) {
            $db = dbConnect();
        }
        $sql = "SELECT `idPatients`
                FROM `appointments`
                WHERE   `idPatients`  =   :idPatient
                ;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':idPatient', $idPatient, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();
        return !empty($result);
    }


        // Lister tous les rendez-vous des patients de la base de données
    /**
     * Cette fonction permet de retourner la liste de tous les rendez-vous des patients avec leurs informations.
     * @return array|false
     */
    public static function getAll($id = false): array|false
    {
        if (!isset($db)) {
            $db = dbConnect();
        }
        if (!$id) {
            $sql = 'SELECT `rdv`.`id`, `dateHour`, `rdv`.`idPatients` AS `idP`, `p`.`lastname`, `p`.`firstname`, `p`.`mail` AS `email`, `p`.`phone`
            FROM `appointments` AS `rdv`
            JOIN `patients` AS `p`
            ON `rdv`.`idPatients` = `p`.`id`
            ORDER BY `dateHour`, `p`.`lastname`;';
        }else{
            $sql = 'SELECT `rdv`.`id`, `dateHour`, `rdv`.`idPatients` AS `idP`, `p`.`lastname`, `p`.`firstname`, `p`.`mail` AS `email`, `p`.`phone`
                    FROM `appointments` AS `rdv`
                    JOIN `patients` AS `p`
                    ON `idPatients` = `p`.`id`
                    WHERE `idPatients` = '.$id.';';
        } 
        $sth = $db->query($sql);
        $result = $sth->fetchAll();
        return $result;
    }


    public static function get($idAppt):object|false{
        if (!isset($db)) {
            $db = dbConnect();
        }
        $sql = 'SELECT `id`, `dateHour`, `idPatients`
                FROM `appointments`
                WHERE `id` = :id;';
        $sth = $db->prepare($sql);
        $sth->bindValue(':id', $idAppt, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }

}
