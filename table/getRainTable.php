<Html>
    <Head>
        <Title>
            Show Rain Info
        </Title>
        <link rel="stylesheet" type = "text/css" href="../homepage/style.css" >
        <style>
            table{
                width : 50%;
                border : 1px solid #444444; 
                align : center;
                margin : auto;
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
            include_once ("login.php");
            include_once("createRainTable.php");
            include_once ("insertRainTable.php");
            
            $rainday = $_POST["inputraindate"];
            $rainregion = $_POST['inputrainregion'];

            if(isset($rainday) && isset($rainregion)){
                $sql = "SELECT * FROM PRECIPITAIONTABLE WHERE raindate = '".$rainday."' and region_code = '".$rainregion."'";

                $res = mysqli_query($mysqli, $sql);      
                $result = mysqli_fetch_array($res);

                $prov = $result['region_code'];
                $rate = $result['precipitation'];
            }
            //echo "this is ".$prov."";
            
            
            /*
            <?php

                include ("insertUVTable.php");
                $uvday = $_POST["inputuvdate"];
                echo "this is ".$uvday."";

                $sql = "SELECT * FROM uvtable WHERE uvdate = '".$uvday."'";
                $res = mysqli_query($mysqli, $sql);

                $result = mysqli_fetch_array($res);
                echo "Province".$result['uvdate']."and ".$result['province']."";

            ?>
            */
        ?>
        <div  class = "grids">
            <div class="grid-header">
                <a href="../homepage/home.html" class="grid-header">Home</a>
            </div>
            <table>
                <caption> <?php echo $rainregion; ?> </caption>
                <tr>
                    <th> Date </th>
                    <th> Precipitation </th>
                </tr>
                <tr>
                    <td> <?php echo $prov; ?> </td>
                    <td> <?php echo $rate; ?></td>
                </tr>
            </table>
        </div>
    </Body>

</Html>

