<?php
include('./connection.php');

$sql = "SELECT * FROM publication ORDER BY id DESC";
$query = $pdo->prepare($sql);
$query->execute();

$results = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($results) > 0) {
    foreach ($results as $row) {

        (strlen($row['description']) > 110) ? $desc = substr($row['description'], 0, 110) . '...' : $desc =  $row['description'];

        echo '
            <!-- beginning of card1 -->
            <div class="card1">
                <div class="image">
                    <img src="./admin/uploads/' . $row['image'] . '" alt="">
                </div>
                <div class="details">
                    <div class="categorie" id="categorie"><i class="ri-delete-back-line"></i> ' . $row['categorie'] . '</div>
                    <a href="#">
                        <p class="article-content">' . $desc . '</p>
                    </a>
                    <div class="icons-activity">
                        <div class="act"><i class="ri-eye-line"></i> 502</div>
                            <div class="act"><i class="ri-thumb-up-line"></i> 50</div>
                            <div class="act"><i class="ri-thumb-down-line"></i> 0</div>
                            <a href="./comment.php?id=' . $row['id'] . '" id="redir">
                                <div class="act"><i class="ri-chat-3-line"></i> 3</div>
                            </a>
                            <a href="./partager.php?id=' . $row['id'] . '" id="redir">
                                <div class="act"><i class="ri-share-forward-line"></i> 3</div>
                            </a>
                        </div>
                    </div>
            </div>
            <!-- end of card1 -->
';
    }
}
