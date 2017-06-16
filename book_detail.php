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
// var_dump($users_array);
        # code...
   
}

// var_dump($users_array);













// // キーワード結果




// if (isset($_REQUEST['book_id']) && !empty($_REQUEST['book_id'])){


//     foreach ($users_array as $key) {
// $sql =sprintf('SELECT DISTINCT`keywords`.`keyword`FROM `avatar` INNER JOIN `users` on `avatar`.`avatar_id` = `users`.`avatar_id` INNER JOIN `records` ON `users`.`user_id`= `records`.`user_id`INNER JOIN `books`ON `records`.`book_id` = `books`.`book_id` INNER JOIN `book_keywords` ON `books`.`book_id`= `book_keywords`.`book_id` INNER JOIN `keywords` ON `book_keywords`.`keyword_id`= `keywords`.`keyword_id` WHERE `book_keywords`.`book_id` = %d AND`book_keywords`.`user_id`=%d'

// ,mysqli_real_escape_string($db,$_REQUEST['book_id']),
// mysqli_real_escape_string($db,$key['user_id']));
// echo '<pre>';
// var_dump($sql);
// echo '</pre>';
// }
   
//  echo '<pre>';
//  var_dump($sql);
//   echo '</pre>';
// $keywords = mysqli_query($db,$sql) or die(mysqli_error($db));
    
    // $hanakuso = $keywords['mysqli_result']->current_field;
    // echo $hanakuso;
// echo '<pre>';
// var_dump($keywords);
// echo '</pre>';
//  $keywords_array = array();
//  while ($keyword = mysqli_fetch_assoc($keywords)) {
// $keywords_array[] = $keyword;
//      echo '<pre>';
//       var_dump($keyword);
//   echo '</pre>';
// }
// }

//      $dsn = 'mysql:dbname=Bookrus;host=localhost';
//      $user = 'root';
//      $password = 'mysql1';


   
// $book_id = $_REQUEST['book_id'];

// $sql =  'SELECT * FROM `book_keywords` WHERE `book_id` = ?';
// $date = array($book_id);
// $stmt = $db->prepare($sql);
// $stmt->execute($date);
// $keywords = array(); 

// while ($book = $stmt->fetech(PDO::FETCH_ASSOC)) {
    
//     $sql =  'SELECT * FROM `keywords` WHERE `keyword_id` = ?';
//     $date = array($book['book_keyword_id']);
//     $stmt = $dbh->prepare($sql);
//     $stmt->execute($date);
//     $keyword = $stmt->fetech(PDO::FETCH_ASSOC);


//     $sql =  'SELECT * FROM `users` WHERE `user_id` = ?';
//     $date = array($book['user_id']);
//     $stmt = $dbh->prepare($sql);
//     $stmt->execute($date);
//     $user = $stmt->fetech(PDO::FETCH_ASSOC);




//     $keywords[] = array('keyword_id' => $keyword['keyword_id'],
//                         'keyword' => $keyword['keyword'], 
//                         'user_id' => $user['user_id'], 
//                         'name' => $user['name']);
//     }

// var_dump($keywords);

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
                        <h3>★★★☆☆</h3>

                    <p><strong><?php echo $books['picture_url'];?></strong></p>
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
                                        <img class="circle img-thumbnail img-box" src="images/rimiko.png" alt="sintret" width="50">
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
                   

              <!--   <div class="col-xs-12 col-sm-8 col-md-8"> -->
                        <!-- <! <! <div class="list-group">
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
                            </div>
                        </div>

       <!         </div>  -->

<!--                     <div class="col-xs-12 col-sm-8 col-md-8"> -->
                        
             </body>
        </html>

