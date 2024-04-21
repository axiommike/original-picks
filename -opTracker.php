<!DOCTYPE html>
<html lang="en">

<head></head>
<body>
<?php
// Function to generate a consolidated table
require("includes/db.inc.php");

// Function to get all unique teams
function getAllTeams($pdo) {
    $stmt = $pdo->query('SELECT DISTINCT originalPick FROM nhl_player_data ORDER BY originalPick');
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

// Function to generate a consolidated table for a specific team
function generateConsolidatedTable($pdo, $team) {
    echo "<table class='sortable custom-table'>";
    echo "<thead style='background-color: black; color: white;'>";
    echo "<tr><th class='w3-left-align' colspan='4'>$team</th></tr>";
    echo "<tr><th class='w3-left-align'>PLAYER NAME</th><th class='w3-center'>From</th><th class='w3-center'>Position</th><th class='w3-center'>RATING</th></tr>";
    echo "</thead>";
    echo "<tbody class='w3-text-white w3-centered' id='tableContent'>";

    // Positions to query
    $positions = ['F', 'D', 'G'];

    foreach ($positions as $position) {
        $limit = ($position === 'D') ? 6 : ($position === 'G' ? 2 : 12);

        $stmt = $pdo->prepare('SELECT * FROM nhl_player_data WHERE originalPick = :team AND position = :position ORDER BY nhlRating DESC, capHit DESC, term DESC LIMIT :limit');
        $stmt->bindParam(':team', $team);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        $players = $stmt->fetchAll();

        // Sort the players by the "From" column (signedTeam) alphabetically and then by "NHL Rating"
        usort($players, function ($a, $b) {
            $result = strcmp($a['signedTeam'], $b['signedTeam']);
            
            // If the "From" column is the same, compare by "NHL Rating"
            if ($result === 0) {
                $result = $b['nhlRating'] - $a['nhlRating']; // Sort in descending order by NHL Rating
            }

            return $result;
        });

        foreach ($players as $index => $row) {
            $backgroundColor = $index % 2 === 0 ? '#e9e9e9' : 'transparent';
            $textColor = 'black';

            echo "<tr style='background-color: $backgroundColor;' onmouseover=\"this.style.backgroundColor='white';\" onmouseout=\"this.style.backgroundColor='$backgroundColor';\">";
            echo "<td class='w3-left-align' style='color: $textColor;'>&nbsp;&nbsp;&nbsp;{$row['playerName']}  {$row['captain']}</td>";
            echo "<td style='color: $textColor;'>{$row['signedTeam']}</td>";
            echo "<td style='color: $textColor;'>{$row['position']}</td>";
            echo "<td style='color: $textColor;'>{$row['nhlRating']}</td>"; 
            echo "</tr>";
        }
    }

    echo "</tbody>";
    echo "</table>";
}

// Function to generate tables for all teams
function generateAllTables($pdo) {
    $teams = getAllTeams($pdo);

    echo '<div style="display: flex; flex-wrap: wrap;">'; // Use flexbox for horizontal display

    foreach ($teams as $team) {
        generateConsolidatedTable($pdo, $team);
    }

    echo '</div>';
}

// Call the function to generate tables for all teams
generateAllTables($pdo);
?>


</body>
</html>