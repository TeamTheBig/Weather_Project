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
    <?php
    ini_set('display_errors', '0');
    ?>
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
            <h1 id="logo">Fine particles Infomation</h1>
            <br>
            <p><b>
                    <?php #모든 페이지 상단에 삽입
                            session_start(); #php 세션 사용
                      if (isset($_SESSION['name'])) { #등록된 이름이 있을 경우에만 인사 메세지를 출력함
                            echo "HI! " . $_SESSION['name'] . "";
                            }
                            ?>
                </b></p>
            <p><br><b>This page will shows the ranking in order of the region with the highest fine particles and ultra
                    fine particles concentration on a monthly basis.</b></p>
        </div>


        <div class="grid-content">
            <?php
            $conn = mysqli_connect("localhost", "team20", "team20", "team20");

            /* 랭킹 이용한 뷰의 지역, 평균 미세먼지 정보 select */
            $query1 = "SELECT CITY, AVG_FINE_DUST
            ,RANK() OVER(ORDER BY AVG_FINE_DUST) AS RANKING
            FROM AVG_FINE_DUST";
            $result1 = mysqli_query($conn, $query1);

            /* 랭킹 이용한 뷰의 지역, 평균 초미세먼지 정보 select */
            $query2 = "SELECT CITY, AVG_ULTRAFINE_DUST
            ,RANK() OVER(ORDER BY AVG_ULTRAFINE_DUST) AS RANKING
            FROM AVG_FINE_DUST";
            $result2 = mysqli_query($conn, $query2);
            ?>

            <FORM action="fine_particles.php" method="post">
                <p>Fine dust Ranking of October</p>
                <TABLE>
                    <thead>
                        <tr>
                            <td>Ranking</td>
                            <td>City</td>
                            <td>Average fine dust</td>
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
                            <?= $row['AVG_FINE_DUST'] ?>
                        </td>
                    </tr>
                    <?php } ?>
                </TABLE>

                <p>Ultra fine dust Ranking of October</p>
                <TABLE>
                    <thead>
                        <tr>
                            <td>Ranking</td>
                            <td>City</td>
                            <td>Average ultra fine dust</td>
                        </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_array($result2)) { ?>
                    <tr>
                        <td>
                            <?= $row['RANKING'] ?>
                        </td>
                        <td>
                            <?= $row['CITY'] ?>
                        </td>
                        <td>
                            <?= $row['AVG_ULTRAFINE_DUST'] ?>
                        </td>
                    </tr>
                    <?php } ?>
                </TABLE>
            </FORM>
            <?php
            mysqli_free_result($result1);
            mysqli_free_result($result2);
            ?>

            <button type="button" class="userBtn" onclick="location.href='fine_particles_trend.php'">See the
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