<Html>
    <Head>
        <Title>
            Delete UV Data
        </Title>
        <link rel="stylesheet" href="./home.css">
    </Head>
    <Body>
        <div class = "grids">
            <div class="grid-header">
                <a href="./home.php" class="grid-header">Home</a>
            </div>
        </div>
        <?php
            $host = 'localhost';
            $user = 'team20';
            $pw = 'team20';
            $db = 'team20';
        
        
            $mysqli = new mysqli($host, $user, $pw, $db);

            //사용자로부터 date, region code 입력받음
            $deleteday = $_POST["deletedate"];
            $deleteregion = $_POST['deleteregion'];

            //DELETE
            //date와 region을 입력받아서 uvtable에서 내용 삭제
            if(isset($deleteday) && isset($deleteregion)){
                $sql = "DELETE FROM uvtable where uvdate = '".$deleteday."' and region_code = '".$deleteregion."'";
                $res = mysqli_query($mysqli, $sql); 
                //echo "success";
            }
        ?>
        <!--사용자의 input을 통해 삭제한 경우 뜨는 문구-->
        <div class="success">SUCCESSFULLY DELETED</div>
    </Body>

</Html>
