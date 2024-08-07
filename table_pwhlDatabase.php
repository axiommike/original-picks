<?php
require("includes/db.inc.php");

function generateTable($pdo, $title)
{
    // Pulls from the database
    $stmt = $pdo->prepare('SELECT * FROM pwhl_player_data ORDER BY pwhlRating DESC, capHit DESC, term DESC');
    $stmt->execute();
    $players = $stmt->fetchAll();

    // Displays table headers and structure
    echo "<h3>$title <span style='font-size: 20px;'></span></h3>";
    echo "<table class='sortable custom-table' id='playerTable'>";
    echo "<thead style='background-color: black; color: white;'>";
    echo "<tr><th class='w3-center'>#</th><th class='w3-left-align'>&nbsp;&nbsp;&nbsp;Player Name</th><th class='w3-center'>Signed Team</th><th class='w3-center'>Drafted Team</th><th class='w3-center'>Draft Year</th><th class='w3-center'>Original Pick</th><th class='w3-center'>Cap Hit</th><th class='w3-center'>Position</th><th class='w3-center'>PWHL Rating</th></tr>";
    echo "</thead>";
    echo "<tbody class='w3-text-white w3-centered' id='tableContent'>";

    foreach ($players as $index => $row) {
        $backgroundColor = $index % 2 === 0 ? '#e9e9e9' : '#e9e9e9';
        $textColor = 'black';

        // Text colours
        $capHitTextColor = $row['contractType'] === 'Two-Way' ? '#228B22' : $textColor;
        $draftedTeamColor = $row['draftedTeam'] === 'Undrafted' ? '#ff0000' : $textColor;
        $draftYearColor = $row['draftYear'] === 'N/A' ? '#ff0000' : $textColor;
        $freeAgentColor = $row['signedTeam'] === 'Free Agent' ? '#0047AB' : $textColor;

        // Displays table rows
        echo "<tr style='background-color: $backgroundColor;' onmouseover=\"this.style.backgroundColor='white';\" onmouseout=\"this.style.backgroundColor='$backgroundColor';\">";
        echo "<td style='color: $textColor;'>{$row['jersey']}</td>";
        echo "<td class='w3-left-align' style='color: $textColor;'>&nbsp;&nbsp;&nbsp;{$row['playerName']}</td>";
        echo "<td style='color: $freeAgentColor;'>{$row['signedTeam']}</td>";
        echo "<td style='color: $draftedTeamColor;'>{$row['draftedTeam']}</td>";
        echo "<td style='color: $draftYearColor;'>{$row['draftYear']}</td>";
        echo "<td style='color: $textColor;'>{$row['originalPick']}</td>";
        echo "<td style='color: $capHitTextColor;'>" . '$' . number_format($row['capHit'], 0, '', ',') . "</td>";
        echo "<td style='color: $textColor;'>{$row['position']}</td>";
        echo "<td style='color: $textColor;'>{$row['pwhlRating']}</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}

// Include jQuery and DataTables JavaScript libraries
echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
echo '<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>';

// Initialize DataTables with default sorting by 'pwhl Rating' column in descending order and page length set to 100
echo '<script>
$(document).ready(function() {
    $("#playerTable").DataTable({
        "order": [[8, "desc"]], 
        "pageLength": 50,
        "dom": "<\'top\'fpi>rt<\'clear\'>"
    });
});
</script>';

