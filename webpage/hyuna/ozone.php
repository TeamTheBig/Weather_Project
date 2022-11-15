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
            $query1 = "SELECT CITY, AVG_OZONE 
            ,RANK() OVER(ORDER BY AVG_OZONE) AS RANKING
            FROM AVG_OZONE";
            $result1 = mysqli_query($conn, $query1);

            $query2 = "SELECT DATES, CITY, AVG_OZONE
            FROM AVG_OZONE_BY_DATES
            ORDER BY CITY";
            $result2 = mysqli_query($conn, $query2);
            ?>

            <FORM>
                <p>Ozone Ranking of October</p>
                <TABLE>
                    <thead>
                        <tr>
                            <td>Ranking</td>
                            <td>City</td>
                            <td>Average Ozone</td>
                        </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_array($result1)) { ?>
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

                <p>Ozone concentration trend of October (Blank means 'All')</p>
                <TABLE>
                    <thead>
                        <tr>
                            <td>City</td>
                            <td>Dates</td>
                            <td>Average ozone</td>
                        </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_array($result2)) { ?>
                    <tr>
                        <td>
                            <?= $row['CITY'] ?>
                        </td>
                        <td>
                            <?= $row['DATES'] ?>
                        </td>
                        <td>
                            <?= $row['AVG_OZONE'] ?>
                        </td>
                    </tr>
                    <?php } ?>
                </TABLE>

            </FORM>

            <?php
            mysqli_free_result($result1);
            mysqli_free_result($result2);
            mysqli_close($conn);
            ?>
        </div>
        <div class="grid-footer">
            <li>Big Data Application Team TheBig</li>
        </div>
    </div>
</body>

</html>