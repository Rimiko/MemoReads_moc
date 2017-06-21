<?php  
session_start();

require('dbconnect.php');
// require('like.php');
// require('unlike.php');
// 本詳細








if (isset($_REQUEST['book_id']) && !empty($_REQUEST['book_id'])){
    $sql = 'SELECT`book_id`,`title`,`category`,`author`,`picture_url`,`detail` FROM `books` WHERE `book_id` ='.$_REQUEST['book_id'];

 $books = mysqli_query($db,$sql) or die(mysqli_error($db));

 $books_array = array();
 $book = mysqli_fetch_assoc($books);
     $books_array[] = $book; 


}

// ユーザー表示
if (isset($_REQUEST['book_id']) && !empty($_REQUEST['book_id'])){

$sql = 'SELECT a.`avatar_path`,u.*,r.* FROM (`users`u INNER JOIN `avatar`a ON u.`avatar_id` = a.`avatar_id`) INNER JOIN `records`r ON u.`user_id` = r.`user_id` WHERE r.`book_id`='.$_REQUEST['book_id'];

 $users = mysqli_query($db,$sql) or die(mysqli_error($db));


 $users_array = array();

 while ($user = mysqli_fetch_assoc($users)){





// いいね

$sql = 'SELECT COUNT(*) as `like_flag` FROM `likes` WHERE `record_id` ='.$user['record_id'].' AND `user_id` = '.$_SESSION['login_member_id'];
  $likes = mysqli_query($db,$sql) or die(mysqli_error($db));
  $like = mysqli_fetch_assoc($likes);

  //いいね数獲得本当はレビューを表示させる際に抜き出したrecord_id(ex.$record_each['record_id']など)をいれる
  $sql = 'SELECT COUNT(*) as `like_count` FROM `likes` WHERE `record_id` ='.$user['record_id'];

  $likes_cnt = mysqli_query($db,$sql) or die(mysqli_error($db));
  $like_cnt = mysqli_fetch_assoc($likes_cnt);

 



    

  // kキーワード表示


    $sql = 'SELECT`keywords`.`keyword` FROM `keywords` INNER JOIN `record_keyword` on `keywords`.`keyword_id` = `record_keyword`.`keyword_id` INNER JOIN `records` on `records`.`record_id` = `record_keyword`.`record_id` WHERE `records`.`record_id`='.$user['record_id'];



$keywords = mysqli_query($db,$sql) or die(mysqli_error($db));

$keywords_array = array();
while ($keyword = mysqli_fetch_assoc($keywords)){
    $keywords_array[]=$keyword['keyword'];
}


 $user['keyword'] = $keywords_array;
  $user['like_flag'] = $like['like_flag'];
  $user['like_count']=$like_cnt['like_count'];

 $users_array[] = $user; 







}
//星の処理
$star=0;
$c=count($users_array);
for($i=0;$i<$c;$i++){
$star=$star+$users_array[$i]['stars'];
}
if($star==0){
  $star_ave=0;
}else{
$star_ave=ceil($star/$c);
}

}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>detail</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/book-detail.css" rel="stylesheet">
    <link href="css/memoreads.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery.raty.css">
</head>
<body id="background">
<div class="back">
<div class="container">

<?php foreach ($books_array as $books) { ?>
    

                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <a href="#">
                            <img src="<?php echo $books['picture_url'];?>" width="230">
                        </a>
                        <div class="book-detail">
                        <h4><strong><?php echo $books['title'];?>/<?php echo $books['author'];?></strong></h4>
                        <h6><strong>ジャンル:<a><?php echo $books['category'];?></a></strong></h6>
                        <div id="star"></div>

                    
                            </div>
                    </div>


                    <?php } ?>



                    
                <div class="review">
                <?php foreach ($users_array as $user_each) {  ?>
                <?php $c=count($user_each['keyword']); ?>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="list-group">
                            <div class="list-group-item">
                                <div class="row-picture">
                                    <a href="#" title="sintret">
                                        <img class="circle img-thumbnail img-box" src="images/<?php echo $user_each['avatar_path'];?>" alt="sintret" width="50">
                                    </a>
                                       <a href="#" title="sintret">
                                            <small><strong><?php echo $user_each['name'];?></strong></small>
                                        </a>
                                 <small class="time">    　　<i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $user_each['created'];?></small>
                                 <small class="pro">　　<i class="fa fa-user" aria-hidden="true"></i> <a href="#"><?php echo $user_each['age'];?></a>/<a href="#"><?php echo $user_each['hobby'];?></a>/<a href="#"><?php echo $user_each['job'];?></a></small>


                                 <br>
                                 <div class="keyword">

                                 <small>キーワード：</small>
                 <?php for ($i=0; $i <$c ; $i++) { ?>
                                 <small><a href="#">#<?php echo $user_each['keyword'][$i];?></a>

                                 </small>
                                  <?php } ?>
                                 </div>


                                </div>
                                <div class="row-content">
                            <small>レビュー：</small>
                        <small><?php echo $user_each['review'];?></small>
                                </div>




                <?php if($user_each['like_flag'] ==1 ){?>
              <!-- 既にいいねされているときなので[いいねを取り消す] -->
              <a href="unlike.php?record_id=<?php echo $user_each['record_id'];?>&book_id=<?php echo $_REQUEST['book_id'];?>"><small>LIKEを取り消す</small></a>

              <?php }else{ ?>
              <!-- まだいいねがおされていないので[いいね] -->
             <a href="like.php?record_id=<?php echo $user_each['record_id']?>&book_id=<?php echo $_REQUEST['book_id']; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-thumbs-up"></span> LIKE</a>
            <?php } ?>
             いいね数:<?php echo $user_each['like_count']; ?>
                            </div>

                        </div>
                        </div>
                        <?php } ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.raty.js"></script>
<script>
$.fn.raty.defaults.path = "images";
$(function raty() {
     $("#star").raty({
          number: 5,
          score :<?php echo $star_ave; ?>
     });
});
</script>

             </body>
        </html>

