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
    return round($stmt->fetchColumn());
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
    <div style="
        width: 60px; height: 60px;
        border: 2px solid #000;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: bold;
        user-select: none;
    ">
        <?php echo $avgForwards; ?>
    </div>
    <div style="
        width: 60px; height: 60px;
        border: 2px solid #000;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: bold;
        user-select: none;
    ">
        <?php echo $avgDefense; ?>
    </div>
    <div style="
        width: 60px; height: 60px;
        border: 2px solid #000;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: bold;
        user-select: none;
    ">
        <?php echo $avgGoalies; ?>
    </div>
</div>
