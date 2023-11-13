<?php
    $con = mysqli_connect("localhost","root","","klakla");

    if(!$con){
     die ("Can't Connect :" . mysqli_connect_error());
    }
?>