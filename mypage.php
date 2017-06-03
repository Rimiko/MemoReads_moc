<?php
// session_start();
require('dbconnect.php');

//ログインしている人の情報を取得（名前の表示）

//SQL実行し、ユーザーのデータを取得
// user_idには. $SESSION['login_user_id']を入れること
  $sql ='SELECT b.`picture_url`,b.`book_id`,u.*,r.* FROM (`users`u INNER JOIN `records`r ON u.`user_id` = r.`user_id`) INNER JOIN `books`b ON b.`book_id` = r.`book_id` WHERE u.`user_id`=1';

  // $record = mysqli_query($db,$sql) or die(mysqli_error($db));
  

  // $sql ='SELECT b.`picture_url`,b.`book_id`,u.*,r.* FROM (`users`u INNER JOIN `records`r ON u.`user_id` = r.`user_id`) INNER JOIN `books`b ON b.`book_id` = r.`book_id` WHERE u.`user_id`=1';

  $books = mysqli_query($db,$sql) or die(mysqli_error($db));
  $books_array = array();
  while ($book = mysqli_fetch_assoc($books)) {
  $books_array[]=$book;
  }

  // var_dump($books_array);

// SELECT　表別名1.列名1,　表別名2.列名2,　表別名3.列名3, ．．．
// FROM ( 表名1　表別名1　INNER　JOIN　表名2　表別名2　ON　表別名1.結合列名1　=　表別名2.結合列名2)
// INNER　JOIN　表名3　表別名3　ON　表別名2.結合列名2　=　表別名3.結合列名3;



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
<!-- 	<link href="css/header.css" rel="stylesheet" /> -->
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
		    <img id="img-profile" class="img-thumbnail img-center img-rounded" src="images/dog.jpg">
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
	    <div class="col-sm-7 well margin-well">
		    <p>
            Name : <strong><?php echo $books_array[0]['name'];?></strong>
            <br>
	   		Age : <strong><?php echo $books_array[0]['age'];?></strong>
	        <br>
	        Occupation :<strong><?php echo $books_array[0]['job'];?></strong>
	        <br>
	        <i class="fa fa-bookmark-o" aria-hidden="true"></i> Best Book :<a href="#" class="bestbook"><strong class="bestbook-title">すえずえ</strong></a>
	        <br>
	        Favorite person : <strong><?php echo $books_array[0]['great_man'];?></strong>
            <br>
	        Hobby :<strong><?php echo $books_array[0]['hobby'];?></strong>
	        <br>
	        Free comment : <strong class="free"><?php echo $books_array[0]['comment'];?></strong>
	        </p>
	        	  <!-- カレンダー -->
<!--   <div class="calendar">
      <script type="text/javascript" src="calendar/calendar.js" class="calendar"></script>
  </div> -->
    	   	<div class="pull-right">
    	   	<a href="#" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>  編集ページ</a>
    		</div>
		</div>
	</div>
</div>


		<!-- 		<img src="images/7.jpg" class="img-responsive">
				<h4>We Create, Design and Make it Real</h4>
				<p>Nam tempor velit sed turpis imperdiet vestibulum. In mattis leo ut sapien euismod id feugiat mauris euismod.
				Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
				Phasellus id nulla risus, vel tincidunt turpis. Aliquam a nulla mi, placerat blandit eros. </p>
				<p>In neque lectus, lobortis a varius a, hendrerit eget dolor. Fusce scelerisque, sem ut viverra sollicitudin, est turpis blandit lacus,
				in pretium f sapien at est.
				Integer pretium ipsum sit amet dui feugiat vitae dapibus odio eleifend.</p>
			</div> -->
<!-- 			<div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms"> -->
<!-- 				<div class="skill">
					<h2>Our Skills</h2>s
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

					<div class="progress-wrap">
						<h3>Graphic Design</h3>
						<div class="progress">
						  <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
							<span class="bar-width">85%</span>
						  </div>

						</div>
					</div>

					<div class="progress-wrap">
						<h4>HTML</h4>
						<div class="progress">
						  <div class="progress-bar color2" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
						   <span class="bar-width">95%</span>
						  </div>
						</div>
					</div>

					<div class="progress-wrap">
						<h4>CSS</h4>
						<div class="progress">
						  <div class="progress-bar color3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
							<span class="bar-width">80%</span>
						  </div>
						</div>
					</div>

					<div class="progress-wrap">
						<h4>Wordpress</h4>
						<div class="progress">
						  <div class="progress-bar color4" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
							<span class="bar-width">90%</span>
						  </div>
						</div>
					</div>
				</div>				 -->
			</div>
		</div>
                <div class="container">
            <h3><i class="fa fa-book" aria-hidden="true"></i><strong> Book Shelf  </strong>     <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-book"></span> 記録ページ</a></h3>
            <div class="text-center">
	</div>
	
	<!-- <div class="our-team"> -->

			
				<div class="bookshelf">
			      <img src="images/shelf.jpg" class="shelf">
			      <div class="absolute">
			      	<div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <?php foreach($books_array as $books_each){ ?>
			      <a href="#" class="detail"><img src="images/<?php echo $books_each['picture_url']?>" ></a>
                  <?php } ?>
<!-- 			      <a href="#" class="detail"><img src="images/book2.jpg" class="favorite"></a>
			      <a href="#" class="detail"><img src="images/book3.jpg" ></a>
			      <a href="#" class="detail"><img src="images/book3.jpg" ></a>
			      <a href="#" class="detail"><img src="images/book3.jpg" ></a>
			      <a href="#" class="detail"><img src="images/book2.jpg" ></a>
			      <a href="#" class="detail"><img src="images/book3.jpg" ></a>
			      <a href="#" class="detail"><img src="images/book2.jpg" ></a>
			      <a href="#" class="detail"><img src="images/book1.jpg" ></a>
			      <a href="#" class="detail"><img src="images/book2.jpg" ></a>
			       <a href="#" class="detail"><img src="images/book1.jpg" ></a>
			      <a href="#" class="detail"><img src="images/book3.jpg" ></a>
			      <a href="#" class="detail"><img src="images/book2.jpg" ></a>
			       <a href="#" class="detail"><img src="images/book1.jpg" ></a>
			      <a href="#" class="detail"><img src="images/book3.jpg" ></a>
			      <a href="#" class="detail"><img src="images/book2.jpg" ></a> -->
			      </div>
			      </div>
				</div>
            <ul class="paging">

                <li><a href="#" class="btn btn-default left">前</a></li>

                <li><a href="#" class="btn btn-default right">次</a></li>
          </ul>
<!-- 				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
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