<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TheBig</title>
    <link rel="stylesheet" href="./home.css" type="text/css">
    <style>
        table,
        th,
        td {
            padding: 2%;
        }
    </style>
</head>

<body>
    <div class="grids">
        <div class="grid-header">
            <a href="home.html" class="grid-header">Home</a>
            <a href="00.html" class="grid-header">page1</a>
            <a href="00.html" class="grid-header">page1</a>
            <a href="00.html" class="grid-header">page2</a>
            <a href="00.html" class="grid-header">page2</a>
            <a href="00.html" class="grid-header">page3</a>
            <a href="00.html" class="grid-header">page3</a>
            <a href="fine_particles.php" class="grid-header">Fine particles</a>
            <a href="ozone.php" class="grid-header">Ozone particles</a>
        </div>

        <div class="grid-logo">
            <h1 id="logo">Ozone Infomation</h1>
            <p><br><b>This page will shows the ranking in order of the region with the highest ozone concentration on a
                    monthly basis.</b></p>
        </div>


        <div class="grid-content">

            <?php
            $conn = mysqli_connect("localhost", "team20", "team20", "weather");
            $query = "SELECT CITY, AVG_OZONE 
            ,RANK() OVER(ORDER BY AVG_OZONE) AS RANKING
            FROM AVG_OZONE";
            $result = mysqli_query($conn, $query);
            ?>

            <FORM>
                <TABLE Border=1>
                    <tr>
                        <td>Ranking</td>
                        <td>City</td>
                        <td>Average Ozone</td>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td>
                            <?= $row['RANKING'] ?>
                        </td>
                        <td>
                            <?= $row['CITY'] ?>
                        </td>
                        <td>
                            <?= $row['AVG_OZONE'] ?>
                        </td>
                    </tr>
                    <?php } ?>
                </TABLE>
            </FORM>

            <?php
            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </div>
        <div class="grid-footer">
            <li>Big Data Application Team TheBig</li>
        </div>
    </div>
</body>

</html>