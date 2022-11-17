<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TheBig</title>
    <link rel="stylesheet" href="./hyuna.css" type="text/css">
    <style>
        table,
        th,
        td {
            padding: 1%;
        }
    </style>
</head>

<body>
    <div class="grids">
        <div class="grid-header">
        <nav>
                <ul>
                <li><a href="home.php" class="grid-header">Home</a></li>
            
                    <li> <a href="#">Weather Information<i class='fa fa-angle-down'></i></a>
                        <ul>`
                            <li><a href="uvPage.html">Insolation</a></li>
                            <li><a href="humidSearch.html">Humidity</a></li>
                            <li><a href="rainSearch.html">Rain</a></li>
                            <li><a href="findWeather.php">Weather</a></li>
                            <li><a href="typhoon.php">Typhoon</a></li>
                            <li><a href="sensoryTem.php">Sensory Temperature</a></li>
                            <li><a href="visibility.php">Visiable Distance</a></li>
                        </ul>
                    </li>
            
                    <li> <a href="#">Ranking<i class='fa fa-angle-down'></i></a>
                        <ul>`
                            <li><a href="fine_particles.php">Fine particles</a></li>
                            <li><a href="ozone.php">Ozone</a></li>
                        </ul>
                    </li>
            
                    <li> <a href="#">Community<i class='fa fa-angle-down'></i></a>
                        <ul>
                            <li><a href="user_satisfaction.php">Satisfaction</a></li>
                            <li><a href="showcomment.php">Comment</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="grid-logo">
            <h1 id="logo">Ozone Infomation</h1>
            <p><br><b>This page will shows the ranking in order of the region with the highest ozone concentration on a
                    monthly basis.</b></p>
        </div>


        <div class="grid-content">

            <?php
            $conn = mysqli_connect("localhost", "team20", "team20", "team20");

            /* 롤업 이용한 뷰의 날짜, 지역, 평균 오존 정보 select */
            $query1 = "SELECT DATES, CITY, AVG_OZONE
            FROM AVG_OZONE_BY_DATES
            ORDER BY CITY, DATES";
            $result1 = mysqli_query($conn, $query1);
            ?>

            <FORM>
                <p>Ozone concentration trend of October (Blank means 'All')</p>
                <TABLE>
                    <thead>
                        <tr>
                            <td>City</td>
                            <td>Dates</td>
                            <td>Average ozone</td>
                        </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_array($result1)) { ?>
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
            mysqli_close($conn);
            ?>
        </div>
        <div class="grid-footer">
            <li>Big Data Application Team TheBig</li>
        </div>
    </div>
</body>

</html>

<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $('nav li').hover(
        function () {
            $('ul', this).stop().slideDown(200);
        },
        function () {
            $('ul', this).stop().slideUp(200);
        }
    );
</script>