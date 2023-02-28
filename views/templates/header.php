
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Link to BOOTSTRAP MIN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- Link to header.css, footer.css, 'special'.css & mediaQueries -->
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title>Hopital 2N</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/index.php">
                    <h1>Hopital 2N</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-auto ">
                        <li class="nav-item">
                            <a class="nav-link" href="/Accueil">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/AddPatient">Ajout patient</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/PatientsList">Liste des patients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/AddAppointment">Prendre un rendez-vous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/AppointmentsList">Liste des rendez-vous</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAVBAR end -->
    </header>
    <!-- HEADER end -->
