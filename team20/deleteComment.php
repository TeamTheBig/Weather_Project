<?php
error_reporting(E_ALL ^ E_WARNING);
$link = mysqli_connect("localhost", "team20", "team20", "team20");

//transaction 시작
$link->begin_transaction();

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//deleteComment.html로부터 입력받은 사용자input
$nickname = $_POST["del_nickname"];
$pwd = $_POST["del_pwd"];


//nickname과 passwd는 NOT NULL 속성을 가지고 있므로
//두가지 중 하나라도 NULL이라면 알림창 실행 후 실행시키지 않음
if ((empty($nickname)) or (empty($pwd))) {
    echo "<script>alert('Blanks are not allowed.');</script>";
    exit();
}

//사용자로부터 입력받은 nickname에 대한 passwd를 받아옴
$sql = "SELECT passwd FROM comment WHERE nickname = '" . $nickname . "'";


if ($res = mysqli_query($link, $sql)) {
    if ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        //본인이 입력한 댓글만 삭제할 수 있게 하기 위함
        if ($row['passwd'] == $pwd) {
            /*사용자로부터 입력받은 nickname에 대한 passwd(in comment table)와 사용자가 입력한 passwd가 동일하다면,
              delete문 실행*/
            $sql = "DELETE FROM comment where nickname = '" . $nickname . "'";
            $res = mysqli_query($link, $sql);
            echo "<script>alert('Comment deleted successfully.');</script>"; //성공적으로 실행됨
            $link->commit(); //commit
        } else {
            //사용자가 입력한 passwd가 table에 저장되어있는 값과 동일하지 않음
            echo "<script>alert('You enter the wrong password.');</script>";
            $link->rollback(); //잘못된 값 입력했으므로 rollback
        }
    } else {
        //사용자가 등록되어있지 않은 nickname을 입력함 (삭제할 데이터가 없음)
        echo "<script>alert('You enter the wrong nickname.');</script>";
        $link->rollback(); //잘못된 값 입력했으므로 rollback
    }
} else {
    echo "ERROR: Could not run query: $sql." . mysqli_error($link);
    $link->rollback(); //오류발생시 rollback
}


mysqli_close($link);
//댓글 보여주는 화면으로 자동 이동
echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/showComment.php'>";
?>