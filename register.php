<?php 

 
session_start(); 



var_dump($_POST);

// var_dump($_REQUEST);
$name = '';
$email = '';
$password = '';
$password_2 = '';
$job= '';
$hobby = '';
//$error[] = array();

if(!empty($_POST)){

    if(empty($_POST['name'])){
        $error['name'] = 'blank';
        echo 'a';
    }else {
        $name = $_POST['name'];
        echo 'm';
    }

    if(empty($_POST['email'])){
        $error['email'] = 'blank';
        echo 'a2';
    }else{
        $email = $_POST['email'];
        echo 'a3';
    }
// パスワード
if(empty($_POST['password'])){
    $error['password'] = 'blank';
    echo 'c';
}elseif(strlen($_POST['password']) < 4){
    $error['password'] = 'length';
    echo "f";
}else{
    $password = $_POST['password'];
    echo 'k';
}
// 確認用パスワード
if(empty($_POST['password_2'])){
    $error['password_2'] = 'blank';
    echo 'd';
}elseif($password !== $_POST['password_2']){
    $error['password_2'] = 'notsame';
    }else{
        $password_2 = $_POST['password_2'];
    
    echo 'd2';
    }

    //アバター
   
     if(empty($_POST['avatar_id'])){
        $error['avatar_id'] = 'blank';
        echo 'P';
    }else {
        $avatar = $_POST['avatar_id'];
        echo 'Q';
    }

    //年齢
     if(empty($_POST['ages'])){
        $error['ages'] = 'blank';
        echo 'G';
    }else {
        $age = $_POST['ages'];
        echo 'T';
    }

    // //職業
    // if(empty($_POST['job'])){
    //     $error['job'] = 'blank';
    //     echo 'j';
    // }else {
        $job = $_POST['job'];
        echo 'u';
    

    //趣味
    // if(empty($_POST['hobby'])){
    //     $error['hobby'] = 'blank';
    //     echo 'h';
    // }else {
        $hobby = $_POST['hobby'];
        echo 'r';
    

    //エラーがない場合
    if (empty($error)){
      // セッションに値を保存
     $_SESSION['join'] = $_POST;

      //$_SESSION['join']['picture_path'] = $picture_path; 
      //リダイレクト処理を実行する関数header()
       header("Location:check.php");
       exit();
      }
 }

     //書き直し
     if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'rewrite') {
        $_POST = $_SESSION['join'];
        $error['rewrite'] = true;

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

						<div class="form-group">
					       <h3>会員登録</h3>
                            <!-- 名前 -->
							<label for="name" class="cols-sm-2 control-label">名前</label>
							<div class="cols-sm-10">
								<div class="input-group">
                               
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>

									<input type="name" class="form-control" name="name" id="name" placeholder="Enter your name" value="<?php echo htmlspecialchars($name,ENT_QUOTES,'utf-8'); ?>">
                                    <?php if(isset($error['name']) && $error['name'] == 'blank'): ?>
                                        <p>名前を入力してください</p>
                                    <?php endif; ?>
                                    
                                     
								</div>
							</div>
						</div>

                        <!-- メールアドレス -->
                        <div class="form-group">
                            <label for="job" class="cols-sm-2 control-label">メールアドレス</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                                    <input type="email" name="email" value="<?php echo htmlspecialchars($email,ENT_QUOTES,'utf-8'); ?>">
                                    <?php if(isset($error['email']) && $error['email']=='blank'): ?>
                                        <p>emailを入力してください</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- パスワード -->
                        <div class="form-group">
                            <label for="job" class="cols-sm-2 control-label">パスワード</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" id="job"  placeholder="Enter your password" value="<?php echo $password; ?>">
                                    <?php if(isset($error['password']) && $error['password'] == 'blank' ):?>
                                     <p>パスワードが未入力です</p>
                                    <?php elseif(isset($error['password']) && $error['password'] == 'length' ): ?>
                                    <p>パスワードは４文字以上入力してください</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- パスワード確認 -->
                         <div class="form-group">
                            <label for="job" class="cols-sm-2 control-label">確認用パスワード</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password_2" id="job"  placeholder="Enter your password" value="<?php echo $password_2 ; ?>"><?php if(isset($error['password_2']) && $error['password_2'] == 'blank' ):  ?>
                                        <p>確認用パスワードを入力してください</p>
                                    <?php elseif(isset($error['password_2']) && 'notsame'): ?>
                                        <p>パスワードが一致しません</p>
                                    <?php endif; ?>
        
                                </div>
                            </div>
                        </div>

                        <!-- アバター -->
                        <div class="form-group">
                            <label for="avatar" class="cols-sm-2 control-label">アバター選択</label>
                            <div class="cols-sm-12">
                             
        						<div class="col-xs-4">
                    				<img src="images/background.png" class="img-responsive img-radio">
                    				<!-- <button type="button" class="btn btn-primary btn-radio">lion</button> -->
                    				<input name="avatar_id" type="radio" id="left-item" value="1">
                                    <p>アバターA</p>
                                </div>
            			        <div class="col-xs-4">
                    				<img src="images/background.png" class="img-responsive img-radio">
                    				<!-- <button type="button" class="btn btn-primary btn-radio">cat</button> -->
                    				<input name="avatar_id" type="radio" id="middle-item" value="2">
                                    <p>アバターB</p>
                    			</div>
                    			<div class="col-xs-4">
                    				<img src="images/background.png" class="img-responsive img-radio">
                    				<!-- <button type="button" class="btn btn-primary btn-radio">dog</button> -->
                    				<input name="avatar_id" type="radio" id="right-item" value="3">
                                    <p>アバターC</p>
                    			</div>

                                <?php

                                    if(isset($_POST['avatar_id']) && ($_POST['avatar_id']=='1' || $_POST['avatar_id']=='2' || $_POST['avatar_id']=='3')){
                                     $avatar = $_POST['avatar_id'];
                                     echo 'アバター:'. $_POST['avatar_id'];
                                     
                                    }else{
                                     echo 'アバターを選んでください';
                                    }
                                ?>
                            </div>
                        </div>




                        <!-- 年代 -->
                        <div class="form-group">
                          <label class="col-md-12 control-label" for="ages">年代</label>
                          <div class="col-md-12"> 
                            <label class="radio-inline" for="ages-0">
                              <input type="radio" name="ages" id="ages-0" value="10" >
                              10代以下
                            </label> 
                            <label class="radio-inline" for="ages-1">
                              <input type="radio" name="ages" id="ages-1" value="20">
                              20代
                            </label> 
                            <label class="radio-inline" for="ages-2">
                              <input type="radio" name="ages" id="ages-2" value="30">
                              30代
                            </label> 
                            <label class="radio-inline" for="ages-3">
                              <input type="radio" name="ages" id="ages-3" value="40">
                              40代
                            </label> 
                            <label class="radio-inline" for="ages-4">
                              <input type="radio" name="ages" id="ages-4" value="50">
                              50代
                            </label> 
                            <label class="radio-inline" for="ages-5">
                              <input type="radio" name="ages" id="ages-5" value="60">
                              60代以上
                            </label>
                                <?php

                                    if(isset($_POST['ages']) && ($_POST['ages']=='10代以下' || $_POST['ages']=='20代' || $_POST['ages']=='30代' || $_POST['ages']=='40代' || $_POST['ages']=='50代' || $_POST['ages']=='60代以上')){
                                     $age = $_POST['ages'];
                                     echo '年代:'. $_POST['ages'];
                                     
                                    }else{
                                     echo '年代を選んでください';
                                    }
                                ?>
                          </div>
                        </div>


                       
						<!-- 職業 -->
                        <div class="form-group">
							<label for="job" class="cols-sm-2 control-label">職業（任意）</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="job" id="job"  placeholder="Enter your job" value="<?php echo htmlspecialchars($job,ENT_QUOTES,'utf-8'); ?>">
								</div>
							</div>
						</div>
                        

                        <!--趣味 -->
						<div class="form-group">
							<label for="hobby" class="cols-sm-2 control-label">趣味（任意）</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-star" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="hobby" id="hobby"  placeholder="Enter your hobby" value="<?php echo htmlspecialchars($hobby,ENT_QUOTES,'utf-8'); ?>">
								</div>
							</div>
						</div>

						<div class="form-group ">
							<input type="submit" class="btn btn-primary btn-lg btn-block login-button cols-sm-2" value="確認画面へ">
						</div>
    					
    	            </form>
    			</div>
    		</div>
    	</div>
    </div>
</section>


	<script type="text/javascript" src="assets/js/bootstrap.js"></script><!--/#contact-page-->
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
            </div>
        </div>
    </section>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
	<script src="js/wow.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="js/functions.js"></script>
    <script src="contactform/contactform.js"></script>
    
</body>
</html>