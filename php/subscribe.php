<?php
include('connection.php');

$email = htmlspecialchars($_POST['email']);
$unique_id = rand(10000, 100000);

if (!empty($email)) {
    if (sanitizeAndValidateEmail($email) === "bon") {
        $sql = "SELECT * FROM abonnements WHERE `email` = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$email]);

        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($res) > 0) {
            echo "Cet Adresse mail est déjà Abonné!";
        } else {
            $sql2 = "INSERT INTO abonnements (`unique_id`,`email`) VALUES (?,?)";
            $query2 = $pdo->prepare($sql2);
            if ($query2->execute([$unique_id, $email])) {
                echo "abonne";
            } else {
                echo "L'erreur est survenu lors de l'abonnement";
            }
        }
    } else {
        echo sanitizeAndValidateEmail($email);
    }
} else {
    echo "Remplissez cet champ s'il vous plaît!";
}


////////////////////////////////////////////////////////////////////////////////////

function sanitizeAndValidateEmail($email)
{
    // Sanitize the email
    $sanitizedEmail = filter_var(trim(strtolower($email)), FILTER_SANITIZE_EMAIL);

    // Validate the email format
    if (filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {
        return "bon";
    } else {
        return "Votre Adresse mail est invalide!";
    }
}
