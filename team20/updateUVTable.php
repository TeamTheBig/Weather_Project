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
                <a href="./home.php" class="grid-header">Home</a>
            </div>
        </div>
        <?php
           $host = 'localhost';
           $user = 'team20';
           $pw = 'team20';
           $db = 'team20';


           $mysqli = mysqli_connect($host, $user, $pw, $db);

           if ($mysqli === false) {
               die("ERROR: Could not connect. " . mysqli_connect_error());
           }

           //사용자로부터 date, region code, insolation 값을 입력받음.
           $updateday = $_POST["updatedate"];
           $updateregion = $_POST["updateregion"];
           $updateinsolation = $_POST["updateinsolation"];

           
           //사용자의 입력값에 대한 insolation이 존재하는지 확인
           $sql = "SELECT insolation FROM uvtable WHERE uvdate = '".$updateday."' and region_code = '".$updateregion."'";
           $res = mysqli_query($mysqli, $sql);
           $data = mysqli_fetch_array($res);
           //Update
           //데이터가 테이블에 존재하면 update
           if(isset($data)) {
               $sql1 = "UPDATE uvtable set insolation = '".$updateinsolation."' where uvdate = '".$updateday."' and region_code = '".$updateregion."'";

               $res = mysqli_query($mysqli, $sql1);
               echo "<script>alert('successfully updated');</script>";

              
           }
           //Insert
           //값이 모두 입력되었으면 테이블 값을 업데이트
           else{
               $sql2 = "INSERT INTO uvtable(uvdate, region_code, insolation) VALUES ('".$updateday."', '".$updateregion."', '".$updateinsolation."')";
               //"UPDATE uvtable set insolation = '".$updateinsolation."' where uvdate = '".$updateday."' and region_code = ''";
               $res = mysqli_query($mysqli, $sql2);
               echo "<script>alert('success inserted');</script>";
           }
           mysqli_close($mysqli);
        ?>      
         <!--사용자의 input을 통해 삭제한 경우 뜨는 문구-->
        <div class="success">SUCCESSFULLY INSERTED OR UPDATED</div>
    </Body>

</Html>
