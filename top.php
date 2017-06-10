<?php
  session_start();
 require('dbconnect.php');

 //自動ログいん処理
 if (isset($_COOKIE['email']) && !empty($_COOKIE['email'])) {
    // 読むときはグローバル変数でできる,emailが入っているということはパスワードも入っていると「認識される
    // COOKIEに保存されているログイン情報が入力されてPOST送信されてきたかのように$_POSTに値を代入
      $_POST['email'] = $_COOKIE['email'];
      $_POST['password'] = $_COOKIE['password'];
      $_POST['save'] = 'on';
  } 


// post送信されていたら、emailとパスワードの入力チェックを行い、どちらかがor 両方が未入力の場合「メールアドレスとパスワードをご記入ください」とパスワード入力欄の下に表示
// $error['login']にblankという文字をセットして判別できるようにすること
if (!empty($_POST)) {
  if(empty($_POST['email'])){
    $error['login'] = 'blank';
  }


if(empty($_POST['password'])){
 $error['login'] = 'blank';
  }

if(empty($error)){
  // login処理
  // 入力されたemail,passwordでDBから会員情報を取得できたら、正常ログイン。取得できなかったら、$error['login']に　faildを代入して、パスワードの下に「ログインに失敗しました。正しくご記入ください」
  $sql = sprintf('SELECT `user_id`,`password`, `user_id` FROM `users` WHERE `email` = "%s" AND `password` = "%s"',
 mysqli_real_escape_string($db,$_POST['email']),
 mysqli_real_escape_string($db,sha1($_POST['password']))
  );
    
  //SELECT分を記述！
  // sql実行
  $record = mysqli_query($db,$sql) or die(mysqli_error($db));
  if ($table = mysqli_fetch_assoc($record)){
     //login 成功

    // SESSION変数に会員IDを保存
      $_SESSION['login_member_id'] = $table['user_id'];
    // SESSION変数にログイン時間を保存
      $_SESSION['time'] = time();
      // 自動ログインをオンにしてたらcookieにログイン情報を保存する
      if($_POST['save']=='on'){
        // setcookie(保存するキー,保存する値,保存する期間（秒）)
        setcookie('email',$_POST['email'],time() + 60*60*24*14);
        setcookie('password',$_POST['password'],time() + 60*60*24*14);

      }

    // ログイン後のindex.php（ドップページ）に遷移
      header("Location: user_top.php");
      exit();
  }else{
    //login 失敗
    $error['login'] = 'faild';
  }
} 
} 

// ----------BOOK RANKING取得------------------


 // session_start();
 
  require('dbconnect.php');

// 星５つの本のid,タイトル、著者を取得する。
    
        $sql = sprintf('SELECT `records`.`book_id`, `records`.`review`, `books`. `title`,`books`.`author`, COUNT(*) as cnt FROM `records` INNER JOIN `books` ON `records`.`book_id`= `books`.`book_id`WHERE `stars`= 5 GROUP BY`book_id` ORDER BY `cnt` DESC'
        
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
    <link href="css/header.css" rel="stylesheet" />
    <!-- =======================================================
        Theme Name: Company
        Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <body>
  <?php include('header.php'); ?>

    
    <section id="main-slider" class="no-margin">
        <div class="carousel slide">      
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(images/thumb-1920-26102.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 class="animation animated-item-1"><span style="color: #F9A843; font-size: 60px; box-shadow: 5px 5px 5px 5px rgba(200,100,100,0.5);">MEMOREADS</span></h2>
                                    <p class="animation animated-item-2" style="color: #F9A843;">Read Review Relate</p>
                                    <!-- <a class="btn-slide animation animated-item-3" href="#">Read More</a> -->
                                </div>


                            </div>
                                 <div class="container-fluid">
                <div class="row-fluid" >
                   
                      
                     <div class="col-md-offset-3 col-md-3" id="box">
                      <h2>Login</h2>
                       
                            <hr>
                           
                            <!-- ログイン -->
                                <form class="form-horizontal" action=" " method="post" id="contact_form">
                                    <fieldset>
                                        <!-- Form Name -->


                                        <!-- Text input-->

                                        <div class="form-group">

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                    <input name="email" placeholder="email" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>


                                  
                                        <!-- Text input-->
                                        <div class="form-group">

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                    <input name="password" placeholder="Password" class="form-control" type="password">
                                                </div>
                                            </div>
                                        </div>


                                    
                                   
                                        <div class="form-group">

                                            <div class="col-md-12">
                                                 <?php if(isset($error['login']) && $error['login'] == 'blank'){ ?>
                                                          <p class ="error">*メールアドレスとパスワードをご記入ください</p>
                                                    <?php } ?>
                                                    <?php if(isset($error['login']) && $error['login'] == 'faild'){ ?>
                                                          <p class ="error">＊ログイン失敗しました。正しくご記入ください。</p>
                                                 <?php } ?>
                                                <button type="submit" class="btn btn-md btn-danger pull-right">Login </button>
                                            </div>
                                        </div>

                                    </fieldset>
                                </form>

                    </div> 
                        
                        <!-- <a href="#" class="btn btn-primary btn-warning col-md-offset-9">SIGN UP HERE!!</a> -->
                                
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <!-- <img src="images/slider/img3.png" class="img-responsive"> -->
                                </div>
                            </div>

                        </div>
                    </div>

                    <a href="register.php" class="btn btn-lg btn-warning col-md-offset-9"><span class="glyphicon glyphicon-check"></span> SIGN UP HERE!!</a>
                </div><!--/.item-->             
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
    </section><!--/#main-slider-->
    <div class="back-rgba">
    <div class="feature">
        <div class="text-center" >
                <img src="images/cooltext245006182452535.png" >
            </div>

            
        <div class="container rankings" style="background-image: url(images/2558160805_bbfa81ab3a_o.png); box-shadow: 15px 10px 10px 10px rgba(0,0,0,0.5); border-radius: 20px;">
          
            <div class="text-center">
                <div class="col-lg-6">
                        <!-- rankig -->
                    
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
                      <div><img src="images/cooltext245006766393490.png"></div> 
                      <div><img src="images/gold.JPG" style="margin-right:440px;"></div>
                        

                        <!-- book部門１位 -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm" style="margin-top: -30px; border:solid 2px; border-color:black;">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    
                                                    <img src="images/ダウンロード.jpeg" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $book_ranking1['title']; ?></h4>
                                                    <p><?php echo $book_ranking1['author']; ?>
                                                    </p>
                                                    <P><?php echo $book_ranking1['review']; ?></P>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>



                <!-- ユーザー部門１位 -->

                <div class="col-lg-6">
                    
                    
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
                     <div><img src="images/cooltext245006698732627.png"></div>
                        <div><img src="images/gold.JPG" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="images/ダウンロード.jpeg" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        BOOK TITLE</h4>
                                                    <p>著者
                                                    </p>
                                                    <P>TEXTTEXTTEXTTEXT.....</P>
                                                    
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
                                        <div class="well well-sm">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                
                                                    <img src="images/ダウンロード.jpeg" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $book_ranking2['title']; ?></h4>
                                                    <p><?php echo $book_ranking2['author']; ?>
                                                    </p>
                                                    <P><?php echo $book_ranking2['review']; ?></P>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <!-- ユーザー部門２位 -->
                <div class="col-lg-6">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                    <div><img src="images/silver.JPG" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="images/ダウンロード.jpeg" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        BOOK TITLE</h4>
                                                    <p>著者
                                                    </p>
                                                    <P>TEXTTEXTTEXTTEXT.....</P>
                                                    
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
                                        <div class="well well-sm">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="images/ダウンロード.jpeg" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $book_ranking3['title']; ?></h4>
                                                    <p><?php echo $book_ranking2['author']; ?>
                                                    </p>
                                                    <P><?php echo $book_ranking1['review']; ?></P>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>

                <!-- ユーザー部門３位 -->
                <div class="col-lg-6">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                      <div><img src="images/Bronze_medal_icon.svg.png" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm">
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
                                                    <P>TEXTTEXTTEXTTEXT.....</P>
                                                    
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
                                        <div class="well well-sm">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="images/ダウンロード.jpeg" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $book_ranking4['title']; ?></h4>
                                                    <p>
                                                        <?php echo $book_ranking4['author']; ?>
                                                    </p>
                                                    <P><?php echo $book_ranking4['review']; ?></P>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>

                    <!-- ユーザー部門４位 -->
                <div class="col-lg-6">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                      <div><img src="images/yellow-number-4-icon-24402.png" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm">
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
                                                    <P>TEXTTEXTTEXTTEXT.....</P>
                                                    
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
                                        <div class="well well-sm">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="images/ダウンロード.jpeg" alt="" class="img-rounded img-responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4>
                                                        <?php echo $book_ranking5['title']; ?></h4>
                                                    <p>
                                                        <?php echo $book_ranking5['author']; ?>
                                                    </p>
                                                    <P><?php echo $book_ranking5['review']; ?></P>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>

                 <!-- ユーザー部門５位 -->
                <div class="col-lg-6">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                     <div><img src="images/yellow-number-5-icon-24416.png" style="margin-right: 440px;"></div>
                        <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="well well-sm">
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
                                                    <P>TEXTTEXTTEXTTEXT.....</P>
                                                    
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
    
    <!-- <div class="about">
        <div class="container">
            <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
                <h2>about us</h2>
                <img src="images/6.jpg" class="img-responsive"/>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat 
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                </p>
            </div>
            
            <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
                <h2>Template built with Twitter Bootstrap</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat 
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat 
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. 
                Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. 
                Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque </p>
            </div>
        </div>
    </div> -->
    
    <div class="lates" style="background-color: #EBE8C3;">
        <div class="container">
            <div class="text-center" >
                <h2>HOW TO USE</h2>
            </div>
            <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/4.jpg" class="img-responsive"/>
                <h3>Template built with Twitter Bootstrap</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat 
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                </p>
            </div>
            
            <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <img src="images/4.jpg" class="img-responsive"/>
                <h3>Template built with Twitter Bootstrap</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat 
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                </p>
            </div>
            
            <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">             
                <img src="images/4.jpg" class="img-responsive"/>
                <h3>Template built with Twitter Bootstrap</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat 
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                </p>
            </div>

            <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">             
                <img src="images/4.jpg" class="img-responsive"/>
                <h3>Template built with Twitter Bootstrap</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat 
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                </p>
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
    
    <!-- <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <h2>Have a question or need a custom quote?</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation +0123 456 70 80</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!/.container-->    
    </section><!--/#conatcat-info-->
     
    <!-- <footer>
        <div class="footer">
            <div class="container">
                <! <div class="container"> -->
            <!-- <div class="developers">
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/rimiko.JPG">
                        <div><img class="image-circle" src="images/rimiko.JPG"> </div>  
                        <h2>Rimiko Fukumitsu</h2>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
                        <div><img class="image-circle" src="images/naru.JPG"></div> 
                        <h2>Naru Nishimura</h2>
                        
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
                        <div><img class="image-circle "src="images/IMG_1696.jpg"></div> 
                        <h2>Ayumi Maeda</h2>
                        
                    </div>
                </div>
            </div>
        </div>

                
                <div class="col-md-4 col-md-offset-4">
                    <div class="copyright">
                        &copy; Company Theme. All Rights Reserved.
                        <div class="credits">
                            <!
                                All the links in the footer should remain intact. 
                                You can delete the links only if you purchased the pro version.
                                Licensing information: https://bootstrapmade.com/license/
                                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Company
                            -->
                            <!-- <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
                </div>                      
            </div>
            
            <div class="pull-right">
                <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
            </div>      
        </div>
    </footer>   -->

    
    
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