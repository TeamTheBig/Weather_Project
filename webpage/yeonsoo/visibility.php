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
            <h1 id="logo">Visiable Distance</h1>
            <p><br><b>You can check out the visibility of anywhere you want!</b> </P>
        
        </div>
        
        <div class="grid-content">
        <form  method="POST">
            <label > Choose the date you want to check:
                <input type="date" name="chosedDate" min="2022-10-01" max="2022-10-30" value="2022-10-01">
                <input type="submit" name="submit" value="Submit">
            </label>
        </form>
            <table>
                <thead>
                    <tr>
                        <th>region code</th>
                        <th>date</th>
                        <th>visiable distacne(10m)</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                 error_reporting(E_ALL^ E_WARNING); 
                $link = mysqli_connect("localhost", "team20", "team20", "team20");
        
                // Check connection
                if ($link === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }
        
                $chosedDate = $_POST["chosedDate"];

                $sql = "SELECT v.vdate, v.visi_dist,  r.city 
                                FROM visibility AS v JOIN region AS r 
                                WHERE DATE_FORMAT(v.vdate, '%Y-%m-%d') = '".$chosedDate."' and v.region_code = r.region_code";
                $res = mysqli_query($link, $sql);
                //$res2 = mysqli_query($link, $sqlRegion);
                if ($res ) {
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

            
            
          