<?php
require_once(__DIR__ . '/../../models/Database.php');
require_once(__DIR__ . '/../../models/Patient.php');

if (isset($_POST['input'])) {
    $input = trim(filter_input(INPUT_POST, 'input', FILTER_SANITIZE_SPECIAL_CHARS));

    $sql = "SELECT * FROM patients 
            WHERE lastname      LIKE '%{$input}%'
                OR firstname    LIKE '%{$input}%'
                OR mail         LIKE '%{$input}%'
                OR phone        LIKE '%{$input}%'
                OR birthdate    LIKE '%{$input}%'
            ORDER BY lastname
            LIMIT 10
            ";

    if (!isset($db)) {
        $db = dbConnect();
    }
    $sth = $db->query($sql);
    $nbresults = $sth->rowCount();
    $patientsSearch = $sth->fetchAll();

    if ($nbresults > 0) { ?>
    
                <?php
                $nbLine = 1;
                foreach ($patientsSearch as $patient) {
                ?>
                    <tr class="my-3 trPatient<?= ($nbLine % 2) + 1 ?>">
                        <td class=""><a href="/EditPatient?id=<?= $patient->id ?>"><i class="fa-regular fa-user"></i></a><?= $patient->lastname ?></td>
                        <td class=""><a href="/EditPatient?id=<?= $patient->id ?>"><i class="fa-regular fa-user"></i></a><?= $patient->firstname ?></td>
                        <td class="text-center"><a href="mailto:<?= $patient->mail ?>"><i class="fa-regular fa-envelope"></i></a></td>
                        <td class="text-center"><a href="tel:<?= $patient->phone ?>"><?= $patient->phone ?></a></td>
                        <td class="text-center"><?= datefmt_format(DATE_FORMAT, strtotime($patient->birthdate)) ?></td>
                        <td class="text-center"><a href="/EditPatient?id=<?= $patient->id ?>"><i class="fa-solid fa-pen"></i></a> &emsp; <a href="/DeletePatient?id=<?= $patient->id ?>"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php
                    $nbLine++;
                }
                ?>

    <?php
    } else { 
        // $patients = Patient::getPatientsList();
    ?>
        <h6 class="text-danger text-center mt-3">No data found</h6>

<?php }
}
