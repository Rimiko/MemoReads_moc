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
  // var_dump($book);
  //ベストブック
  if(isset($_REQUEST['user_id']) && !empty($_REQUEST['user_id'])){
      $sql ='SELECT b.* FROM `books`b INNER JOIN `users`u ON u.`bestbook_id` = b.`book_id` WHERE u.`user_id`='.$_REQUEST['user_id'];
  }elseif(empty($_REQUEST['user_id']) && isset($_SESSION['login_member_id'])){
     $sql ='SELECT b.* FROM `books`b INNER JOIN `users`u ON u.`bestbook_id` = b.`book_id` WHERE u.`user_id`='.$_SESSION['login_member_id'];
  }
  $bestbooks = mysqli_query($db,$sql) or die(mysqli_error($db));
  $bestbook = mysqli_fetch_assoc($bestbooks);
  // var_dump($bestbook);

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
    <link href="colorbox-master/example1/colorbox.css" rel="stylesheet" />
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

            <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="container">

<!--                 <h2 class="col-lg-6" style="color:white;"><strong><?php echo $member['name'];?></strong><small style="color:white;">さんのマイページ</small></h2> -->




    <div class="col-lg-12">
        <div class="col-lg-3 profile-sidebar">
        <strong style="color: black;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $member['name'];?></strong><small style="color:black;">さんのマイページ</small>
            <img id="img-profile" class="img-thumbnail img-center img-rounded" src="images/<?php echo $member['avatar_path'];?>" width="200" height="300">
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
            <div class="col-sm-12 well margin-well">
            <p>
            年齢 : <?php echo $member['age'];?>代
            <br>
            職業 :<?php echo $member['job'];?>
            <br>
            尊敬する偉人 : <?php echo $member['great_man'];?>
            <br>
            趣味 :<?php echo $member['hobby'];?>
            <br>
            ひとこと : <?php echo $member['comment'];?>
            </p>
            <div class="pull-center">
            <a href="mypage_edit.php" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>  編集ページ</a>
            </div>
        </div>
        </div>
            <div class="col-lg-9">
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-book" aria-hidden="true"></i>Book Shelf&nbsp;&nbsp;&nbsp;&nbsp;<a href="record.php" class="btn btn-success"><span class="glyphicon glyphicon-book"></span> 記録ページ</a></h3>
                <div class="bookshelf">
                  <img src="images/shelf.jpg" class="shelf">
                  <div class="absolute">
                    <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">

                    <a href="book_detail.php?book_id=<?php echo $bestbook['book_id']; ?>" class="detail iframe"><img src="<?php echo $bestbook['picture_url']?>" class="best img-rounded img-responsive"  width="112" height="175" title="BEST BOOK"></a>
                  <?php foreach($books_array as $books_each){ 
                      $start_date = strtotime($books_each['start_date']);
                      $end_date = strtotime($books_each['end_date']);
                      $start_date = date('Y-m-d',$start_date);
                      $end_date = date('Y-m-d',$end_date);
                      if(isset($books_each['stars'])&&$books_each['stars']=='5'){ ?>
                      <a href="book_detail.php?book_id=<?php echo $books_each['book_id']; ?>" class="detail iframe"><img src="<?php echo $books_each['picture_url']?>" class="favorite img-rounded img-responsive" title="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FAVORITE BOOK<br><?php echo $start_date;?>~<?php echo $end_date; ?><br><a href='delete.php' style='color:black;'>削除</a>" width="112" height="175" ></a>
                      <?php }else{ ?>
                  <a href="book_detail.php?book_id=<?php echo $books_each['book_id']; ?>" class="detail iframe"><img src="<?php echo $books_each['picture_url']?>" class="book img-rounded img-responsive" title="<?php echo $start_date;?>~<?php echo $end_date; ?><br><a href='delete.php' style='color:black;'>削除</a>" width="105" height="164" ></a>
<?php } ?>
<?php } ?>

<!-- <a class="iframe" href="book_detail.php?book_id=<?php echo $top_each['book_id'];?>" title="ウィキペディア表紙"><img src="<?php echo $top_each['picture_url'];?>" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a> -->

                  </div>
                  </div>
                </div>

            <ul class="paging">
            <div class="page col-md-6">
                <li><a href="#" class="btn btn-default left">前</a></li></div>
            <div class="page col-md-6">
                <li><a href="#" class="btn btn-default right">次</a></li></div>
          </ul>
          </div>
                      </div>




    </div>
</div>

            </div>

        <br>
        <br>

                              </div>
                      </div>
  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://winofsql.jp/js/jquery.balloon.min.051.js"></script>
<script>
$(function(){

    $('.book').balloon({
        // 吹き出しを右に出すと画面の邪魔にならない場合が多いです
        position: "top",
        // 吹き出しの CSS 設定です
        css: {
            "color": "black",
            "font-size": "12px",
            "font-weight": "bold",
            "padding": "10px",
            "background-color": "white",
        }
    });
        $('.best').balloon({
        // 吹き出しを右に出すと画面の邪魔にならない場合が多いです
        position: "top",
        // 吹き出しの CSS 設定です
        css: {
            "color": "white",
            "font-size": "12px",
            "font-weight": "bold",
            "padding": "10px",
            "background-color": "red",
        }
    });
         $('.favorite').balloon({
        // 吹き出しを右に出すと画面の邪魔にならない場合が多いです
        position: "top",
        // 吹き出しの CSS 設定です
        css: {
            "color": "white",
            "font-size": "12px",
            "font-weight": "bold",
            "padding": "10px",
            "background-color": "orange",
        }
    });
});
</script>

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
    <!-- <script src="js/jquery-2.1.1.min.js"></script>  --> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
    <script src="js/wow.min.js"></script>
<!--     <script src="js/functions.js"></script> -->
<script src="colorbox-master/jquery.colorbox-min.js"></script>
<script src="colorbox-master/i18n/jquery.colorbox-ja.js"></script>
<script>
   $(document).ready(function(){
      $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});

      // window.location.hash = "#tab1"
      // window.location.hash = "#tab2"
      // window.location.hash = "#tab3"
   });


</script>

    
</body>
</html>