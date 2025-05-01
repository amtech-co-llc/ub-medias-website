<?php
include('./connection.php');

$id = $_GET['id'];

$sql = "SELECT * FROM publication WHERE id={$id}";
$query = $pdo->prepare($sql);
$query->execute();

$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    foreach ($res as $row) {


?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier</title>

            <!--  ///////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- include the style  -->
            <link rel="stylesheet" href="../assets/css/admin-style.css">
            <!-- include the style for mobile -->
            <link rel="stylesheet" href="../assets/css/admin-style-mobile.css">
            <!-- inlcude icons -->
            <link rel="stylesheet" href="../assets/RemixIcon_Fonts_v4.6.0/fonts/remixicon.css">
            <!-- include a chart -->

            <!-- include favicon for page -->
            <link rel="icon" type="image/x-icon" href="../favicon.ico">
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
                                    <img src="../assets/images/profile.jpeg" id="profile-menu" alt="Profile">
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
                                <a href="../index.php">
                                    <li class=""><i class="ri-bar-chart-fill"></i> Statistiques</li>
                                </a>
                                <a href="../publications.php">
                                    <li class="active"><i class="ri-article-fill"></i> Publications</li>
                                </a>
                                <a href="../contenues.php">
                                    <li class=""><i class="ri-layout-2-fill"></i> Contenues</li>
                                </a>
                                <a href="../partie-radio.php">
                                    <li class=""><i class="ri-radio-2-line"></i> Partie Radio</li>
                                </a>
                                <a href="../partie-television.php">
                                    <li class=""><i class="ri-tv-line"></i> Partie Télévision</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div class="right-contents">
                        <!-- beginning of cards -->
                        <h2 class="title-c">Modifier l'article</h2>

                        <!-- beginning of publications card -->

                        <div class="publication-form">
                            <!-- beginning of form -->
                            <form action="#" id="myForm">
                                <p id="visualizer" style="
                            display:none;
                            padding: 0.8em;
                            text-align: center;
                            margin:3px;
                            border-radius:8px;
                        "></p>
                                <div class="inputs">
                                    <label for="">Titre de l'article</label>
                                    <input type="text" id="title-art" value='<?php echo $row['titre'] ?>' name="titre" placeholder="Titre de l'article">
                                </div>
                                <div class="inputs">
                                    <label for="">Categorie</label>
                                    <select name="categorie" value='<?php echo $row['categorie'] ?>' id="">
                                        <option value="Politique" <?php if ($row['categorie'] == 'Politique') echo 'selected'; ?>>Politique</option>
                                        <option value="Sport" <?php if ($row['categorie'] == 'Sport') echo 'selected'; ?>>Sport</option>
                                        <option value="Culture" <?php if ($row['categorie'] == 'Culture') echo 'selected'; ?>>Culture</option>
                                    </select>
                                </div>
                                <div class="inputs">
                                    <label for="">Nom du Rédacteur</label>
                                    <input type="text" maxlength="15" name="nom_du_redacteur" value="<?php echo $row['nom_du_redacteur'] ?>" placeholder="Nom du Rédacteur">
                                </div>
                                <div class="inputs">
                                    <label for="">Description</label>
                                    <textarea name="description" maxlength="776" id="text-area" placeholder="Description"><?php echo $row['description'] ?></textarea>
                                </div>
                                <div class="inputs">
                                    <label for="">Selectionner encore une cette image ou une autre</label>
                                    <input type="file" name="image" id="imageInput" accept="image/*">
                                </div>
                                <input type="text" value="<?php echo $row['id'] ?>" name="id" id="" hidden>
                                <input type="text" value="<?php echo $row['unique_id'] ?>" name="unique_id" hidden>
                                <button type="publier-article">Publier</button>
                            </form>
                            <!-- end of form -->

                            <!-- beginning of visualizing -->

                            <div class="visualiser-pub">
                                <div class="image">
                                    <img src="../uploads/<?php echo $row['image'] ?>" id="imagePreview" alt="">
                                </div>
                                <div class="details-pub">
                                    <h3 class="titre article-content2"><?php echo $row['titre'] ?></h3>
                                    <p class="article-content"><?php echo $row['description'] ?></p>
                                </div>
                            </div>

                            <!-- end of visualizing -->

                        </div>

                        <div class="visualize-publication" id="visualize-publication" style="margin-top: -50px;">
                            <!-- <h3 style="text-align: center;">Toutes les Publications</h3> -->
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

                        <!-- end of publication card -->

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
            <script src="../assets/js/paginations.js"></script>
            <script src="../assets/js/actions.js"></script>
            <script src="../assets/js/urls_and_hashtags.js"></script>
            <!-- fetch data from a php page to display publications -->

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

            <script>
                const form = document.getElementById('myForm');
                const visualizer = document.getElementById('visualizer');

                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const fileInput = form.querySelector('input[type="file"]');
                    const imageFile = fileInput.files[0];

                    if (imageFile) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            const img = new Image();
                            img.src = event.target.result;

                            img.onload = function() {
                                const canvas = document.createElement('canvas');
                                canvas.width = img.width;
                                canvas.height = img.height;

                                const ctx = canvas.getContext('2d');
                                ctx.drawImage(img, 0, 0);

                                canvas.toBlob(function(blob) {
                                    const formData = new FormData(form);
                                    formData.delete(fileInput.name); // Remove original image
                                    formData.append(fileInput.name, blob, 'image.webp'); // Add WebP blob

                                    const xhr = new XMLHttpRequest();
                                    xhr.open("POST", "./update-db.php", true);

                                    xhr.onload = function() {
                                        const datas = xhr.response;
                                        if (xhr.status === 200 && datas === "saved") {
                                            showMessage("Modifié avec succès!", "#009600");
                                        } else {
                                            showMessage(datas || "Erreur lors de la publication.", "#ec8484");
                                        }
                                    };

                                    xhr.send(formData);
                                }, 'image/webp', 0.8); // Convert to WebP with 80% quality
                            };
                        };
                        reader.readAsDataURL(imageFile);
                    } else {
                        showMessage("Aucun fichier sélectionné.", "#ec8484");
                    }
                });

                function showMessage(text, color) {
                    visualizer.style.display = "block";
                    visualizer.style.backgroundColor = color;
                    visualizer.style.color = "#fff";
                    visualizer.innerHTML = text;
                    setTimeout(() => {
                        visualizer.style.display = "none";
                        visualizer.innerHTML = "";
                        form.reset();
                    }, 3000);
                }
            </script>


        </body>

        </html>

<?php
    }
}
?>