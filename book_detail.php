<?php  

require('dbconnect.php');
// 本詳細
$_REQUEST['book_id'];


if (isset($_REQUEST['book_id']) && !empty($_REQUEST['book_id'])){
    $sql = 'SELECT`book_id`,`title`,`category`,`author`,`picture_url`,`detail` FROM `books` WHERE `book_id` ='.$_REQUEST['book_id'];

 $books = mysqli_query($db,$sql) or die(mysqli_error($db));
 $book = mysqli_fetch_assoc($books);
 $books_array = array();
 // while ($book = mysqli_fetch_assoc($books)) {}
     $books_array[] = $book; 
 

 
}

// ユーザー表示
if (isset($_REQUEST['book_id']) && !empty($_REQUEST['book_id'])){

$sql = 'SELECT DISTINCT`avatar`.`avatar_path`,`users`.`name`,`users`.`age`,`users`.`gender`,`users`.`hobby`,`users`.`job`,`records`.`review`,`records`.`created`,`books`.`book_id`FROM `avatar` INNER JOIN `users` on `avatar`.`avatar_id` = `users`.`avatar_id` INNER JOIN `records` ON `users`.`user_id`= `records`.`user_id`INNER JOIN `books`ON `records`.`book_id` = `books`.`book_id` INNER JOIN `book_keywords` ON `books`.`book_id`= `book_keywords`.`book_id` INNER JOIN `keywords` ON `book_keywords`.`keyword_id`= `keywords`.`keyword_id` WHERE `books`.`book_id` ='.$_REQUEST['book_id'];

 $users = mysqli_query($db,$sql) or die(mysqli_error($db));
var_dump($users);

 $users_array = array();
 while ($user = mysqli_fetch_assoc($users)) {
$users_array[] = $user;
     #
 
 }
}




// SELECT `users`.`user_id`,`books`.`book_id`,`keywords`.`keyword`,`users`.`name`FROM `users` INNER JOIN `records` on `users`.`user_id` = `records`.`user_id` INNER JOIN `books` ON `records`.`book_id`= `books`.`book_id`INNER JOIN `book_keywords`ON `books`.`book_id` = `book_keywords`.`book_id` INNER JOIN `keywords` ON `book_keywords`.`keyword_id`= `keywords`.`keyword_id` WHERE `records`.`book_id`=2 AND `users`.`user_id` = `records`.`user_id`









// キーワード結果
if (isset($_REQUEST['book_id']) && !empty($_REQUEST['book_id'])){
$sql ='SELECT `users`.`user_id`,`books`.`book_id`,`keywords`.`keyword`FROM `users` INNER JOIN `records` on `users`.`user_id` = `records`.`user_id` INNER JOIN `books` ON `records`.`book_id`= `books`.`book_id`INNER JOIN `book_keywords`ON `books`.`book_id` = `book_keywords`.`book_id` INNER JOIN `keywords` ON `book_keywords`.`keyword_id`= `keywords`.`keyword_id` WHERE `books`.`book_id`='.$_REQUEST['book_id'];

$keywords = mysqli_query($db,$sql) or die(mysqli_error($db));


 $keywords_array = array();
 while ($keyword = mysqli_fetch_assoc($keywords)) {
$keywords_array[] = $keyword;
     
 
}}





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
                <?php foreach ($users_array as $users) { ?>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="list-group">
                            <div class="list-group-item">
                                <div class="row-picture">
                                    <a href="#" title="sintret">
                                        <img class="circle img-thumbnail img-box" src="images/rimiko.png" alt="sintret" width="50">
                                    </a>
                                       <a href="#" title="sintret">
                                            <small><strong><?php echo $users['name'];?></strong></small>
                                        </a>
                                 <small class="time">    　　<i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $users['created'];?></small>
                                 <small class="pro">　　<i class="fa fa-user" aria-hidden="true"></i> <a href="#"><?php echo $users['age'];?></a>/<a href="#"><?php echo $users['hobby'];?></a>/<a href="#"><?php echo $users['job'];?></a></small>

                                 <?php foreach ($keywords_array as $keyword) {?>
                                 <br>
                                 <div class="keyword">
                                 
                                 <small>キーワード：</small>
                                 <small><a href="#"><?php echo $keyword['keyword'];?></a>
                                 
                                 </small>
                                 </div>

                                 <?php } ?>
                                </div>
                                <div class="row-content">
                            <small>レビュー：</small>
                        <small><?php echo $users['review'];?></small>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
               <!--      </div> -->

<!--                     <div class="col-xs-12 col-sm-8 col-md-8"> -->
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

