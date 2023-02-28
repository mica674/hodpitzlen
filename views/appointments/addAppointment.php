<!-- MAIN -->
<main>
    <!-- Add form -->
    <div class="mt-2">
        <form method="post" class="d-flex flex-column align-items-center" id="registrationForm">
            <fieldset class="loginFieldset"><h2>Ajout d'un rendez-vous</h2></fieldset>
            <!-- Patient -->
            <label for="patient" class="mt-2">Patient <span class="registrationRequired">*</span></label>
            <select name="idPatients" id="patient" required>
                <?php
                foreach ($patients as $patient) {?>
                    <option value="<?=$patient->id?>"><?=$patient->lastname . '--' . $patient->firstname . '--' . $patient->email?></option>
                    <?php }?>
                    <option value="0" selected>--Choisir un patient--</option>
            </select>
            <small <?= ($error['patient'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['patient'] ?? '' ?></small>
            <!-- Rendez-vous -->
            <label for="appointment" class="mt-2">Rendez-vous <span class="registrationRequired">*</span></label>
            <input type="datetime-local" name="appointment" id="appointment" class="inputForm" required value="<?=date('Y-m-d\TH:i')?>" min="<?=date('Y-m-d\TH:i')?>" step="900">
            <small <?= ($error['appointment'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['appointment'] ?? '' ?></small>

            <!-- Required fields informations -->
            <small class="registrationSmall mt-3">* Champs obligatoires pour ajouter un rendez-vous</small>

            <!-- Button to registrer -->
            <div class="registrationBtns mt-2">
                <button class="registrationBtn" id="registrerBtn">Ajouter</button>
            </div>

            <!-- Already Registered -->
            <!-- <a href="/controllers/loginCtrl.php" class="alreadyRegistered text-decoration-none mt-2" id="alreadyRegistered">Déjà inscrit ?</a> -->
        </form>
    </div>
</main>
<!-- MAIN end -->
