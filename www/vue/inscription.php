<!--
     * Page d'inscription
     * 
     * @projet librairie de véhicules à louer
     * @auteurs Maximilien, Kylian, Cléa, Yoan
     * @version 1.0.0
     * @date année 2022
-->
<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>bases</title>
    <link rel="stylesheet" href="vue/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vue/assets/css/Navbar-Centered-Brand-Dark-icons.css">
</head>

<body class="bg-secondary bg-gradient d-flex flex-column justify-content-between">
    <div>
        <nav class="navbar navbar-dark navbar-expand-md bg-dark py-3">
            <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><img src="vue/assets/img/logo.png" width="208" height="113"><span></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-5">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                        <li class="nav-item"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="position-relative py-4 py-xl-5">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-8 col-xl-6 text-center mx-auto">
                        <h2>Inscription</h2>
                        <p class="w-lg-50"></p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-5">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4" style="background: var(--bs-red);"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                    </svg></div>
                                <form class="text-center" method="post">
                                    <div class="mb-3">
                                        <input class="form-control" type="text" placeholder="Identifiant" name="username">
                                        <input class="form-control" type="email" placeholder="Email" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="password" name="password" placeholder="Mot de passe">
                                        <input class="form-control" type="password" name="password2" placeholder="Mot de passe (répétez)">
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary d-block w-100" type="submit" style="background: var(--bs-red);">Créer le compte</button>
                                    </div>
                                    <a href="#">Déjà inscrit? Se connecter</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div></div>
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
    </div>
    <script src="vue/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>