<?php
session_start();
require('dbconnect.php');

//ログインしている人の情報を取得（名前の表示）
if(empty($_SESSION['login_member_id'])){
  header('Location:error.php');
  exit();
}
//SQL実行し、ユーザーのデータを取得
// user_idには. $SESSION['login_member_id']を入れること
if(!empty($_REQUEST['user_id'])){
  $sql ='SELECT u.*,a.* FROM `users`u INNER JOIN `avatar`a ON u.`avatar_id`= a.`avatar_id` WHERE `user_id` ='.$_REQUEST['user_id'];


  $record = mysqli_query($db,$sql) or die(mysqli_error($db));
  $member = mysqli_fetch_assoc($record);

}elseif(!empty($_SESSION['login_member_id'])&& empty($_REQUEST['user_id'])){
 $sql ='SELECT u.*,a.* FROM `users`u INNER JOIN `avatar`a ON u.`avatar_id`= a.`avatar_id` WHERE `user_id` ='.$_SESSION['login_member_id'];
  $record = mysqli_query($db,$sql) or die(mysqli_error($db));
  $member = mysqli_fetch_assoc($record);
}
  // var_dump($member);

  // $record = mysqli_query($db,$sql) or die(mysqli_error($db));


  if(isset($_REQUEST['user_id']) && !empty($_REQUEST['user_id'])){
      $sql ='SELECT b.`picture_url`,b.`book_id`,u.*,r.* FROM (`users`u INNER JOIN `records`r ON u.`user_id` = r.`user_id`) INNER JOIN `books`b ON b.`book_id` = r.`book_id` WHERE u.`user_id`='.$_REQUEST['user_id'];
  }elseif(empty($_REQUEST['user_id']) && isset($_SESSION['login_member_id'])){
      $sql ='SELECT b.`picture_url`,b.`book_id`,u.*,r.* FROM (`users`u INNER JOIN `records`r ON u.`user_id` = r.`user_id`) INNER JOIN `books`b ON b.`book_id` = r.`book_id` WHERE u.`user_id`='.$_SESSION['login_member_id'];
  }

  $books = mysqli_query($db,$sql) or die(mysqli_error($db));
  $books_array = array();
  while ($book = mysqli_fetch_assoc($books)) {
  $books_array[]=$book;
  }
  var_dump($book);
  var_dump($books_array);


  // var_dump($books_array);

//パワーアップ
if (isset($_SESSION['true']) && isset($_SESSION['true2'])) {
    # code...

if ($member[0]['point'] >= 10 && 20 > $member[0]['point'] ){

    $sql = 'UPDATE`users`SET `users`.`level` = `users`.`level`+1 WHERE `user_id` ='.$_SESSION['login_member_id'];
    mysqli_query($db,$sql) or die(mysqli_error($db));

}elseif($member[0]['point'] >= 20 && 30 > $member[0]['point']) {
    $sql = 'UPDATE`users`SET `users`.`level` = `users`.`level`+1 WHERE `user_id` ='.$_SESSION['login_member_id'];
    mysqli_query($db,$sql) or die(mysqli_error($db));

}elseif ($member[0]['point'] >= 30 && 40 > $member[0]['point']) {
    $sql = 'UPDATE`users`SET `users`.`level` = `users`.`level`+1 WHERE `user_id` ='.$_SESSION['login_member_id'];
mysqli_query($db,$sql) or die(mysqli_error($db));

}elseif($member[0]['point'] >= 40 && 50 > $member[0]['point'] ) {
    $sql = 'UPDATE`users`SET `users`.`level` = `users`.`level`+1 WHERE `user_id` ='.$_SESSION['login_member_id'];
    mysqli_query($db,$sql) or die(mysqli_error($db));

}elseif ($member[0]['point'] >= 50 && 60 > $member[0]['point']) {
    $sql = 'UPDATE`users`SET `users`.`level` = `users`.`level`+1 WHERE `user_id` ='.$_SESSION['login_member_id'];
    mysqli_query($db,$sql) or die(mysqli_error($db));
}

if ($member[0]['level'] == 5 ) {
$sql = 'UPDATE`users` SET `users`.`avatar_id` = `users`.`avatar_id`+1 WHERE `user_id`='.$_SESSION['login_member_id'];
mysqli_query($db,$sql) or die(mysqli_error($db));

}elseif ($member[0]['level'] == 10 ) {
    $sql = 'UPDATE`users` SET `users`.`avatar_id` = `users`.`avatar_id`+1 WHERE `user_id`='.$_SESSION['login_member_id'];
    mysqli_query($db,$sql) or die(mysqli_error($db));
}





    }

unset($_SESSION['true']);
unset($_SESSION['true2']);




?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company-HTML Bootstrap theme</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/mypage.css" rel="stylesheet" />
    <link href="css/memoreads.css" rel="stylesheet" />
    <link href="css/header.css" rel="stylesheet" />
<!--    <link href="css/header.css" rel="stylesheet" /> -->
    <!-- =======================================================
        Theme Name: Company
        Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->

  </head>
  <body>
  <?php include('header.php'); ?>
  <div id="background">
    <div class="aboutus">
        <div class="container">
            <h3><i class="glyphicon glyphicon-user"></i> My Page</h3>
            <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="container">
    <div class="col-sm-12">
        <div class="col-sm-3 margin-img">
            <img id="img-profile" class="img-thumbnail img-center img-rounded" src="images/<?php echo $member['avatar_path'];?>">
            <div class="container">
    <div class="row ptlv">
        <div class="text-center date-body" style="width:100px">
          <label for="" class="date-title">Point</label>
          <div class="date-content">
            <p class="dia"><strong><?php echo $member['point']; ?></strong> pt</p>
          </div>
        </div>
            <div class="text-center date-body" style="width:100px">
          <label for="" class="date-title">Level</label>
          <div class="date-content">
            <p class="dia"><strong><?php echo $member['level']; ?></strong> Lv.</p>
          </div>
        </div>
    </div>
</div>
        </div>
        <div class="col-sm-7 well margin-well">
            <p>
            Name : <strong><?php echo $member['name'];?></strong>
            <br>
            Age : <strong><?php echo $member['age'];?></strong>
            <br>
            Occupation :<strong><?php echo $member['job'];?></strong>
            <br>
            <i class="fa fa-bookmark-o" aria-hidden="true"></i> Best Book :<a href="#" class="bestbook"><strong class="bestbook-title">すえずえ</strong></a>
            <br>
            Favorite person : <strong><?php echo $member['great_man'];?></strong>
            <br>
            Hobby :<strong><?php echo $member['hobby'];?></strong>
            <br>
            Free comment : <strong class="free"><?php echo $member['comment'];?></strong>
            </p>
            <div class="pull-right">
            <a href="mypage_edit.php" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>  編集ページ</a>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
                <div class="container">
            <h3><i class="fa fa-book" aria-hidden="true"></i><strong> Book Shelf  </strong>     <a href="record.php" class="btn btn-success"><span class="glyphicon glyphicon-book"></span> 記録ページ</a></h3>
            <div class="text-center">
    </div>
    
    <!-- <div class="our-team"> -->

            
                <div class="bookshelf">
                  <img src="images/shelf.jpg" class="shelf">
                  <div class="absolute">
                    <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <?php foreach($books_array as $books_each){ ?>
                  <a href="#" class="detail"><img src="images/<?php echo $books_each['picture_url']?>" width="112" height="175" ></a>
                  <?php } ?>

                  </div>
                  </div>
                </div>
            <ul class="paging">

                <li><a href="#" class="btn btn-default left">前</a></li>

                <li><a href="#" class="btn btn-default right">次</a></li>
          </ul>
<!--                <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <img src="images/services/2.jpg" alt="" >
                    <h4>John Doe</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
                </div>
                <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <img src="images/services/3.jpg" alt="" >
                    <h4>John Doe</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
                </div> -->
            </div>
            </div>
        </div>
    <!-- </div> -->
    <section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Developers</h2>
                <div class="footer">
            <div class="container">
                <!-- <div class="container"> -->
            <div class="developers">
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/rimiko.png">
                        <div><img class="image-circle" src="images/rimiko.png"> </div>    
                        <h2>Rimiko Fukumitsu</h2>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown data-wow-duration="1000ms" data-wow-delay="600ms" >
                        <div><img class="image-circle" src="images/naru.png"></div>    
                        <h2>Naru<br> Nishimura</h2>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" >
                        <div><img class="image-circle" src="images/atsushi.png"></div>    
                        <h2>Atsushi Miyamoto</h2>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                        <div><img class="image-circle" src="images/IMG_1696.png"></div>    
                        <h2>Ayumi <br>Maeda</h2>
                        
                    </div>
                </div>
            </div>
        </div>

    
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.1.min.js"></script>  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
    <script src="js/wow.min.js"></script>
    <script src="js/functions.js"></script>
    
</body>
</html>