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


$sql = "SELECT passwd FROM tem_comment WHERE nickname = '" . $nickname . "'";


if ($res = mysqli_query($link, $sql)) {
    if ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        if ($row['passwd'] == $pwd) {
            $sql = "UPDATE tem_comment
                     SET user_comment ='" . $comment . "'
                     WHERE nickname = '" . $nickname . "'";
            $res = mysqli_query($link, $sql);
            echo "<script>alert('Comment modified successfully.');</script>";
        } else {
            echo "<script>alert('You enter the wrong password.');</script>";
        }
    } else {
        echo "<script>alert('You enter the wrong nickname.');</script>";
    }
} else {
    echo "ERROR: Could not run query: $sql." . mysqli_error($link);
}

// Close connection
mysqli_close($link);

echo "<meta http-equiv='refresh' content='0; url=http://localhost/team20/showComment.php'>";

?>

 