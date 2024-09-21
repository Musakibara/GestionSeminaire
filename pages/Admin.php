<?php
    require_once('connexiondb.php');
    require_once('identifier.php');
    require_once('../fonctions/fonctionAdmin.php');

    $requete=$conn->prepare("SELECT * FROM Administrateur");
    $requete->execute();
    $resultat = $requete->fetch();

    $r1 = getEffectifParti();
    $r2 = getEffectifSecret();
    $r3 = getEffectifConsul();
    $r4 = getEffectifSemin();
    $r5 = getEffectifPartiActif();
    $r6 = getEffectifConsulActif();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style1.css">
    <!-- == CSS POUR LES CADRE DU DASHBOARD == -->
    <link rel="stylesheet" href="../main/app.css">
    <!-- icone au navigateur -->
    <link rel="shortcut icon" href="../images/logoCsnadi-removebg-preview.png" type="image/x-icon">
    <!-- /*<link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon"> -->
    <!-- <link rel="shortcut icon" href="../images/favicon.png" type="image/png"> -->

    <title>Admin-Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
		
</head>
<body>
    <nav class="sidebar close">
        <div class="logo-name">
            <div class="logo-image">
                <img src="../images/logoCsnadi-removebg-preview.png" alt="" title="Centre National de Developpement de l'Informatique">
            </div>

            <span class="logo_name" title="Centre National de Developpement de l'Informatique">CENADI</span>
        </div>

        <div class="menu-items">
            <ul>
                <div class="menu">
                <li class="search-box">
                    <a href="#">
                    <i class='bi bi-search icon cl'></i>
                    <input type="search" placeholder=" Search....">
                    </a>
                </li>
                </div>
                <li class="nav-links"><a href="Admin" class="color">
                    <i class='bi bi-house-fill icon'></i>
                    <span class="link-name text">Dashboard<span>
                </a></li>
                <li class="nav-links">
                    <a href="seminaire" class="color">
                    <i class='bi bi-person-vcard-fill icon'></i>
                    <span class="link-name text">Seminaires<span>
                    </a>
                </li>
                <li class="nav-links">
                    <a href="secretaire" class="color">
                    <i class='bi bi-person-fill-gear icon'></i>
                    <span class="link-name text">Secretaires<span>
                    </a>
                </li>
                <li class="nav-links">
                    <a href="consultant" class="color">
                    <i class='bi bi-mortarboard-fill icon'></i>
                    <span class="link-name text">Consultants<span>
                    </a>
                </li>
                <li class="nav-links">
                    <a href="participant" class="color">
                    <i class='bi bi-people-fill icon'></i>
                    <span class="link-name text">Participants<span>
                    </a>
                </li>
                <li class="nav-links"><a href="chat" class="color">
                    <i class='i bi-chat-left-dots-fill icon'></i>
                    <span class="link-name text">Chats<span>
                </a></li>
            </ul>

            <ul class="logout-mod">
                <li class="nav-links"><a href="logout" class="color">
                    <i class='bi bi-box-arrow-left icon'></i>
                    <span class="link-name text">Logout<span>
                </a></li>
                <li class="mode">
                    <div class="moon-sun">
                    <a href="#">
                    <i class='bi bi-moon-stars-fill icon moon'></i>
                    <i class='bi bi-sun-fill icon sun'></i>
                    </a>
                    </div>
                    <a href="#">
                    <span class="link-name">Dark Mode</span>
                    </a>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="Dashboard">
        <div class="top">
            <i class="bi bi-menu sidebar-toggle"></i>
            <div class="user">
                <img src="../images/man.png" alt="image" title="Admin's picture">
                <br>
                <a class="icon" href="editerAdmin.php?idAdministrateur=<?php echo $resultat ['idAdministrateur']?>">
	                <?php echo  ' '.$resultat['nom']?>
                </a> 
            </div>
            </div>
        </div>
        <div class="center">
            <div class="box">
            </div>
        </div>
        <div class="container  tableau-stat text-center">
            <h2>lorem isum dolorsit amet consectetur adiisicin elit.</h2><br>
            <h3 class="text-center text-primary">
            <i>STATISTIQUES GENERALES</i>
            </h3>
            <br>
        <section class="section" style="margin-top: -25px;">
            <div class="row">
                 <div class="col-6 col-lg-3 col-md-6">
                     <div class="card">
                         <div class="card-body px-4 py-4-5">
                             <div class="row">
                                 <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                     <div class="stats-icon purple mb-2">
                                         <i class="bi bi-person-vcard-fill"></i>
                                     </div>
                                 </div>
                                 <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                     <h5 class="text-muted font-semibold">
                                        SEMINAIRES
                                     </h5>
                                     <h4 class="font-extrabold mb-0"><?php echo $r4 ?></h4>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-6 col-lg-3 col-md-6">
                     <div class="card">
                         <div class="card-body px-4 py-4-5">
                             <div class="row">
                                 <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                     <div class="stats-icon blue mb-2">
                                         <i class="bi bi-person-fill-gear"></i>
                                     </div>
                                 </div>
                                 <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                     <h5 class="text-muted font-semibold">SECRETAIRES</h5>
                                     <h4 class="font-extrabold mb-0"><?php echo $r2 ?></h4>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h5 class="text-muted font-semibold">CONSULTANTS</h5>
                                    <h4 class="font-extrabold mb-0"><?php echo $r3 ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon red mb-2">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h5 class="text-muted font-semibold">PARTICIPANTS</h5>
                                    <h4 class="font-extrabold mb-0"><?php echo $r1 ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="col-6 col-lg-3 col-md-6">
                     <div class="card">
                         <div class="card-body px-4 py-4-5">
                             <div class="row">
                                 <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                     <div class="stats-icon green mb-2">
                                         <i class="bi bi-mortarboard-fill"></i>
                                     </div>
                                 </div>
                                 <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                     <h5 class="text-muted font-semibold">CONSULTANTS ACTIFS</h5>
                                     <h4 class="font-extrabold mb-0"><?php echo $r6 ?></h4>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-6 col-lg-3 col-md-6">
                     <div class="card">
                         <div class="card-body px-4 py-4-5">
                             <div class="row">
                                 <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                     <div class="stats-icon red mb-2">
                                         <i class="bi bi-people-fill"></i>
                                     </div>
                                 </div>
                                 <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                     <h5 class="text-muted font-semibold">PARTICIPANTS ACTIFS</h5>
                                     <h4 class="font-extrabold mb-0"><?php echo $r5 ?></h4>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
            </div>
        </section>
        <div class="image">
            <img src="../images/logo_CENADI-removebg-preview.png" alt="">
        </div>
        <!-- <footer> -->
            <!-- <div class="footer"> -->
                <!-- <div class="float-start"> -->
                    <!-- <a href="https://www.cenadi.com" target="_blank" > -->
                        <!-- <p>2022 &copy; official site - CENADI</p> -->
                    <!-- </a> -->
                <!-- </div> -->
            <!-- </div> -->
        <!-- </footer> -->

            <!-- <div class="row"> -->
                <!-- **** Total des Seminaires **** -->

                <!-- <div class="col-md-4"> -->
                    <!-- <div class="stat stat12"> -->
                        <!-- <div class="effectif"> -->
                        <!-- <span class="fa fa-users"> -->
                        <!-- <i class="bi bi-person-vcard-fill"></i> -->
                            <!-- Effectif Seminaire -->
                            <!-- <div class="nbr"> code php</div> -->
                        <!-- </span> -->
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->

                <!-- **** Total des Secretaires **** -->
                <!-- <div class="col-md-4"> -->
                    <!-- <div class="stat stat12"> -->
                        <!-- <span class="fa fa-users"></span> -->
                        <!-- <div class="effectif"> -->
                            <!-- Efectif 1ère et 2è Année -->
                            <!-- <div class="nbr">code php</div> -->
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../javaScript/script.js"></script>
</body>
</html>