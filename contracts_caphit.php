<?php
function getTeamColor($teamName) {
    $colors = [
        'Anaheim Ducks'       => '#F47A38',
        'Boston Bruins'       => '#FFB81C',
        'Buffalo Sabres'      => '#003087',
        'Carolina Hurricanes' => '#CE1126',
        'Columbus Blue Jackets' => '#002654',
        'Calgary Flames'      => '#D2001C',
        'Chicago Blackhawks'  => '#CF0A2C',
        'Colorado Avalanche'  => '#6F263D',
        'Dallas Stars'        => '#006847',
        'Detroit Red Wings'   => '#CE1126',
        'Edmonton Oilers'     => '#072b86',
        'Florida Panthers'    => '#C8102E',
        'Los Angeles Kings'   => '#111111',
        'Minnesota Wild'      => '#154734',
        'Montreal Canadiens'  => '#AF1E2D',
        'New Jersey Devils'   => '#CE1126',
        'Nashville Predators' => '#FFB81C',
        'New York Islanders'  => '#00539B',
        'New York Rangers'    => '#0038A8',
        'Ottawa Senators'     => '#000000',
        'Philadelphia Flyers' => '#F74902',
        'Pittsburgh Penguins' => '#FCB514',
        'Seattle Kraken'      => '#99D9D9',
        'San Jose Sharks'     => '#006D75',
        'St. Louis Blues'     => '#002F87',
        'Tampa Bay Lightning' => '#002868',
        'Toronto Maple Leafs' => '#00205B',
        'Utah Mammoth'        => '#6cace4',  
        'Vancouver Canucks'   => '#00205B',
        'Vegas Golden Knights'=> '#B4975A',
        'Winnipeg Jets'       => '#041E42',
        'Washington Capitals' => '#C8102E',
    ];
    return $colors[$teamName] ?? '#333'; // default dark gray if no match
}

if (!isset($teamName)) {
    echo "<p>Error: Team name not set.</p>";
    return;
}

$teamColor = getTeamColor($teamName);

/* --- Contracts Count --- */
$queryContracts = "SELECT COUNT(*) AS total_contracts 
                   FROM nhl_player_data 
                   WHERE signedTeam = :teamName";
$stmt = $pdo->prepare($queryContracts);
$stmt->execute(['teamName' => $teamName]);
$contracts = $stmt->fetch(PDO::FETCH_ASSOC)['total_contracts'];

/* --- Cap Hit Sum (handles $ and , in DB) --- */
$queryCap = "
WITH RankedPlayers AS (
    SELECT *,
        ROW_NUMBER() OVER (PARTITION BY signedTeam, position ORDER BY nhlRating DESC) AS playerRank
    FROM nhl_player_data
    WHERE signedTeam = :teamName
)
SELECT SUM(REPLACE(REPLACE(capHit, '$', ''), ',', '')) AS total_cap
FROM RankedPlayers
WHERE 
    REPLACE(REPLACE(capHit, '$', ''), ',', '') > 1000000
    OR (
        (position = 'F' AND playerRank <= 12)
        OR (position = 'D' AND playerRank <= 6)
        OR (position = 'G' AND playerRank <= 2)
    )
";
$stmt = $pdo->prepare($queryCap);
$stmt->execute(['teamName' => $teamName]);
$totalCap = $stmt->fetch(PDO::FETCH_ASSOC)['total_cap'] ?? 0;

/* --- Format Cap Hit --- */
$capFormatted = '$' . number_format($totalCap, 0);
$capMax = '$95,500,000';
?>

<!-- Flex container for centered layout -->
<div style="
    display: flex;
    justify-content: center;
    gap: 20px;
    margin: 10px 0;
">

    <!-- Contracts Box -->
    <div style="
        background-color: #f5f5f5;
        border: 2px solid <?php echo $teamColor; ?>;
        border-radius: 10px;
        padding: 6px 14px;
        font-size: 14px;
        color: #333;
        text-align: center;
        min-width: 110px;
    ">
        <i><?php echo $contracts; ?> / 50</i>
    </div>

    <!-- Cap Hit Box -->
    <div style="
        background-color: #f5f5f5;
        border: 2px solid <?php echo $teamColor; ?>;
        border-radius: 10px;
        padding: 6px 14px;
        font-size: 14px;
        color: #333;
        text-align: center;
        min-width: 180px;
    ">
        <i><?php echo $capFormatted; ?> / <?php echo $capMax; ?></i>
    </div>

</div>
