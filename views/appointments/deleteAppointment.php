<!-- MAIN -->
<main>
    <!-- Add form -->
    <div class="mt-2">
        <form method="post" class="d-flex flex-column align-items-center" id="registrationForm">
            <fieldset class="loginFieldset">
                <h2>Suppression du rendez-vous</h2>
            </fieldset>
            <!-- Patient -->
            <label for="patient" class="mt-2">Patient</label>
            <input type="text" value="<?= $patient->lastname . ' ' . $patient->firstname ?>" readonly>
            <small <?= ($error['patient'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['patient'] ?? '' ?></small>
            <!-- Rendez-vous -->
            <label for="appointment" class="mt-2">Rendez-vous</label>
            <input type="datetime-local" name="appointment" id="appointment" class="inputForm" required value="<?= $dateAppointment ?>" min="<?= date('Y-m-d\TH:00') ?>" readonly>
            <small <?= ($error['appointment'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['appointment'] ?? '' ?></small>


            <h2>Renseigner le nom et prénom du patient pour confirmer la suppression</h2>
            <!-- Lastname -->
            <label for="lastname" class="mt-2">Nom <span class="registrationRequired">*</span></label>
            <input type="text" name="lastname" id="lastname" class="inputForm" placeholder="<?=$patient->lastname?>" required pattern="<?= REGEXP_LASTNAME ?>">
            <small <?= ($error['lastname'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['lastname'] ?? '' ?></small>

            <!-- Firstname -->
            <label for="firstname" class="mt-2">Prénom <span class="registrationRequired">*</span></label>
            <input type="text" name="firstname" id="firstname" class="inputForm" placeholder="<?=$patient->firstname?>" required pattern="<?= REGEXP_FIRSTNAME ?>">
            <small <?= ($error['firstname'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['firstname'] ?? '' ?></small>

            <!-- Required fields informations -->
            <small class="registrationSmall mt-3">* Champs obligatoires pour supprimer le rendez-vous</small>

            <!-- Button to delete -->
            <div class="registrationBtns mt-2">
                <button class="registrationBtn" id="registrerBtn">Supprimer</button>
            </div>

        </form>
    </div>
</main>
<!-- MAIN end -->