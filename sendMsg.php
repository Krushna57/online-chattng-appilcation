<?php
    $msg = base64_encode($_POST["msg"]);
    $msgFrom = $_POST["msgFrom"];
    $msgTo = $_POST["msgTo"];
    include "conn.php";
    $q = "INSERT INTO `messages`(`MSGFROM`, `MSGTO`, `MESSAGE`) VALUES ('$msgFrom','$msgTo','$msg')";
    mysqli_query($conn,$q);
?>