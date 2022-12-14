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
                <p><b>City List</b></p>
                <!-- 사용자가 검색 할 수 있는 도시명을 출력한다 -->
                <?php
                $link = mysqli_connect("localhost", "team20", "team20", "team20");

                if($link === false){
                    die("ERROR : Connet failed. ". mysqli_connect_error());
                }
                else{
                    #검색의 범위는 temperature 테이블 안에 정보가 있는 도시들 임
                    #temperature테이블은 도시명은 없고 지역 코드만을 가지고 있음
                    #temperature와 region를 join하여 temperature에 있는 도시명을 가지고 옴
                    $sql = "select distinct city 
                            from temperature as t, region as r 
                            where t.region_code = r.region_code";
                    $count = 0; #출력시 줄 바꿈에 사용
                    if($res = mysqli_query($link, $sql)){
                        while($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){#쿼리의 결과를 배열에 저장
                            $city = $newArray['city']; #칼럼 값을 변수에 저장
                            $count ++;
                            echo "$city  &nbsp &nbsp &nbsp"; #도시명 출력
                            if ($count%5 == 0){ #5개에 한번씩 줄 바꿈
                                echo"<br>";
                            }
                        }
                        } else{
                            printf("Could not retrieve records: %s\n" . mysqli_error($link));
                        }
                    
                    mysqli_free_result($res);
                }
                ?>

                <!-- 사용자에게 도시와 날짜를 받아 날씨 정보를 찾는다 -->
                <form method = "post" action = "findWeatherFunc.php">
                    <table  style="padding-top:50px" align = center width=400 border=0 cellpadding=2 >
                            <tr>
                            <td height=30 align= center bgcolor=#ccc><font color=white>Search the weather information you want to know</font></td>
                            </tr>
                            <tr>
                            <td bgcolor=white>
                            <table class = "frame"> 
                                    <tr>
                                    <td>City</td> <!-- 도시는 text로 받는다 -->
                                    <td><input type = text name = city size=35> </td>
                                    </tr>
             
                                    <tr>
                                    <td>Date</td> <!-- 날짜는 캘린더로 받는다 -->
                                    <td><input type = date name = mdate size=35 maxlength=30></td>
                                    </tr>
                                    </table>
             
                                    <center>
                                    <input type = "submit" value="find"> <!-- 입력받은 도시와 날짜를 findWeatherFunc.php로 보내고 실행한다 -->
                                    </center>
                            </td>
                            </tr>
                    </table>
                </form>

                <p>National average temperature<br></p>
                <?php
                #행정구역 별로 일 평균 온도를 알려준다. 날짜별로 기온이 높은 행정구역 순으로 나열함.
                    $sql = "select t.mdate, r.ADMINISTRATIVE_AREA, avg (t.avg_temperature) as avg_adarea_tem
                            from temperature as t, region as r
                            where t.region_code = r.region_code
                            group by t.mdate, r.ADMINISTRATIVE_AREA
                            order by t.mdate asc, avg_adarea_tem desc";
                    
                    if($res = mysqli_query($link, $sql)){

                        #temperature 테이블의 지역코드를 이용하여 region 테이블에서 행정구역 명을 가지고 옴
                        $sql = "select distinct r.ADMINISTRATIVE_AREA
                                from temperature as t, region as r
                                where t.region_code = r.region_code";
                        
                        $res2 = mysqli_query($link, $sql); #두번째 퀴리를 실행
                        $adarea_count = mysqli_num_rows($res2); #행정구역의 개수를 저장
                        $count = $adarea_count; #줄 바꿈을 위해 사용 됨
                        while($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){ #첫번째 쿼리의 결과를 배열에 저장
                            $mdate = $newArray['mdate'];
                            $ADMINISTRATIVE_AREA = $newArray['ADMINISTRATIVE_AREA'];
                            $avg_adarea_tem = $newArray['avg_adarea_tem']; #행정구역별 평균 온도를 저장
                            if ($count % $adarea_count == 0){ #날짜는 한 번만 출력
                                echo "<br>".$mdate."<br>";
                            }$count ++;                          
                            echo "".$ADMINISTRATIVE_AREA." : ".$avg_adarea_tem." &nbsp &nbsp"; #행정구역별 평균온도 출력
                            echo"<br/>";                           
                        }
                        }else{
                            printf("Could not retrieve records: %s\n" . mysqli_error($link));
                        }

                    mysqli_free_result($res);
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