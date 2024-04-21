<?php
require("includes/db.inc.php");

function generateTable($pdo, $draftYear, $limit, $title)
{
    $stmt = $pdo->prepare('SELECT * FROM nhl_player_data WHERE draftYear = :draftYear ORDER BY nhlRating ASC LIMIT :limit');
    $stmt->bindParam(':draftYear', $draftYear);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $players = $stmt->fetchAll();

    // Display average rating next to the table title
    echo "<h3>$title <span style='font-size: 20px;'></span></h3>";
    echo "<table class='sortable custom-table' id='playerTable'>";
    echo "<thead style='background-color: black; color: white;'>";
    echo "<tr><th class='w3-center'>#</th><th class='w3-left-align'>&nbsp;&nbsp;&nbsp;Player Name</th><th class='w3-center'>Signed Team</th><th class='w3-center'>Drafted Team</th><th class='w3-center'>Original Pick</th><th class='w3-center'>Position</th><th class='w3-center'>NHL Rating</th></tr>";
    echo "</thead>";
    echo "<tbody class='w3-text-white w3-centered' id='tableContent'>";

    foreach ($players as $index => $row) {
        $backgroundColor = $index % 2 === 0 ? '#e9e9e9' : 'transparent';
        $textColor = 'black';

        // Check if contract type is Two-Way
        $capHitTextColor = $row['contractType'] === 'Two-Way' ? '#228B22' : $textColor;

        echo "<tr style='background-color: $backgroundColor;' onmouseover=\"this.style.backgroundColor='white';\" onmouseout=\"this.style.backgroundColor='$backgroundColor';\">";
        echo "<td style='color: $textColor;'>{$row['draftSelection']}</td>";
        echo "<td class='w3-left-align' style='color: $textColor;'>&nbsp;&nbsp;&nbsp;{$row['playerName']}</td>";
        echo "<td style='color: $textColor;'>{$row['signedTeam']}</td>";
        echo "<td style='color: $textColor;'>{$row['draftedTeam']}</td>";
        echo "<td style='color: $textColor;'>{$row['originalPick']}</td>";
        echo "<td style='color: $textColor;'>{$row['position']}</td>";
        echo "<td style='color: $textColor;'>{$row['nhlRating']}</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}

// Include jQuery and DataTables JavaScript libraries
echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
echo '<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>';

// Initialize DataTables with default sorting by 'NHL Rating' column in descending order and page length set to 100
echo '<script>
$(document).ready(function() {
    $("#playerTable").DataTable({
        "pageLength": 100,
        "dom": "<\'top\'fpi>rt<\'clear\'>"
    });
});
</script>';

