<Html>
    <Head>
        <Title>
            Update UV Data
        </Title>
        <link rel="stylesheet" href="../homepage/style.css">
    </Head>
    <Body>
        <?php
            include_once ("login.php");
            $updateday = $_POST["updatedate"];
            $updateregion = $_POST['updateregion'];
            $updateinsolation = $_POST['updateinsolation'];

            
               
            //$result = mysqli_fetch_array($res);

            if(isset($updateinsolation) && isset($updateday) && isset($updateregion)){
                settype($updateinsolation, 'float');
                $sql = "UPDATE uvtable set insolation = '".$updateinsolation."' where uvdate = '".$updateday."' and region_code = '".$updateregion."'";
                $res = mysqli_query($mysqli, $sql); 
                //echo "Successful";
            }
        ?>

    </Body>

</Html>
