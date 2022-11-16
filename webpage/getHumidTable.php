<Html>
    <Head>
        <Title>
            Show Humidity Info
        </Title>
        <link rel="stylesheet" type = "text/css" href="./home.css" >
        <style>
            table{
                width : 50%;
                /*border : 1px solid #444444; */
                align : center;
                margin : auto;
                place-items: center;
                border-color: darkgreen;
                border-radius: 5px;
                font-size:30px;
            }
            td, th{
                padding : 20px;
                border-bottom : 1px solid #444444;
                text-align : center;
            }
            div {
                background-color: rgba( 255, 255, 255, 0.5 );
            }

            .grid-header{
                background-color:rgb(0, 70, 42);
                text-decoration: none;
                color:white;
                grid-column: 1 / span 5;
                display: inline;
                text-align: center;
                padding: 0.8em;
                padding-top: 1em;
                word-spacing: 0.1em;
                font-weight: bold;
            }
        </style>
    </Head>
    <Body>
        <?php
            //include_once ("login.php");
            //include_once("createHumidTable.php");
            //include_once ("insertHumidTable.php");
            $host = 'localhost';
            $user = 'team20';
            $pw = 'team20';
            $db = 'team20';
        
        
            $mysqli = new mysqli($host, $user, $pw, $db);
            
            //사용자로부터 date와 region code를 받아옴.
            $humidday = $_POST["inputhumiddate"];
            $humidregion = $_POST['inputhumidregion'];

            //사용자로부터 date와 region code를 모두 입력 받았으면 테이블에서 해당 데이터에 해당하는 행을 가져옴.
            if(isset($humidday) && isset($humidregion)){
                $sql = "SELECT * FROM humidtable WHERE humiddate = '".$humidday."' and region_code = '".$humidregion."'";

                $res = mysqli_query($mysqli, $sql);      
                $result = mysqli_fetch_array($res);

                $prov = $result['region_code'];
                $rate = $result['relative_humidity'];
            }
        ?>
        <div  class = "grids">
            <div class="grid-header">
                <a href="./home.html" class="grid-header">Home</a>
            </div>
            
        </div>
        <div class="search">
            <table>
                <caption> <?php echo $humidregion; ?> </caption>
                <tr>
                    <th> Date </th>
                    <th> Relative humidity </th>
                </tr>
                <tr>
                    <td> <?php echo $humidday; ?> </td>
                    <td> <?php echo $rate; ?></td>
                </tr>
            </table>
        </div>
    </Body>

</Html>

