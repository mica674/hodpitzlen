<div class="container-fluid">
    <!-- Tableaux de tous les patients -->
    <table class="tablePatientList">
        <tr class="bgTh text-center">
            <th>#</th>
            <th>Rendez-vous</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Actions</th>
        </tr>
        <?php
        $nbLine = 1;
        foreach ($appointments as $appointment) {
        ?>
        <tr class="my-3 trAppointment<?=($nbLine%2)+1?> text-center">
                <td><?=$appointment->idP?></td>
                <td><?=datefmt_format(DATE_FORMAT_HOUR, strtotime($appointment->dateHour))?></td>
                <td><?=$appointment->lastname?></a></td>
                <td><?=$appointment->firstname?></a></td>
                <td><a href="mailto:<?=$appointment->email?>"><?=$appointment->email?></a></td>
                <td><a href="tel:<?=$appointment->phone?>"><?=$appointment->phone?></a></td>
                <td><a href="/EditAppointment?id=<?=$appointment->id?>">Modifier</a></td>
        </tr>
        
        <?php
        $nbLine++;
        }
        ?>
    </table>
    <div class="bg-transparent d-flex my-3">
        <a href="/controllers/addappointmentCtrl.php" class="mx-auto text-white addBtn">Ajouter un rendez-vous</a>
    </div>
</div>