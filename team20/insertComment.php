<?php
error_reporting(E_ALL ^ E_WARNING);


$link = mysqli_connect("localhost", "team20", "team20", "team20");

//transaction 시작
$link->begin_transaction();

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//insertComment.html로부터 입력받은 사용자input
$nickname = $_POST["nickname"];
$pwd = $_POST["pwd"];
$comment = $_POST["comment"];


//nickname과 passwd는 NOT NULL 속성을 가지고 있므로
//두가지 중 하나라도 NULL이라면 알림창 실행 후 실행시키지 않음
if ((empty($nickname)) or (empty($pwd))) {
    echo "<script>alert('Blanks are not allowed.');</script>"; 
    exit();
}

//사용자로부터 입력받은 데이터를 TABLE comment에 INSERT 함
$sql = "INSERT INTO comment(nickname, passwd, user_comment) VALUES ('" . $nickname . "','" . $pwd . "', '" . $comment . "' )";
$res = mysqli_query($link, $sql);

if ($res) {
    echo "<script>alert('Comment inserted successfully.');</script>";
    //오류가 없이 insert되었다면 commit
    $link->commit();
} 
else {
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
    //오류 발생시 rollback.
    $link->rollback();
}

// Close connection
mysqli_close($link);

//댓글 보여주는 화면으로 자동 이동
echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/showComment.php'>";

?>