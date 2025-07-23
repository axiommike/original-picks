<?php
function getTeamColor($teamName) {
    $colors = [
        'Anaheim Ducks' => '#F47A38',
        'Boston Bruins' => '#FFB81C',
        'Edmonton Oilers' => '#00205B',
        'Toronto Maple Leafs' => '#003E7E',
        // add other teams as needed
    ];
    return $colors[$teamName] ?? '#333'; // default dark gray if no match
}

if (!isset($teamName)) {
    echo "<p>Error: Team name not set.</p>";
    return;
}

$teamColor = getTeamColor($teamName);

/* --- Contracts Count --- */
$queryContracts = "SELECT COUNT(*) AS total_contracts 
                   FROM nhl_player_data 
                   WHERE signedTeam = :teamName";
$stmt = $pdo->prepare($queryContracts);
$stmt->execute(['teamName' => $teamName]);
$contracts = $stmt->fetch(PDO::FETCH_ASSOC)['total_contracts'];

/* --- Cap Hit Sum (handles $ and , in DB) --- */
$queryCap = "SELECT SUM(REPLACE(REPLACE(capHit, '$', ''), ',', '')) AS total_cap
             FROM nhl_player_data 
             WHERE signedTeam = :teamName 
             AND REPLACE(REPLACE(capHit, '$', ''), ',', '') > 1000000";
$stmt = $pdo->prepare($queryCap);
$stmt->execute(['teamName' => $teamName]);
$totalCap = $stmt->fetch(PDO::FETCH_ASSOC)['total_cap'] ?? 0;

/* --- Format Cap Hit --- */
$capFormatted = '$' . number_format($totalCap, 0);
$capMax = '$95,500,000';
?>

<!-- Flex container for centered layout -->
<div style="
    display: flex;
    justify-content: center;
    gap: 20px;
    margin: 10px 0;
">

    <!-- Contracts Box -->
    <div style="
        background-color: #f5f5f5;
        border: 2px solid <?php echo $teamColor; ?>;
        border-radius: 10px;
        padding: 6px 14px;
        font-size: 14px;
        color: #333;
        text-align: center;
        min-width: 110px;
    ">
        <i><?php echo $contracts; ?> / 50</i>
    </div>

    <!-- Cap Hit Box -->
    <div style="
        background-color: #f5f5f5;
        border: 2px solid <?php echo $teamColor; ?>;
        border-radius: 10px;
        padding: 6px 14px;
        font-size: 14px;
        color: #333;
        text-align: center;
        min-width: 180px;
    ">
        <i><?php echo $capFormatted; ?> / <?php echo $capMax; ?></i>
    </div>

</div>
