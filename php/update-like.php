<?php
session_start();
header('Content-Type: application/json');
include('./connection.php');

// Validate post_id
if (!isset($_POST['post_id']) || !is_numeric($_POST['post_id'])) {
    echo json_encode(["success" => false, "error" => "Invalid post ID"]);
    exit;
}

$post_id = intval($_POST['post_id']);

// Check if the post exists
$sql = "SELECT post_likes, post_views FROM publication WHERE id = ?";
$query = $pdo->prepare($sql);
$query->execute([$post_id]);
$result = $query->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    echo json_encode(["success" => false, "error" => "Post not found"]);
    exit;
}

// Increment likes and views
$newLikes = intval($result['post_likes']) + 1;
$newViews = intval($result['post_views']) + 1;

$update = $pdo->prepare("UPDATE publication SET post_likes = ?, post_views = ? WHERE id = ?");
$update->execute([$newLikes, $newViews, $post_id]);

// Return updated like count for JS
echo json_encode([
    "success" => true,
    "newCount" => $newLikes
]);
exit;
?>
