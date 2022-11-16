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
            <h1 id="logo">Delete your comment</h1>
            <p><br><b>You can delete your comment. <br>But, you have to remember your nickname and password</b> </P>
        
        </div>

        <div class="grid-content">
            
        </div>
        
       


        <div class="grid-info">
        
            <form action="deleteComment.php" method="POST">
                <p><b>If you want to delete your comment in this page, veritify your nickname and password</b><br><br>
                <p>Nickname : <input type="text" name="nickname" size="15">
                <p>Password :   <input type="password" name="pwd" size="15">
                    <br></br>
                <br>
                <p><input type="submit" value="delete" ></p>
        
            </form>

            <?php
                error_reporting(E_ALL^ E_WARNING); 
                $link = mysqli_connect("localhost", "team20", "team20", "team20");
        
                // Check connection
                if ($link === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }


                $nickname = $_POST["nickname"];
                $pwd = $_POST["pwd"];

                //$sql = "INSERT INTO tem_comment(nickname, passwd, user_comment) VALUES ('".$nickname."','".$pwd."', '".$comment."' )";
                $sql = "DELETE FROM tem_comment WHERE nickname = '".$nickname."'";
                $res = mysqli_query($link, $sql);
        
                if ($res) {

                } else {
                    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
                }
        
                // Close connection
                mysqli_close($link);
                ?>

        </div>

        <div class="grid-content">
           <p>Show the comments
           <p><input type="submit" value="comments" onClick="location.href='showComment.php'"></p>
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