

<?php 
    session_start();
    require('dbconnect.php');
   // var_dump($_SESSION['login_member_id']);
   // var_dump($_SESSION['join']['name']); 
        // ログイン情報取得
   $sql = 'SELECT `avatar`.`avatar_path`,`users`.`name` FROM `users` INNER JOIN `avatar` ON `users`.`avatar_id` = `avatar`.`avatar_id` WHERE `users`.`user_id`='.$_SESSION['login_member_id'];
    $login = mysqli_query($db,$sql) or die(mysqli_error($db));
    $member = mysqli_fetch_assoc($login);
 
  // require('dbconnect.php');
// 星５つの本のid,タイトル、著者を取得する。
    
         $sql = 'SELECT `records`.`book_id`, `records`.`review`, `books`. `title`,`books`.`author`,`books`.`picture_url`,COUNT(*) as cnt FROM `records` INNER JOIN `books` ON `records`.`book_id`= `books`.`book_id`WHERE `stars`= 5 GROUP BY`book_id` ORDER BY `cnt` DESC';
       
        $b_rank = mysqli_query($db,$sql) or die(mysqli_error($db));
        $a = array();
        while ($book_ranking = mysqli_fetch_assoc($b_rank)) {
            $a[] = $book_ranking;
        }
        // var_dump($a);
        
 // ユーザーランキング情報取得
        $sql = 'SELECT `users`.`name`,`users`.`avatar_id`,`avatar`.`avatar_path`,`users`.`point`,`users`.`user_id`,`users`.`job`,`users`.`age`,`users`.`bestbook_id` FROM `users`INNER JOIN `avatar`ON `users`.`avatar_id`=`avatar`.`avatar_id`ORDER BY `point`DESC';
        $u_rank =  mysqli_query($db,$sql) or die(mysqli_error($db));
        $u = array();
        while($user_ranking = mysqli_fetch_assoc($u_rank)){
            $u[] = $user_ranking;
        }

 //best本タイトル取得
        $sql = 'SELECT `users`.`point`,`users`.`bestbook_id`, `books`.`title` FROM `users` INNER JOIN `books`ON `users`.`bestbook_id`= `books`.`book_id`ORDER BY `point`DESC';
        $best =  mysqli_query($db,$sql) or die(mysqli_error($db));
        $b = array();
        while($best_book = mysqli_fetch_assoc($u_rank)){
            $b[] = $best_book;
        }
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
    <link href="css/ayumi_edit.css" rel="stylesheet" /> 
    <link href="css/sidebar.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet" >
    <link href="colorbox-master/example1/colorbox.css" rel="stylesheet" />

    <!-- =======================================================
        Theme Name: Company
        Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <body class="up-back">
<?php include('header.php'); ?>
<!--     <div class="back-rgba"> 
    <header style="position: absolute;">
        <div class="header-rgba">
        </div>
    </header> -->

    <!-- サイドバー -->

    <!-- サイドバー -->
  <!-- <div class="container"> -->
    
        <!-- <div class="row profile col-lg-3"> -->
            
               <!--  <div class="profile-sidebar" style="background-color: white;">
                           
                        <div class="profile-userpic">
                            <img src="images/<?php echo $member['avatar_path'] ?>" class="img-responsive" alt="">
                        </div>
                       
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                <?php echo $member['name']; ?>
                            </div>
                             <div class="container">
                                <div class="row ptlv" style="margin-left: 15px;">
                                    <div class="text-center date-body" style="width:100px">
                                      <label for="" class="date-title">Point</label>
                                      <div class="date-content">
                                        <p class="dia"><strong>10</strong> pt</p>
                                      </div>
                                    </div>
                                    <div class="text-center date-body" style="width:100px">
                                      <label for="" class="date-title">Level</label>
                                      <div class="date-content">
                                        <p class="dia"><strong>5</strong> Lv.</p>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                    <div class="profile-userbuttons">
                        <a href="mypage_edit.php"><button type="button" class="btn btn-success btn-sm">編集ページ</button></a>
                        <a href="record.php"><button type="button" class="btn btn-danger btn-sm">記録ページ</button></a>
                    </div>
                           
                 </div> -->
            <!-- </div> -->

        
    


    <!-- ランキング -->
<div class="container">
  <div class ="row">
   <div class = "col-lg-3">
     <?php include('sideber.php'); ?> 
   </div>
    <div class="rankings col-lg-9" style="margin-top: 100px;">
        <div class="text-center" >
                <!-- <img src="images/cooltext245006182452535.png" > -->
                <h1>WEEKLY RANKING</h1>
            </div>

            <div class="text-center">
                <div class="col-lg-6">
                        
                    
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
                      <div><img src="images/読書アイコン (2) のコピー 2white.png"></div> 
                      <div><img src="images/トロフィーのアイコン素材 その4 のコピー.png" style="margin-right:440px;"></div>
                        

                        <!-- book部門１位 -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank" style="margin-top: -30px;">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    
                                                    <a class="iframe" href="book_detail.php?book_id=<?php echo $a[0]['book_id'];?>" title=""><img src="<?php echo $a[0]['picture_url']; ?>" alt="" class="img-rounded img-responsive"/></a>
                                                </div>
                                                <div class="col-sm-6 col-md-8" style="float: left;">
                                                    <h4>
                                                        <?php echo $a[0]['title']; ?></h4>
                                                    <p><?php echo $a[0]['author']; ?></p>
                                                    <P>お気に入り登録数：<?php echo $a[0]['cnt']; ?></P>

                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>



                <!-- ユーザー部門１位 -->

                <div class="col-lg-6 user-rank">
                    
                    
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
                     <div><img src="images/勉強アイコン2 のコピーwhite.png"></div>
                        <div><img src="images/トロフィーのアイコン素材 その4 のコピー.png" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <a href="mypage.php?user_id=<?php echo $u[0]['user_id'];?>"><img src="images/<?php echo $u[0]['avatar_path']; ?>" alt="" class="img-rounded img-responsive" /></a>
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $u[0]['name']; ?></h4>
                                                    <p>年齢：<?php echo $u[0]['age']; ?>代</p>
                                                   <p>職業：<?php echo $u[0]['job']; ?>
                                                   </p>
                                                    <P><?php echo $u[0]['point']; ?></P>
                                                     <p>BEST本：<?php echo $b[0]['title']; ?></p>

                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <!-- book部門２位 -->
                <div class="col-lg-6">
                    
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" >
                    <div><img src="images/2位アイコン のコピーwhite.png" style="margin-right:440px; "></div>
                        <div class="container">


                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                
                                                    <a class="iframe" href="book_detail.php?book_id=<?php echo $a[1]['book_id'];?>" title="ウィキペディア表紙"><img src="<?php echo $a[1]['picture_url']; ?>" alt="" class="img-rounded img-responsive" /></a>
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $a[1]['title']; ?></h4>
                                                    <p><?php echo $a[1]['author']; ?>
                                                    </p>
                                                    <P>お気に入り登録数：<?php echo $a[1]['cnt']; ?></P>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <!-- ユーザー部門２位 -->
                <div class="col-lg-6 user-rank">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                    <div><img src="images/2位アイコン のコピーwhite.png" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <a href="mypage.php?user_id=<?php echo $u[1]['user_id'];?>"><img src="images/<?php echo $u[1]['avatar_path']; ?>" alt="" class="img-rounded img-responsive" /></a>
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $u[1]['name']; ?></h4>
                                                    <p>年齢：<?php echo $u[1]['age']; ?>代</p>
                                                   <p>職業：<?php echo $u[1]['job']; ?>
                                                   </p>
                                                    <P><?php echo $u[1]['point']; ?></P>
                                                    <P>BEST本：<?php echo $b[1]['title']; ?></P>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <!-- book部門３位 -->
                <div class="col-lg-6">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                        <div><img src="images/3位アイコン (1).png" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                     <a class="iframe" href="book_detail.php?book_id=<?php echo $a[2]['book_id'];?>" title="ウィキペディア表紙"><img src="<?php echo $a[2]['picture_url']; ?>" alt="" class="img-rounded img-responsive" /></a>
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $a[2]['title']; ?></h4>
                                                    <p><?php echo $a[2]['author']; ?>
                                                    </p>
                                                    <P>お気に位入り登録数：<?php echo $a[2]['cnt']; ?></P>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>

                <!-- ユーザー部門３位 -->
                <div class="col-lg-6 user-rank">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                      <div><img src="images/3位アイコン (1).png" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <a href="mypage.php?user_id=<?php echo $u[2]['user_id'];?>"><img src="images/<?php echo $u[2]['avatar_path']; ?>" alt="" class="img-rounded img-responsive" /></a>
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $u[2]['name']; ?></h4>
                                                    <p>年齢：<?php echo $u[2]['age']; ?>代</p>
                                                   <p>職業：<?php echo $u[2]['job']; ?>
                                                   </p>
                                                    
                                                    <P><?php echo $u[2]['point']; ?></P>
                                                    <P>BEST本：<?php echo $b[2]['title']; ?></P>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                    <!-- book部門４位 -->
                <div class="col-lg-6">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                    <div><img src="images/4位の無料素材 (1) のコピー.png" style="margin-right:440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <a class="iframe" href="book_detail.php?book_id=<?php echo $a[3]['book_id'];?>" title="ウィキペディア表紙"><img src="<?php echo $a[3]['picture_url']; ?>" alt="" class="img-rounded img-responsive" /></a>
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $a[3]['title']; ?></h4>
                                                    <p>
                                                        <?php echo $a[3]['author']; ?>
                                                    </p>
                                                    <P>お気に入り登録数：<?php echo $a[3]['cnt']; ?></P>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>

                    <!-- ユーザー部門４位 -->
                <div class="col-lg-6 user-rank">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                      <div><img src="images/4位の無料素材 (1) のコピー.png" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <a href="mypage.php?user_id=<?php echo $u[3]['user_id'];?>"><img src="images/<?php echo $u[3]['avatar_path']; ?>" alt="" class="img-rounded img-responsive" /></a>
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $u[3]['name']; ?></h4>
                                                   <p>年齢：<?php echo $u[3]['age']; ?>代</p>
                                                   <p>職業：<?php echo $u[3]['job']; ?>
                                                   </p>
                                                    <P><?php echo $u[3]['point']; ?></P>
                                                    <P>BEST本：<?php echo $b[3]['title']; ?></P>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>

                 <!-- book部門５位 -->
                <div class="col-lg-6">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                        <div><img src="images/5位アイコン (2).png" style="margin-right: 440px; "></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <a class="iframe" href="book_detail.php?book_id=<?php echo $a[4]['book_id'];?>" title="ウィキペディア表紙"><img src="<?php echo $a[4]['picture_url']; ?>" alt="" class="img-rounded img-responsive" /></a>
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $a[4]['title']; ?></h4>
                                                    <p>
                                                        <?php echo $a[4]['author']; ?>
                                                    </p>
                                                    <P>お気に入り登録数：<?php echo $a[4]['cnt']; ?></P>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>

                 <!-- ユーザー部門５位 -->
                <div class="col-lg-6 user-rank">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                     <div><img src="images/5位アイコン (2).png" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <a href="mypage.php?user_id=<?php echo $u[4]['user_id'];?>"><img src="images/<?php echo $u[4]['avatar_path']; ?>" alt="" class="img-rounded img-responsive" /></a>
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $u[4]['name']; ?></h4>
                                                        <p>年齢：<?php echo $u[4]['age']; ?>代</p>
                                                   <p>職業：<?php echo $u[4]['job']; ?>
                                                   </p>
                                                    
                                                    <P><?php echo $u[4]['point']; ?></P>
                                                     <P>BEST本：<?php echo $b[4]['title']; ?></P>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>        
         


       <section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Developers</h2>
                <div class="footer">
            <div class="container">
                <!-- <div class="container"> -->
            <div class="developers">
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/rimiko.JPG">
                        <div><img class="image-circle" src="images/rimiko.JPG"> </div>  
                        <h2>Rimiko Fukumitsu</h2>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
                        <div><img class="image-circle" src="images/naru.JPG"></div> 
                        <h2>Naru<br> Nishimura</h2>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" >
                        <div><img class="image-circle" src="images/atsushi.JPG"></div>  
                        <h2>Atsushi Miyamoto</h2>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                        <div><img class="image-circle" src="images/IMG_1696.jpg"></div> 
                        <h2>Ayumi <br>Maeda</h2>
                        
                    </div>
                </div>
            </div>
        </div>
            </div>    

            
                   </div>
            </div>        
        </div><!--/.container-->
    </section><!--/#partner-->
    
        <!--/.container-->
    <!--/#partner-->

       
    
    


    
    
                
    


    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.1.min.js"></script>  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
    <script src="js/wow.min.js"></script>
    <script src="js/functions.js"></script>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="colorbox-master/jquery.colorbox-min.js"></script>
<script src="colorbox-master/i18n/jquery.colorbox-ja.js"></script>
    <script>
   $(document).ready(function(){
      $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
   });
</script>
    </div>
</body>
</html>