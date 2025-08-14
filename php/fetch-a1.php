<?php
include("./connection.php");

$sql = "SELECT * FROM publication ORDER BY RAND() DESC LIMIT 1";
$query = $pdo->prepare($sql);
$query->execute();

$results = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($results) > 0) {
    foreach ($results as $row) {

        (strlen($row['description']) > 110) ? $desc = substr($row['description'], 0, 110) . '...' : $desc =  $row['description'];

        echo '

           <div class="top-card">
                <div class="image">
                    <a href="./admin/uploads/' . $row['image'] . '"><img src="./admin/uploads/' . $row['image'] . '" alt=""></a>
                </div>
                <div class="details">
                    <h3>' . $row['titre'] . '</h3>
                    <p class="article-content">' . $row['description'] . '</p>
                    <div class="categorie" id="categorie"><i class="ri-delete-back-line"></i>' . $row['categorie'] . '</div>
                    <div class="other-details">
                        <div class="icons">
                            <div class="act"><i class="ri-edit-line"></i>' . $row['nom_du_redacteur'] . '</div>
                            <div class="act like-btn" data-post-id="' . $row['id'] . '"><i class="ri-thumb-up-line"></i>' . formatViews($row['post_likes']) . '</div>
                            <div class="act dislike-btn" data-post-id="' . $row['id'] . '"><i class=" ri-thumb-down-line"></i>' . formatViews($row['post_dislikes']) . '</div>
                            <a href="./comment?id=' . $row['id'] . '" id="redir">
                                <div class="act"><i class="ri-chat-3-line"></i>' . formatViews($row['post_comment']) . '</div>
                            </a>
                            <a href="./partager?id=' . $row['id'] . '" id="redir">
                                <div class="act"><i class="ri-share-forward-line"></i>' . formatViews($row['post_share']) . '</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
