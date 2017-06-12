<?php
//1回目の処理
  $sql ='SELECT * FROM `books` WHERE `api_id` ='.$_SESSION['book']['bookids'];


  $records = mysqli_query($db,$sql) or die(mysqli_error($db));
  $record = mysqli_fetch_assoc($records);

  if(isset($record)){
    $b=$record['book_id'];
  }else{

$sql='INSERT INTO `books`・・・・・・・・';
  }

  var_dump($record);

//２回目の処理
  

?>