<?php
$link = mysqli_connect("localhost", "team20", "team20", "team20");

if($link === false){
    die("ERROR : Connet failed. ". mysqli_connect_error());
}

#prepared state로 사용자에게 받은 새 태풍 이름을 테이블에 저장
 $sql = "insert into new_typhoon_name(passwd, typhoon_name) values (?,?)";
 
 if($stmt = mysqli_prepare($link, $sql)){
     mysqli_stmt_bind_param($stmt, "ss", $passwd, $typhoon_name);

     $passwd = $_POST["passwd"];
     $typhoon_name = $_POST["typhoon_name"];

     if ((empty($passwd)) or (empty($typhoon_name))){ #둘 중에 하나라도 빈 입력이 있으면 안됨
        echo "<script>alert('Blanks are not allowed.');</script>"; #경고문 띄우고
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/typhoon.php'>"; #이전 페이지로 돌아감
        exit();
    }

     if(mysqli_stmt_execute($stmt)){
         echo "<script>alert('Comment inserted successfully.');</script>"; #성공적으로 입력 됐다는 메세지 띄움
     }else{
         echo "ERROR: Could not execute query: $sql." . mysqli_error($link);
     }
 } else{
     echo "ERROR: Could not prepare query: $sql." . mysqli_error($link);
 }

 mysqli_stmt_close($stmt);

 mysqli_close($link);

 echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/typhoon.php'>"; #이전 페이지로 돌아감
?>
