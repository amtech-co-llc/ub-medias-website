<?php
include('./connection.php');

$sql2 = "SELECT post_views, temps_de_publication FROM publication ORDER BY temps_de_publication ASC";
$query2 = $pdo->prepare($sql2);
$query2->execute();
$data = $query2->fetchAll(PDO::FETCH_ASSOC);

// Convert timestamps to readable date strings (or keep timestamps if preferred)
foreach ($data as &$row) {
    $row['temps_de_publication'] = date('Y-m-d\TH:i:s', strtotime($row['temps_de_publication']));
}

header('Content-Type: application/json');
echo json_encode($data);
