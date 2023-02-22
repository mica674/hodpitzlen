<!-- <div class="col-12 col-lg-4 m-2 customerContainer text-center">
    <div class="card text-white bg-transparent mb-3">
        <div class="card-header"><?= $patient->getLastname() . ' ' . $patient->getFirstname() ?></div>
        <div class="card-body">
            <h4 class="card-title"></h4>
            <p class="card-text">
            <ul>
                <li><?= $patient->getEmail() ?></li>
                <li><?= $patient->getPhone() ?></li>
                <li><?= datefmt_format(DATE_FORMAT, strtotime($patient->getBirthdate())) ?></li>
            </ul>
            </p>
        </div>
    </div>
</div> -->

<!-- MAIN -->
<main>
    <!-- patient profil form -->
    <div class="mt-2">
        <form method="post" class="d-flex flex-column align-items-center" id="registrationForm">
            <fieldset class="loginFieldset"><h2>Profil du patient</h2></fieldset>
            <!-- Lastname -->
            <label for="lastname" class="mt-2">Nom</label>
            <input type="text" name="lastname" id="lastname" class="inputForm" placeholder="Nom (ex: Dupond)" required autocomplete="family-name" value="<?=$patient->GetLastname()?>" pattern="<?= REGEXP_LASTNAME ?>" readonly>
            <small <?= ($error['lastname'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['lastname'] ?? '' ?></small>
            <!-- Firstname -->
            <label for="firstname" class="mt-2">Prénom</label>
            <input type="text" name="firstname" id="firstname" class="inputForm" placeholder="Prénom (ex: Jean)" required autocomplete="given-name" value="<?=$patient->getFirstname()?>" pattern="<?= REGEXP_FIRSTNAME ?>" readonly>
            <small <?= ($error['firstname'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['firstname'] ?? '' ?></small>
            <!-- Email -->
            <label for="email" class="mt-2">email</label>
            <input type="email" name="email" id="email" class="inputForm" placeholder="E-mail (ex: dupond.jean@example.com)" required autocomplete="email" value="<?=$patient->getEmail()?>" readonly>
            <small <?= ($error['email'] ?? false) ? 'class="text-danger"' : '' ?>><?= $error['email'] ?? '' ?></small>
            <!-- Phone number -->
            <label for="phone" class="mt-2">Numéro de téléphone</label>
            <input type="tel" name="phone" id="phone" class="inputForm" placeholder="Numéro de téléphone (ex: 0612345678)" autocomplete="tel-local" maxlength="10" value="<?=$patient->getPhone()??''?>" pattern="<?=REGEXP_PHONE_NUMBER?>" readonly>
            <!-- Birthday -->
            <label for="birthdate" class="mt-2">Date de naissance</label>
            <input type="date" name="birthdate" id="birthdate" class="inputForm" required autocomplete="bday" value="<?=$patient->getBirthdate()?>" min="<?=date('Y-m-d',time()-(86400*365*150))?>" max="<?=date('Y-m-d')?>" readonly>
            
            <!-- Button to registrer -->
            <div class="registrationBtns mt-2">
                <button class="modifyBtn d-none" id="modifyBtn">Enregistrer</button>
            </div>

        </form>
    </div>
</main>
<!-- MAIN end -->
