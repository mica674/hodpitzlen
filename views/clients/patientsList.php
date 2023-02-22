<div class="container-fluid">
    <!-- Tableaux de tous les patients -->
    <table class="tablePatientList">
        <tr class="bgTh text-center">
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Date de naissance</th>
            <th>Actions</th>
        </tr>
        <?php
        $nbLine = 1;
        foreach ($patients as $patient) {
        ?>
        <tr class="my-3 trPatient<?=($nbLine%2)+1?> text-center">
                <td><?=$patient->lastname?></td>
                <td><?=$patient->firstname?></td>
                <td><a href="mailto:<?=$patient->email?>"><?=$patient->email?></a></td>
                <td><a href="tel:<?=$patient->phone?>"><?=$patient->phone?></a></td>
                <td><?=datefmt_format(DATE_FORMAT, strtotime($patient->birthdate))?></td>
                <td><a href="/EditPatient?id=<?=$patient->id?>&lastname=<?=$patient->lastname?>&firstname=<?=$patient->firstname?>&email=<?=$patient->email?>&birthdate=<?=$patient->birthdate?>">Modifier</a></td>
        </tr>
        
        <?php
        $nbLine++;
        }
        ?>
    </table>
    <div class="bg-transparent d-flex my-3">
        <a href="/controllers/addPatientCtrl.php" class="mx-auto text-white addBtn">Ajouter un patient</a>
    </div>
</div>