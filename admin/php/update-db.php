<?php

////////////////////////////////////////////////////////////////////////////////////////////////
include('./connection.php'); // connect to the database

// fetch data from the form
$titre = html_entity_decode(htmlspecialchars($_POST['titre'])); // fetch data from title
$categorie = html_entity_decode(htmlspecialchars($_POST['categorie'])); // fetch data from category
$nom_du_redacteur = html_entity_decode(htmlspecialchars($_POST['nom_du_redacteur'])); // fetch data from editor name
$description = html_entity_decode(htmlspecialchars($_POST['description'])); // fetch data from description
$id = html_entity_decode(htmlspecialchars($_POST['id']));
$unique_id = html_entity_decode(htmlspecialchars($_POST['unique_id']));

/////////////////////////////////////////////////////////////////////////////////////////////////////////
// SEO friendly URL
$seo_f_url = html_entity_decode($titre);

// Replace any non-alphanumeric characters (except spaces and dashes) with nothing
// Step 1: Decode HTML entities
$seo_url1 = html_entity_decode($seo_f_url, ENT_QUOTES, 'UTF-8');
// Step 2: Convert accented characters to ASCII equivalents
$seo_url2 = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $seo_url1);
// Step 3: Remove quotes (straight and smart quotes)
$seo_url3 = preg_replace('/[\"\'“”‘’]+/u', '', $seo_url2);
// Step 4: Remove non-alphanumeric characters except spaces and dashes
$seo_url4 = preg_replace('/[^A-Za-z0-9\s-]/u', '', $seo_url3);
// Step 5: Replace spaces (and multiple dashes) with a single dash
$seo_url5 = preg_replace('/[\s\-]+/', '-', $seo_url4);
// Step 6: Convert to lowercase
$seo_url6 = mb_strtolower($seo_url5, 'UTF-8');
// Step 7: Trim dashes from beginning and end
$seo_url = trim($seo_url6, '-');

//////////////////////////////////////////////////////////////////////////////////////////////////////

//$unique_id = rand(10000, 100000); // generate a random number for a unique id

// check if the fields are not empty
if (!empty($titre) && !empty($categorie) && !empty($nom_du_redacteur) && !empty($description)) {

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        // fetch the image file from the fom
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        // Get the file extension
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp']; // Allowed image types

        // Check file extension
        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            die('Error: Only .jpg, .jpeg, .png, and .gif files are allowed.');
            echo 'Error: Only .jpg, .jpeg, .png, and .gif files are allowed.';
        }

        // Check if the file size is within limits (max 5MB here)
        if ($fileSize > 5 * 1024 * 1024) {
            die('Error: File size should be less than 5MB.');
            echo 'Error: File size should be less than 5MB.';
        }

        // Set the target directory where the image will be uploaded
        /* $uploadDir = '../uploads/'; // Make sure this folder is writable
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create directory if it doesn't exist
        } */

        $uploadDir = '../uploads/';

        // Call the function to convert the uploaded image to WebP before saving it
        /* $newFileName = uniqid() . '.webp'; // Unique name for the WebP image */
        $newFileName = $seo_url . '_' . $unique_id . '.webp';

        $outputFilePath = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $outputFilePath)) {
            // Corrected line
            //INSERT INTO publication(`unique_id`,`titre`,`description`,`categorie`,`nom_du_redacteur`,`image`,`seo_url`) VALUES(?,?,?,?,?,?,?)
            $sql = "UPDATE publication SET `titre` = ?, `description` = ?, `categorie` = ?, `nom_du_redacteur` = ?, `image` = ?, `seo_url` = ? WHERE `id` = ?";
            $query = $pdo->prepare($sql);
            $save = $query->execute([$titre, $description, $categorie, $nom_du_redacteur, $newFileName, $seo_url, $id]);
            if ($save) {
                echo "saved"; // return this text while datas are saved successfully into the database
            } else {
                echo "L'erreur s'est produit lors de l'enregistrement des données!"; // return this text while there were an issue while saving
            }
        }
    }
} else {
    // if the fields or one field is empty then return this text
    echo "Remplissez tout les champs s'il vous plaît!";
}





/////////////////////////////////////////////////////////////////////////////////////////////////