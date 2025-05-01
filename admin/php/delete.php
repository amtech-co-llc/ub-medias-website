<?php
include('./connection.php');

$id = $_GET['id'];

$sql1  = "SELECT * FROM publication WHERE `id` = ?";
$query1 = $pdo->prepare($sql1);
$query1->execute([$id]);

$result = $query1->fetchAll(PDO::FETCH_ASSOC);
if (count($result) > 0) {
    foreach ($result as $row) {

        if (unlink("../uploads/" . $row['image'])) {

            $sql = "DELETE FROM publication WHERE `id` = ?";
            $query = $pdo->prepare($sql);
            if ($query->execute([$id])) {
                header('Location: ../contenues.php');
            }
        }
    }
}
