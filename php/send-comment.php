<?php
include('./connection.php');

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$comment = htmlspecialchars($_POST['comment']);
$id = htmlspecialchars($_POST['post_id']);

if (!empty($id)) {
    if (!empty($name) || !empty($email) || !empty($comment)) {

        $sql_comment = "SELECT * FROM publication WHERE `id` = ?";
        $query_comment = $pdo->prepare($sql_comment);
        $query_comment->execute([$id]);

        $result_comment = $query_comment->fetch();
        $comment_num = intval($result_comment['post_comment']);

        $sql = "INSERT INTO comments(`user_name`,`user_email`,`comment`,`Post_id`) VALUES(?,?,?,?)";
        $query = $pdo->prepare($sql);
        if ($query->execute([$name, $email, $comment, $result_comment['unique_id']])) {

            $sql_for_comment = "UPDATE publication SET `post_comment` = ? WHERE `id` = ?";
            $query_for_comment = $pdo->prepare($sql_for_comment);
            if ($query_for_comment->execute([$comment_num + 1, $id])) {
                echo "success";
            } else {
                echo "L'erreur est survenue lors de l'incrementation de nombres de commentaires";
            }
        } else {
            echo "L'erreur est survenu lors de l'envoie de votre commentaire!";
        }
    } else {
        echo "Remplissez tous les champs s'il vous plaît!";
    }
} else {
    echo "Ce publication a rencontré un problème! l'identifiant n'est plus disponible";
}
