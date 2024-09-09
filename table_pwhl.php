<?php
require("includes/db.inc.php");

function generateTable($pdo, $signedTeam, $position, $limit, $title, $averageCount)
{
    $stmt = $pdo->prepare('SELECT * FROM pwhl_player_data WHERE signedTeam = :signedTeam AND position = :position ORDER BY pwhlRating DESC, capHit DESC, term DESC LIMIT :limit');
    $stmt->bindParam(':signedTeam', $signedTeam);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();

    $players = $stmt->fetchAll();

    // Count the number of players
    $playerCount = count($players);

    // Display average rating next to the table title
    echo "<h3>$title <span style='font-size: 20px;'>- " . number_format($playerCount) . "</span></h3>";
    echo "<table class='sortable custom-table'>";
    echo "<thead style='background-color: black; color: white;'>";
    echo "<tr><th class='w3-center'>#</th><th class='w3-left-align'>&nbsp;&nbsp;&nbsp;Player Name</th><th class='w3-center'>Drafted Team</th><th class='w3-center'>Cap Hit</th><th class='w3-center'>Term</th><th class='w3-center'>Rights</th><th class='w3-center'>PWHL Rating</th></tr>";
    echo "</thead>";
    echo "<tbody class='w3-text-white w3-centered' id='tableContent'>";

    foreach ($players as $index => $row) {
        $backgroundColor = $index % 2 === 0 ? '#e9e9e9' : '#e9e9e9';
        $textColor = 'black';

        // Check if contract type is Two-Way
        $capHitTextColor = $row['contractType'] === 'Two-Way' ? '#228B22' : $textColor;
        $draftedTeamColor = $row['draftedTeam'] === 'Undrafted' ? '#ff0000' : $textColor;

        // Displays table rows
        echo "<tr style='background-color: $backgroundColor;' onmouseover=\"this.style.backgroundColor='white';\" onmouseout=\"this.style.backgroundColor='$backgroundColor';\">";
        echo "<td style='color: $textColor;'>{$row['jersey']}</td>";
        echo "<td class='w3-left-align' style='color: $textColor;'>&nbsp;&nbsp;&nbsp;{$row['playerName']}  {$row['captain']}</td>";
        echo "<td style='color: $draftedTeamColor;'>{$row['draftedTeam']}</td>";
        echo "<td style='color: $capHitTextColor;'>" . '$' . number_format($row['capHit'], 0, '', ',') . "</td>";
        echo "<td style='color: $textColor;'>{$row['term']}</td>";
        echo "<td style='color: $textColor;'>{$row['rights']}</td>";
        echo "<td style='color: $textColor;'>{$row['pwhlRating']}</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}

