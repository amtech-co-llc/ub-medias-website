<?php
/////////////////////////////////////////////////////////////////////////////////////
// etablish the connection with the database
include('./connection.php');

// configure the query to execute for fetching data from the table
$sql = "SELECT * FROM publication ORDER BY id DESC";
$query = $pdo->prepare($sql); // prepare the query
$query->execute(); // execute the query

// fetch the associative data
$result = $query->fetchAll(PDO::FETCH_ASSOC);
// test if there are available datas from the table
if (count($result) > 0) {
    // if there are datas, then fetch all and store them into row
    foreach ($result as $row) {
        (strlen($row['description']) > 50) ? $desc = substr($row['description'], 0, 50) . '...' : $desc =  $row['description'];
        (strlen($row['titre']) > 60) ? $title = substr($row['titre'], 0, 60) . '...' : $title =  $row['titre'];
        // this comes from your DB (timestamp)
        $publication_time = $row['temps_de_publication'];

        echo '
            <!-- beginning of a card -->
                        <div class="card-p1">
                            <div class="contents-card">
                                <div class="image">
                                    <img src="uploads/' . $row['image'] . '" alt="">
                                </div>
                                <div class="details-card">
                                    <h4>' . $title . '</h4>
                                    <p>
                                        ' . $desc . '
                                    </p>
                                    <p>Heure de publication: <span style="color:green;">' . timeAgo($publication_time) . '</span></p>
                                    <p style="color:#029bd8;">' . formatViews($row['post_views']) . ' views  ' . formatViews($row['post_likes']) . ' Likes <i class="ri-circle-fill" style="font-size:8px;"></i> ' . formatViews($row['post_dislikes']) . ' dislikes <i class="ri-circle-fill" style="font-size:8px;"></i> ' . formatViews($row['post_comment']) . ' comments</p>
                                </div>
                            </div>
                            <div class="actions-card">
                                <button class="list-buttons-action"><i class="ri-more-2-fill"></i></button>
                                <div class="lists-actions">
                                    <ul>
                                        <a href="./php/edit.php?id=' . $row['id'] . '">
                                            <li><i class="ri-pencil-fill"></i> Modifier</li>
                                        </a>
                                        <a href="./php/delete.php?id=' . $row['id'] . '">
                                            <li><i class="ri-delete-bin-6-line"></i> Supprimer</li>
                                        </a>
                                    </ul>
</div>
                            </div>
                        </div>
                        <!-- end of a card -->
        ';
    }
} else {
    echo "<center><h3 style='color:red;margin-top:1em;'>Pas de données disponible</h3></center>";
}

function timeAgo($timestamp)
{
    $time = strtotime($timestamp);
    $diff = time() - $time;

    if ($diff < 60)
        return 'Maintenant';
    elseif ($diff < 3600)
        return  'il y a ' . floor($diff / 60) . ' minute' . (floor($diff / 60) > 1 ? 's' : '');
    elseif ($diff < 86400)
        return 'il y a ' . floor($diff / 3600) . ' heure' . (floor($diff / 3600) > 1 ? 's' : '');
    elseif ($diff < 604800)
        return 'il y a ' .  floor($diff / 86400) . ' jour' . (floor($diff / 86400) > 1 ? 's' : '');
    elseif ($diff < 2419200)
        return 'il y a ' .  floor($diff / 604800) . ' semaine' . (floor($diff / 604800) > 1 ? 's' : '');
    elseif ($diff < 29030400)
        return 'il y a ' . floor($diff / 2419200) . ' moin' . (floor($diff / 2419200) > 1 ? 's' : '');
    else
        return 'il y a ' . floor($diff / 29030400) . ' an' . (floor($diff / 29030400) > 1 ? 's' : '');
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////         

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

////////////////////////////////////////////////////////////////////////////////////////////////////////////