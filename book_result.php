<?php

session_start();

// bdconnect.php をよみこむ
require('dbconnect.php');


$_REQUEST['search_word'];


 // 0.ページ番号を取得（ある場合はGET送信、ない場合1ページ目と認識する）
      $toppage = '';
      // GET送信されてきたページ番号を取得
      if (isset($_REQUEST['toppage'])){
        $toppage = $_REQUEST['toppage'];
      }
      //ないときは1ページ目
      if ($toppage == ''){
        $toppage = 1;
      }
      // 1.表示する正しいページの数値を設定（Min）
      $toppage = max($toppage,1);
      // 2.必要なベージ数を計算
      // 1ページに表示する行数
      $toprow = 10;




     // // 投稿数取得 top
  if (isset($_REQUEST['search_word']) && !empty($_REQUEST['search_word'])){
     $sql = sprintf('SELECT COUNT(*) as cnt FROM `books` INNER JOIN `book_keywords` on `books`.`book_id` = `book_keywords`.`book_id` INNER JOIN `keywords` ON `book_keywords`.`keyword_id` = `keywords`.`keyword_id` WHERE `title` LIKE "%%%s%%" OR `category` LIKE "%%%s%%" OR `author` LIKE "%%%s%%" OR `keyword` LIKE "%%%s%%" ORDER BY `books`.`created` DESC',mysqli_real_escape_string($db,$_REQUEST['search_word']),mysqli_real_escape_string($db,$_REQUEST['search_word']),mysqli_real_escape_string($db,$_REQUEST['search_word']),mysqli_real_escape_string($db,$_REQUEST['search_word']),mysqli_real_escape_string($db,$_REQUEST['search_word']));}
     else{
    $sql = 'SELECT  COUNT(*) as cnt FROM `books` WHERE `title` ORDER BY `books`.`created` DESC';
  }
// var_dump($sql);
      $top_cnt = mysqli_query($db, $sql) or die(mysqli_error($db));

      $tops_cnt = mysqli_fetch_assoc($top_cnt);
      

      // ceil() :切り上げする関数
      $topmaxPage = ceil($tops_cnt['cnt'] / $toprow);

      
   
      // 3.表示する正しいページ数の数値を設定（Max）
      $toppage = min($toppage,$topmaxPage);
      // 4.ページに表示する件数だけ取得

      if ($toppage >= 1) {
        $topstart = ($toppage -1) * $toprow;
      }else{$topstart = ($toppage +1) * $toprow;};
     
      





// 0.ページ番号を取得（ある場合はGET送信、ない場合1ページ目と認識する）
      $bookpage = '';
      // GET送信されてきたページ番号を取得
      if (isset($_REQUEST['bookpage'])){
        $bookpage = $_REQUEST['bookpage'];
      }
      //ないときは1ページ目
      if ($bookpage == ''){
        $bookpage = 1;
      }
      // 1.表示する正しいページの数値を設定（Min）
      $bookpage = max($bookpage,1);
      // 2.必要なベージ数を計算
      // 1ページに表示する行数
      $bookrow = 10;


  // 投稿数取得 book
      if (isset($_REQUEST['search_word']) && !empty($_REQUEST['search_word'])){
$sql = sprintf('SELECT count(*) as cnt FROM `books` WHERE `title` LIKE "%%%s%%" OR `category` LIKE "%%%s%%" OR `author` LIKE "%%%s%%" ORDER BY `books`.`created` DESC',
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']));

}
// else{$sql = 'SELECT  COUNT(*) as cnt FROM `books` WHERE `title`ORDER BY `books`.`created` DESC';}
 
$book_cnt = mysqli_query($db, $sql) or die(mysqli_error($db));
      $books_cnt = mysqli_fetch_assoc($book_cnt);



      // ceil() :切り上げする関数
      $bookmaxPage = ceil($books_cnt['cnt'] / $bookrow);
      // var_dump($sql);
 
      // 3.表示する正しいページ数の数値を設定（Max）
      $bookpage = min($bookpage,$bookmaxPage);
      // 4.ページに表示する件数だけ取得
     if ($bookpage >= 1) {
        $bookstart = ($bookpage -1) * $bookrow;
      }else{$bookstart = ($bookpage +1) * $bookrow;};
// var_dump($bookstart);






// 0.ページ番号を取得（ある場合はGET送信、ない場合1ページ目と認識する）
      $userpage = '';
      // GET送信されてきたページ番号を取得
      if (isset($_REQUEST['userpage'])){
        $userpage = $_REQUEST['userpage'];
      }
      //ないときは1ページ目
      if ($userpage == ''){
        $userpage = 1;
      }
      // 1.表示する正しいページの数値を設定（Min）
      $userpage = max($userpage,1);
      // 2.必要なベージ数を計算
      // 1ページに表示する行数
      $userrow = 10;

// 投稿数取得 user
if (isset($_REQUEST['search_word']) && !empty($_REQUEST['search_word'])){
$sql = sprintf('SELECT count(*) as cnt FROM users u INNER JOIN avatar a ON `u`.`avatar_id` = `a`.`avatar_id` WHERE `name` LIKE "%%%s%%" OR `age` LIKE "%%%s%%" OR `job` LIKE "%%%s%%" OR `gender` LIKE "%%%s%%" OR `hobby` LIKE "%%%s%%" OR `great_man` LIKE "%%%s%%" OR `comment` LIKE "%%%s%%" ORDER BY `created`DESC',
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']));}
// else{$sql = 'SELECT  COUNT(*) as cnt FROM `users` WHERE `user_id` ORDER BY `users`.`created` DESC';}



$user_cnt = mysqli_query($db, $sql) or die(mysqli_error($db));
      $users_cnt = mysqli_fetch_assoc($user_cnt);

      // ceil() :切り上げする関数
      $usermaxPage = ceil($users_cnt['cnt'] / $userrow);

 // var_dump($usermaxPage);
      // 3.表示する正しいページ数の数値を設定（Max）
      $userpage = min($userpage,$usermaxPage);


      // 4.ページに表示する件数だけ取得
     if ($userpage >= 1) {
        $userstart = ($userpage -1) * $userrow;
      }else{$userstart = ($userpage +1) * $userrow;};
 


// dbから取得
// $sql = 'SELECT `book_id`, `title`, `picture_url`, `author`, `detail`, `created`, `modified` FROM `books`';
// $results = mysqli_query($db,$sql) or die (mysqli_error($db));
// $result = mysqli_fetch_assoc($results);

// フリーキーワード検索

if (isset($_REQUEST['search_word']) && !empty($_REQUEST['search_word'])){
$sql = sprintf('SELECT DISTINCT`books`.`book_id`,`books`.`title`,`books`.`category`,`books`.`picture_url`,`books`.`author` FROM `books` LEFT JOIN `book_keywords` on `books`.`book_id` = `book_keywords`.`book_id` LEFT JOIN `keywords` ON `book_keywords`.`keyword_id` = `keywords`.`keyword_id` WHERE `title` LIKE "%%%s%%" OR `category` LIKE "%%%s%%" OR `author` LIKE "%%%s%%" OR `keyword` LIKE "%%%s%%" ORDER BY `books`.`created` DESC LIMIT %d,%d',
  mysqli_real_escape_string($db,$_REQUEST['search_word']),mysqli_real_escape_string($db,$_REQUEST['search_word']),mysqli_real_escape_string($db,$_REQUEST['search_word']),mysqli_real_escape_string($db,$_REQUEST['search_word']),$topstart,$toprow);
   

 $tops = mysqli_query($db,$sql) or die(mysqli_error($db));


 $tops_array = array();
 while ($top = mysqli_fetch_assoc($tops)){

$tops_array[] = $top;
 
 // var_dump($tops_array);

}}
  // var_dump($tops_array);

// 本キーワード検索
if (isset($_REQUEST['search_word']) && !empty($_REQUEST['search_word'])){
$sql = sprintf('SELECT `book_id`,`title`,`category`,`author`,`picture_url` FROM `books` WHERE `title` LIKE "%%%s%%" OR `category` LIKE "%%%s%%" OR `author` LIKE "%%%s%%" ORDER BY `created` DESC LIMIT %d,%d',
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),$bookstart,$bookrow);
    
    


   
   $books = mysqli_query($db,$sql) or die(mysqli_error($db));

   $books_array = array();
   while ($book = mysqli_fetch_assoc($books)){

   $books_array[] = $book;
   // var_dump($books_array);


}}


  // var_dump($books_array);
// ユーザー検索
if (isset($_REQUEST['search_word']) && !empty($_REQUEST['search_word'])){
$sql = sprintf('SELECT `u`.`user_id`,`u`.`name`,`u`.`age`,`u`.`hobby`,`u`.`job`,`a`.`avatar_path` FROM users u INNER JOIN avatar a ON `u`.`avatar_id` = `a`.`avatar_id` WHERE `name` LIKE "%%%s%%" OR `age` LIKE "%%%s%%" OR `job` LIKE "%%%s%%" OR `gender` LIKE "%%%s%%" OR `hobby` LIKE "%%%s%%" OR `great_man` LIKE "%%%s%%" OR `comment` LIKE "%%%s%%" ORDER BY `created` DESC LIMIT %d,%d',
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),
    mysqli_real_escape_string($db,$_REQUEST['search_word']),$userstart,$userrow);
    
   $users = mysqli_query($db,$sql) or die(mysqli_error($db));

   $users_array = array();
   while ($user = mysqli_fetch_assoc($users)){
   $users_array[] = $user;
   // var_dump($users_array);
  
}}


// var_dump($users_array);




// ページ数取得

// if(isset($_GET['tab']) && ($_GET['tab'] == 'tab1')){ $_SESSION['top']=$toppage;}

// if(isset($_GET['tab']) && ($_GET['tab'] == 'tab2')){ $_SESSION['book']=$bookpage;}

// if(isset($_GET['tab']) && ($_GET['tab'] == 'tab3')){ $_SESSION['user']=$userpage;}

// var_dump($_SESSION['top']);
// var_dump($_SESSION['book']);
// var_dump($_SESSION['user']);


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

   // if (tabname != null){
   //   document.getElementById("tab").value = tabname;
   // }
}</script>

<script>
  
// elements = document.getElementsByTagName("li");
// console.log(elements);

</script>
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
   　　　　　　  
     
                
                  
                <?php if(isset($_GET['tab']) && ($_GET['tab'] == 'tab1')){ ?>
                <li style="margin-top:78px;"><a class="btn btn-default active" href="#tab1"
                onclick="ChangeTab('tab1');return false;">TOP</a></li>
                <?php }else{ ?>
                <li style="margin-top:78px;"><a class="btn btn-default" href="#tab1"
                onclick="ChangeTab('tab1');return false;">TOP</a></li>
                 <?php } ?>
                <?php if(isset($_GET['tab']) && ($_GET['tab'] == 'tab2')){ ?>
                <li><a class="btn btn-default active" href="#tab2"
                onclick="ChangeTab('tab2');return false;">BOOK</a></li>
                <?php }else{ ?>
                  <li><a class="btn btn-default" href="#tab2"
                onclick="ChangeTab('tab2');return false;">BOOK</a></li>
                 <?php } ?>
                 <?php if(isset($_GET['tab']) && ($_GET['tab'] == 'tab3')){ ?>
                <li><a class="btn btn-default action" href="#tab3"
                onclick="ChangeTab('tab3');return false;">ユーザー</a></li>
                <?php }else{ ?>
                <li><a class="btn btn-default" href="#tab3"
                onclick="ChangeTab('tab3');return false;">ユーザー</a></li>
                <?php } ?>
                <!-- <li><a class="btn btn-default" href="#">キーワード</a></li> -->
            </ul><!--/#portfolio-filter-->

   <div id="tab1" class="tab">
      <p>


      <!-- <div class="container">
        <div class="row"> -->
        <div class="col-xs-12 col-sm-8 col-md-8 col-md-push-10" style="bottom: 300px;position: absolute;"> 
     
        <?php $word = '';
      if (isset($_REQUEST['search_word']) && !empty($_REQUEST['search_word'])){$word = '&search_word='.$_REQUEST['search_word'];}?>



<?php if ($toppage > 1){ ?>
<a href="book_result.php?toppage=<?php echo $toppage-1; ?><?php echo $word;?>&tab=tab1" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-hand-right"></span>前</a>
<?php }else{ ?>
  前
<?php } ?>


<?php if ($toppage < $topmaxPage){ ?>
     <a href="book_result.php?toppage=<?php echo $toppage+1; ?><?php echo $word;?>&tab=tab1" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-hand-right"></span>次へ</a>

<?php }else{ ?>
次へ

<?php } ?>


        

        </div>
        <!-- </div></div> -->


<div class="container">
        

 
		
	

            <div class="">



            
                <div class="portfolio-items" style="left: 270px;">
               
             <?php foreach ($tops_array as $top_each) { ?>
                    <div class="portfolio-item apps col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">

                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.php?book_id=<?php echo $top_each['book_id'];?>" title="ウィキペディア表紙"><img src="<?php echo $top_each['picture_url'];?>" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    
                    <div class="col-sm-6 col-md-6">
                        <h4>
                            title:<?php echo $top_each['title'];?></h4>
                        <h4>
                            著者;<?php echo $top_each['author'];?>
                        </h4>
                        <h4>
                           カテゴリー;<?php echo $top_each['category'];?>
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





<?php } ?>
 


 
        
        

        
</p>

                   
</section>
    <!-- <!/#portfolio-item -->
    

   </div></div>
   <div class="kabe">
    <section id="portfolio">    
        <div class="container">
            <div class="center">
               <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt</p> -->
            <!-- </div> -->
   <div id="tab2" class="tab">
      <p>

<div class="col-xs-12 col-sm-8 col-md-8 col-md-push-10"
        style="bottom: 300px;position: absolute;"> 
     
        <?php $word = '';
      if (isset($_REQUEST['search_word']) && !empty($_REQUEST['search_word'])){$word = '&search_word='.$_REQUEST['search_word'];}?>



<?php if ($bookpage > 1){ ?>
<a href="book_result.php?bookpage=<?php echo $bookpage-1; ?><?php echo $word;?>&tab=tab2" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-hand-right"></span>前</a>
<?php }else{ ?>
  前
<?php } ?>


<?php if ($bookpage < $bookmaxPage) { ?>
     <a href="book_result.php?bookpage=<?php echo $bookpage+1; ?><?php echo $word; ?>&tab=tab2" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-hand-right"></span>次へ</a>

<?php }else{ ?>
次へ

<?php } ?>


        

        </div>










      <div class="container">
            <div class="">
                <div class="portfolio-items" style="left: 270px;">
                <?php foreach ($books_array as $book_each) { ?>
                    <div class="portfolio-item apps col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 180px;">
                        <a class="iframe" href="book_detail.php?book_id=<?php echo $book_each['book_id'];?>" title="ウィキペディア表紙"><img src="<?php echo $book_each['picture_url'];?>" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>   
                    <div class="col-sm-6 col-md-6">
                        <h4>
                            title:<?php echo $book_each['title'];?></h4>
                        <h4>
                            著者;<?php echo $book_each['author'];?>
                        </h4>
                        <h4>
                            カテゴリー;<?php echo $book_each['category'];?>
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
                    </div>
                      <?php } ?><!--/.portfolio-item-->
                    

                    
   </section>
   <!--/#portfolio-item-->


    </p>
   </div>
   <div class="kabe">
    <section id="portfolio">    
        <div class="container">
            <div class="center">
               <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt</p> -->
            </div>
   <div id="tab3" class="tab">
      <p>


<div class="col-xs-12 col-sm-8 col-md-8 col-md-push-10"
        style="bottom: 330px;position: absolute;"> 
         
        <?php $word = '';
      if (isset($_REQUEST['search_word']) && !empty($_REQUEST['search_word'])){$word = '&search_word='.$_REQUEST['search_word'];}?>



<?php if ($userpage > 1){ ?>
<a href="book_result.php?userpage=<?php echo $userpage-1; ?><?php echo $word;?>&tab=tab3" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-hand-right"></span>前</a>
<?php }else{ ?>
  前
<?php } ?>


<?php if ($userpage < $usermaxPage){ ?>
     <a href="book_result.php?userpage=<?php echo $userpage+1; ?><?php echo $word; ?>&tab=tab3" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-hand-right"></span>次へ</a>

<?php }else{ ?>
次へ

<?php } ?>


        

        </div>
      <div class="container">  
                <div class="portfolio-items" style="left:270px;">
                <?php foreach ($users_array as $user_each) { ?>
                    <div class="portfolio-item apps col-xs-6 col-sm-6 col-md-6" style="width: 400px;height: 225px">
                    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-2 col-md-2" style="width: 180px;">
                        <a class="iframe" href="mypage.php?user_id=<?php echo $user_each['user_id'];?>" title="ウィキペディア表紙"><img src="<?php echo $user_each['avater_path'];?>" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <h4>
                            名前:<?php echo $user_each['name'];?></h4>
                        <h4>
                            年代;<?php echo $user_each['age'];?>
                        </h4>
                        <h4>
                            趣味;<?php echo $user_each['hobby'];?>
                        </h4>
                        <h4>
                            職業;<?php echo $user_each['job'];?>
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

                    <?php } ?>



<div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-md-push-10">
        
  
                    
        
    </section><!--/#portfolio-item-->


    </p>

   
</div></div>


   
    
	
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
   <?php if(!isset($_GET['tab'])){ ?>
   ChangeTab('tab1'); 

   <?php }else{?>
    ChangeTab('<?php echo $_GET['tab'] ?>'); 
   <?php } ?>
// --></script>

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