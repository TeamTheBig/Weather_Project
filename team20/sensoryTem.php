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
            <h1 id="logo">Sensory Temperature</h1>
            <p><br><b>You can check sensory temperature of your area!</b> </P>
        
        </div>

   
        
        <div class="grid-content">
        <br></br> <br></br>
        <!-- 사용자로부터 검색하고 싶은 날짜와 지역이름 받기 -->
        <form method="POST">
                Choose the date you want to check the sensible temperature:
                <input type="date" name="chosedDate" min="2022-10-01" max="2022-10-30" > <br>
                Wirte your city:
                <input type="text" name="chosedCity">
                <input type="submit" name="submit" value="Search">
            
        </form>
        </div>

        <div class="grid-content">
        <br></br> <br></br>
         <!-- 사용자에게 입력한 날짜와 지역에 대한 체감온도, 풍속을 보여줄 테이블 생성 -->
        <table>
            <thead>
                <tr>
                    <th>Region</th>
                    <th>Sensory Temperature (⁣°C)</th>
                    <th>Wind speed (m/s)</th>
                </tr>
            </thead>
    
            <tbody>
                <?php
               error_reporting(E_ALL ^ E_WARNING);
                $link = mysqli_connect("localhost", "team20", "team20", "team20");
        
                // Check connection
                if ($link === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                //사용자로부터 입력받은 날짜와 지역이름
                $chosedDate = $_POST["chosedDate"];
                $chosedCity = $_POST["chosedCity"];
                //SELECT 문
                $sql = "SELECT  s.sdate, s.sensory_tem, s.wind,  r.city 
                                FROM sensory_temperature AS s JOIN region AS r 
                                WHERE   DATE_FORMAT(s.sdate, '%Y-%m-%d') ='".$chosedDate."' 
                                    and s.region_code = r.region_code and r.city = '".$chosedCity."'";

                
                $res = mysqli_query($link, $sql);
        
                if ($res) {
                    $newArray = mysqli_fetch_array($res, MYSQLI_ASSOC);
                    echo
                    '<tc><td>'
                    . $newArray['city'] .
                    '<tc><td>'
                    . $newArray['sensory_tem'] .
                    '<tc><td>'
                    .$newArray['wind'].
                    '<tr>'
                    ;

                } else {
                    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
                }
        
                // Close connection
                mysqli_close($link);
                ?>
                </tbody>
        </table>
        </div>
        <div class="grid-content">
            <br></br> <br></br> <br></br>
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
