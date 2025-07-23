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

<div style="display: flex; gap: 20px;">
    <h3><strong>Contracts:</strong> <?php echo $contracts; ?> / 50</h3>
    <h3><strong>Cap Hit:</strong> <?php echo $capFormatted; ?> / <?php echo $capMax; ?></h3>
</div>
