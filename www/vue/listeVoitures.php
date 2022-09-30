<!--
     * Page liste des voitures
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
    <title>bases</title>
    <link rel="stylesheet" href="vue/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vue/assets/css/Navbar-Centered-Brand-Dark-icons.css">
</head>

<body class="bg-secondary bg-gradient d-flex flex-column justify-content-between" style="height: auto;">
    <div>
        <nav class="navbar navbar-dark navbar-expand-md bg-dark py-3">
            <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><img src="vue/assets/img/logo.png" width="208" height="113"><span></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-5">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"><a class="nav-link" href="#">Ajouter un véhicule</a></li>
                    </ul><a class="btn btn-primary ms-md-2" role="button" href="#" style="background: var(--bs-red);">Déconnexion</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <h2>Liste de mes véhicules</h2>
        </div>
        <div style="text-align: center;font-size: 22px;">
            <div class="table-responsive" style="border-style: solid;border-color: rgb(0,0,0);">
                <table class="table">
                    <thead style="border-style: solid;border-color: rgb(0,0,0);">
                        <tr>
                            <th>Marque</th>
                            <th>Modèle</th>
                            <th style="border-style: solid;border-color: rgb(0,0,0);">Plaques</th>
                            <th>Chevaux</th>
                            <th>Locataire</th>
                            <th>Louée?</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                            <th>Modifier</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-light navbar-expand-md fixed-bottom" style="width: 100%;">
        <div class="container-fluid">
            <div class="container text-white py-4 py-lg-5" style="margin-bottom: 0px;padding-bottom: 110px;width: 100%;height: 167px;">
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