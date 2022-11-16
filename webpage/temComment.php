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
                    <li><a href="home.html" class="grid-header">Home</a></li>

                    <li> <a href="#">Weather Information<i class='fa fa-angle-down'></i></a>
                        <ul>`
                            <li><a href="#">Category One</a></li>
                            <li><a href="#">Category Two</a></li>
                            <li><a href="visibility.php">Visiable Distance</a></li>
                        </ul>
                    </li>

                    <li> <a href="#">Ranking<i class='fa fa-angle-down'></i></a>
                        <ul>`
                            <li><a href="#">Ranking One</a></li>
                            <li><a href="#">Ranking Two</a></li>
                            <li><a href="#">Ranking Three</a></li>
                        </ul>
                    </li>

                    <li> <a href="#">Community<i class='fa fa-angle-down'></i></a>
                        <ul>
                            <li><a href="#">Service One</a></li>
                            <li><a href="temComment.php">Sensory Temperature</a></li>
                            <li><a href="#">About clothes</a></li>
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

            <form action="temComment.php" method="POST">
                <p><b>If you want to comment in this page, add your nickname and password</b><br>
                <p>Nickname <input type="text" name="nickname" size="15">
                <p>Password <input type="password" name="pwd" size="15" >
                <p>What's your opinion on the sensible temperature? <br>
                <input type="radio" name="chk_info" value="cold">  cold  
                <input type="radio" name="chk_info" value="good">  good  
                <input type="radio" name="chk_info" value="hot">  hot  
                <p><input type="submit" name="submit" value="submit"></p>
            </form>
        
            <table>
                <thead>
                    <tr>
                        <th>Region Code</th>
                        <th>Date</th>
                        <th>Sensory Temperature</th>
                        <th>Wind Speed (m/s)</th>
                    </tr>
                </thead>

                <tbody>
                <?php
        
                $link = mysqli_connect("localhost", "team20", "team20", "team20");
        
                // Check connection
                if ($link === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }
        
                $sql = "SELECT * FROM sensory_temperature ";
                $res = mysqli_query($link, $sql);
        
                if ($res) {
                    while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                        echo
                        '<tc><td>'
                             .$newArray['region_code'].
                        '<tc><td>'
                            . $newArray['date'].
                        '<tc><td>'
                            . $newArray['sensory_tem'] .
                        '<tc><td>'
                            . $newArray['wind'] .
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

            
            
          