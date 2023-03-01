<div class="container-fluid">
    <!-- Tableaux de tous les patients -->
    <table class="tablePatientList">
        <tr class="bgTh">
            <th class="">Nom</th>
            <th class="">Prénom</th>
            <th class="text-center">Email</th>
            <th class="text-center">Téléphone</th>
            <th class="text-center">Date de naissance</th>
            <th class="text-center"><i class="fa-solid fa-sliders"></i></th>
        </tr>
        <?php
        $nbLine = 1;
        foreach ($patients as $patient) {
        ?>
        <tr class="my-3 trPatient<?=($nbLine%2)+1?>">
                <td class=""><a href="/EditPatient?id=<?=$patient->id?>"><i class="fa-regular fa-user"></i></a><?=$patient->lastname?></td>
                <td class=""><a href="/EditPatient?id=<?=$patient->id?>"><i class="fa-regular fa-user"></i></a><?=$patient->firstname?></td>
                <td class="text-center"><a href="mailto:<?=$patient->email?>"><i class="fa-regular fa-envelope"></i></a></td>
                <td class="text-center"><a href="tel:<?=$patient->phone?>"><?=$patient->phone?></a></td>
                <td class="text-center"><?=datefmt_format(DATE_FORMAT, strtotime($patient->birthdate))?></td>
                <td class="text-center"><a href="/EditPatient?id=<?=$patient->id?>"><i class="fa-solid fa-pen"></i></a> &emsp; <a href="/DeletePatient?id=<?=$patient->id?>"><i class="fa-solid fa-trash"></i></a></td>
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