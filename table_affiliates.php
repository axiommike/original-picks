<?php
require("includes/db.inc.php");

function generateTable($pdo, $league, $title)
{
    // Pulls from the database
    $stmt = $pdo->prepare('SELECT * FROM affiliation_history WHERE league = :league');
    $stmt->bindParam(':league', $league);
    $stmt->execute();
    $teams = $stmt->fetchAll();

    // Displays table headers and structure
    echo "<h3>$title <span style='font-size: 20px;'></span></h3>";
    echo "<table class='sortable custom-table' id='playerTable'>";
    echo "<thead style='background-color: black; color: white;'>";
    echo "<tr><th class='w3-left-align'>&nbsp;&nbsp;&nbsp;Team Name</th><th class='w3-center'>Start</th><th class='w3-center'>End</th><th class='w3-center'>Affiliation</th><th class='w3-center'>Status</th></tr>";
    echo "</thead>";
    echo "<tbody class='w3-text-white w3-centered' id='tableContent'>";

    foreach ($teams as $index => $row) {
        $backgroundColor = $index % 2 === 0 ? '#e9e9e9' : '#e9e9e9';
        $textColor = 'black';

        // Text colours
        // Text colours
        if ($row['teamStatus'] === 'Inactive') {
            $statusColor = '#ff0000';
        } elseif ($row['teamStatus'] === 'Active') {
            $statusColor = '#228B22';
        } else {
            $statusColor = $textColor;
        }

        // Displays table rows
        echo "<tr style='background-color: $backgroundColor;' onmouseover=\"this.style.backgroundColor='white';\" onmouseout=\"this.style.backgroundColor='$backgroundColor';\">";
        echo "<td class='w3-left-align' style='color: $textColor;'>&nbsp;&nbsp;&nbsp;{$row['affiliatedTeam']}</td>";
        echo "<td style='color: $textColor;'>{$row['startDate']}</td>";
        echo "<td style='color: $textColor;'>{$row['endDate']}</td>";
        echo "<td style='color: $textColor;'>{$row['nhlTeam']}</td>";
        echo "<td style='color: $statusColor;'>{$row['teamStatus']}</td>";
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
        "order": [
            [0, "asc"], // First column in ascending order
            [1, "asc"] // Second column in descending order
        ], 
        "pageLength": 50,
        "dom": "<\'top\'fpi>rt<\'clear\'>"
    });
});
</script>';

