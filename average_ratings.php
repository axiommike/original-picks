<?php
function getAverageRating($pdo, $team, $position, $limit) {
    $stmt = $pdo->prepare("
        SELECT AVG(nhlRating) as avgRating 
        FROM (
            SELECT nhlRating 
            FROM nhl_player_data 
            WHERE signedTeam = :signedTeam AND position = :position 
            ORDER BY nhlRating DESC 
            LIMIT :limit
        ) as topPlayers
    ");
    $stmt->bindValue(':signedTeam', $team);
    $stmt->bindValue(':position', $position);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return round($stmt->fetchColumn(), 1);
}

$avgForwards = getAverageRating($pdo, $teamName, 'F', 12);
$avgDefense  = getAverageRating($pdo, $teamName, 'D', 6);
$avgGoalies  = getAverageRating($pdo, $teamName, 'G', 2);
?>

<div class="average-ratings" style="
    text-align:center;
    margin:20px 0;
    display:flex;
    justify-content:center;
    gap:40px;
">
    <div>
        <h3>Forwards</h3>
        <p style="font-size:24px; font-weight:bold;"><?php echo $avgForwards; ?></p>
    </div>
    <div>
        <h3>Defense</h3>
        <p style="font-size:24px; font-weight:bold;"><?php echo $avgDefense; ?></p>
    </div>
    <div>
        <h3>Goalies</h3>
        <p style="font-size:24px; font-weight:bold;"><?php echo $avgGoalies; ?></p>
    </div>
</div>
