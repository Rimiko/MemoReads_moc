<?php

session_start();

// bdconnect.php をよみこむ
require('dbconnect.php');

$comment = $_GET['search_word'];


 // 0.ページ番号を取得（ある場合はGET送信、ない場合1ページ目と認識する）
      $page = '';
      // GET送信されてきたページ番号を取得
      if (isset($_GET['page'])){
        $page = $_GET['page'];
      }
      //ないときは1ページ目
      if ($page == ''){
        $page = 1;
      }
      // 1.表示する正しいページの数値を設定（Min）
      $page = max($page,1);
      // 2.必要なベージ数を計算
      // 1ページに表示する行数
      $row = 10;

// dbから取得
// $sql = 'SELECT `book_id`, `title`, `picture_url`, `author`, `detail`, `created`, `modified` FROM `books`';
// $results = mysqli_query($db,$sql) or die (mysqli_error($db));
// $result = mysqli_fetch_assoc($results);

// キーワード検索
if (isset($_GET['search_word']) && !empty($_GET['search_word'])){
$sql = sprintf('SELECT `book_id`, `title`, `picture_url`, `author`, `detail`, `created`, `modified` FROM `books` LIKE "%%%s%%" ORDER BY `created`');
$results = mysqli_query($db,$sql) or die (mysqli_error($db));
$result = mysqli_fetch_assoc($results);

}











?>





<!DOCTYPE html>
<html lang="ja">
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
    
    <link href="css/memoreads.css" rel="stylesheet"/> 	
    <link href="colorbox-master/example1/colorbox.css" rel="stylesheet" />
    <link href="css/usermystyle.css" rel="stylesheet"/>
    <link href="css/header.css" rel="stylesheet"/>
    <!-- =======================================================
        Theme Name: Company
        Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->

    <script type="text/javascript"><!--
function ChangeTab(tabname) {
    console.log(tabname);
// 全部消す

 document.getElementById('tab1').style.display = 'none';
   document.getElementById('tab2').style.display = 'none';
   document.getElementById('tab3').style.display = 'none';
   // 指定箇所のみ表示
   document.getElementById(tabname).style.display = 'block';
}</script>
  </head>
  <body>

  <?php include('header.php'); ?>
	<!-- <header>		
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navigation">
				<div class="container">					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand">
							<a href="index.html"><h1><span>Com</span>pany</h1></a>
						</div>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="index.html">Home</a></li>
								<li role="presentation"><a href="about.html">About Us</a></li>
								<li role="presentation"><a href="services.html">Services</a></li>								
								<li role="presentation"><a href="portfolio.html" class="active">Portfolio</a></li>
								<li role="presentation"><a href="blog.html">Blog</a></li>
								<li role="presentation"><a href="contact.html">Contact</a></li>						
							</ul>
						</div>
					</div>						
				</div>
			</div>	
		</nav>		
	</header> -->
    <!-- サイドバー -->
    <?php include('sideber.php'); ?>
	
	<!-- <div id="breadcrumb"> -->
		<!-- <div class="container">	
			<div class="breadcrumb">							
				<li><a href="index.html">Home</a></li>
				<li>Portfolio</li>			
			</div>		
		</div>	
	</div> -->
	<div class="kabe">
	<section id="portfolio">	
        <div class="container">
            <div class="center">
               <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt</p> -->
            </div>
           <div class="tabbox">

   <ul class="portfolio-filter text-center">
                <li style="margin-top:78px;"><a class="btn btn-default active" href="#tab1"
                onclick="ChangeTab('tab1');return false;">TOP</a></li>

                <li><a class="btn btn-default" href="#tab2"
                onclick="ChangeTab('tab2');return false;">BOOK</a></li>
                <li><a class="btn btn-default" href="#tab3"
                onclick="ChangeTab('tab3');return false;">ユーザー</a></li>
                <!-- <li><a class="btn btn-default" href="#">キーワード</a></li> -->
            </ul><!--/#portfolio-filter-->
   <div id="tab1" class="tab">
      <p>
		
		<div class="container">
            <div class="">
                <div class="portfolio-items" style="left: 270px;">
                    <div class="portfolio-item apps col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="<?php echo $result['icture_url'];?>" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h4>
                            title:<?php echo $result['title'];?></h4>
                        <h4>
                            著者;<?php echo $result['author'];?>
                        </h4>
                        <h4>
                            <!-- カテゴリー;<?php echo $result[''];?> -->
                        </h4>
                        </h4>
                        <!-- <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small> -->
                        <!-- <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                       <!--  <div class="btn-group">
                            <button type="button" class="btn btn-primary" style="width: 100px;height: 26px;"> -->
                                <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p><!-- </button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> -->
                                <!-- <span class="caret"></span><span class="sr-only">Social</span> -->
                            <!-- </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item1.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item1.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item joomla bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4> -->
                        <!-- <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small> -->
                        <!-- <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> --> 
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item2.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                   <!--  <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item2.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item bootstrap wordpress col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px;">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm" >
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item3.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3> -->
                                    <!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item3.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>        
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item joomla wordpress apps col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item4.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item4.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>           
                    </div><!--/.portfolio-item-->
          
                    <div class="portfolio-item joomla html bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                       <!--  <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item5.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
<!--                                     <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item5.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>      
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html apps col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item6.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item6.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>         
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item7.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item7.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item8.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p> -->
                                    <!-- <a class="preview" href="images/portfolio/full/item8.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item8.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p> -->
                                    <!-- <a class="preview" href="images/portfolio/full/item8.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
        
    </section><!--/#portfolio-item-->
</p>
   </div></div>
   <div class="kabe">
    <section id="portfolio">    
        <div class="container">
            <div class="center">
               <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt</p> -->
            </div>
   <div id="tab2" class="tab">
      <p><div class="container">
            <div class="">
                <div class="portfolio-items" style="left: 270px;">
                    <div class="portfolio-item apps col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small> -->
                        <!-- <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                       <!--  <div class="btn-group">
                            <button type="button" class="btn btn-primary" style="width: 100px;height: 26px;"> -->
                                <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p><!-- </button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> -->
                                <!-- <span class="caret"></span><span class="sr-only">Social</span> -->
                            <!-- </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item1.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item1.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item joomla bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4> -->
                        <!-- <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small> -->
                        <!-- <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> --> 
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item2.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                   <!--  <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item2.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item bootstrap wordpress col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item3.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3> -->
                                    <!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item3.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>        
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item joomla wordpress apps col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item4.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item4.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>           
                    </div><!--/.portfolio-item-->
          
                    <div class="portfolio-item joomla html bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                       <!--  <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item5.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
<!--                                     <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item5.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>      
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html apps col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item6.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item6.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>         
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item7.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item7.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item8.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p> -->
                                    <!-- <a class="preview" href="images/portfolio/full/item8.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item8.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p> -->
                                    <!-- <a class="preview" href="images/portfolio/full/item8.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h4>
                            title:__________</h4>
                        <h4>
                            著者;__________
                        </h4>
                        <h4>
                            カテゴリー;_________
                        </h4>
                        <!-- <h4>
                            title:__________</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-md-push-10">
   <!--  <a href="#" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-hand-right"></span> 次へ</a> --></div></div></div>
    </section><!--/#portfolio-item-->
    </p>
   </div>
   <div class="kabe">
    <section id="portfolio">    
        <div class="container">
            <div class="center">
               <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt</p> -->
            </div>
   <div id="tab3" class="tab">
      <p><div class="container">
                <div class="portfolio-items" style="left:270px;">
                    <div class="portfolio-item apps col-xs-6 col-sm-6 col-md-6" style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-2 col-md-2" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <h4>
                            名前:__________</h4>
                        <h4>
                            年代;__________
                        </h4>
                        <h4>
                            趣味;__________
                        </h4>
                        <h4>
                            職業;__________
                        </h4></div>
                        <!-- <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small> -->
                        <!-- <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                        <!-- Split button -->
                       <!--  <div class="btn-group">
                            <button type="button" class="btn btn-primary" style="width: 100px;height: 26px;"> -->
                               <div class="col-sm-2 col-md-2" style="width: 120px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style="width: 120px;height: 130px;margin-left: 50px";></a>
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" style="margin-left: 45px;"></a></p><!-- </button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> -->
                                <!-- <span class="caret"></span><span class="sr-only">Social</span> -->
                            <!-- </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item1.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item1.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item joomla bootstrap col-xs-6 col-sm-6 col-md-6" style="width: 400px;height: 225px;">
                    <div class="row" style="width: 0px;">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm" style="
    margin-left: 0px;">
                <div class="row">
                    <div class="col-sm-2 col-md-2" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-2 col-md-2">
                    <h4>
                            名前:__________</h4>
                        <h4>
                            年代;__________
                        </h4>
                        <h4>
                            趣味;__________
                        </h4>
                        <h4>
                            職業;__________
                        </h4></div>
                        <div class="col-sm-2 col-md-2" style="width: 120px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style="width: 120px;height: 130px;margin-left: 50px";></a>
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" style="margin-left: 45px;"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item2.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                   <!--  <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item2.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item bootstrap wordpress col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px;">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-2 col-md-2" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-2 col-md-2">
                    <h4>
                            名前:__________</h4>
                        <h4>
                            年代;__________
                        </h4>
                        <h4>
                            趣味;__________
                        </h4>
                        <h4>
                            職業;__________
                        </h4></div>
                       <div class="col-sm-2 col-md-2" style="width: 120px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style="width: 120px;height: 130px;margin-left: 50px";></a>
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" style="margin-left: 45px;"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item3.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3> -->
                                    <!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item3.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>        
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item joomla wordpress apps col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px;">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm" style="
    margin-left: 0px;">
                <div class="row">
                    <div class="col-sm-2 col-md-2" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-2 col-md-2">
                   <h4>
                            名前:__________</h4>
                        <h4>
                            年代;__________
                        </h4>
                        <h4>
                            趣味;__________
                        </h4>
                        <h4>
                            職業;__________
                        </h4></div>
                        <div class="col-sm-2 col-md-2" style="width: 120px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style="width: 120px;height: 130px;margin-left: 50px";></a>
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" style="margin-left: 45px;"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item4.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item4.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>           
                    </div><!--/.portfolio-item-->
          
                    <div class="portfolio-item joomla html bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px;">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-2 col-md-2" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-2 col-md-2">
                    <h4>
                            名前:__________</h4>
                        <h4>
                            年代;__________
                        </h4>
                        <h4>
                            趣味;__________
                        </h4>
                        <h4>
                            職業;__________
                        </h4></div>
                       <div class="col-sm-2 col-md-2" style="width: 120px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style="width: 120px;height: 130px;margin-left: 50px";></a>
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" style="margin-left: 45px;"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item5.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
<!--                                     <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item5.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>      
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html apps col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px;">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm" style="
    margin-left: 0px;">
                <div class="row">
                    <div class="col-sm-2 col-md-2" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-2 col-md-2">
                    <h4>
                            名前:__________</h4>
                        <h4>
                            年代;__________
                        </h4>
                        <h4>
                            趣味;__________
                        </h4>
                        <h4>
                            職業;__________
                        </h4></div>
                        <div class="col-sm-2 col-md-2" style="width: 120px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style="width: 120px;height: 130px;margin-left: 50px";></a>
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" style="margin-left: 45px;"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item6.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item6.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>         
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px;">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-2 col-md-2" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-2 col-md-2">
                    <h4>
                            名前:__________</h4>
                        <h4>
                            年代;__________
                        </h4>
                        <h4>
                            趣味;__________
                        </h4>
                        <h4>
                            職業;__________
                        </h4></div>
                        <div class="col-sm-2 col-md-2" style="width: 120px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style="width: 120px;height: 130px;margin-left: 50px";></a>
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" style="margin-left: 45px;"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item7.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                                    <a class="preview" href="images/portfolio/full/item7.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px;">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm" style="
    margin-left: 0px;">
                <div class="row">
                    <div class="col-sm-2 col-md-2" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-2 col-md-2">
                    <h4>
                            名前:__________</h4>
                        <h4>
                            年代;__________
                        </h4>
                        <h4>
                            趣味;__________
                        </h4>
                        <h4>
                            職業;__________
                        </h4></div>
                        
                       <div class="col-sm-2 col-md-2" style="width: 120px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style="width: 120px;height: 130px;margin-left: 50px";></a>
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" style="margin-left: 45px;"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item8.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p> -->
                                    <!-- <a class="preview" href="images/portfolio/full/item8.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px;">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-2 col-md-2" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-2 col-md-2">
                    <h4>
                            名前:__________</h4>
                        <h4>
                            年代;__________
                        </h4>
                        <h4>
                            趣味;__________
                        </h4>
                        <h4>
                            職業;__________
                        </h4></div>
                        
                        <div class="col-sm-2 col-md-2" style="width: 120px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style="width: 120px;height: 130px;margin-left: 50px";></a>
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" style="margin-left: 45px;"></a></p>
            
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="recent-work-wrap">
                            <!-- <img class="img-responsive" src="images/portfolio/recent/item8.png" alt=""> -->
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <!-- <h3><a href="#">Business theme</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority</p> -->
                                    <!-- <a class="preview" href="images/portfolio/full/item8.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> -->
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->
                   <div class="container">
                    <div class="portfolio-item wordpress html bootstrap col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px;">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:20px;">
            <div class="well well-sm" style="
    margin-left: 0px;">
                <div class="row">
                    <div class="col-sm-2 col-md-2" style="width: 180px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-2 col-md-2">
                    <h4>
                            名前:__________</h4>
                        <h4>
                            年代;__________
                        </h4>
                        <h4>
                            趣味;__________
                        </h4>
                        <h4>
                            職業;__________  
                        </h4>
                        
                        
                    
                </div>
                <div class="col-sm-2 col-md-2" style="width: 120px;">
                        <a class="iframe" href="book_detail.html" title="ウィキペディア表紙"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style="width: 120px;height: 130px;margin-left: 50px;></a>
                        <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png" style="margin-left: 45px;"></a></p>
            </div>
        </div>
        </div>
    </div>
                </div>
            </div>
        </div>
        
    </section><!--/#portfolio-item-->
    </p>
   
</div></div>
    <div class="container">
        <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-md-push-10">
    <a href="#" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-hand-right"></span> 次へ</a></div></div></div>
	
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
 <script type="text/javascript"><!--
   // デフォルトのタブを選択
   ChangeTab('tab1');
// --></script>

<script>
   $(document).ready(function(){
      $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
   });
</script>

    
</body>
</html>