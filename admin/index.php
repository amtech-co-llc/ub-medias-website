<!-- ////////////////////////////////////////////////////////////////////////////////// -->
<?php
include('./php/connection.php');

$sql = "SELECT 
            SUM(post_views) AS total_views, 
            SUM(post_likes) AS total_likes, 
            SUM(post_comment) AS total_comments, 
            SUM(post_share) AS total_shares 
        FROM publication";
$query = $pdo->prepare($sql);
$query->execute();
$results = $query->fetch();

?>
<!-- ////////////////////////////////////////////////////////////////////////////////// -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!--  ///////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- include the style  -->
    <link rel="stylesheet" href="./assets/css/admin-style.css">
    <!-- include the style for mobile -->
    <link rel="stylesheet" href="./assets/css/admin-style-mobile.css">
    <!-- inlcude icons -->
    <link rel="stylesheet" href="./assets/RemixIcon_Fonts_v4.6.0/fonts/remixicon.css">
    <!-- include a chart -->
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Luxon + Adapter -->
    <script src="https://cdn.jsdelivr.net/npm/luxon@3/build/global/luxon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.3.0/dist/chartjs-adapter-luxon.umd.min.js"></script>


    <!-- include favicon for page -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!--  ///////////////////////////////////////////////////////////////////////////////////////// -->

</head>

<body>
    <!-- beginning of contents -->
    <div class="containers">
        <!-- beginning of the navigation bar -->
        <div class="b4-navigation">
            <div class="navigation">
                <button id="menu-btn" hidden><i class="ri-menu-2-line"></i></button>
                <div class="logo">
                    <h2>UB Medias</h2>
                </div>
                <div class="others-plus-profile">
                    <div class="notifications">
                        <div class="notif-icon" id="nofication-btn">
                            <i class="ri-notification-3-line"></i>
                            <i class="ri-circle-fill" id="dot-nofit"></i>
                        </div>
                        <!-- beginning of the nofication pop-up -->
                        <div class="pop-up-notif" id="nofication-popup">
                            <div class="title">
                                <h3>Notifications</h3>
                            </div>
                            <ul>
                                <!-- beginning of nofication card -->
                                <li>
                                    <a href="#">
                                        <h4>notification title</h4>
                                        <p>This the notification description...</p>
                                    </a>
                                </li>
                                <!-- end of nofication card -->
                                <!-- beginning of nofication card -->
                                <li>
                                    <a href="#">
                                        <h4>notification title</h4>
                                        <p>This the notification description...</p>
                                    </a>
                                </li>
                                <!-- end of nofication card -->
                                <!-- beginning of nofication card -->
                                <li>
                                    <a href="#">
                                        <h4>notification title</h4>
                                        <p>This the notification description...</p>
                                    </a>
                                </li>
                                <!-- end of nofication card -->
                                <!-- beginning of nofication card -->
                                <li>
                                    <a href="#">
                                        <h4>notification title</h4>
                                        <p>This the notification description...</p>
                                    </a>
                                </li>
                                <!-- end of nofication card -->
                                <!-- beginning of nofication card -->
                                <li>
                                    <a href="#">
                                        <h4>notification title</h4>
                                        <p>This the notification description...</p>
                                    </a>
                                </li>
                                <!-- end of nofication card -->
                                <!-- beginning of nofication card -->
                                <li>
                                    <a href="#">
                                        <h4>notification title</h4>
                                        <p>This the notification description...</p>
                                    </a>
                                </li>
                                <!-- end of nofication card -->
                                <!-- beginning of nofication card -->
                                <li>
                                    <a href="#">
                                        <h4>notification title</h4>
                                        <p>This the notification description...</p>
                                    </a>
                                </li>
                                <!-- end of nofication card -->
                                <!-- beginning of nofication card -->
                                <li>
                                    <a href="#">
                                        <h4>notification title</h4>
                                        <p>This the notification description...</p>
                                    </a>
                                </li>
                                <!-- end of nofication card -->
                                <!-- beginning of nofication card -->
                                <li>
                                    <a href="#">
                                        <h4>notification title</h4>
                                        <p>This the notification description...</p>
                                    </a>
                                </li>
                                <!-- end of nofication card -->
                            </ul>
                        </div>
                        <!-- end of the notification pop-up -->
                    </div>
                    <div class="profile">
                        <div class="image" id="profile">
                            <img src="./assets/images/profile.png" id="profile-menu" alt="Profile">
                            <div class="pop-up-profile" id="profile-menu-contents">
                                <ul>
                                    <li><a href="#"><i class="ri-settings-4-line"></i> Paramètres</a></li>
                                    <li><a href="#"><i class="ri-pencil-fill"></i> Modifier</a></li>
                                    <li><a href="#"><i class="ri-login-circle-line"></i> Log out</a></li>
                                </ul>
                            </div>
                        </div>
                        <h4>Audrey Mirindi </h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of the navigation bar -->
        <!-- beginning of the body contents -->
        <div class="body-contents">
            <div class="left-contents">
                <div class="menu-list">
                    <ul>
                        <a href="./index">
                            <li class="active"><i class="ri-bar-chart-fill"></i> Statistiques</li>
                        </a>
                        <a href="./publications">
                            <li class=""><i class="ri-article-fill"></i> Publications</li>
                        </a>
                        <a href="./contenues">
                            <li class=""><i class="ri-layout-2-fill"></i> Contenues</li>
                        </a>
                        <a href="./partie-radio">
                            <li class=""><i class="ri-radio-2-line"></i> Partie Radio</li>
                        </a>
                        <a href="./partie-television">
                            <li class=""><i class="ri-tv-line"></i> Partie Télévision</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="right-contents">
                <!-- beginning of cards -->
                <h2 class="title-c">Statistique des contenus</h2>
                <div class="first-cards">
                    <!-- beginning of card1 -->
                    <div class="card1">
                        <h5>Nombre total de vues</h5>
                        <h1><?php echo formatViews($results['total_views'] ?? '0'); ?></h1>
                        <p>Nombre réel: <?php echo $results['total_views'] ?? '0'; ?></p>
                    </div>
                    <!-- end of card1 -->
                    <!-- beginning of card1 -->
                    <div class="card1">
                        <h5>Nombre total de Likes</h5>
                        <h1><?php echo formatViews($results['total_likes'] ?? '0'); ?></h1>
                        <p>Nombre réel: <?php echo $results['total_likes'] ?? '0'; ?></p>
                    </div>
                    <!-- end of card1 -->
                    <!-- beginning of card1 -->
                    <div class="card1">
                        <h5>Nombre de Comments</h5>
                        <h1><?php echo formatViews($results['total_comments'] ?? '0'); ?></h1>
                        <p>Nombre réel: <?php echo $results['total_comments'] ?? '0'; ?></p>
                    </div>
                    <!-- end of card1 -->
                    <!-- beginning of card1 -->
                    <div class="card1">
                        <h5>Nombre total de Partages</h5>
                        <h1><?php echo formatViews($results['total_shares'] ?? '0'); ?></h1>
                        <p>Nombre réel: <?php echo $results['total_shares'] ?? '0'; ?></p>
                    </div>
                    <!-- end of card1 -->
                </div>
                <!-- end of cards -->
                <div class="chats" style="margin-top:-50px;">
                    <canvas id="viewsChart" width="400" height="150" style="padding: 2em;"></canvas>
                </div>
            </div>
        </div>
        <!-- end of the body contents -->
    </div>
    <!-- end of contents -->

    <!--  ///////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- including javascript -->
    <script src="./assets/js/actions.js"></script>

    <script>
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "php/fetch-data-for-chart.php", true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                const rawData = JSON.parse(xhr.responseText);

                // Map data into format Chart.js expects
                const viewsData = rawData.map(item => ({
                    x: item.temps_de_publication,
                    y: parseInt(item.post_views)
                }));

                // Create the chart
                const ctx = document.getElementById('viewsChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        datasets: [{
                            label: 'Nombre des vues',
                            data: viewsData,
                            borderColor: '#029bd8',
                            backgroundColor: 'rgba(129, 190, 255, 0.1)',
                            tension: 0,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                type: 'time',
                                time: {
                                    unit: 'hour', // change to 'day' if you prefer
                                    tooltipFormat: 'DD T'
                                },
                                title: {
                                    display: true,
                                    text: 'Temps et Dates'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Vues'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: true
                            }
                        }
                    }
                });
            }
        };
        xhr.send();
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