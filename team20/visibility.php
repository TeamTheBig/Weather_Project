<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TheBig</title>
    <link rel="stylesheet" href="./home.css" type="text/css">
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
            <h1 id="logo">Visiable Distance</h1>
            <br>
                    <p><b><?php #모든 페이지 상단에 삽입
                    session_start();  #php 세션 사용
                    if(isset($_SESSION['name'])){ #등록된 이름이 있을 경우에만 인사 메세지를 출력함
                        echo "HI! ".$_SESSION['name']."";
                    }                  
                    ?></b></p>
            <p><br><b>You can check out the visibility of anywhere you want!</b> </P>
        
        </div>
        
        <div class="grid-content">
        <form  method="POST">
        <br></br> <br></br> 
            <!-- 사용자로부터 검색하고 싶은 날짜 받기 -->
            <label > Choose the date you want to check:
                <input type="date" name="chosedDate" min="2022-10-01" max="2022-10-30" >
                <input type="submit" name="submit" value="Search">
            </label>
            <br></br> <br></br> <br></br>
        </form>
            <!-- 사용자에게 입력한 날짜의 가시거리를 보여줄 테이블 생성 -->
            <table>
                <thead>
                    <tr>
                        <th>Region</th>
                        <th>Date and Time</th>
                        <th>visiable distacne(10m)</th>
                    </tr>
                </thead>

                <tbody>
        
                <!-- php 시작 -->
                <?php
                 error_reporting(E_ALL^ E_WARNING); 
                $link = mysqli_connect("localhost", "team20", "team20", "team20");
        
                // Check connection
                if ($link === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }
        
                // 사용자가 입력한 날짜
                $chosedDate = $_POST["chosedDate"];
                // SELECT문 
                $sql = "SELECT v.vdate, v.visi_dist,  r.city 
                            FROM visibility AS v JOIN region AS r 
                            WHERE DATE_FORMAT(v.vdate, '%Y-%m-%d') = '".$chosedDate."' 
                                and v.region_code = r.region_code";
                $res = mysqli_query($link, $sql);

                if ($res) {
                    // 데이터 출력
                    while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC) ) {
                        echo
                        '<tc><td>'
                             .$newArray['city'].
                        '<tc><td>'
                            . $newArray['vdate'].
                        '<tc><td>'
                            . $newArray['visi_dist'].
                        '<tr>'
                            ;
                    }
        
        
                } else {
                    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
                }
        
                // Close connection
                mysqli_close($link);
                ?>

                </tbody>
            </table>
        
        <div class="grid-content">
            <br></br> <br></br> <br></br>
        </div>
        </div>

        <div class="grid-footer">
            <li>Weather Information Web page By Team TheBig</li>
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

            
            
          