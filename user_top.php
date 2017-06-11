<?php 
    session_start();
    require('dbconnect.php');
   // var_dump($_SESSION['login_member_id']);
   // var_dump($_SESSION['join']['name']); 

    
   $sql = 'SELECT `avatar`.`avatar_path`,`users`.`name` FROM `users` INNER JOIN `avatar` ON `users`.`avatar_id` = `avatar`.`avatar_id` WHERE `users`.`user_id`='.$_SESSION['login_member_id'];
    $login = mysqli_query($db,$sql) or die(mysqli_error($db));
    $member = mysqli_fetch_assoc($login);


 
  // require('dbconnect.php');

// 星５つの本のid,タイトル、著者を取得する。
    
        $sql = sprintf('SELECT `records`.`book_id`,`books`.`picture_url`,`books`. `title`,`books`.`author`, COUNT(*) as cnt FROM `records` INNER JOIN `books` ON `records`.`book_id`= `books`.`book_id`WHERE `stars`= 5 GROUP BY`book_id` ORDER BY `cnt` DESC'
        
    );

  $b_rank = mysqli_query($db,$sql) or die(mysqli_error($db));
  $book_ranking1 = mysqli_fetch_assoc($b_rank);
  $book_ranking2 = mysqli_fetch_assoc($b_rank);
  $book_ranking3 = mysqli_fetch_assoc($b_rank);
  $book_ranking4 = mysqli_fetch_assoc($b_rank);
  $book_ranking5 = mysqli_fetch_assoc($b_rank);

 
 // var_dump($book_ranking1);
 // var_dump($book_ranking2);
 // var_dump($book_ranking3);

?>

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
  <div class="container">
    
        <div class="row profile col-lg-3">
            <!-- <div class="col-md-3"> -->
                        <div class="profile-sidebar" style="background-color: white;">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img src="images/<?php echo $member['avatar_path']?>" class="img-responsive" alt="">
                            </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
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
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                            <div class="profile-userbuttons">
                                <a href="mypage_edit.php"><button type="button" class="btn btn-success btn-sm">編集ページ</button></a>
                                <a href="record.php"><button type="button" class="btn btn-danger btn-sm">記録ページ</button></a>
                            </div>
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->

                            <!-- END MENU -->
                        </div>
            </div>
        
    


    <!-- ランキング -->

   
    <div class="rankings col-lg-9" style="margin-top: 100px;">
        <div class="text-center" >
                <img src="images/cooltext245006182452535.png" >
            </div>

            <div class="text-center">
                <div class="col-lg-6">
                        
                    
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
                      <div><img src="images/cooltext245006766393490.png"></div> 
                      <div><img src="images/gold.JPG" style="margin-right:440px;"></div>
                        

                        <!-- book部門１位 -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank" style="margin-top: -30px;">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    
                                                    <img src="<?php $book_ranking1['picture_url']; ?>" alt="" class="img-rounded img-responsive"  />
                                                </div>
                                                <div class="col-sm-6 col-md-8" style="float: left;">
                                                    <h4>
                                                        <?php echo $book_ranking1['title']; ?></h4>
                                                    <p><?php echo $book_ranking1['author']; ?></p>
                                                    <P>お気に入り登録数：<?php echo $book_ranking1['cnt']; ?></P>

                                                    
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
                     <div><img src="images/cooltext245006698732627.png"></div>
                        <div><img src="images/gold.JPG" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="#" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        BOOK TITLE</h4>
                                                    <p>著者
                                                    </p>
                                                    <P>🌟🌟🌟🌟🌟</P>
                                                    
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
                    <div><img src="images/silver.JPG" style="margin-right:440px; "></div>
                        <div class="container">


                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                
                                                    <img src="<?php $book_ranking2['picture_url']; ?>" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $book_ranking2['title']; ?></h4>
                                                    <p><?php echo $book_ranking2['author']; ?>
                                                    </p>
                                                    <P>お気に入り登録数：<?php echo $book_ranking2['cnt']; ?></P>
                                                    
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
                    <div><img src="images/silver.JPG" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="images/ダウンロード.jpeg" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        BOOK TITLE</h4>
                                                    <p>著者
                                                    </p>
                                                    <P>🌟🌟🌟🌟🌟</P>
                                                    
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
                        <div><img src="images/Bronze_medal_icon.svg.png" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="<?php $book_ranking3['picture_url']; ?>" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $book_ranking3['title']; ?></h4>
                                                    <p><?php echo $book_ranking3['title']; ?>
                                                    </p>
                                                    <P>お気に位入り登録数：<?php echo $book_ranking3['cnt']; ?></P>
                                                    
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
                      <div><img src="images/Bronze_medal_icon.svg.png" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="images/ダウンロード.jpeg" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        BOOK TITLE</h4>
                                                    <p>
                                                        著者
                                                    </p>
                                                    <P>🌟🌟🌟🌟🌟</P>
                                                    
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
                    <div><img src="images/yellow-number-4-icon-24402.png" style="margin-right:440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="<?php $book_ranking4['picture_url']; ?>" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $book_ranking4['title']; ?></h4>
                                                    <p>
                                                        <?php echo $book_ranking4['author']; ?>
                                                    </p>
                                                    <P>お気に入り登録数：<?php echo $book_ranking4['cnt']; ?></P>
                                                    
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
                      <div><img src="images/yellow-number-4-icon-24402.png" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="images/ダウンロード.jpeg" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        BOOK TITLE</h4>
                                                    <p>
                                                        著者
                                                    </p>
                                                    <P>🌟🌟🌟🌟🌟</P>
                                                    
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
                        <div><img src="images/yellow-number-5-icon-24416.png" style="margin-right: 440px; "></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="<?php $book_ranking5['picture_url']; ?>" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $book_ranking5['title']; ?></h4>
                                                    <p>
                                                        <?php echo $book_ranking5['author']; ?>
                                                    </p>
                                                    <P>お気に入り登録数：<?php echo $book_ranking5['cnt']; ?></P>
                                                    
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
                     <div><img src="images/yellow-number-5-icon-24416.png" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm up-rank">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="images/ダウンロード.jpeg" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        BOOK TITLE</h4>
                                                    <p>
                                                        著者
                                                    </p>
                                                    <P>🌟🌟🌟🌟🌟</P>
                                                    
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
    </div>
</body>
</html>