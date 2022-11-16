<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TheBig</title>
    <link rel="stylesheet" href="./hyuna.css" type="text/css">
    <style>
        table,
        th,
        td {
            padding: 1%;
        }
    </style>
</head>

<body>
    <?php
    ini_set('display_errors', '0');
    ?>
    <div class="grids">
        <div class="grid-header">
            <nav>
                <ul>
                    <li><a href="home.html" class="grid-header">Home</a></li>

                    <li> <a href="#">Weather Information<i class='fa fa-angle-down'></i></a>
                        <ul>
                            <li><a href="#">Category One</a></li>
                            <li><a href="#">Category Two</a></li>
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
                            <li><a href="user_satisfaction.php">User Satisfaction</a></li>
                            <li><a href="#">Sensory Temperature</a></li>
                            <li><a href="#">About clothes</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="grid-logo">
            <h1 id="logo">Fine particles Infomation</h1>
            <p><br><b>This page will shows the ranking in order of the region with the highest fine particles and ultra
                    fine particles concentration on a monthly basis.</b></p>
        </div>


        <div class="grid-content">
            <?php
        $conn = mysqli_connect("localhost", "team20", "team20", "weather");
        ?>
            <FORM action="user_satisfaction.php" method="post">
                <p>Please leave your comment by satisfaction with the above information.</p>
                <a>Nickname: <Input type="text" name="nickname"> Enter your Opinion: <Input type="text"
                        name="satisfactionInsert"> <Input type="submit" value="Insert"></a>
                <br>

                <p>You can update or delete your opinion</p>
                <a>Index: <Input type="text" name="updateIndex"> Edit your Opinion: <Input type="text"
                        name="satisfactionUpdate">
                    <Input type="submit" value="Update"></a> <br>
                <a>Index: <Input type="text" name="deleteIndex"> Delete your Opinion <Input type="submit"
                        value="Delete"></a>

                <?php
                if (empty($_POST['nickname']) || empty($_POST['satisfactionInsert'])) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                } else {
                    $insert = "INSERT INTO USER_SATISFACTION(NICKNAME, USER_SATISFACTION) VALUES('{$_POST['nickname']}','{$_POST['satisfactionInsert']}')";
                    $result = mysqli_query($conn, $insert);
                }

                $update = "UPDATE USER_SATISFACTION SET USER_SATISFACTION = '{$_POST['satisfactionUpdate']}' WHERE USERID =  '{$_POST['updateIndex']}'";
                $result = mysqli_query($conn, $update);

                $delete = "DELETE FROM USER_SATISFACTION WHERE USERID = '{$_POST['deleteIndex']}'";
                $result = mysqli_query($conn, $delete);

                $query3 = "SELECT * FROM USER_SATISFACTION;";
                $result3 = mysqli_query($conn, $query3);
                ?>

                <TABLE>
                    <thead>
                        <tr>
                            <td>Index</td>
                            <td>Nickname</td>
                            <td>Opinion</td>
                        </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_array($result3)) { ?>
                    <tr>
                        <td>
                            <?= $row['USERID'] ?>
                        </td>
                        <td>
                            <?= $row['NICKNAME'] ?>
                        </td>
                        <td>
                            <?= $row['USER_SATISFACTION'] ?>
                        </td>
                    </tr>
                    <?php } ?>
                </TABLE>
            </FORM>
            <?php
            mysqli_free_result($result3);
            ?>

            <button type="button" class="userBtn" onclick="location.href='fine_particles_trend.php'">See the
                concentration trend of
                October</a>
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