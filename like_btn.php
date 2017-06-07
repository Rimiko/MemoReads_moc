<?php
session_start();
require('dbconnect.php');

// 本当はwhileの中で回す

  $sql = 'SELECT COUNT(*) as `like_flag` FROM `likes` WHERE `record_id` = 2 AND `user_id` = 1';
  $likes = mysqli_query($db,$sql) or die(mysqli_error($db));
  $like = mysqli_fetch_assoc($likes);

  //いいね数獲得
  $sql = 'SELECT COUNT(*) as `like_count` FROM `likes` WHERE `user_id` =1';

  $likes_cnt = mysqli_query($db,$sql) or die(mysqli_error($db));
  $like_cnt = mysqli_fetch_assoc($likes_cnt);

  $record['like_flag'] = $like['like_flag'];
  $record['like_count']=$like_cnt['like_count'];



?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>like_sample</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/book-detail.css" rel="stylesheet">
    <link href="css/memoreads.css" rel="stylesheet">
</head>
<body>
     <div class="list-group">
          <div class="list-group-item">
                 <div class="row-picture">
                         <a href="#" title="sintret">
                                 <img class="circle img-thumbnail img-box" src="images/IMG_1696.png" alt="sintret" width="50">
                         </a>
                         <a href="#" title="sintret">
                                 <small><strong>Ayumi Maeda</strong></small>
                         </a>
                                 <small class="time">    　　<i class="fa fa-clock-o" aria-hidden="true"></i> 2017/05/29 12:04:00</small>
                                 <small class="pro">　　<i class="fa fa-user" aria-hidden="true"></i> <a href="#">20代</a>/<a href="#">カナダ</a>/<a href="#">猫</a></small>
                                 <br>
                                 <div class="keyword">
                                 <br>
                                 <small>キーワード：</small>
                                 <small><a href="#">#びっくり</a>
                                 <a href="#">#見なきゃ損</a>
                                 <a href="#"></a>
                                 </small>
                                 </div>
                                </div>
                                <div class="row-content">
                            <small>レビュー：</small>
                        <small>主人公の○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</small>
                                </div>
                                <!-- <?php echo $record_each['record_id']; ?> -->
             <a href="like_sample.php?record_id=2" class="btn btn-warning"><span class="glyphicon glyphicon-thumbs-up"></span> LIKE</a>
             いいね数:<?php echo $record['like_count']; ?>
                            </div>

                        </div>



</body>
</html>



