<!-- <?php
// session_start();

?> -->







<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company-HTML Bootstrap theme</title>

    <!-- Bootstrap -->
<!--     <link href="css/bootstrap.min.css" rel="stylesheet"> -->
   <!--  <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/header.css" rel="stylesheet" />
    <link href="css/memoreads.css" rel="stylesheet" />
         <link href="css/edit.css" rel="stylesheet" />
         -->
    <!-- =======================================================
        Theme Name: Company
        Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <body>
  <!-- ヘッダー -->
    <header>        
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand">

                          <div class="row">
                            <div class="span12">
                  <form class="form-search form-horizontal pull-right" action="book_result.php" method="get">
                  <div class="input-append span12">
                  <input type="text" name="search_word" class="mac-style" placeholder="Search"><button class="btn btn-success" type="submit"><i class="icon-search"><span class="glyphicon glyphicon-search"></span></i></button>
                    <!-- <button type="submit" class="btn"><i class="icon-search"></i></button> -->
                       </div>
                                <!-- <input id="tab" name="tab" value="tab1" type="hidden"> -->
                                </form>
                            </div>
                          </div>

                        </div>
                    </div>

                    <div class="navbar-collapse collapse">
                        <div class="menu">
                            <ul class="nav nav-tabs" role="tablist">
                            <?php if(isset($_SESSION['login_member_id'])){?>
                                <li role="presentation"><a href="user_top.php"><?php }else{?><li role="presentation"><a href="top.php"><?php }?>Home</a></li>
                                <?php if(isset($_SESSION['login_member_id'])){?>
                                <li role="presentation"><a href="mypage.php" class="active">My Page</a></li>
                                <li role="presentation"><a href="logout.php">Logout</a></li>
                                <?php }else{} ?>
                            </ul>
                        </div>
                    </div>
                </div>
        </nav>
    </header>


    <!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->
<!-- サイドバー -->
<!-- <div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    <img src="images/dog.jpg" class="img-responsive" alt="">
                </div>

                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        Rimiko Fukumitsu
                    </div>
 <div class="container">
    <div class="row ptlv">
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
                    <button type="button" class="btn btn-success btn-sm">編集ページ</button>
                    <button type="button" class="btn btn-danger btn-sm">記録ページ</button>
                </div>

            </div>
        </div>
    </div>
</div>
 -->


