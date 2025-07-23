<?php
// Usage: set $teamName before including this file

if (!isset($teamName)) {
    echo "<p>Error: Team name not set.</p>";
    return;
}

// Fetch retained salary players with capHit > $0 for the given team
$query = "
    SELECT playerName, position, capHit, length
    FROM retained_salaries
    WHERE team = :teamName
      AND REPLACE(REPLACE(capHit, '$', ''), ',', '') > 0
    ORDER BY position, playerName
";

$stmt = $pdo->prepare($query);
$stmt->execute(['teamName' => $teamName]);
$players = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($players)) {
    echo "<p>No retained salary players with cap hit found for {$teamName}.</p>";
    return;
}

// Helper function for position full name
function positionFullName($pos) {
    return match($pos) {
        'F' => 'Forward',
        'D' => 'Defenseman',
        'G' => 'Goalie',
        default => 'Player',
    };
}
?>

<div class="w3-responsive">
    <table class="custom-table w3-table-all w3-hoverable">
        <thead>
            <tr style="background-color: #F47A38; color: white;">
                <th>Player Name</th>
                <th>Position</th>
                <th>Cap Hit</th>
                <th>Years Left</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($players as $player): ?>
                <tr>
                    <td><?php echo htmlspecialchars($player['playerName']); ?></td>
                    <td><?php echo positionFullName($player['position']); ?></td>
                    <td><?php echo htmlspecialchars($player['capHit']); ?></td>
                    <td><?php echo intval($player['length']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
