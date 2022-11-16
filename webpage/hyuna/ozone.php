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
                    <li><a href="home.html" class="grid-header">Home</a></li>

                    <li> <a href="#">Weather Information<i class='fa fa-angle-down'></i></a>
                        <ul>
                            <li><a href="#">Category One</a></li>
                            <li><a href="#">Category Two</a></li>
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
                            <li><a href="user_satisfaction.php">User Satisfaction</a></li>
                            <li><a href="#">Sensory Temperature</a></li>
                            <li><a href="#">About clothes</a></li>
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
            $conn = mysqli_connect("localhost", "team20", "team20", "weather");

            /* 랭킹 이용한 뷰의 날짜, 지역, 평균 오존 정보 select */
            $query1 = "SELECT CITY, AVG_OZONE 
            ,RANK() OVER(ORDER BY AVG_OZONE) AS RANKING
            FROM AVG_OZONE";
            $result1 = mysqli_query($conn, $query1);
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
            </FORM>

            <?php
            mysqli_free_result($result1);
            mysqli_close($conn);
            ?>

            <button type="button" class="userBtn" onclick="location.href='ozone_trend.php'">See the
                concentration trend of
                October</a>
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