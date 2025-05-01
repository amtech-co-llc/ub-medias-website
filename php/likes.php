<?php
session_start();

include('./connection.php');

// Get the post_id and user ID (you can replace this with the actual method you're using to track users)
$post_id = intval($_POST['post_id']);

// Check if the post exists
$sql = "SELECT * FROM publication WHERE `id` = ?";
$query = $pdo->prepare($sql);
$query->execute([$post_id]);

$result = $query->fetch();
if (count($result) > 0) {

    if (intval($result['post_dislikes']) > 0 || intval($result['post_likes']) > 0) {
        $sql_likes = "UPDATE publication SET `post_likes` = ?, `post_views` = ? WHERE id = ?";
        $query_likes = $pdo->prepare($sql_likes);
        $query_likes->execute([intval($result['post_likes']) + 1, intval($result['post_views']) + 1, $post_id]);
    } else {
        $sql_likes2 = "UPDATE publication SET `post_likes` = ?, `post_views` = ? WHERE id = ?";
        $query_likes2 = $pdo->prepare($sql_likes2);
        $query_likes2->execute(['1', intval($result['post_views']) + 1, $post_id]);
    }
}
