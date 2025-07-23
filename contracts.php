<?php
// Count total players signed to Anaheim Ducks
$query = "SELECT COUNT(*) AS total_contracts 
          FROM nhl_player_data 
          WHERE signedTeam = :teamName";
$stmt = $pdo->prepare($query);
$stmt->execute(['teamName' => $teamName]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Display contracts out of 50
echo "<h3><strong>Contracts:</strong> " . $result['total_contracts'] . " / 50</h3>";
?>
