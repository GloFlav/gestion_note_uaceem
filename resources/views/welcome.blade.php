<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Découvrez l'Université ACEEM, une institution éducative innovante proposant des formations pluridisciplinaires à Madagascar.">

    <!-- ONLINE FONT -->

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"t
        rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="style/lazy-loading.css">
    <link rel="stylesheet" href="style/loading.css">
    <link rel="stylesheet" href="style/body.css">
    <link rel="stylesheet" href="style/background.css">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/AlaUne.css">
    <link rel="stylesheet" href="style/mission.css">
    <link rel="stylesheet" href="style/anniversaire.css">
    <link rel="stylesheet" href="style/mention.css">
    <link rel="stylesheet" href="style/partenaires.css">
    <link rel="stylesheet" href="style/footer.css">

    <!-- All script -->
    <script src="animations/interaction.js" defer></script>
    <script src="animations/girls-animations.js" defer></script>
    <script src="animations/lazy-loading.js" defer></script>

    <!-- TAB ICON -->
    <link rel="icon" href="images/footerlogoACEEM.png" type="image/png">

    <title>Université ACEEM</title>
</head>

<body>
    <!-- LOADING SECTION -->
    <div id="loader">
        <div class="bg-load-l"></div>
        <!-- <div class="bg-load-r"></div> -->

        <div class="loader-content">


            <div class="loading-container">
                <div class="logo-absolute">
                    <img src="./images/loader.svg" class="logo-loading" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="">

        <!-- HERO SECTION -->
        <div id="acceuil_link" class="hero-section" style="margin-bottom: 200px;">
            <!-- Header -->
            <div class="bg-l"></div>
            <!-- <div class="bg-r"></div> -->

            <header>
                <div class="header-logo">
                    <img src="images/Logo ACEEM 1.webp" alt="logo" class="logo" />

                    <div>
                        <div>
                            <span class="uaceem-logo-text">UACEEM</span>
                        </div>
                        <div>
                            <span class="uaceem-slogan-text">Dignité - Créativité - Qualité</span>
                        </div>
                    </div>
                </div>

                <div class="header-navigation">
                    <nav class="">
                        <a href="#mentions_link">MENTIONS</a>
                        <a href="#missions_link">MISSIONS</a>
                        <a href="#annif_link">ANNIVERSAIRES</a>
                        <a href="#dirigeant_link">DIRIGEANTS</a>
                        <a href="#partenaires_link">PARTENAIRES</a>
                    </nav>
                </div>

                <div class="header-mobile-navigation burger-option">
                    <span class="close-burger-option">X</span>
                    <nav class="">
                        <a href="#mentions_link">MENTIONS</a>
                        <a href="#missions_link">MISSsIONS</a>
                        <a href="#annif_link">ANNIVERSAIRES</a>
                        <a href="#dirigeant_link">DIRIGEANTS</a>
                        <a href="#partenaires_link">PARTENAIRES</a>
                    </nav>
                </div>

                <div class="burger-icon">
                    <img src="images/icon/align-justify.svg" alt="Burger menu">
                </div>
            </header>

            <!-- Hero main -->
            <div class="hero-content">

                <!-- Text section -->
                <div class="hero-text-section">
                    <div class="univ-text-section">
                        <span class="univ-text">Université</span> <span class="aceem-text">ACEEM</span>
                    </div>

                    <div class="avenir-text-section">
                        <p>
                            Confiez votre avenir à des professionnels
                        </p>
                    </div>

                    <div class="short-text-section">
                        Action pour la Culture, l’Enseignement et l’Éducation à Madagascar
                    </div>

                    <div class="button-inscri-section">
                        <button id="button-inscription">
                            <span>Inscription au concours</span>
                            <img src="images/icon/solar_documents-bold-duotone.svg" alt="">
                        </button>
                    </div>
                </div>

                <!-- Photo section -->
                <div class="hero-image-section">
                    <img src="images/Photos.webp" alt="photos" class="hero-image" />
                </div>

            </div>
        </div>


        <!-- A LA UNE SECTION -->
        <div class="section-title fade-in-section" style="margin-bottom: 50px; font-family: 'Inter';">
            <p class="title_une">A la une</p>
        </div>

        <div class="alaune">

            <div class="container_alaune fade-in-section">
                <div class="alaune_un">
                    <img src="images/A%20la%20une%201.webp" alt="photo_alaune" class="photo_alaune lazy-load">

                    <a class="VP_1" target="_blank"
                        href="https://www.facebook.com/100092112664592/posts/pfbid0ML1YqUATxZsbcNk2Y9VMKFw7ffDUozJshcT3dddbvruhqHMEzVL5HyrLfdXQxK7rl/?app=fbl">
                        <button class="bouton_alaune"> Voir plus </button>
                        <img src="images/Fleche_droite.webp" alt="arrow_right" class="arrow_right">
                    </a>
                </div>

                <div class="alaune_deux fade-in-section">
                    <img src="images/A%20la%20une%202.webp" alt="photo_alaune" class="photo_alaune lazy-load">

                    <a class="VP_1" target="_blank"
                        href="https://www.facebook.com/oniversiteaceem/posts/pfbid021F4yLjuN13mZxCW7BWYoe92ru3QfZt5G6Q7YFH3UMmisF2vHcrugFADff7PkYnetl">
                        <button class="bouton_alaune"> Voir plus </button>
                        <img src="images/Fleche_droite.webp" alt="arrow_right" class="arrow_right">
                    </a>
                </div>

                <div class="alaune_trois fade-in-section">
                    <img src="images/A%20la%20une%203.webp" alt="photo_alaune" class="photo_alaune ">

                    <a class="VP_1" target="_blank"
                        href="https://www.facebook.com/100092112664592/posts/pfbid0W8vipCWzYe5qJcPAtFmFHGDfi4nTnQiZrxfQm9NqwSFA9zoyTSNN3RsS1EwigCCl/?app=fbl">
                        <button class="bouton_alaune"> Voir plus </button>
                        <img src="images/Fleche_droite.webp" alt="arrow_right" class="arrow_right">
                    </a>
                </div>
            </div>
        </div>


        <!-- METIONS SECTION -->
        <div id="mentions_link" class="section-title fade-strong-bottom"
            style="margin-top: 200px; font-family: 'Inter';">
            <p>Mentions Universitaire</p>
        </div>
        <div class="container_mention">
            <div class="liste_mentions">
                <img src="images/Droit.webp" alt="mentions_droit" class="img_mentions fade-strong-bottom ">
                <img src="images/Economie.webp" alt="mentions_economie" class="img_mentions fade-strong-bottom ">
                <img src="images/Sante.webp" alt="mentions_sante" class="img_mentions fade-strong-bottom ">
                <img src="images/Gestion.webp" alt="mentions_gestion" class="img_mentions fade-strong-bottom ">
                <img src="images/Communication.webp" alt="mentions_communication"
                    class="img_mentions fade-strong-bottom ">
                <img src="images/Informatique.webp" alt="mentions_informatique"
                    class="img_mentions fade-strong-bottom ">
                <img src="images/Relations.webp" alt="mentions_relation" class="img_mentions fade-strong-bottom ">
            </div>
        </div>


        <!-- MISSIONS SECTION -->
        <div id="missions_link" style="margin-top: 200px;">
            <div class="section-title fade-strong-bottom" style="margin-bottom: 50px; font-family: 'Inter';">
                <p>Missions de l'UACEEM</p>
            </div>
            <div class="mission">
                <div class="absolute inset-0 justify-center">
                    <div class="bg-shape1 bg-primary opacity-50 bg-blur"></div>
                    <div class="bg-shape2 bg-teal opacity-50 bg-blur"></div>
                    <div class="bg-shape1 disapear bg-purple opacity-50 bg-blur"></div>
                    <div class="bg-shape2 disapear bg- opacity-50 bg-blur"></div>
                    <div class="bg-shape1 disapear bg-primary opacity-50 bg-blur"></div>
                    <div class="bg-shape2 disapear bg-teal opacity-50 bg-blur"></div>
                    <div class="bg-shape1 disapear bg-purple opacity-50 bg-blur"></div>
                    <div class="bg-shape2 disapear bg-primary opacity-50 bg-blur"></div>
                </div>
                <div class="stack-area">
                    <div class="left">
                        <div class="sub-title">
                            L'université ACEEM se consacre à offrir un enseignement de qualité à l'échelle nationale et
                            internationale, en s'adaptant à un monde en constante évolution.
                        </div>
                    </div>
                    <div class="right">
                        <div class="cards">
                            <div class="card">
                                <div class="sub">Origines et Fondement</div>
                                <div class="content">Créée par Monsieur Ratrema William, l'institution fait partie du
                                    groupe ACEEM ("Action pour la Culture, l’Enseignement et l’Éducation à Madagascar"),
                                    et bénéficie d'une expérience de plusieurs décennies.</div>
                            </div>
                            <div class="card">
                                <div class="sub">Enseignement Pluridisciplinaire</div>
                                <div class="content"> L'université propose une formation diversifiée pour préparer les
                                    étudiants aux défis futurs, couvrant plusieurs disciplines afin de développer leurs
                                    compétences.</div>
                            </div>
                            <div class="card">
                                <div class="sub">Reconnaissance des Diplômes</div>
                                <div class="content"> Les diplômes délivrés par l'Université ACEEM sont accrédités par
                                    l'État (MESUPRES) et sont reconnus à l'international grâce à des partenariats,
                                    notamment avec l'AUF.</div>
                            </div>
                            <div class="card">
                                <div class="sub">Valeurs et Objectifs Pédagogiques</div>
                                <div class="content"> L'université met en avant des valeurs de dignité, de créativité
                                    et de qualité, avec l'objectif de former des citoyens responsables et engagés, prêts
                                    à relever les défis de la vie active.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ANNIVERSAIRE SECTION -->
        <div id="annif_link" class="anniversaire">
            <div class="section-title fade-strong-bottom" style="margin-bottom: 100px; font-family: 'Inter';">
                <p>Célébration Anniversaire UACEEM</p>
            </div>

            <div class="anniv_container fade-strong-bottom">
                <div class="container_un">
                    <img src="images/Logo anniversaire.webp" alt="" class="logo_anniv ">
                </div>
            </div>

            <div class="tag_container fade-strong-bottom">
                <div class="tags">
                    <img src="images/Joie.webp" alt="" class="tag_un ">
                    <img src="images/Emotion.webp" alt="" class="tag_deux ">
                    <img src="images/Partage.webp" alt="" class="tag_trois ">
                </div>
            </div>

            <div class="phrase fade-in-section">
                <img src="images/phrase.webp" alt="" class="phrase_img ">
            </div>

            <div class="souvenir_container fade-in-section">
                <img src="images/Souvenir.webp" alt="" class="souvenir_img ">
            </div>

            <div class="souvenir_container_mobile fade-strong-bottom">
                <img src="images/souvenir mobile.webp" alt="" class="souvenir_mobile ">
            </div>
        </div>


        <!-- DIRIGEANT SECTION -->
        <div id="dirigeant_link" class="dirigeant" style="margin-bottom: 200px;">
            <div class="section-title fade-strong-bottom" style="margin-bottom: 50px; font-family: 'Inter';">
                <p>Les dirigeants</p>
            </div>
            <div class="dirigeants fade-strong-bottom" style="font-family: 'Inter';">
                <div class="wrapper">
                    <div class="card-person front-face">
                        <img src="images/direction/recteur.png" alt="Recteur">
                    </div>
                    <div class="card-person back-face">
                        <img src="images/direction/recteur.png" alt="recteur">
                        <div class="info">
                            <hr style="width: 70%;  margin:0 auto ;">
                            <p>RANDRIANOELINA Benjamin</p>
                        </div>
                    </div>
                    <div class="post">Recteur</div>
                </div>

                <div class="wrapper">
                    <div class="card-person front-face">
                        <img src="images/direction/sg.png" alt="sg">
                    </div>
                    <div class="card-person back-face">
                        <img src="images/direction/sg.png" alt="sg">
                        <div class="info">
                            <hr style="width: 70%;  margin:0 auto ;">
                            <p>RAKOTOARINIA Harivao</p>
                        </div>
                    </div>
                    <div class="post">SG</div>
                </div>

                <div class="wrapper">
                    <div class="card-person front-face">
                        <img src="images/direction/daf.png" alt="daf">
                    </div>
                    <div class="card-person back-face">
                        <img src="images/direction/daf.png" alt="daf">
                        <div class="info">
                            <hr style="width: 70%;  margin:0 auto ;">
                            <p>RAKOTOARINIA Harilala</p>
                        </div>

                    </div>
                    <div class="post">DAF</div>
                </div>

                <div class="wrapper">
                    <div class="card-person front-face">
                        <img src="images/direction/dirEtude.png" alt="diretude">
                    </div>
                    <div class="card-person back-face">
                        <img src="images/direction/dirEtude.png" alt="diretude">
                        <div class="info">
                            <hr style="width: 70%; margin:0 auto ; ">
                            <p>RAKOTONIAINA Ionintsoa</p>
                        </div>
                    </div>
                    <div class="post" style="margin-top: 100px;">DE</div>
                </div>
            </div>
        </div>


        <!-- PARTENAIRE SECTION -->
        <div id="partenaires_link" class="partenaire" style="margin-bottom: 200px;">
            <div class="section-title fade-strong-bottom" style="margin-bottom: 50px; font-family: 'Inter';">
                <p>Partenaires de l'UACEEM</p>
            </div>

            <div class="container_partenaire fade-in-section">
                <img src="images/auf.webp" alt="auf" class="img ">
                <img src="images/alliancefrancaise.webp" alt="auf" class="img ">
                <img src="images/ambatovy.webp" alt="auf" class="img ">
                <img src="images/ambassadefrancemadagascar.webp" alt="auf" class="img ">
                <img src="images/bankofafrica.webp" alt="auf" class="img ">
                <img src="images/bgfibank.webp" alt="auf" class="img ">
                <img src="images/bni.webp" alt="auf" class="img ">
                <img src="images/britishembassy.webp" alt="auf" class="img ">
                <img src="images/ethiopianairlines.webp" alt="auf" class="img ">
                <img src="images/uqat.webp" alt="auf" class="img ">
                <img src="images/groupesipromad.webp" alt="auf" class="img ">
                <img src="images/guanomad.webp" alt="auf" class="img ">
                <img src="images/habibo.webp" alt="auf" class="img ">
                <img src="images/homeopharma.webp" alt="auf" class="img ">
                <img src="images/madajeune.webp" alt="auf" class="img ">
                <img src="images/masoalalaboratoire.webp" alt="auf" class="img ">
                <img src="images/mesupres.webp" alt="auf" class="img ">
                <img src="images/orangemadagascar.webp" alt="auf" class="img ">
                <img src="images/sbmbank.webp" alt="auf" class="img ">
                <img src="images/societegeneralemadagasikara.webp" alt="auf" class="img ">
                <img src="images/telma.webp" alt="auf" class="img ">
            </div>

            <!-- <p class="contacter_nous">
                <a href="" class="span_contact"> Contactez-nous </a>dès aujourd'hui pour discuter des opportunités passionnantes de partenariat avec l'Université ACEEM.
            </p> -->
        </div>

    </div>


    <!-- Footer section -->
    <div>
        <div class="footer-section">
            <div class="logo-with-link-footer">
                <div class="footer-logo">
                    <img src="images/footer/Logo ACEEM 1.svg" alt="logo" class="logo " />

                    <div>
                        <span class="uaceem-logo-text-footer">UACEEM</span>
                        <span class="uaceem-slogan-text-footer">Dignité - Créativité - Qualité</span>
                    </div>
                </div>

                <div class="follow desktop">
                    <span>Nous suivre sur</span>
                    <div class="social-media">
                        <a href="https://www.facebook.com/oniversiteaceem/" target="_blank">
                            <img src="images/facebook.webp" alt="facebook logo">
                        </a>
                        <a href="https://www.instagram.com/aceemgroupe/" target="_blank">
                            <img src="images/instagram.webp" alt="instagram logo">
                        </a>
                        <a href="https://www.twitter.com/aceemgroupe/" target="_blank">
                            <img src="images/twitter.webp" alt="twitter logo">
                        </a>
                        <a href="https://www.linkedin.com/school/universite-aceem/about/" target="_blank">
                            <img src="images/linkedin.webp" alt="linkedin logo">
                        </a>
                    </div>
                </div>

            </div>

            <div class="coordonnee">
                <h3>Coordonnées</h3>

                <div>
                    <div class="coord-element">
                        <img src="images/phone.webp" alt="">
                        <span>+261 34 49 500 71</span>
                    </div>
                    <div class="coord-element">
                        <img src="images/at-sign.webp" alt="">
                        <span>aceemgroupe@gmail.com</span>
                    </div>
                    <div class="coord-element">
                        <img src="images/map-pin-house.webp" alt="">
                        <span>PRVO 26B Manakambahiny, Antananarivo, Madagascar</span>
                    </div>
                </div>
            </div>


            <div class="footer-links">
                <nav class="link-nav">
                    <a href="#acceuil_link">
                        <span>
                            <img src="images/icon/Polygon 10.svg" alt="pins">
                        </span>
                        <span>Accueil</span>
                    </a>
                    <a href="#mentions_link">
                        <span>
                            <img src="images/icon/Polygon 10.svg" alt="pins">
                        </span>
                        <span>Mentions</span>
                    </a>
                    <a href="#missions_link">
                        <span>
                            <img src="images/icon/Polygon 10.svg" alt="pins">
                        </span>
                        <span>Missions</span>
                    </a>
                    <a href="#annif_link">
                        <span>
                            <img src="images/icon/Polygon 10.svg" alt="pins">
                        </span>
                        <span>Anniversaire</span>
                    </a>
                    <a href="#dirigeant_link">
                        <span>
                            <img src="images/icon/Polygon 10.svg" alt="pins">
                        </span>
                        <span>Dirigeants</span>
                    </a>
                    <a href="#partenaires_link">
                        <span>
                            <img src="images/icon/Polygon 10.svg" alt="pins">
                        </span>
                        <span>Partenaires</span>
                    </a>
                </nav>
            </div>

            <div class="last-links mobile">
                <div class="follow">
                    <span class="desktop">Nous suivre sur</span>
                    <div class="social-media">
                        <a href="https://www.facebook.com/oniversiteaceem/" target="_blank">
                            <img src="images/facebook.webp" alt="facebook logo">
                        </a>
                        <a href="https://www.instagram.com/aceemgroupe/" target="_blank">
                            <img src="images/instagram.webp" alt="instagram logo">
                        </a>
                        <a href="https://www.twitter.com/aceemgroupe/" target="_blank">
                            <img src="images/twitter.webp" alt="twitter logo">
                        </a>
                        <a href="https://www.linkedin.com/school/universite-aceem/about/" target="_blank">
                            <img src="images/linkedin.webp" alt="linkedin logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>




        <div class="copyright">
            &copy;Copyright 2024 | Université ACEEM Manakambahiny | Tous droits réservés
        </div>
    </div>

    <!-- </div> -->

</body>

</html>
