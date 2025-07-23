<?php
if (!isset($teamName)) {
    echo "<p>Error: Team name not set.</p>";
    return;
}

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

<!-- Flex container for side-by-side layout -->
<div style="
    display: flex;
    gap: 20px;
    margin: 10px 0;
">

    <!-- Contracts Box -->
    <div style="
        background-color: #f5f5f5;
        border: 2px solid #F47A38;
        border-radius: 10px;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        color: #333;
        text-align: center;
        min-width: 140px;
    ">
        Contracts<br>
        <?php echo $contracts; ?> / 50
    </div>

    <!-- Cap Hit Box -->
    <div style="
        background-color: #f5f5f5;
        border: 2px solid #F47A38;
        border-radius: 10px;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        color: #333;
        text-align: center;
        min-width: 220px;
    ">
        Cap Hit<br>
        <?php echo $capFormatted; ?> / <?php echo $capMax; ?>
    </div>

</div>
