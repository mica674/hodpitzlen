<!-- MAIN -->
<main>
    <!-- Add form -->
    <div class="mt-2">
        <form method="post" class="d-flex flex-column align-items-center" id="registrationForm">
            <fieldset class="loginFieldset"><h2>Ajout d'un patient</h2></fieldset>
            <!-- Lastname -->
            <label for="lastname" class="mt-2">Nom <span class="registrationRequired">*</span></label>
            <input type="text" name="lastname" id="lastname" class="inputForm" placeholder="Nom (ex: Dupond)" required autocomplete="family-name" value="<?=$lastname??''?>" pattern="<?= REGEXP_LASTNAME ?>">
            <small <?= ($error['lastname'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['lastname'] ?? '' ?></small>
            <!-- Firstname -->
            <label for="firstname" class="mt-2">Prénom <span class="registrationRequired">*</span></label>
            <input type="text" name="firstname" id="firstname" class="inputForm" placeholder="Prénom (ex: Jean)" required autocomplete="given-name" value="<?=$firstname??''?>" pattern="<?= REGEXP_FIRSTNAME ?>">
            <small <?= ($error['firstname'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['firstname'] ?? '' ?></small>
            <!-- Email -->
            <label for="email" class="mt-2">email <span class="registrationRequired">*</span></label>
            <input type="email" name="email" id="email" class="inputForm" placeholder="E-mail (ex: dupond.jean@example.com)" required autocomplete="email" value="<?= $email ?? '' ?>">
            <small <?= ($error['email'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['email'] ?? '' ?></small>
            <!-- Phone number -->
            <label for="phone" class="mt-2">Numéro de téléphone</label>
            <input type="tel" name="phone" id="phone" class="inputForm" placeholder="Numéro de téléphone (ex: 0612345678)" autocomplete="tel-local" maxlength="10" value="<?=$phoneNumber??''?>" pattern="<?=REGEXP_PHONE_NUMBER?>">
            <!-- Birthday -->
            <label for="birthdate" class="mt-2">Date de naissance <span class="registrationRequired">*</span></label>
            <input type="date" name="birthdate" id="birthdate" class="inputForm" required autocomplete="bday" value="<?= $birthdate ?? '' ?>" min="<?=date('Y-m-d',time()-(86400*365*150))?>" max="<?=date('Y-m-d')?>">
            
            <!-- Required fields informations -->
            <small class="registrationSmall mt-3">* Champs obligatoires pour ajouter un patient</small>

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
