<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>

    <!--  ///////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- include the style  -->
    <link rel="stylesheet" href="./assets/css/admin-style.css">
    <!-- include the style for mobile -->
    <link rel="stylesheet" href="./assets/css/admin-style-mobile.css">
    <!-- inlcude icons -->
    <link rel="stylesheet" href="./assets/RemixIcon_Fonts_v4.6.0/fonts/remixicon.css">
    <!-- include a chart -->
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
                            <li class=""><i class="ri-bar-chart-fill"></i> Statistiques</li>
                        </a>
                        <a href="./publications">
                            <li class=""><i class="ri-article-fill"></i> Publications</li>
                        </a>
                        <a href="./contenues">
                            <li class="active"><i class="ri-layout-2-fill"></i> Contenues</li>
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
                <h2 class="title-c">Contenues</h2>

                <div class="visualize-publication" id="visualize-publication">
                    <!-- beginning of cards -->
                    <div class="publication-cards" id="publication-cards">

                    </div>
                    <!-- end of cards -->
                </div>
                <center>
                    <div id="pagination-container">
                        <!-- Buttons will appear here -->
                    </div>
                </center>

                <!-- end of cards -->
                <div class="chats">

                </div>
            </div>
        </div>
        <!-- end of the body contents -->
    </div>
    <!-- end of contents -->

    <!--  ///////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- including javascript -->
    <script src="./assets/js/actions.js"></script>
    <script src="./assets/js/pagination2.js"></script>
    <script>
        function initializeDropdowns() {
            // Remove existing listeners first by cloning nodes (clean slate)
            document.querySelectorAll('.list-buttons-action').forEach(originalBtn => {
                const newBtn = originalBtn.cloneNode(true);
                originalBtn.parentNode.replaceChild(newBtn, originalBtn);
            });

            // Now reselect the cleaned buttons
            const buttons = document.querySelectorAll('.list-buttons-action');

            buttons.forEach(button => {
                button.addEventListener('click', (event) => {
                    event.stopPropagation();

                    const dropdown = button.nextElementSibling;
                    const isOpen = dropdown.classList.contains('show');

                    document.querySelectorAll('.lists-actions').forEach(menu => {
                        menu.classList.remove('show');
                    });
                    document.querySelectorAll('.list-buttons-action').forEach(btn => {
                        btn.classList.remove('show');
                    });

                    if (!isOpen) {
                        dropdown.classList.add('show');
                        button.classList.add('show');
                    }
                });
            });
        }

        // Click outside closes dropdowns
        document.addEventListener('click', () => {
            document.querySelectorAll('.lists-actions').forEach(menu => {
                menu.classList.remove('show');
            });
            document.querySelectorAll('.list-buttons-action').forEach(btn => {
                btn.classList.remove('show');
            });
        });

        // First run
        initializeDropdowns();
    </script>



</body>

</html>