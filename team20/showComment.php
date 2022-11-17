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
            <h1 id="logo">Comments</h1>
            <p><br><b>You can check the comments of our users!</b> </P>
        
        </div>
        
        <div class = "grid-content">
        <br></br>
        </div>
        
        <div class="grid-info">
              <!-- INSERT, UPDATE, DELETE 할 수 있는 화면으로 이동하는 버튼 생성 -->
                <h1>Comments </h1><br>
                <p>If you want to insert or edit or delete the comment, click the below button<br></p><br>
                <tb> Go to <input type="submit" value=" insert " onClick="location.href='insertComment.html'"><tb>
                <tb><input type="submit" value=" edit " onClick="location.href='updateComment.html'"><tb>
                <tb><input type="submit" value=" delete " onClick="location.href='deleteComment.html'"></p>


        </div>

        <div class="grid-content">
         <!-- 저장되어있는 댓글 출력하는 테이블 생성 -->
         <br></br><br></br>
        <table>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Comment</th>
                </tr>
            </thead>
        
            <tbody>
                <?php

                $link = mysqli_connect("localhost", "team20", "team20", "team20");

                // Check connection
                if ($link === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                //모든 댓글 출력하는 SELECT문
                $sql = "SELECT  * FROM comment";

                $res = mysqli_query($link, $sql);

                if ($res) {
                    while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                        // passwd는 출력하지 않음
                        echo
                            '<tc><td>'
                            . $newArray['nickname'] .
                            '<tc><td>'
                            . $newArray['user_comment'] .
                            '<tc><td>' .
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
        <br></br><br></br><br></br>
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

            
            
          