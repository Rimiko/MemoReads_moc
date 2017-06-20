<?php

session_start();
require('dbconnect.php');
if(isset($_REQUEST['record_id'])){
    var_dump($_REQUEST['record_id']);
  // var_dump($_SESSION['login_member_id']);
 // var_dump($_REQUEST['book_id']);
    // SQL文作成（likesテーブルのINSERT文）ほんとは.$_SESSION['login_member_id']
$sql = 'INSERT INTO `likes` (`like_id`, `user_id`, `record_id`) VALUES (NULL,'.$_SESSION['login_member_id'].','.$_REQUEST['record_id'].')';

// var_dump($sql);
//SQL文実行
mysqli_query($db,$sql) or die(mysqli_error($db));

//記事でいいねを押された記事のユーザーのpointの中に入れる$_REQUEST['record_id']を入れること
$sql = sprintf('UPDATE `users` INNER JOIN `records` ON `users`.`user_id` = `records`.`user_id` SET `users`.`point` = `users`.`point`+10 WHERE `records`.`record_id`=%d',$_REQUEST['record_id']);
//SQL文実行
mysqli_query($db,$sql) or die(mysqli_error($db));
// 一覧のページに戻る/実際はbook_detail.php


$sql = sprintf('SELECT * FROM `users` INNER JOIN `records` ON `users`.`user_id` = `records`.`user_id` WHERE `records`.`record_id`=%d',$_REQUEST['record_id']);



$avatars = mysqli_query($db,$sql) or die(mysqli_error($db));
$avatar_array = array();
$avatar = mysqli_fetch_assoc($avatars);
$avatar_array[] = $avatar;
 var_dump($avatar_array[0]['point']);

//レベルアップ
 if ($avatar_array[0]['point'] == 10 || $avatar_array[0]['point'] == 15){

    $sql = sprintf('UPDATE `users` SET `users`.`level` = `users`.`level`+1 WHERE `users`.`user_id`=%d',$avatar_array[0]['user_id']);
    mysqli_query($db,$sql) or die(mysqli_error($db));

}elseif($avatar_array[0]['point'] == 20 || $avatar_array[0]['point']==25) {
    $sql = sprintf('UPDATE `users` SET `users`.`level` = `users`.`level`+1 WHERE `users`.`user_id`=%d',$avatar_array[0]['user_id']);
    mysqli_query($db,$sql) or die(mysqli_error($db));

}elseif ($avatar_array[0]['point'] == 30 || $avatar_array[0]['point']==35) {
    $sql = sprintf('UPDATE `users` SET `users`.`level` = `users`.`level`+1 WHERE `users`.`user_id`=%d',$avatar_array[0]['user_id']);
    mysqli_query($db,$sql) or die(mysqli_error($db));

}elseif($avatar_array[0]['point'] == 40 || $avatar_array[0]['point']==45) {
    $sql = sprintf('UPDATE `users` SET `users`.`level` = `users`.`level`+1 WHERE `users`.`user_id`=%d',$avatar_array[0]['user_id']);
    mysqli_query($db,$sql) or die(mysqli_error($db));

}elseif ($avatar_array[0]['point'] == 50 || $avatar_array[0]['point']==55) {
    $sql = sprintf('UPDATE `users` SET `users`.`level` = `users`.`level`+1 WHERE `users`.`user_id`=%d',$avatar_array[0]['user_id']);
    mysqli_query($db,$sql) or die(mysqli_error($db));
}elseif ($avatar_array[0]['point'] == 60 || $avatar_array[0]['point']==65) {
    $sql = sprintf('UPDATE `users` SET `users`.`level` = `users`.`level`+1 WHERE `users`.`user_id`=%d',$avatar_array[0]['user_id']);
    mysqli_query($db,$sql) or die(mysqli_error($db));
}elseif ($avatar_array[0]['point'] == 70 || $avatar_array[0]['point']==75) {
    $sql = sprintf('UPDATE `users` SET `users`.`level` = `users`.`level`+1 WHERE `users`.`user_id`=%d',$avatar_array[0]['user_id']);
    mysqli_query($db,$sql) or die(mysqli_error($db));
}elseif ($avatar_array[0]['point'] == 80 || $avatar_array[0]['point']==85) {
    $sql = sprintf('UPDATE `users` SET `users`.`level` = `users`.`level`+1 WHERE `users`.`user_id`=%d',$avatar_array[0]['user_id']);
    mysqli_query($db,$sql) or die(mysqli_error($db));
}elseif ($avatar_array[0]['point'] == 90 || $avatar_array[0]['point']==95) {
    $sql = sprintf('UPDATE `users` SET `users`.`level` = `users`.`level`+1 WHERE `users`.`user_id`=%d',$avatar_array[0]['user_id']);
    mysqli_query($db,$sql) or die(mysqli_error($db));
}elseif ($avatar_array[0]['point'] == 100 || $avatar_array[0]['point']==105) {
    $sql = sprintf('UPDATE `users` SET `users`.`level` = `users`.`level`+1 WHERE `users`.`user_id`=%d',$avatar_array[0]['user_id']);
    mysqli_query($db,$sql) or die(mysqli_error($db));
}

//アバター成長
if($avatar_array[0]['point']==50 || $avatar_array[0]['point']==55){
    $sql = sprintf('UPDATE `users` SET `users`.`avatar_id` = `users`.`avatar_id`+1 WHERE `users`.`user_id`=%d',$avatar_array[0]['user_id']);
    mysqli_query($db,$sql) or die(mysqli_error($db));
}elseif($avatar_array[0]['point']==100||$avatar_array[0]['point']==105){
    $sql = sprintf('UPDATE `users` SET `users`.`avatar_id` = `users`.`avatar_id`+1 WHERE `users`.`user_id`=%d',$avatar_array[0]['user_id']);
    mysqli_query($db,$sql) or die(mysqli_error($db));
}

$url = 'book_detail.php?book_id='.$_REQUEST['book_id'];
header("Location:$url");
exit();

}

?>




