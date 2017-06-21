<?php

session_start();

// bdconnect.php をよみこむ
require('dbconnect.php');


$_REQUEST['search_word'];
if(empty($_SESSION['login_member_id'])){
  header('Location:error.php');
  exit();
}


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
    }
    </script>

    <script>
      

    </script>
  </head>
  <body>

  <?php include('header.php'); ?>
	
    <!-- サイドバー -->
 <div class="container">
  <div class="row">
    <div class="col-lg-3">
   <?php include('sideber.php'); ?>
    </div>
  </div>
</div>
<div class="col-lg-9">
<div class="kabe">
	<section id="portfolio">	
        <div class="container">
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
              </ul><!--/#portfolio-filter-->
            </div>
          </div>

  　<div id="tab1" class="tab">
    <p>
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
        


        <div class="container">
            <div class="">
              <div class="portfolio-items" style="left: 400px;">
               
                  <?php foreach ($tops_array as $top_each) { ?>
                    <div class="portfolio-item apps col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">

                      <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                           <div class="well well-sm" style="margin-bottom: 0px;">
                              <div class="row">
                                <div class="col-sm-6 col-md-6" style="width: 180px;">
                                    <a class="iframe" href="book_detail.php?book_id=<?php echo $top_each['book_id'];?>" title="ウィキペディア表紙"><img src="<?php echo $top_each['picture_url'];?>" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                                </div>
                                
                                <div class="col-sm-6 col-md-6">
                                    <h4>title:<?php echo $top_each['title'];?></h4>
                                    <h4>著者;<?php echo $top_each['author'];?></h4>
                                    <h4>カテゴリー;<?php echo $top_each['category'];?></h4>
                                    <!-- </h4> -->
                                    <p><a href="https://www.amazon.co.jp/s/ref=nb_sb_noss?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&url=search-alias%3Dstripbooks&field-keywords=<?php echo $top_each['title'];?>"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p>
                                </div>llll
                              </div><!--raw-->
                            </div>
                        </div>
                      </div>
                      <div class="recent-work-wrap">
                      </div>
                      </div><!--/.portfolio-item-->
                    <?php } ?>
                  </div>
                 </div> 
                </div> 
      　</p>
      </section>

             <div class="kabe">
              <section id="portfolio">    
                <div class="container">
                  <div class="center">
             　　　　<div id="tab2" class="tab">
                      <p>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-md-push-10" style="bottom: 300px;position: absolute;"> 
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
                              <div class="portfolio-items" style="left: 400px; margin-bottom: 0px;bottom: 50px;">
                                <?php foreach ($books_array as $book_each) { ?>
                                  <div class="portfolio-item apps col-xs-6 col-sm-6 col-md-6"  style="width: 400px;height: 225px">
                                      <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6" style="left: 30px;">
                                          <div class="well well-sm" style="margin-bottom: 0px;">
                                            <div class="row">
                                              <div class="col-sm-6 col-md-6" style="width: 180px;">
                                                  <a class="iframe" href="book_detail.php?book_id=<?php echo $book_each['book_id'];?>" title="ウィキペディア表紙"><img src="<?php echo $book_each['picture_url'];?>" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                                                  </div>   
                                              <div class="col-sm-6 col-md-6">
                                                  <h4>title:<?php echo $book_each['title'];?></h4>
                                                  <h4>著者;<?php echo $book_each['author'];?></h4>
                                                  <h4>カテゴリー;<?php echo $book_each['category'];?></h4>
                                                  <p><a href="https://www.amazon.co.jp/s/ref=nb_sb_noss?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&url=search-alias%3Dstripbooks&field-keywords=<?php echo $top_each['title'];?>"><img src="images/assocbutt_or_buy._V371070157_.png" ></a></p><  
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
                            </div>
                         </div>
                        </div>
                       </p>
                      </div>
                    </div>
                  </div>   
              </section>
            </div>
             <div class="kabe">
              <section id="portfolio">    
                  <div class="container">
                      <div class="center">
                         <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt</p> -->
                      </div>
                         <div id="tab3" class="tab">
                        　<div class="col-xs-12 col-sm-8 col-md-8 col-md-push-10" style="bottom: 330px;position: absolute;"> 
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
                            <div class="portfolio-items" style="left:400px; margin-bottom: 0px;bottom: 20px;">
                              <?php foreach ($users_array as $user_each) { ?>
                                  <div class="portfolio-item apps col-xs-6 col-sm-6 col-md-6" style="width: 400px;height: 225px">
                                    <div class="row">
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                          <div class="well well-sm" style="margin-bottom: 0px;">
                                              <div class="row">
                                                  <div class="col-sm-2 col-md-2" style="width: 180px;">
                                                      <a class="iframe" href="mypage.php?user_id=<?php echo $user_each['user_id'];?>"><img src="<?php echo $user_each['avater_path'];?>" alt="" class="img-rounded img-responsive" style=" width: 150px;height: 200px;"></a>
                                                  </div>
                                                  <div class="col-sm-2 col-md-2" style="right: 10px;">
                                                      <h4 style="width: 120px;">名前:<?php echo $user_each['name'];?></h4>
                                                      <h4 style="width: 120px;">年代;<?php echo $user_each['age'];?></h4>
                                                      <h4 style="width: 120px;">趣味;<?php echo $user_each['hobby'];?></h4>
                                                      <h4 style="width: 120px;">職業;<?php echo $user_each['job'];?></h4>
                                                  </div>
                                                      
                                                  <div class="col-sm-2 col-md-2" style="width: 120px; width: 120px;left: 45px;">
                                                      <a class="iframe" href="book_detail.html"><img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" style="width: 120px;height: 130px;";></a>
                                                      <p><a class="amazon"><img src="images/assocbutt_or_buy._V371070157_.png"></a></p>   
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>    
                                  </div><!--/.portfolio-item-->
                              <?php } ?>
                            </div>
                           </div>
                          </div>  
                        </div>
                   </section>
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