<?php

session_start();



require('dbconnect.php');
if(isset($_REQUEST['record_id'])){
  // var_dump($_SESSION['login_member_id']);
 var_dump($_REQUEST['book_id']);
    // SQL文作成（likesテーブルのINSERT文）ほんとは.$_SESSION['login_member_id']
$sql = 'INSERT INTO `likes` (`like_id`, `user_id`, `record_id`) VALUES (NULL,'.$_SESSION['login_member_id'].','.$_REQUEST['record_id'].')';

var_dump($sql);
//SQL文実行
mysqli_query($db,$sql) or die(mysqli_error($db));

//記事でいいねを押された記事のユーザーのpointの中に入れる$_REQUEST['record_id']を入れること
$sql = 'UPDATE`users`INNER JOIN `records` ON `users`.`user_id` = `records`.`user_id` SET `users`.`point` = `users`.`point`+10 WHERE `records`.`record_id`='.$_REQUEST['record_id'];
//SQL文実行
mysqli_query($db,$sql) or die(mysqli_error($db));
// 一覧のページに戻る/実際はbook_detail.php

$_SESSION['true'] ="true";


$url = 'book_detail.php?book_id='.$_REQUEST['book_id'];
header("Location:$url");
exit();

}

?>




