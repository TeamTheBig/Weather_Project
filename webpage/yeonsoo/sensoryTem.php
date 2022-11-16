!DOCTYPE html>
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
                    <li><a href="home.html" class="grid-header">Home</a></li>

                    <li> <a href="#">Weather Information<i class='fa fa-angle-down'></i></a>
                        <ul>`
                            <li><a href="#">Category One</a></li>
                            <li><a href="sensoryTem.php">Sensory Temperature</a></li>
                            <li><a href="visibility.php">Visiable Distance</a></li>
                        </ul>
                    </li>

                    <li> <a href="#">Ranking<i class='fa fa-angle-down'></i></a>
                        <ul>`
                            <li><a href="#">Ranking One</a></li>
                            <li><a href="#">Ranking Two</a></li>
                        </ul>
                    </li>

                    <li> <a href="#">Community<i class='fa fa-angle-down'></i></a>
                        <ul>
                            <li><a href="#">Service One</a></li>
                            <li><a href="showcomment.php">Comment</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </div>

        <div class="grid-logo">
            <h1 id="logo">Community about Sensory Temperature</h1>
            <p><br><b>You can check sensory temperature of your area and comment about it!</b> </P>
        
        </div>

        <div class="grid-content">
        </div>
        
        <div class="grid-info">
        <h1>Check the sensory temperature</h1>
        <form method="POST">
                Choose the date you want to check the sensible temperature:
                <input type="date" name="chosedDate" min="2022-10-01" max="2022-10-30" value="2022-10-01"> <br>
                Wirte your city:
                <input type="text" name="chosedCity">
                <input type="submit" name="submit" value="Check">
            
        </form>
        </div>

        <div class="grid-content">
                <?php
        
                $link = mysqli_connect("localhost", "team20", "team20", "team20");
        
                // Check connection
                if ($link === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }


                $chosedDate = $_POST["chosedDate"];
                $chosedCity = $_POST["chosedCity"];

                $sql = "SELECT  s.sdate, s.sensory_tem, s.wind,  r.city 
                                FROM sensory_temperature AS s JOIN region AS r 
                                WHERE  s.sdate = '".$chosedDate."' and s.region_code = r.region_code and r.city = '".$chosedCity."'";

                
                $res = mysqli_query($link, $sql);
        
                if ($res) {
                    $newArray = mysqli_fetch_array($res, MYSQLI_ASSOC);
                    echo "<br/>Your region = ".$newArray['city']."<br/>" ; 
                    echo "Its sensory temperature = ".$newArray['sensory_tem']." ⁣°C<br/>" ;
                    echo "Its wind speed = ".$newArray['wind']." m/s<br/><br/>" ;

                } else {
                    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
                }
        
                // Close connection
                mysqli_close($link);
                ?>
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
