<Html>
    <Head>
        <Title>
            Show UV Info
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
            //include ("login.php");
            //include_once("createUVTable.php");
            //include_once ("insertUVTable.php");
            $host = 'localhost';
            $user = 'team20';
            $pw = 'team20';
            $db = 'team20';
        
        
            $mysqli = new mysqli($host, $user, $pw, $db);
            
            //사용자로부터 date와 region code를 입력받음.
            $uvday = $_POST["inputuvdate"];
            $uvregion = $_POST['inputuvregion'];

            //date와 region code가 모두 입력되었으면 해당하는 row를 가져옴.
            if(isset($uvday) && isset($uvregion)){
                
                $sql = "SELECT * FROM uvtable WHERE uvdate = '".$uvday."' and region_code = '".$uvregion."'";
                $res = mysqli_query($mysqli, $sql);      
                $result = mysqli_fetch_array($res);

                $prov = isset($result['region_code'])?$result['region_code']:false;
                $rate = $result['insolation'];
            }
        ?>
        <div  class = "grids">
            <div class="grid-header">
                <a href="./home.html" class="grid-header">Home</a>
            </div>
        </div>
        <div class="search">
            <table >
                <caption> <?php echo $uvregion; ?> </caption>
                <tr>
                    <th> Date </th>
                    <th> Insolation Rate </th>
                </tr>
                <tr>
                    <td> <?php echo $uvday; ?> </td>
                    <td> <?php echo $rate; ?></td>
                </tr>
            </table>
        </div>       
    </Body>

</Html>

