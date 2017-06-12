<?php
session_start();
require('dbconnect.php');

// get送信されたtweet_idを取得
if(isset($_REQUEST['record_id'])){
// SQL文作成（likesテーブルのINSERT文）$_SESSION['login_member_id']と$_REQUEST['record_id']をいれること
$sql = 'DELETE FROM `likes` WHERE `user_id`=2  AND `record_id` ='.$_REQUEST['record_id'];
//SQL文実行
mysqli_query($db,$sql) or die(mysqli_error($db));

// 一覧のページに戻る（index.php）
header("Location: like_btn_sample.php");
exit();
}

?>