<?php 
  session_start(); 
     

 // dbconnect.phpを読み込む
 require('dbconnect.php');
//セッションにデータがなかったらindex.phpへ移動する
 if (!isset($_SESSION['join'])) {
   header('Location: register.php');
   exit
   ();
 }
 // var_dump($_SESSION['join']);

 $name = htmlspecialchars($_SESSION['join']['name'],ENT_QUOTES,'UTF-8');
 $email = htmlspecialchars($_SESSION['join']['email'],ENT_QUOTES,'UTF-8');
 $password = htmlspecialchars($_SESSION['join']['password'],ENT_QUOTES,'UTF-8');
 $avatar = htmlspecialchars($_SESSION['join']['avatar_id'],ENT_QUOTES,'UTF-8');
 $age = htmlspecialchars($_SESSION['join']['age'],ENT_QUOTES,'UTF-8');
 $gender = htmlspecialchars($_SESSION['join']['gender'],ENT_QUOTES,'UTF-8');
 $job = htmlspecialchars($_SESSION['join']['job'],ENT_QUOTES,'UTF-8');
 $hobby = htmlspecialchars($_SESSION['join']['hobby'],ENT_QUOTES,'UTF-8');

 //アバター画像取得
 $sql ='SELECT a.* FROM `avatar`a WHERE `avatar_id` ='.$avatar;
 $avatars=mysqli_query($db,$sql) or die(mysqli_error($db));
 $avatar_path = mysqli_fetch_assoc($avatars);
 // var_dump($avatar_path);

 
 // DB登録処理
 if (!empty($_POST)) {
  $sql = sprintf('INSERT INTO `users`(`user_id`,`name`,`email`,`password`,`avatar_id`,`age`,`gender`,`hobby`,`job`) VALUES(NULL,"%s","%s","%s",%d,%d,%d,"%s","%s");',
    mysqli_real_escape_string($db,$_SESSION['join']['name']),
    mysqli_real_escape_string($db,$_SESSION['join']['email']),
    mysqli_real_escape_string($db,sha1($_SESSION['join']['password'])),
    mysqli_real_escape_string($db,$_SESSION['join']['avatar_id']),
    mysqli_real_escape_string($db,$_SESSION['join']['age']),
    mysqli_real_escape_string($db,$_SESSION['join']['gender']),
    mysqli_real_escape_string($db,$_SESSION['join']['hobby']),
    mysqli_real_escape_string($db,$_SESSION['join']['job'])
    );
  mysqli_query($db,$sql) or die(mysqli_error($db));

  $sql = sprintf('SELECT LAST_INSERT_ID()');

  $last_login = mysqli_query($db,$sql) or die(mysqli_error($db));
  $login = mysqli_fetch_assoc($last_login);
 // var_dump($login);
  $_SESSION['login_member_id'] = $login['LAST_INSERT_ID()'];


  header("Location:thanks.php");
  exit();
     
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>確認ページ</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/register.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <!-- =======================================================
        Theme Name: Company
        Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <body>
  <?php include('header.php'); ?>

   
    <section id="contact-page">
    <div class="kabe">
    <div class="container">
            <div class="row main">
                <div class="main-login main-center">
                    <form class="form-horizontal" method="post" action="">
                        <input type="hidden" name="action" valur="submit">
                        <div class="form-group">
                        <h3>確認ページ</h3>
                            <label for="name" class="cols-sm-2 control-label">名前</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                  <p><?php echo $name; ?></p>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="job" class="cols-sm-2 control-label">メールアドレス</label>
                            <div class="cols-sm-10">
                             <p><?php echo $email; ?></p>
                            </div>
                        </div>
                            <div class="form-group">
                            <label for="job" class="cols-sm-2 control-label">パスワード</label>
                            <div class="cols-sm-10">
                            パスワードは表示されません
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="avatar" class="cols-sm-2 control-label">アバター選択</label>
                        <div class="cols-sm-12">
                        <div class="col-xs-4">
                        <img src="images/<?php echo $avatar_path['avatar_path']; ?>" class="img-responsive img-radio">
                       <!--  <p><?php echo $avatar; ?></p> -->
                        <input type="checkbox" id="right-item" class="hidden">
                    </div>
                    </div>
                    </div>


<!-- <form class="form-horizontal"> -->
<fieldset>

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">年代</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                  <p><?php echo $age; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">性別</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                <?php if($gender=='1'){?>
                                  <p>男</p>
                              <?php }elseif($gender=='2'){?>
                              <p>女</p>
                              <?php } ?>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">職業</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                  <p><?php echo $job; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">趣味</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                  <p><?php echo $hobby; ?></p>
                                </div>
                            </div>
                        </div>
                        </fieldset>
<!-- </form> -->
                    <a href="register.php?action=rewrite" class="rewrite">書き直す</a>
                    <input type="submit" class="btn btn-primary btn-lg btn-block login-button cols-sm-2" value="OK">
<!--            <button type="button" class="btn btn-primary btn-lg btn-block login-button cols-sm-2">Register</button>

            <button type="button" class="btn btn-primary btn-lg btn-block login-button cols-sm-2">Register</button> -->
                    </form>
                </div>
                </div>
            </div>
        </div>

       <!--  <script type="text/javascript" src="assets/js/bootstrap.js"></script> -->
    </section><!--/#contact-page-->
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
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
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
    <!-- <footer>
        <div class="footer">
            <div class="container">
                <div class="social-icon">
                    <div class="col-md-4">
                        <ul class="social-network">
                            <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>   
                    </div>
                </div>
                
                <div class="col-md-4 col-md-offset-4">
                    <div class="copyright">
                        &copy; Company Theme. All Rights Reserved.
                        <div class="credits">
                            <!- 
                                All the links in the footer should remain intact. 
                                You can delete the links only if you purchased the pro version.
                                Licensing information: https://bootstrapmade.com/license/
                                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Company
                            -->
             <!--                <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
                </div>                      
            </div>
            <div class="pull-right">
                <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
            </div>
        </div>
    </footer>  -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!--  <script src="js/jquery-2.1.1.min.js"></script>   -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
    <script src="js/wow.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js/functions.js"></script>
    <script src="contactform/contactform.js"></script>
     -->
</body>
</html>