<Html>
    <Head>
        <Title>
            Update UV Data
        </Title>
        <link rel="stylesheet" href="./home.css">
    </Head>
    <Body>
        <div class = "grids">
            <div class="grid-header">
                <a href="./home.html" class="grid-header">Home</a>
            </div>
        </div>
        <?php
            //include_once ("login.php");
            $host = 'localhost';
            $user = 'team20';
            $pw = 'team20';
            $db = 'team20';


            $mysqli = new mysqli($host, $user, $pw, $db);

            //사용자로부터 date, region code, insolation 값을 입력받음.
            $updateday = $_POST["updatedate"];
            $updateregion = $_POST['updateregion'];
            $updateinsolation = $_POST['updateinsolation'];

            //UPDATE
            //값이 모두 입력되었으면 테이블 값을 업데이트
            if(isset($updateinsolation) && isset($updateday) && isset($updateregion)){
                settype($updateinsolation, 'float');
                $sql = "UPDATE uvtable set insolation = '".$updateinsolation."' where uvdate = '".$updateday."' and region_code = '".$updateregion."'";
                $res = mysqli_query($mysqli, $sql); 
                //echo "Successful";
            }
            else{
                $sql = "INSERT INTO uvtable (uvdate, region_code, insolation) VALUES ('".$updateday."', '".$updateregion."', '".$updateinsolation."')";
                //"UPDATE uvtable set insolation = '".$updateinsolation."' where uvdate = '".$updateday."' and region_code = ''";
                $res = mysqli_query($mysqli, $sql);
            }
        ?>
        <!--사용자의 input을 통해 삭제한 경우 뜨는 문구-->
        <div class="success">SUCCESSFULLY INSERTED OR UPDATED</div>
    </Body>

</Html>
