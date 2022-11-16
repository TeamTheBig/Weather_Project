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
                <a href="home.php" class="grid-header">Home</a>
                <a href="typhoon.php" class="grid-header">Typhoon</a>
                <a href="findWeather.php" class="grid-header">Find Weather</a>
                <a href="00.html" class="grid-header">page2</a>
                <a href="00.html" class="grid-header">page2</a>
                <a href="00.html" class="grid-header">page3</a>
                <a href="00.html" class="grid-header">page3</a>    
                <a href="fine_particles.html" class="grid-header">Fine particles</a>   
                <a href="ultra_fine_particles.html" class="grid-header">Ultra Fine particles</a>   
            </div>

            <div class="grid-logo">
                <h1 id="logo">홈페이지 제목</h1>
                    <br>
                    <p><b><?php #모든 페이지 상단에 삽입
                    session_start();  #php 세션 사용
                    if(isset($_SESSION['name'])){ #등록된 이름이 있을 경우에만 인사 메세지를 출력함
                        echo "HI! ".$_SESSION['name']."";
                    }                  
                    ?></b></p>
                    <p><br><b>홈페이지 부제목</b></p>
            </div>


            <div class="grid-content">

                <p>Welcome to our homepage!</p>
                <br><br>
                <!-- 사용자에게 세션에 저장해서 사용할 이름을 text로 받아서 name.php를 실행한다-->
                <p>what is your name?</p>
                <form method = "post" action = "name.php">
                <table>  
                <tr><td>name</td> 
                    <td><input type = text name = name size=10 maxlength=20></td>
                    <td><input type = "submit" value="save"></td>
                </tr>
                </table>
                </form>   

                <?php #사용자에게서 이미 받은 name이 있을 경우에만 delecte 버튼을 띄워서 클릭시 deleteName.php를 실행한다.
                if(isset($_SESSION['name'])){ ?>
                    <form action = "deleteName.php">
                    <input type='button' value = 'Delete' onclick = "location.href='http://localhost/team20/deleteName.php'">
                    </form>
                <?php }
                ?>          
                

            </div>
            <div class="grid-footer">
                <li>Big Data Application Team TheBig</li>
            </div>
        </div>
    </body>
</html>