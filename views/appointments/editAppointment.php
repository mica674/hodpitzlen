<!-- MAIN -->
<main>
    <!-- Add form -->
    <div class="mt-2">
        <form method="post" class="d-flex flex-column align-items-center" id="registrationForm">
            <fieldset class="loginFieldset"><h2>Détails du rendez-vous</h2></fieldset>
            <!-- Patient -->
            <label for="patient" class="mt-2">Patient</label>
            <select name="idPatients" id="patient" required>
                <?php
                foreach ($patients as $patient) {?>
                    <option value="<?=$patient->id?>" <?=($patient->id == $idPatientAppointment)?'Selected':''?>><?=$patient->lastname . '--' . $patient->firstname . '--' . $patient->email?></option>
                    <?php }?>
            </select>
            <small <?= ($error['patient'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['patient'] ?? '' ?></small>
            <!-- Rendez-vous -->
            <label for="appointment" class="mt-2">Rendez-vous</label>
            <input type="datetime-local" name="appointment" id="appointment" class="inputForm" required value="<?=$dateAppointment?>" min="<?=date('Y-m-d\TH:00')?>" step="900">
            <small <?= ($error['appointment'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['appointment'] ?? '' ?></small>

            <!-- Required fields informations -->
            <small class="registrationSmall mt-3">* Champs obligatoires pour ajouter un rendez-vous</small>

            <!-- Button to registrer -->
            <div class="registrationBtns mt-2">
                <button class="registrationBtn" id="registrerBtn">Enregistrer</button>
            </div>

        </form>
    </div>
</main>
<!-- MAIN end -->
