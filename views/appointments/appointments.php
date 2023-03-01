<div class="container-fluid">
    <!-- Tableaux de tous les patients -->
    <table class="tablePatientList">
        <tr class="bgTh">
            <th class="text-center">Rendez-vous</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th class="text-center">Email</th>
            <th class="text-center">Téléphone</th>
            <th class="text-center"><i class="fa-solid fa-sliders"></i></th>
        </tr>
        <?php
        $nbLine = 1;
        foreach ($appointments as $appointment) {
        ?>
        <tr class="my-3 trAppointment<?=($nbLine%2)+1?> ">
                <td class="tdAppointment text-center"><?=datefmt_format(DATE_FORMAT_HOUR, strtotime($appointment->dateHour))?></td>
                <td class="tdAppointment tdName"><a href="/EditPatient?id=<?=$appointment->idP?>"><i class="fa-regular fa-user"></i></a> <?=$appointment->lastname?></td>
                <td class="tdAppointment tdName"><a href="/EditPatient?id=<?=$appointment->idP?>"><i class="fa-regular fa-user"></i></a> <?=$appointment->firstname?></td>
                <td class="tdAppointment text-center"><a href="mailto:<?=$appointment->email?>"><i class="fa-regular fa-envelope"></i></a></td>
                <td class="tdAppointment text-center"><a href="tel:<?=$appointment->phone?>"><?=$appointment->phone?></a></td>
                <td class="tdAppointment text-center"><a href="/EditAppointment?id=<?=$appointment->id?>"><i class="fa-solid fa-pen"></i></a> &emsp; <a href="/DeleteAppointment?id=<?=$appointment->id?>"><i class="fa-solid fa-trash"></i></a></td>
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