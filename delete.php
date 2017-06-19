<?php
session_start();
require('dbconnect.php');

if(isset($_REQUEST['record_id'])){

    $sql = 'DELETE FROM `records` WHERE `record_id` = '.$_REQUEST['record_id'];

    $detail = mysqli_query($db,$sql) or die(mysqli_error($db));

      header("Location: mypage.php");
      exit();
  }


?>