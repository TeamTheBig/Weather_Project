<html>
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
                <h1 id="logo">Find weather information</h1>
                    <br>
                    <p><b><?php #모든 페이지 상단에 삽입
                    session_start();  #php 세션 사용
                    if(isset($_SESSION['name'])){ #등록된 이름이 있을 경우에만 인사 메세지를 출력함
                        echo "HI! ".$_SESSION['name']."";
                    }                  
                    ?></b></p>
                    <p><br><b>This page will show you the weather by inputting the date and location.</b></p>
            </div>


            <div class="grid-content">
                <p>we found the information!</p>
                <!-- 사용자에게 입력 받은 날짜와 도시 값을 가지고 쿼리를 실행시키고 검색 결과를 출력한다 -->
                <?php
                $link = mysqli_connect("localhost", "team20", "team20", "team20");

                if($link === false){
                    die("ERROR : Connet failed. ". mysqli_connect_error());
                }

                #temperature 테이블을 기준으로 값을 받아왔음
                $mdate = $_POST["mdate"];
                $city = $_POST["city"]; 

                #날짜와 도시 무조건 입력해야함.
                if ((empty($mdate)) or (empty($city))){
                    echo "<script>alert('Blanks are not allowed.');</script>"; #빈칸은 안 된다는 경고 메시지를 띄움
                    echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/findWeather.php'>"; #원래 페이지로 돌아감
                    exit(); #종료
                }

                #사용자에게 도시로 정보를 입력 받았지만 날씨 정보를 가지고 있는 테이블들은 지역 코드만을 가지고 있다.
                #검색 가능한 지역의 기준이 되는 temperature 테이블과 region 테이블을 조인하여 입력받은 도시의 지역코드를 알아낸다.
                $sql = "select distinct t.region_code
                        from temperature as t, region as r 
                        where t.region_code = r.region_code and r.city = '".$city."'";

                if($res = mysqli_query($link, $sql)){
                    if($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){ #도시명으로 찾아진 지역코드가 있을 때에만 작동
                        $region_code = $newArray['region_code']; #도시명을 통해 얻은 지역코드 저장

                        #temperature 테이블에 HUMIDTABLE, PRECIPITAIONTABLE, UVTABLE를 각각 left join 하고 합침
                        #temperature의 모든 attribute를 가져옴
                        #나머지 3 테이블에선 각각 하나의 attribute를 가져와서 weather이라는 칼럼으로 가져옴
                        $sql = "select t.*, h.relative_humidity as weather
                        from temperature as t
                        left join HUMIDTABLE as h 
                        on t.mdate = h.humiddate and t.region_code = h.region_code
                        where t.mdate = '".$mdate."' and t.region_code = '".$region_code."'
                        union all
                        select t.*, p.precipitation
                        from temperature as t
                        left join PRECIPITAIONTABLE as p
                        on t.mdate = p.raindate and t.region_code = p.region_code
                        where t.mdate = '".$mdate."' and t.region_code = '".$region_code."'
                        union all
                        select t.*, u.insolation
                        from temperature as t
                        left join UVTABLE as u 
                        on t.mdate = u.uvdate and t.region_code = u.region_code
                        where t.mdate = '".$mdate."' and t.region_code = '".$region_code."'
                        ";

                        if($res = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($res)){ #위 쿼리문에서 나온 결과가 있을 때에만 작동
                                echo "Here's the result of search.<br><br>";
                                #배열 만들어서 칼럼명 넣어두기 (위 쿼리를 통해 weather로 구분 없이 가져왔기 때문에)
                                $weather_list = ["Relative_humidity : ", "Precipitation : ", "Insolation : "];
                                $count = 0; # weather칼럼 부분만 배열 돌려서 하나씩 출력하기 위해서
                                while($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                                    $Nmdate = $newArray['mdate'];
                                    $Nregion_code = $newArray['region_code'];
                                    $avg_temperature = $newArray['avg_temperature'];
                                    $min_temperature = $newArray['min_temperature'];
                                    $max_temperature = $newArray['max_temperature'];
                                    $weather = $newArray['weather'];                                
                                    if($count == 0){ #모든 배열에 같은 내용이 들어가 있기 때문에 한 번만 출력하면 되는 부분
                                        echo "Date : ".$Nmdate."     city(region_code) : ".$city."(".$Nregion_code.")<br/>";
                                        echo "Avg_temperature : ".$avg_temperature."<br/>";
                                        echo "Min_temperature : ".$min_temperature."<br/>";
                                        echo "Max_temperature : ".$max_temperature."<br/>"; 
                                    }    
                                    echo "".$weather_list[$count]." ".$weather."<br/>"; #순서대로 상대습도, 강수량, 일조량정보 출력
                                    $count ++;
                                }
                                echo "<script>alert('Find weather information successfully.');</script>"; #검색 성공 메시지 띄우기
                            }else{
                                echo "<script>alert('You enter the date which we don\'t have data.');</script>"; #경고 메시지 띄우기
                                echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/findWeather.php'>"; #검색 했던 화면으로 돌아가기
                            }       
                        }else{
                            echo "ERROR: Could not run query: $sql." . mysqli_error($link);
                            echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/findWeather.php'>";
                        }
                    }else{
                        echo "<script>alert('You enter the wrong city name.');</script>";
                        echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/findWeather.php'>";
                    } 
                }else{
                    echo "ERROR: Could not run query: $sql." . mysqli_error($link);
                    echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/findWeather.php'>";
                }             
                mysqli_close($link);
               
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