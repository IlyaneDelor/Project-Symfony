<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs</title>
    <link rel="stylesheet" href="../../css/utilisateurs/utilisateurs.css" />
    <link rel="stylesheet" href="../../css/mdb.min.css" />

</head>

<body>
    <?php include "../NavBar.php" ?>

    <main>


        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="#">Administration</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Administration Uilisateurs </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des Utilisateurs</li>
                        </ol>
                    </nav>
                </div>
            </div>



            <table id='TableUtilisateurs'>
                <tr>

                    <td>
                    </td>
                    <td>
                    </td>
                    <td></td>
                    <td>
                    </td>
                    <td></td>
                    <td>
                        <form class="d-flex">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />

                        </form>
                    </td>

                </tr>
                <tr id='firstBar'>

                    <td>Nom Prénom ▽
                    </td>
                    <td>Fonction ▽
                    </td>
                    <td>Mail ▽</td>
                    <td> Role dans l'application ▽
                    </td>
                    <td>Edit ▽</td>
                    <td>Delete ▽</td>

                </tr>

                <tr>
                    <td>DELOR Ilyane
                    </td>
                    <td> Développeur
                    </td>
                    <td>i.delor@theys.com</td>
                    <td> Admin
                    </td>
                    <td><a href="#"> <img height="25" src="../../img/edit_icon.png" /></a></td>
                    <td><a href="#"> <img height="30" src="../../img/delete_icon.webp" /></a></td>
                </tr>

                <tr>
                    <td>DELOR Ilyane
                    </td>
                    <td> Dévloppeur
                    </td>
                    <td>i.delor@theys.com</td>
                    <td> Admin
                    </td>
                    <td><a href="#"> <img height="25" src="../../img/edit_icon.png" /></a></td>
                    <td><a href="#"> <img height="30" src="../../img/delete_icon.webp" /></a></td>
                </tr>

                <tr>
                    <td>DELOR Ilyane
                    </td>
                    <td> Dévloppeur
                    </td>
                    <td>i.delor@theys.com</td>
                    <td> Admin
                    </td>
                    <td><a href="#"> <img height="25" src="../../img/edit_icon.png" /></a></td>
                    <td><a href="#"> <img height="30" src="../../img/delete_icon.webp" /></a></td>
                </tr>

                <tr>
                    <td>DELOR Ilyane
                    </td>
                    <td> Dévloppeur
                    </td>
                    <td>i.delor@theys.com</td>
                    <td> Admin
                    </td>
                    <td><a href="#"> <img height="25" src="../../img/edit_icon.png" /></a></td>
                    <td><a href="#"> <img height="30" src="../../img/delete_icon.webp" /></a></td>
                </tr>
                <tr>
                    <td>DELOR Ilyane
                    </td>
                    <td> Dévloppeur
                    </td>
                    <td>i.delor@theys.com</td>
                    <td> Admin
                    </td>
                    <td><a href="#"> <img height="25" src="../../img/edit_icon.png" /></a></td>
                    <td><a href="#"> <img height="30" src="../../img/delete_icon.webp" /></a></td>
                </tr>



            </table>
        </div>


    </main>
    <script type="text/javascript" src="../../js/planning.js"></script>

</body>