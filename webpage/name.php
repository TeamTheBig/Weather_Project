<?php
session_start(); #세션 시작

$_SESSION['name'] =  $_POST['name']; #사용자에게 입력받은 값을 세션 변수에 저장

echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/home.php'>"; #이전 화면으로 돌아감

?>

