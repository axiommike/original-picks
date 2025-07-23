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

function getOutlineColor($rating) {
    if ($rating >= 90) {
        return '#008000';  // solid green
    } elseif ($rating >= 85) {
        return 'rgba(0, 128, 0, 0.7)';  // slightly faded green
    } elseif ($rating >= 80) {
        return 'rgba(173, 255, 47, 0.7)';  // yellow-green faded
    } elseif ($rating >= 75) {
        return '#FFA500';  // orange (yellow/orange)
    } else {
        return '#ccc';    // default light gray if below 75
    }
}

$avgForwards = getAverageRating($pdo, $teamName, 'F', 12);
$avgDefense  = getAverageRating($pdo, $teamName, 'D', 6);
$avgGoalies  = getAverageRating($pdo, $teamName, 'G', 2);

$colorForwards = getOutlineColor($avgForwards);
$colorDefense  = getOutlineColor($avgDefense);
$colorGoalies  = getOutlineColor($avgGoalies);
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
        border: 2px solid <?php echo $colorForwards; ?>;
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
        border: 2px solid <?php echo $colorDefense; ?>;
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
        border: 2px solid <?php echo $colorGoalies; ?>;
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
