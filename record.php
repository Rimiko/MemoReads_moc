<?php 
session_start();
require('dbconnect.php');
// require('api.php');


if (!empty($_POST)) {
  if ($_REQUEST['bool_select'] == '') {
    $error['book_select'] == 'blank';
    # code...
  }
  # code...
}
  // var_dump($_SESSION['book']);


  

  //session
if(!empty($_SESSION['book'])){
  $booktitle=$_SESSION['book']['title'];
  $bookpic=$_SESSION['book']['pic'];
  $bookauthor=$_SESSION['book']['author'];
  $bookid=$_SESSION['book']['bookid'];



  $sql ='SELECT * FROM `books` WHERE `api_id` ='.$_SESSION['book']['bookids'];


  $records = mysqli_query($db,$sql) or die(mysqli_error($db));
  $record = mysqli_fetch_assoc($records);

  if(isset($record)){
    $b=$record['book_id'];
  }else{

$sql='INSERT INTO `books`';
  }
}

  // var_dump($record);



// var_dump($_SESSION['book']);
// var_dump($_POST);












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
    <link rel="stylesheet" href="css/share.css">    
    <link rel="stylesheet" href="css/header.css">

    <!-- =======================================================
        Theme Name: Company
        Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <body>
  <?php include('header.php'); ?>

  <div id="allbox">
  

        <!-- panel preview -->
      <div class="container">
        
        <div id="b-box">
           <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-9">
                          <div class="form-group">

  <label>タイトル</label>

   
  <div class="col-ms-4">

    
<form method="get" action="record_result.php" name="検索">
   
  
  
   <?php if(empty($_SESSION)): ?>
     <input id="serch" type="text" name="title" value="">
    <?php else: ?>
    <input id="serch" type="text" name="title" value="<?php echo $booktitle; ?>">
    <?php endif; ?>
     <button>検索</button>
<?php if(isset($error['title'])) { ?>
  <p class="error">*タイトルを入力してください</p>
<?php } ?>



 </form>
 <form method="post" action="record.php" name="記録">
 
                        </div>
                      
                    </div>
                  </div>
                </div>
                 <div class="form-group">
                        <label for="status" class="col-sm-4 control-label">感想</label>
                        <div class="col-sm-9">
                        <form class="form-horizontal">
<fieldset>



<!-- Text input-->
<div class="form-group">
  
  <div class="col-ms-4">
  <textarea id="textinput" name="textinput" type="text" class="form-control input-ms" required="">
    </textarea>
  </div>
</div>

<!-- Button -->


<!-- Multiple checkbox (inline) -->
<div class="form-group">
  <label>キーワード</label>
  <div class="col-ms-4"> 
    <label class="checkbox-inline" for="keyword-0">
      <input type="checkbox" name="keyword" id="keyword-0" value="1" checked="checked">
      予想外
    </label> 
    <label class="checkbox-inline" for="keyword-1">
      <input type="checkbox" name="keyword1" id="keyword-1" value="2">
      面白い
    </label> 
    <label class="checkbox-inline" for="keyword-2">
      <input type="checkbox" name="keyword2" id="keyword-2" value="3">
      笑える
    </label> 
    <label class="checkbox-inline" for="keyword-3">
      <input type="checkbox" name="keyword3" id="keyword-3" value="4">
      つまらない
    </label> 
    <label class="checkbox-inline" for="keyword-4">
      <input type="checkbox" name="keyword4" id="keyword-4" value="5">
      びっくり
    </label> 
    <label class="checkbox-inline" for="keyword-5">
      <input type="checkbox" name="keyword5" id="keyword-5" value="6">
      胸キュン
    </label> 
    <label class="checkbox-inline" for="keyword-6">
      <input type="checkbox" name="keyword6" id="keyword-6" value="7">
      元気
    </label> 
    <label class="checkbox-inline" for="keyword-7">
      <input type="checkbox" name="keyword7" id="keyword-7" value="8">
      価値観変わる
    </label> 
    <label class="checkbox-inline" for="keyword-8">
      <input type="checkbox" name="keyword8" id="keyword-8" value="9">
      とりあえず読め
    </label> 
    <label class="checkbox-inline" for="keyword-9">
      <input type="checkbox" name="keyword9" id="keyword-9" value="10">
      考えさせられる
    </label>
  </div>
</div>

</fieldset>


                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">読み始め</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">読み終わり</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date" name="date2">
                        </div>
                    </div>    
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <input type="submit" name="記録" value="記録">
                            
                        </div>
                    </div>
                
     <!-- / panel preview -->
      </form>
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
    </section>
        </body>
    
    
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