<div class="container-fluid">
    <!-- Champ de recherche -->
    <div class="container d-flex align-items-center justify-content-end me-3">
        <p id="nbResults" class="m-0"></p>
        <select name="itemsPerPage" id="itemsPerPage" class="liveSearch mx-3">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <input type="text" class="form-control liveSearch" id="live_search" autocomplete="off" placeholder="Recherche ...">
    </div>
    <!-- Tableaux de tous les patients -->
    <table class="tablePatientList mt-1">
        <thead>
            <tr class="bgTh">
                <th class="">Nom</th>
                <th class="">Prénom</th>
                <th class="text-center">Email</th>
                <th class="text-center">Téléphone</th>
                <th class="text-center d-none d-sm-table-cell">Date de naissance</th>
                <th class="text-center"><i class="fa-solid fa-sliders"></i></th>
            </tr>
            <tr>
                <div class="bg-transparent my-3" id="searchNoResult"></div>
            </tr>
        </thead>
        <tbody id="patientsList">
            <?php
            $nbLine = 1;
            foreach ($patients as $patient) {
            ?>
                <tr class="my-3 trPatient<?= ($nbLine % 2) + 1 ?>">
                    <td class=""><a href="/EditPatient?id=<?= $patient->id ?>"><i class="fa-regular fa-user"></i></a> <?= $patient->lastname ?></td>
                    <td class=""><a href="/EditPatient?id=<?= $patient->id ?>"><i class="fa-regular fa-user"></i></a> <?= $patient->firstname ?></td>
                    <td class="text-center"><a href="mailto:<?= $patient->email ?>"><i class="fa-regular fa-envelope"></i></a></td>
                    <td class="text-center"><a href="tel:<?= $patient->phone ?>"><?= $patient->phone ?></a></td>
                    <td class="text-center d-none d-sm-table-cell"><?= datefmt_format(DATE_FORMAT, strtotime($patient->birthdate)) ?></td>
                    <td class="text-center"><a href="/EditPatient?id=<?= $patient->id ?>"><i class="fa-solid fa-pen"></i></a> &emsp; <a href="/DeletePatient?id=<?= $patient->id ?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            <?php
                $nbLine++;
            }
            ?>
        </tbody>
        <!-- Le résultat de la recherche va s'afficher dans la div suivante
        et si aucune recherche n'est faite la liste complète des patients s'affiche -->
        <tbody id="searchResult">
        </tbody>
    </table>
    <div class="pagination d-flex justify-content-between w-25">
        <button class="bg-transparent border-0 text-white">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <label for="numeroPage">page</label>
        <input type="text" id="numeroPage" class="liveSearch" name="numeroPage" value="1">
        <p>/</p>
        <input type="text" id="numeroPageMax" value="1" disabled>
        <button class="bg-transparent border-0 text-white">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>


    <div class="bg-transparent d-flex my-3">
        <a href="/controllers/addPatientCtrl.php" class="mx-auto text-white addBtn">Ajouter un patient</a>
    </div>

</div>