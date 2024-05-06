<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page profil collaborateurs</title>
    <link rel="stylesheet" href="../../css/mdb.min.css" />

</head>


<?php include "../NavBar.php" ?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="historyLink" href="#">Accueil</a></li>
                        <li class="breadcrumb-item"><a class="historyLink" href="#">Administration</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a class="historyLink" href="#">Administration Uilisateurs </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">John Smith</h5>
                        <p class="text-muted mb-1">Poste de l'employé</p>
                        <p class="text-muted mb-4">Adresse ?</p>
                        <div class="d-flex justify-content-center mb-2">

                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-success ms-1">Envoyez un Mail</button>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-globe fa-lg text-warning"></i>
                                <h3 class="mb-0">Formations</h3>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                <p class="mb-0">Formation 1</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                <p class="mb-0">Formation 2</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                <p class="mb-0">Formation 3</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                <p class="mb-0">Formation 4</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">nom Prenom</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Johnatan Smith</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">example@example.com</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Téléphone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">0612234556</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Role sur l'application</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Admin</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Adresse ? </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-success font-italic me-1">Intervention n°562</span>
                                </p>
                                <p class="mb-1" style="font-size: .85rem;">Client :</p>
                                <p style="font-size: .90rem;">Suez </p>

                                <p class="mb-1" style="font-size: .85rem;">Compte Rendu :</p>
                                <p style="font-size: .80rem;"><a href="#">Téléchargez le PDF</a> | <a href="#">Voir l'intervention</a></p>
                                <p class="mt-4 mb-1" style="font-size: .85rem;">Description :</p>

                                <p style="font-size: .80rem;"> RAS</p>
                                <p class="mt-4 mb-1" style="font-size: .80rem;">Appreciation :</p>
                                <p style="font-size: .80rem;"> Satisfait</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-success font-italic me-1">Intervention n°562</span>
                                </p>
                                <p class="mb-1" style="font-size: .85rem;">Client :</p>
                                <p style="font-size: .90rem;">Suez </p>

                                <p class="mb-1" style="font-size: .85rem;">Compte Rendu :</p>
                                <p style="font-size: .80rem;"><a href="#">Téléchargez le PDF</a> | <a href="#">Voir l'intervention</a></p>
                                <p class="mt-4 mb-1" style="font-size: .85rem;">Description :</p>

                                <p style="font-size: .80rem;"> RAS</p>
                                <p class="mt-4 mb-1" style="font-size: .80rem;">Appreciation :</p>
                                <p style="font-size: .80rem;"> Satisfait</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mt-4 mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Intervention n°562</span>
                                </p>
                                <p class="mb-1" style="font-size: .85rem;">Client :</p>
                                <p style="font-size: .90rem;">Suez </p>

                                <p class="mb-1" style="font-size: .85rem;">Compte Rendu :</p>
                                <p style="font-size: .80rem;"><a href="#">Téléchargez le PDF</a> | <a href="#">Voir l'intervention</a></p>
                                <p class="mt-4 mb-1" style="font-size: .85rem;">Description :</p>

                                <p style="font-size: .80rem;"> RAS</p>
                                <p class="mt-4 mb-1" style="font-size: .80rem;">Appreciation :</p>
                                <p style="font-size: .80rem;"> Satisfait</p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .historyLink {
        color: darkgreen;
    }
</style>

</html>