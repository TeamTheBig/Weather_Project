<?php
session_start();
session_destroy(); #사용자에게 name을 받았던 세션을 버린다.
echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/home.php'>"; #원래 페이지로 돌아감
?>