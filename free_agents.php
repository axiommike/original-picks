<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <!--====== CSS ======-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/searchbar.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Background Image */
        .banner {
            width: 100%;
            min-height: 100vh;
            background-image: url("images/ice.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>

    <!--====== JS ======-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
    <script src="js/searchFunction.js"></script>

    <title>NHL Free Agents - Players Database - NHL Original Picks</title>
</head>

<body>

    <!--====== Background Image ======-->
    <header class="banner">

        <!--====== Navbar ======-->
        <?php include 'navbar.php'; ?>

        <!--====== Table ======-->
        <div class="w3-responsive">
            <div class="title-logo">
                <h2>NHL Free Agents</h2>
                <img src="images/nhl_logo.png" alt="Title Logo">
            </div>

            <!--====== Table Pagination ======-->
            <div class="w3-bar w3-transparent">
                <a href="nhl_database.php" class="w3-button w3-text-black">&#10094; Previous</a>
                <a href="pwhl_database.php" class="w3-button w3-right w3-text-black">Next &#10095;</a>
            </div>

            <!--====== Table Search Bar ======-->
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search players...">

            <!--====== Table Header Row ======-->
            <table class="w3-table table-sortable w3-bordered w3-hoverable" id="myTable" style="width:100%">
                <thead class="w3-text-black w3-centered">
                    <tr>
                        <th class="w3-left-align">Player</th>
                        <th>Jersey</th>
                        <th>Drafted Team</th>
                        <th>Draft Year</th>
                        <th>Original Pick</th>
                        <th>Position</th>
                        <th>NHL Rating</th>
                    </tr>
                </thead>

                <!--====== Table Content ======-->
                <tbody class="w3-text-black w3-centered" id="tableContent">

                    <!--====== PHP calls the file to establish connection to the backend ======-->
                    <?php
                    require("includes/db.inc.php");

                    $stmt = $pdo->query('SELECT * FROM nhl_player_data WHERE signedTeam = "Free Agent" ORDER BY nhlRating DESC, capHit DESC, term DESC');
                    while ($row = $stmt->fetch())
                    {
                    ?>

                    <!--====== Table Rows and Data ======-->
                    <tr>
                        <td class="w3-left-align"><?=$row['playerName'];?></td>
                        <td><?=$row['jersey'];?></td>
                        <td><?=$row['draftedTeam'];?></td>
                        <td><?=$row['draftYear'];?></td>
                        <td><?=$row['originalPick'];?></td>
                        <td><?=$row['position'];?></td>
                        <td><?=$row['nhlRating'];?></td>
                    </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </header>
            <!--====== JS ======-->
            <script src="js/navbar.js"></script>
        
    </div>
</body>
</html>