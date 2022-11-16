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
    ini_set('display_errors', '0'); //에러 사항 웹페이지에 띄우지 않음
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
            <h1 id="logo">User satisfaction</h1>
            <p><br><b>On this page you can leave, edit or delete comments.</b></p>
        </div>


        <div class="grid-content">
            <?php
            $conn = mysqli_connect("localhost", "team20", "team20", "weather");
            ?>
            <FORM action="user_satisfaction.php" method="post">
                <br>
                <!-- nickname 이라는 이름으로 유저가 입력한 닉네임을 넘김 -->
                <!-- satisfactionInsert 이라는 이름으로 유저가 입력한 만족도 커멘트를 넘김 -->
                <!-- Insert 버튼으로 제출 -->
                <p>Please leave a comment on how satisfied you are with the information on the webpage.</p>
                <a>Nickname: <Input type="text" name="nickname"> Enter your Opinion: <Input type="text"
                        name="satisfactionInsert"> <Input type="submit" value="Insert"></a>
                <br><br>

                <!-- updateIndex 이라는 이름으로 유저가 입력한 인덱스를 넘김 -->
                <!-- satisfactionUpdate 이라는 이름으로 유저가 입력한 만족도 커멘트를 넘김 -->
                <!-- Update 버튼으로 제출 -->
                <p>You can update your opinion by the index</p>
                <a>Index: <Input type="text" name="updateIndex"> Edit your Opinion: <Input type="text"
                        name="satisfactionUpdate">
                    <Input type="submit" value="Update"></a>
                <br><br>

                <!-- deleteIndex 이라는 이름으로 유저가 입력한 인덱스를 넘김 -->
                <!-- Delete 버튼으로 제출 -->
                <p>You can delete your opinion by the index</p>
                <a>Index: <Input type="text" name="deleteIndex"> Delete your Opinion <Input type="submit"
                        value="Delete"></a>
                <br><br>

                <?php
                /* 만약 nickname이나 satisfactionInsert의 입력값이 비어있으면 에러 처리 */
                if (empty($_POST['nickname']) || empty($_POST['satisfactionInsert'])) {
                    printf(" ", mysqli_connect_error());
                } else {
                    /* USER_SATISFACTION 테이블의 NICKNAME에 nickname값을, USER_SATISFACTION에 satisfactionInsert값을 insert */
                    $insert = "INSERT INTO USER_SATISFACTION(NICKNAME, USER_SATISFACTION) VALUES('{$_POST['nickname']}','{$_POST['satisfactionInsert']}')";
                    $result = mysqli_query($conn, $insert);
                }

                /* USER_SATISFACTION 테이블의 USERID가 updateIndex인 row의 USER_SATISFACTION column값을 satisfactionUpdate값으로 update */
                $update = "UPDATE USER_SATISFACTION SET USER_SATISFACTION = '{$_POST['satisfactionUpdate']}' WHERE USERID =  '{$_POST['updateIndex']}'";
                $result = mysqli_query($conn, $update);

                /* USER_SATISFACTION 테이블의 USERID가 deleteIndex row의 USER_SATISFACTION column값을 delete */
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
                </TABLE><br><br>
            </FORM>
            <?php
            mysqli_free_result($result3);
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