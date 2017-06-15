<?php

session_start();



require('dbconnect.php');

//記事でいいねを押された記事のユーザーのpointの中に入れる$_REQUEST['record_id']を入れること
$sql = 'UPDATE`users`INNER JOIN `records` ON `users`.`user_id` = `records`.`user_id` SET `users`.`point` = `users`.`point`+10 WHERE `users`.`user_id`='.$_SESSION['login_member_id'];
//SQL文実行
mysqli_query($db,$sql) or die(mysqli_error($db));
// 一覧のページに戻る/実際はbook_detail.php

$_SESSION['true2'] ="true2";



header("Location:mypage.php");
exit();



?>


