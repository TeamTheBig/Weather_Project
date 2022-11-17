<?php
error_reporting(E_ALL ^ E_WARNING);

$link = mysqli_connect("localhost", "team20", "team20", "team20");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$nickname = $_POST["nickname"];
$pwd = $_POST["pwd"];
$comment = $_POST["comment"];


if ((empty($nickname)) or (empty($pwd))) {
    echo "<script>alert('Blanks are not allowed.');</script>"; 
    exit();
}


$sql = "INSERT INTO tem_comment(nickname, passwd, user_comment) VALUES ('" . $nickname . "','" . $pwd . "', '" . $comment . "' )";

$res = mysqli_query($link, $sql);

if ($res) {
    echo "<script>alert('Comment inserted successfully.');</script>";
} else {
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);


echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/showComment.php'>";

?>