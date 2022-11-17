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
                <h1 id="logo">Typhoon Name Infomation</h1>                
                    <br>
                    <p><b><?php #모든 페이지 상단에 삽입
                    session_start();  #php 세션 사용
                    if(isset($_SESSION['name'])){ #등록된 이름이 있을 경우에만 인사 메세지를 출력함
                        echo "HI! ".$_SESSION['name']."";
                    }                  
                    ?></b></p>
                    <p><br><b>This page will show the list of typhoon. You can suggest the typhoon name in here.</b></p>
            </div>


            <div class="grid-content">
                <table>
                        <tr>
                            <td>
                                <p><b>Offical typhoon name list(used)</b></p>
                                <!-- typhoon 테이블에 저장되어 있는 typhoon_name들을 출력한다 -->
                                <?php
                                $link = mysqli_connect("localhost", "team20", "team20", "team20"); #DB연결

                                if($link === false){
                                    die("ERROR : Connet failed. ". mysqli_connect_error());
                                }else{ 
                                    $sql = "select * from typhoon where used = true"; #사용된 적이 있는 이름이 있는 튜플만을 불러오는 쿼리                                    
                                    $count = 0; #출력시 줄 바꿈에 사용
                                    if($res = mysqli_query($link, $sql)){
                                        while($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                                            #쿼리의 결과를 배열에 가져와서 출력
                                            $typhoon_name = $newArray['typhoon_name']; #태풍 이름
                                            $country = $newArray['country']; #태풍 이름을 지은 나라
                                            $count ++;
                                            echo "".$typhoon_name."(".$country.") &nbsp &nbsp &nbsp"; 
                                            if ($count%5 == 0){ #5개 출력 후 줄 바꿈
                                                echo"<br/>";
                                            }                             
                                        }
                                        }else{
                                            printf("Could not retrieve records: %s\n" . mysqli_error($link));
                                        }

                                    mysqli_free_result($res);
                                    
                                }
                                ?>

                                <br><br><br>
                                <p><b>Offical typhoon name list(not used)</b></p>
                                <!-- typhoon 테이블에 저장되어 있는 typhoon_name들을 출력한다 -->
                                <?php
                                    $sql = "select * from typhoon where used = false"; #사용된 적이 없는 이름이 있는 튜플만을 불러오는 쿼리
                                    $count = 0; #출력시 줄 바꿈에 사용
                                    if($res = mysqli_query($link, $sql)){
                                        while($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                                            #쿼리의 결과를 배열에 가져와서 출력
                                            $typhoon_name = $newArray['typhoon_name']; #태풍 이름
                                            $country = $newArray['country']; #태풍 이름을 지은 나라
                                            $count ++;
                                            echo "".$typhoon_name."(".$country.") &nbsp &nbsp &nbsp"; 
                                            if ($count%5 == 0){ #5개 출력 후 줄 바꿈
                                                echo"<br/>";
                                            }                             
                                        }
                                        }else{
                                            printf("Could not retrieve records: %s\n" . mysqli_error($link));
                                        }

                                    mysqli_free_result($res);
                                ?>
                            </td>

                            <td>
                                <p>comment</p>
                                <!-- 사용자에게서 등록 받은 새로운 태풍이름을 출력한다. 글 아이디는 자동으로 생성된 것 -->
                                <?php 
                                    $sql = "select comment_id, typhoon_name from new_typhoon_name"; #글 아이디와 태풍이름을 가져옴
                                    if($res = mysqli_query($link, $sql)){
                                        while($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                                            #쿼리의 결과를 배열에 가져와서 출력
                                            $comment_id = $newArray['comment_id']; #글 아이디
                                            $typhoon_name = $newArray['typhoon_name']; #사용자가 입력한 태풍 이름
                                            echo "[ID]".$comment_id." : ".$typhoon_name. "<br/>";                                
                                        }
                                    }else{
                                            printf("Could not retrieve records: %s\n" . mysqli_error($link));
                                        }
                                    
                                    mysqli_free_result($res);
                                    mysqli_close($link);                   
                                ?>
 
                                <br>                                
                                <!-- 사용자에게 글 아이디와 비밀번호를 받아서 코멘트를 삭제한다. -->
                                <!-- 사용자에게 글 아이디와 비밀번호와 새로운 태풍이름을 받아서 코멘트를 수정한다. -->
                                <form method = "post">
                                    <table>
                                        <!-- 아이디를 텍스트로 입력받음 -->  
                                        <tr> <td>Comment ID</td> <td><input type = text name = comment_id size=10 maxlength=20> </td> </tr>           
                                        <!--  비밀번호를 텍스트로 입력받음 -->
                                        <tr> <td>Password</td> <td><input type = text name = passwd size=10 maxlength=20> </td> </td> 
                                        <!-- 수정할 내용을 텍스트로 입력받음 -->
                                        <tr> <td>Edit in here</td> <td><input type = text name = typhoon_name size=10 maxlength=20> </td> </tr>
                                        <!-- 수정하기 버튼을 누르면 typhoonEdit.php가 실행 됨 -->
                                        <tr> <td> <center> <input type = "submit" value="edit" formaction="typhoonEdit.php"></center></td> 
                                        <!-- 삭제하기 버튼을 누르면 typhoonDelete.php가 실행 됨 -->    
                                            <td><center><input type = "submit" value="delete" formaction="typhoonDelete.php"></center></td> 
                                        </tr>
                                    </table>
                                </form>
                                        
                                <br><br><br>

                                <!-- 사용자에게 새로운 태풍이름과 비밀번호를 받아 코멘트를 등록한다. -->
                                <form method = "post" action = "typhoonInsert.php">
                                    <table style="padding-top:50px" align = center width=400 border=0 cellpadding=2 >
                                            <tr>
                                            <td height=30 align= center bgcolor=#ccc><font color=white>Create a new typhoon name</font></td>
                                            </tr>
                                            <tr>
                                            <td bgcolor=white>
                                            <table class = "frame"> 
                                                    <tr>
                                                    <td>New typhoon name</td>  <!-- 새로운 태풍 이름을 text로 받음 -->
                                                    <td><input type = text name = typhoon_name size=40> </td>
                                                    </tr>

                                                    <tr>
                                                    <td>Password</td> <!-- 비밀번호를 text로 받음 -->
                                                    <td><input type = text name = passwd size=10 maxlength=20></td>
                                                    </tr>
                                                    </table>

                                                    <center> <!-- 입력 받은 두 text의 내용을 받아서  typhoonInsert.php로 넘겨 실행시킴-->
                                                    <input type = "submit" value="save">
                                                    </center>
                                                    </td>
                                                    </tr>
                                            </table>
                                        </form>

                            </td>
                        </tr>
                    
                    </table>
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
        function() {
            $('ul', this).stop().slideDown(200);
        },
        function() {
            $('ul', this).stop().slideUp(200);
        }
    );
</script>
