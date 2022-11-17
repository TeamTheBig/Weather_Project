<?php
$link = mysqli_connect("localhost", "team20", "team20", "team20");

if($link === false){
    die("ERROR : Connet failed. ". mysqli_connect_error());
}

#사용자에게 입력받은 코멘트 아이디와 비밀번호를 변수에 저장
$comment_id = $_POST["comment_id"];
$passwd = $_POST["passwd"];

#사용자에게 입력받은 코멘트 아이디의 원래 비밀번호를 찾음
$sql = "select passwd from new_typhoon_name where comment_id = '".$comment_id."'";

#2가지 모두 입력이 있어야만 동작함
if ((empty($comment_id)) or (empty($passwd))){
    echo "<script>alert('Blanks are not allowed.');</script>"; #경고 메시지 띄움
    echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/typhoon.php'>"; #이전 페이지로 돌아감
    exit();
}

 if($res = mysqli_query($link, $sql)){ 
     if($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){ #입력받은 아이디로 찾아지는 값이 있으면 실행
        if($row['passwd'] == $passwd){ #테이블에 저장된 값과 입력받은 비밀번호가 동일하다면 실행
            $sql = "delete from new_typhoon_name where comment_id = '".$comment_id."'"; #입력받은 아이디 값을 가지는 튜플 삭제
            $res = mysqli_query($link, $sql); #쿼리 실행
            echo "<script>alert('Comment deleted successfully.');</script>"; #삭제 성공 메시지 띄움
        }else{
             echo "<script>alert('You enter the wrong password.');</script>";
         }
     }else{
        echo "<script>alert('You enter the wrong comment id.');</script>";
     }
    }else{
     echo "ERROR: Could not run query: $sql." . mysqli_error($link);}
 mysqli_close($link);

echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/typhoon.php'>"; #이전 페이지로 돌아감

?>
