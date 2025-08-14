<?php
include('./php/connection.php');

$id = $_GET['id'];

$sql_first = "SELECT * FROM publication WHERE `id` = ?";
$query_first = $pdo->prepare($sql_first);
$query_first->execute([$id]);

$result_first = $query_first->fetch();
$post_views = intval($result_first['post_views']);

$sql_for_comment = "UPDATE publication SET `post_views` = ? WHERE `id` = ?";
$query_for_comment = $pdo->prepare($sql_for_comment);
$query_for_comment->execute([$post_views + 1, $id]);

?>

<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires</title>

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

    <script src="./assets/js/load-more.js"></script>

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
                <a href="./">
                    <h3>UB Medias</h3>
                </a>
                <ul>
                    <li><a href="./">Acceuil</a></li>
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
                    <a href="./newsletters"><button class="button-1"><i class="ri-notification-3-line"></i>
                            S'abonner</button></a>
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
                <a href="./newsletters"><button class="button-3"><i class="ri-notification-3-line"></i></button></a>
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
                    <a href="./">
                        <h3>UB Medias</h3>
                    </a>
                    <button></button>
                </div>
                <ul>
                    <li><a href="./">Acceuil</a></li>
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
                <!-- big-first-card -->
                <?php

                $sql = "SELECT * FROM publication WHERE `id` = ? ORDER BY id DESC LIMIT 1";
                $query = $pdo->prepare($sql);
                $query->execute([$id]);

                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                if (count($results) > 0) {
                    foreach ($results as $row) {

                        $desc = (mb_strlen($row['description'], 'UTF-8') > 600)
                            ? mb_substr($row['description'], 0, 600, 'UTF-8') . '...'
                            : $row['description'];

                ?>
                        <div class="top-card">
                            <div class="image">
                                <a href="./admin/uploads/<?php echo $row['image'] ?>"><img src="./admin/uploads/<?php echo $row['image'] ?>" alt=""></a>
                            </div>
                            <div class="details">
                                <a href="./<?php echo $row['seo_url'] ?>" style="text-decoration:none;color:#000;">
                                    <h3><?php echo $row['titre'] ?></h3>
                                </a>
                                <p class="article-content"><?php echo $row['description'] ?></p>
                                <div class="categorie" id="categorie"><i class="ri-delete-back-line"></i> <?php echo $row['categorie'] ?></div>
                                <div class="other-details">
                                    <div class="icons">
                                        <div class="act"><i class="ri-edit-line"></i> <?php echo $row['nom_du_redacteur'] ?></div>
                                        <div class="act like-btn" data-post-id="<?php echo $row['id']; ?>"><i class="ri-thumb-up-line"></i> <?php echo formatViews($row['post_likes']); ?></div>
                                        <div class="act dislike-btn" data-post-id="<?php echo $row['id']; ?>"><i class=" ri-thumb-down-line"></i> <?php echo formatViews($row['post_dislikes']); ?></div>
                                        <a href="./comment?id=<?php echo $row['id'] ?>" id="redir">
                                            <div class="act"><i class="ri-chat-3-line"></i> <?php echo formatViews($row['post_comment']); ?></div>
                                        </a>
                                        <a href="./partager?id=<?php echo $row['id'] ?>" id="redir">
                                            <div class="act"><i class="ri-share-forward-line"></i> <?php echo formatViews($row['post_share']); ?></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php

                    }
                }
                ?>
                <div class="comments">
                    <div class="comments-contents">
                        <div class="comments-cards">
                            <?php
                            $sql = "SELECT * FROM comments WHERE `post_id` = ? ORDER BY id DESC";
                            $query = $pdo->prepare($sql);
                            $query->execute([$result_first['unique_id']]);

                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            if (count($res) > 0) {
                                foreach ($res as $row) {

                            ?>
                                    <!-- beginning of comment card -->
                                    <div class="comment-1">
                                        <h3><?php echo $row['user_name'] ?></h3>
                                        <p><?php echo $row['comment'] ?></p>
                                    </div>
                                    <!-- end of comment card -->
                            <?php
                                }
                            } else {
                                echo "<h3 style='color:gray;width:500px;text-align:center;'>Soit le premier à commenter</h3>";
                            }
                            ?>
                        </div>
                        <!-- Pagination controls -->
                        <br>
                        <center>
                            <div class="pagination-container" id="pagination-container"></div>
                        </center>
                    </div>

                    <div class="comment-place">
                        <h2>Laissez un commentaire</h2><br>
                        <center>
                            <p id="visualizer"></p>
                        </center>
                        <form action="#" id="form">
                            <input type="text" name="name" placeholder="Votre nom">
                            <input type="text" name="email" placeholder="Votre email">
                            <textarea name="comment" maxlength="195" placeholder="Votre commentaire" id=""></textarea>
                            <input type="text" name="post_id" value="<?php echo $id ?>" hidden>
                            <button id="submit">Envoyer</button>
                        </form>
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
    <script src="./assets/js/comment-pag.js"></script>
    <script>
        const elements = document.querySelectorAll(".text-to-uppercase");

        elements.forEach(element => {
            element.textContent = element.textContent.toUpperCase();
        });
    </script>
    <!-- include the slide menu for mobile format -->
    <script src="./assets/js/mobile-menu.js"></script>
    <!-- ////////////////////////////////////////////////////////////////////////////////////// -->

    <script>
        const form = document.getElementById('form');
        const visualizer = document.getElementById('visualizer');
        const submit = document.getElementById('submit');

        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const formData = new FormData(form); // Collect form data

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'php/send-comment.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const newContent = xhr.response;
                    if (newContent === "success") {
                        visualizer.innerHTML = '<p style="background:green;color:#fff;padding:8px;border-radius:8px;margin:5px 0px;">Comment sent successfully!</p>';
                        setTimeout(() => {
                            visualizer.innerHTML = '';
                            form.reset();
                        }, 3000);
                    } else {
                        visualizer.innerHTML = '<p style="background:#ffa4a4;color:#000;padding:8px;border-radius:8px;margin:5px 0px;">' +
                            newContent + '</p>';
                        setTimeout(() => {
                            visualizer.innerHTML = '';
                            form.reset();
                        }, 3000);
                    }
                }
            };
            xhr.send(formData); // Send the form data to PHP
        });
    </script>


</body>

</html>

<?php
function formatViews($number)
{
    if ($number < 1000) {
        return (string)$number;
    } elseif ($number < 1000000) {
        return round($number / 1000, 1) . 'K';
    } elseif ($number < 1000000000) {
        return round($number / 1000000, 1) . 'M';
    } elseif ($number < 1000000000000) {
        return round($number / 1000000000, 1) . 'B';
    } else {
        return round($number / 1000000000000, 1) . 'T';
    }
}

?>

<style>
    .comments-cards {
        width: 500px;
    }

    @media (min-width: 300px) and (max-width: 575.98px) {
        .comments-cards {
            width: 100%;
        }
    }
</style>