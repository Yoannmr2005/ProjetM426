<!--
     * Page modification d'une voiture
     * 
     * @projet librairie de véhicules à louer
     * @auteurs Maximilien, Kylian, Cléa, Yoan
     * @version 1.0.0
     * @date année 2022
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Modification d'une voiture</title>
    <link rel="stylesheet" href="vue/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vue/assets/css/Navbar-Centered-Brand-Dark-icons.css">
</head>

<body class="bg-secondary bg-gradient d-flex flex-column justify-content-between" style="height: auto;">
    <div>
        <nav class="navbar navbar-dark navbar-expand-md bg-dark py-3">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="vue/assets/img/logo.png" width="208" height="113">
                    <span></span>
                </a>
                <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5">
                    <span class="visually-hidden">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-5">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="<?=ROOT?>/?p=home">Home</a></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"><a class="nav-link" href="<?=ROOT?>/?p=voiture">Liste des véhicules</a></li>
                    </ul><a class="btn btn-primary ms-md-2" role="button" href="?p=logout"
                        style="background: var(--bs-red);">Déconnexion</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <h2>Modifier le véhicule</h2>
        </div>
        <div class="justify-content-center" style="text-align: center;font-size: 22px;">
            <div class="d-flex justify-content-center">
                <form style="width: 490px;" method="POST">
                    <div class="container">
                        <input class="form-control" type="text" value="<?= $idVehicule ?>" readonly="" name="id">
                        <label class="form-label">Plaques d'immatriculation</label>
                        <input class="form-control" type="text" name="immatriculation" value="<?= $dataVoiture["immatriculation"] ?>">
                        <label class="form-label">Chevaux</label>
                        <input class="form-control" type="number" name="chevaux" min="10" max="3000"value="<?= $dataVoiture["nbChevaux"] ?>">
                        <div>
                            <label class="form-label">Louée?&nbsp; &nbsp;</label>
                            <input type="checkbox" name="boolLocation">
                        </div>
                    </div>
                    <label class="form-label">Si oui; Date début</label>
                    <input class="form-control" type="date" name="dateDebut">
                    <label class="form-label">Date fin</label>
                    <input class="form-control" type="date" name="dateFin">
                    <label class="form-label">Locataire</label>
                    <input class="form-control" type="text" name="locataire">
                    <div class="container d-flex justify-content-around" style="height: 44px;padding-top: 10px;">
                        <button class="btn btn-primary" type="submit" name="modifier" value="modifier" style="background: var(--bs-red);">Sauvegarder</button>
                        <button class="btn btn-primary" type="button" style="background: var(--bs-red);">
                            <a style="color:white; text-decoration:none;" href="../controller/delete.php">Effacer le véhicule</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-light navbar-expand-md fixed-bottom" style="width: 100%;">
        <div class="container-fluid">
            <div class="container text-white py-4 py-lg-5"
                style="margin-bottom: 0px;padding-bottom: 110px;width: 100%;height: 167px;">
                <footer class="text-center bg-dark" style="width: 100%;">
                    <div class="container text-white py-4 py-lg-5">
                        <p class="text-muted mb-0" style="width: 100%;">Copyright © 2022 Fuego Locations</p>
                    </div>
                </footer>
            </div>
        </div>
    </nav>
    <script src="vue/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>