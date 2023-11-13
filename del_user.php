<?php
include "navbar.php" ;
include "connect.php" ;
$username =$_GET['username'];
$sql = "DELETE FROM user WHERE username = '$username'";
$result = $con->query($sql);

if (!$result) {
    echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');history.back();</script>";
} else {
    header('location:user.php');
}