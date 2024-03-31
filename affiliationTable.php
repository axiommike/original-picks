<!--====== Table Header Row ======-->
<table class="w3-table table-sortable w3-bordered w3-hoverable" id="myTable" style="width:100%">
    <thead class="w3-text-black w3-centered">
        <tr>
            <th class="w3-left-align">Teams</th>
            <th>Start</th>
            <th>End</th>
            <th>Affiliated Team</th>
            <th>Active</th>
        </tr>
    </thead>

    <!--====== Table Content ======-->
    <tbody class="w3-text-black w3-centered" id="tableContent">

        <!--====== PHP calls the file to establish connection to the backend ======-->
        <?php
        require("includes/db.inc.php");

        // Make league a variable
        $league = isset($league) ? $league : "AHL"; // Default to AHL if not set

        $stmt = $pdo->prepare('SELECT * FROM affiliation_history WHERE league = ? ORDER BY teamStatus ASC, nhlTeam ASC, startDate ASC');
        $stmt->bindParam(1, $league, PDO::PARAM_STR);
        $stmt->execute();

        while ($row = $stmt->fetch()) {
        ?>

        <!--====== Table Rows and Data ======-->
        <tr>
            <td class="w3-left-align"><?= $row['affiliatedTeam']; ?></td>
            <td><?= $row['startDate']; ?></td>
            <td><?= $row['endDate']; ?></td>
            <td><?= $row['nhlTeam']; ?></td>
            <td><i class="<?= ($row['teamStatus'] === 'Active') ? 'fa fa-check' : 'fa fa-times'; ?>"></i></td>
        </tr>

        <?php
        }
        ?>
    </tbody>
</table>
