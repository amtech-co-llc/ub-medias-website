<?php
include('./php/connection.php');

$id = $_GET['id'];

$sql1 = "SELECT * FROM publication WHERE `id` = ?";
$query1 = $pdo->prepare($sql1);
$query1->execute([$id]);

$result = $query1->fetch();
(strlen($result['description']) > 110) ? $desc = substr($result['description'], 0, 110) . '...' : $desc =  $result['description'];


$sql = "UPDATE publication SET `post_share` = ? WHERE `id` = ?";
$query = $pdo->prepare($sql);

$share_num  = intval($result['post_share']) + 1;
$query->execute([$share_num, $id]);

?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partager</title>

    <!-- including style sheets -->
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/mobile-format.css">
    <!-- include fonts icons -->
    <link rel="stylesheet" href="./assets/RemixIcon_Fonts_v4.6.0/fonts/remixicon.css">

    <!-- including meta tags for Search Engines and Facebook Meta info -->
    <!-- meta tags for Search Engines -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- meta tags for Facebook, whatsapp, etc... -->
    <meta property="og:url" content="page url">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
    <meta property="og:title" content="">
    <meta property="og:site_name" content="">
    <meta property="og:see_also" content="">
    <!-- meta tags for google + facebook meta info -->
    <meta itemprop="name" content="">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="">
    <!-- meta tags for twitter (X) meta infos -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="page url">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <!-- end of meta tags -->

    <!-- include favicon for page -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- /////////////////////////////////////////////////////////////////////////////////////////// -->

    <style>
        .act {
            cursor: pointer;
        }

        .like-btn.liked {
            color: #029bd8;
        }

        .dislike-btn.disliked {
            color: #029bd8;
        }

        .tops-sl a {
            text-decoration: none;
        }

        .mobile-navigation a {
            text-decoration: none;
        }
    </style>

</head>

<body id="body">
    <div class="container">
        <!-- navigation bar -->
        <div class="headers-navigation">
            <div class="navigation-contents">
                <a href="./index">
                    <h3>UB Medias</h3>
                </a>
                <ul>
                    <li><a href="./index">Actualités</a></li>
                    <li><a href="./actualites-politique">Politiques</a></li>
                    <li><a href="./actualites-sportive">Sports</a></li>
                    <li><a href="./actualites-culturelle">Cultures</a></li>
                    <li><a href="./ubmedias-videos">Vidéos</a></li>
                    <li><a href="./contacts">Contacts</a></li>
                </ul>
                <div class="left-cnt">
                    <a href="./radio"><button class="button-2 "><i class="ri-circle-fill" style="color: red;"></i>
                            Radio</button></a>
                    <a href="./television"><button class="button-2 "><i class="ri-circle-fill" style="color: red;"></i>
                            TV</button></a>
                    <a href="./newsletters"><button class="button-1"><i class="ri-notification-3-line"></i> S'abonner</button></a>
                </div>
            </div>
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- beginning of mobile navigation -->
        <div class="mobile-navigation">
            <button id="nav-btn"><i class="ri-bar-chart-horizontal-line"></i></button>
            <a href="./index">
                <h3 class="text-pr logo">UB Medias</h3>
            </a>
            <div class="other-buttons">
                <a href="#"><button class="button-3"><i class="ri-notification-3-line"></i></button></a>
                <a href="./radio"><button class="button-2 "><i class="ri-circle-fill" style="color: red;"></i>
                        Radio</button></a>
                <a href="./television"><button class="button-2 "><i class="ri-circle-fill" style="color: red;"></i>
                        TV</button></a>
            </div>
        </div>
        <!-- mobile navigation lists -->
        <div class="mobile-navigation-list" id="mobile-manu-slider">
            <div class="lists-nav">
                <div class="tops-sl">
                    <a href="./index">
                        <h3>UB Medias</h3>
                    </a>
                    <button></button>
                </div>
                <ul>
                    <li><a href="./index">Actualités</a></li>
                    <li><a href="./actualites-politique">Politiques</a></li>
                    <li><a href="./actualites-sportive">Sports</a></li>
                    <li><a href="./actualites-culturelle">Cultures</a></li>
                    <li><a href="./ubmedias-videos">Vidéos</a></li>
                    <li><a href="#">Apropos de nous</a></li>
                    <li><a href="./contacts">Contacts</a></li>
                </ul>
                <div class="bottom-mobnav">
                    <a href="./newsletters"><button class="button-2" style="margin-bottom: 1em;"><i
                                class="ri-notification-3-line"></i>
                            S'abonner à la newsletter</button></a>
                    <p>&copy;2025 <span class="text-pr">UB Medias</span> tout droits reservés.</p>
                    <p>Propulsé par <span class="text-pr">Amtech technology</span></p>
                </div>
            </div>
        </div>
        <!-- beginning of mobile navigation -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- end of navition bar -->
        <!-- beginning of body-contents -->
        <div class="body-contents">
            <!-- body-contents -->
            <div class="contents-1">

                <div class="share-card">
                    <h3>Partagez cet article !</h3>
                    <p>Aidez-nous à faire passer le message en partageant cet article sur vos réseaux sociaux préférés.
                        Ensemble, faisons circuler l’information !</p><br>
                    <h2>Partager sur</h2>
                    <div class="socials-icons-share">
                        <a href="https://wa.me/?text=<?php echo $desc . ' Lisez plus en clickant sur ce lien:' . "%0A%0Ahttps://ub-medias.com/" . $result['seo_url'] ?>"><button><i class="ri-whatsapp-line"></i></button></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo "https://ub-medias.com/" . $result['seo_url'] ?>"><button><i class="ri-facebook-fill"></i></button></a>
                        <a href="https://twitter.com/intent/tweet?text=<?php echo $desc . ' Lisez plus en clickant sur ce lien:' . '%0A' . 'https://ub-medias.com/' . $result['seo_url'] ?>"><button><i class="ri-twitter-x-line"></i></button></a>
                    </div>
                </div>

                <!-- footer -->
                <div class="footer">
                    <div class="footer-contents">
                        <!-- beginning of footer card -->
                        <div class="card1-f">
                            <h4 class="text-to-uppercase">Dans l'actualité</h4>
                            <div class="footer-details">
                                <ul>
                                    <li><a href="#">Diplômatie</a></li>
                                    <li><a href="#">Justice</a></li>
                                    <li><a href="#">Divertissements</a></li>
                                    <li><a href="#">Sports</a></li>
                                    <li><a href="#">Vidéos</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of footer card -->
                        <!-- beginning of footer card -->
                        <div class="card1-f">
                            <h4 class="text-to-uppercase">À l'international</h4>
                            <div class="footer-details">
                                <ul>
                                    <li><a href="#">RDCongo</a></li>
                                    <li><a href="#">France</a></li>
                                    <li><a href="#">Etats-unis</a></li>
                                    <li><a href="#">Ukraine</a></li>
                                    <li><a href="#">Russie</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of footer card -->
                        <!-- beginning of footer card -->
                        <div class="card1-f">
                            <h4 class="text-to-uppercase">À propos de UB Médias</h4>
                            <div class="footer-details">
                                <ul>
                                    <li><a href="#">Qui sommes-nous?</a></li>
                                    <li><a href="#">Vente de contenus</a></li>
                                    <li><a href="#">Nous rejoindre</a></li>
                                    <li><a href="#">Publicité</a></li>
                                    <li><a href="#">Contacter UB Medias</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of footer card -->
                        <!-- beginning of footer card -->
                        <div class="card1-f">
                            <h4 class="text-to-uppercase">Nos services</h4>
                            <div class="footer-details">
                                <ul>
                                    <li><a href="#">S'abonner aux newsletters</a></li>
                                    <li><a href="#">Proposer une Publicité</a></li>
                                    <li><a href="#">Monaitisation de vos réseaux-sociaux</a></li>
                                    <li><a href="#">Optimisation de vos réseaux-sociaux</a></li>
                                    <li><a href="#"></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of footer card -->
                    </div>
                    <div class="copy-right-text">
                        <div class="socials-icons">
                            <a href="https://www.facebook.com/ubmediascongo" target="_blank"><button><i class="ri-facebook-fill"></i></button></a>
                            <a href="https://www.instagram.com/ubmediasrdc" target="_blank"><button><i class="ri-instagram-line"></i></button></a>
                            <a href="https://www.x.com/UB_Medias" target="_blank"><button><i class="ri-twitter-x-line"></i></button></a>
                            <a href="https://www.youtube.com/@ubfrançais" target="_blank"><button><i class="ri-youtube-fill"></i></button></a>
                            <a href="https://www.tiktok.com/@ubmedias" target="_blank"><button><i class="ri-tiktok-fill"></i></button></a>
                            <a href="https://www.whatsapp.com/channel/0029VanftUDG3R3oxVjcPS2k" target="_blank"><button><i class="ri-whatsapp-line"></i></button></a>
                            <a href="https://www.t.me/ubmedias" target="_blank"><button><i class="ri-telegram-fill"></i></button></a>
                        </div>
                        <div class="texts">
                            <p>
                                &copy;2025 <span class="name">UB Médias</span> — Tous droits réservés.
                                <br> Propulsé par
                                <span itemscope itemtype="https://schema.org/Organization" itemprop="creator">
                                    <a href="https://www.amtech-co.com" itemprop="url" rel="sponsored" target="_blank">
                                        <span itemprop="name">Amtech Technology (Amtech-co LLC | Software)</span>
                                    </a>
                                    <meta itemprop="foundingDate" content="2021" />
                                    <meta itemprop="address" content="Goma, Democratic Republic of the Congo" />
                                    <meta itemprop="email" content="contact@amtech-co.com" />
                                    <meta itemprop="logo" content="https://www.amtech-co.com/profile/amtech-technology-logo.png" />
                                    <meta itemprop="sameAs" content="https://www.linkedin.com/company/amtechtechnology/" />
                                    <meta itemprop="sameAs" content="https://github.com/amtech-technology" />
                                    <span itemprop="founder" itemscope itemtype="https://schema.org/Person">
                                        <meta itemprop="name" content="Audrey Mirindi" />
                                    </span>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of body-contents -->
    </div>






    <!-- MANAGE HASH TAGS AND URLS -->
    <!-- ////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- use this code to make urls clickable automatically and hashtags -->
    <script src="./assets/js/urls-and-hashtags.js"></script>
    <!-- include the pagination codes -->
    <script src="./assets/js/pagination.js"></script>
    <!-- uppercase texts -->
    <script>
        const elements = document.querySelectorAll(".text-to-uppercase");

        elements.forEach(element => {
            element.textContent = element.textContent.toUpperCase();
        });
    </script>
    <!-- include the slide menu for mobile format -->
    <script src="./assets/js/mobile-menu.js"></script>
    <!-- ////////////////////////////////////////////////////////////////////////////////////// -->

</body>

</html>