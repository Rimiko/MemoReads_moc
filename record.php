<?php 
session_start();
require('dbconnect.php');

if(empty($_SESSION['login_member_id'])){
  header('Location:error.php');
  exit();
}





if (!empty($_POST['title'])) {
  if ($_REQUEST['book_select'] == '') {
    $error['book_select'] == 'blank';
    # code...
  }
  
}



  

  //session
if(!empty($_SESSION['book'])){
  $booktitle=$_SESSION['book']['title'];
  $bookpic=$_SESSION['book']['pic'];
  $bookauthor=$_SESSION['book']['author'];
  $bookdescription=$_SESSION['book']['description'];
  $bookid=$_SESSION['book']['bookid'];
  


  $sql =sprintf('SELECT * FROM `books` WHERE `api_id` ="%s"',$bookid);


  $records = mysqli_query($db,$sql) or die(mysqli_error($db));
  $record = mysqli_fetch_assoc($records);
  // var_dump($record);


  if(isset($record)){
    $b=$record['book_id'];
  }else{

$sql=sprintf('INSERT INTO `books` (`book_id`, `title`, `category`, `picture_url`, `author`, `detail`, `api_id`, `created`, `modified`) VALUES(NULL,"%s",NULL,"%s","%s","%s","%s",now(),now())',
mysqli_real_escape_string($db,$booktitle),
mysqli_real_escape_string($db,$bookpic),
mysqli_real_escape_string($db,$bookauthor),
mysqli_real_escape_string($db,$bookdescription),
mysqli_real_escape_string($db,$bookid));



mysqli_query($db,$sql) or die(mysqli_error($db));
header("Location:record.php");
exit();

  }
}

if (!empty($_POST['record_button'])) {
 if (!isset($_POST)) {
    $error['book_record'] = 'error';
  
}else{


 $star=$_SESSION['score'];
 $reveiw=$_POST['textinput'];
 $start_date=$_POST['date'];
 $end_date=$_POST['date2'];
 $sql =sprintf('SELECT `book_id` FROM `books` WHERE `api_id` ="%s"',$bookid);

 $bookids2 = mysqli_query($db,$sql) or die(mysqli_error($db));
 $recordid2 = mysqli_fetch_assoc($bookids2);
 // var_dump($recordid2['book_id']);

 $sql=sprintf('INSERT INTO `records` (`record_id`, `user_id`, `stars`, `review`, `start_date`, `end_date`, `book_id`, `created`, `modified`) VALUES(NULL,"%s","%s","%s","%s","%s","%s",now(),now())',
mysqli_real_escape_string($db,$_SESSION['login_member_id']),
mysqli_real_escape_string($db,$star),
mysqli_real_escape_string($db,$reveiw),
mysqli_real_escape_string($db,$start_date),
mysqli_real_escape_string($db,$end_date),
mysqli_real_escape_string($db,$recordid2['book_id']));



mysqli_query($db,$sql) or die(mysqli_error($db));

$sql = 'UPDATE`users`INNER JOIN `records` ON `users`.`user_id` = `records`.`user_id` SET `users`.`point` = `users`.`point`+5 WHERE `users`.`user_id`='.$_SESSION['login_member_id'];
//SQL文実行
mysqli_query($db,$sql) or die(mysqli_error($db));

$_SESSION['true2']="true2";
}
}

if (isset($_POST['keyword1'])) {
$keyword[] = $_POST['keyword1'];

}
if (isset($_POST['keyword2'])) {
$keyword[] = $_POST['keyword2'];

}
if (isset($_POST['keyword3'])) {
$keyword[] = $_POST['keyword3'];
}

if (isset($_POST['keyword4'])) {
$keyword[] = $_POST['keyword4'];

}
if (isset($_POST['keyword5'])) {
$keyword[] = $_POST['keyword5'];

}
if (isset($_POST['keyword6'])) {
$keyword[] = $_POST['keyword6'];

}
if (isset($_POST['keyword7'])) {
$keyword[] = $_POST['keyword7'];

}
if (isset($_POST['keyword8'])) {
$keyword[] = $_POST['keyword8'];

}
if (isset($_POST['keyword9'])) {
$keyword[] = $_POST['keyword9'];

}
if (isset($_POST['keyword10'])) {
$keyword[] = $_POST['keyword10'];

}
if (isset($_POST['keyword11'])) {
$keyword[] = $_POST['keyword11'];

}
if (isset($_POST['keyword12'])) {
$keyword[] = $_POST['keyword12'];

}
if (isset($_POST['keyword13'])) {
$keyword[] = $_POST['keyword13'];

}


if (isset($keyword)) {
  $sql =sprintf('SELECT `record_id` FROM `records` WHERE `book_id` =%d AND `user_id` =%d',$recordid2['book_id'],$_SESSION['login_member_id']);

 $select_recordids = mysqli_query($db,$sql) or die(mysqli_error($db));
 $select_recordid = mysqli_fetch_assoc($select_recordids);
var_dump($select_recordid);

$cc = count($keyword);
for ($i=0; $i < $cc; $i++){
$sql =sprintf('INSERT INTO `record_keyword`(`record_keyword_id`,`record_id`,`keyword_id`) VALUES(NULL,%d,%d)',
mysqli_real_escape_string($db,$select_recordid['record_id']),
mysqli_real_escape_string($db,$keyword[$i])); 

mysqli_query($db,$sql) or die(mysqli_error($db));

}  
if (isset($_POST['record_button'])) {
unset($_SESSION['book']['title']);
}
header("Location:mypage.php");
exit();

}








// var_dump($_SESSION['book']);
// var_dump($_SESSION['book']['$categorie']);












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
    <link rel="stylesheet" href="css/jquery.raty.css">
    <link rel="stylesheet" href="css/share.css">    
    <link rel="stylesheet" href="css/header.css">
    <link href="colorbox-master/example1/colorbox.css" rel="stylesheet" />
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
         <img id="icon" src="images/penicon.png">
           <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-9">
                          <div class="form-group">
<?php if(isset($error['book_record'])) { ?>
  <p class="error">*記入欄を埋めてください</p>
<?php } ?>


  <label>タイトル/作者</label>

   
<div class="col-ms-4">

    
<form method="get" action="record_result.php" name="検索">
   
  
  
   <?php if(empty($_SESSION['book']['title'])): ?>
     <input id="serch" type="text" name="title" value="">
    <?php else: ?>
    <input id="serch" type="text" name="title" value="<?php echo $booktitle; ?>">
    <?php endif; ?>
     <button><a href="record_result.php?title=<?php echo $booktitle; ?>"><i class="fa fa-search" aria-hidden="true"></i></a></button>
<?php if(isset($error['title'])) { ?>
  <p class="error">*タイトルを入力してください</p>
<?php } ?>


                        </div>
                      
                    </div>
                    <div id="star"><label>評価</label></div>
                  </div>
                </div>


 </form>


 <form method="post" action="record.php" name="book_record">

 
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
      <input type="checkbox" name="keyword1" id="keyword-0" value="1">
      予想外
    </label> 
    <label class="checkbox-inline" for="keyword-1">
      <input type="checkbox" name="keyword2" id="keyword-1" value="2">
      どんでん返し
    </label> 
    <label class="checkbox-inline" for="keyword-2">
      <input type="checkbox" name="keyword3" id="keyword-2" value="3">
      ヤバい
    </label> 
    <label class="checkbox-inline" for="keyword-3">
      <input type="checkbox" name="keyword4" id="keyword-3" value="4">
      面白い
    </label> 
    <label class="checkbox-inline" for="keyword-4">
      <input type="checkbox" name="keyword5" id="keyword-4" value="5">
      ぶっ飛んでいる
    </label> 
    <label class="checkbox-inline" for="keyword-5">
      <input type="checkbox" name="keyword6" id="keyword-5" value="6">
      怖い
    </label> 
    <label class="checkbox-inline" for="keyword-6">
      <input type="checkbox" name="keyword7" id="keyword-6" value="7">
      つまらない
    </label> 
    <label class="checkbox-inline" for="keyword-7">
      <input type="checkbox" name="keyword8" id="keyword-7" value="8">
      びっくり
    </label>
    <label class="checkbox-inline" for="keyword-8">
      <input type="checkbox" name="keyword9" id="keyword-8" value="9">
      とりあえず読め
    </label> 
    <label class="checkbox-inline" for="keyword-9">
      <input type="checkbox" name="keyword10" id="keyword-9" value="10">
      価値観が変わる
    </label>
    <label class="checkbox-inline" for="keyword-10">
      <input type="checkbox" name="keyword11" id="keyword-10" value="11">
     　考えさせられる
    </label>
    <label class="checkbox-inline" for="keyword-11">
      <input type="checkbox" name="keyword12" id="keyword-11" value="12">
      元気づけられる
    </label>
       <label class="checkbox-inline" for="keyword-12">
      <input type="checkbox" name="keyword13" id="keyword-12" value="13">
      胸キュン
    </label>
  </div>
</div>

</fieldset>


                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">読み始め</label>
                        <div class="col-sm-9 date">
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">読み終わり</label>
                        <div class="col-sm-9 date2">
                            <input type="date" class="form-control" id="date" name="date2">
                        </div>
                    </div>    
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <input type="submit" name="record_button" value="記録">
                            
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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.raty.js"></script>
    <script type="text/javascript">
$.fn.raty.defaults.path = "images";
$('#star').raty({
     number:5,
    

     click: function(score, evt) {
          $.post('./star_result.php',{score:score},
          function(data){
               
          });
     }
});
</script>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="colorbox-master/jquery.colorbox-min.js"></script>
    <script src="colorbox-master/i18n/jquery.colorbox-ja.js"></script>
    <script>
   $(document).ready(function(){
      $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
   });
</script>




    
</body>
</html>