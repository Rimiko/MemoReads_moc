<?php  
session_start();
require('api.php');

//何も入れずに検索した場合の処理
if ($_REQUEST['title'] == '') {
  header('Location: mypage_edit.php?title=');
  exit();

}


if(isset($_REQUEST['book_select'])){
    $a=$_REQUEST['book_select'];
    $_SESSION['book']['title']=$titles[$a];
    $_SESSION['book']['pic']=$pics[$a];
    $_SESSION['book']['author']=$authors[$a][0];
    $_SESSION['book']['description']=$descriptions[$a];
    $_SESSION['book']['bookid']=$bookids[$a];
    $_SESSION['book']['categorie']=$categories[$a];


    header("Location:mypage_edit.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>record_result</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/record_result.css"> 

</head>
<body id="allbox">
<div>
<h1><img src="images/books.PNG">選択してください</h1>
        
<form method="post" action="">
<div class="row">
<?php for ($i=0; $i < 9 ; $i++): ?>
                   
       
                    <div class="portfolio-item bootstrap wordpress col-xs-6 col-sm-6 col-md-6 serch"  style="width: 380px;height: 225px;">

                   
<label>

      <input type="radio" name="book_select" id="radios-0" value="<?php echo $i; ?>" checked="checked">
            <div class="well well-sm">
                <div class="books" style="width:390px; height:170px;">
                    <div class="col-sm-6 col-md-6" style="width: 170px;">
                    <?php if($pics[$i] == 'なし'): ?>
                      
                      <img src="images/noimage.PNG" style="width: 100px;height:170px;">
                    <?php else: ?>
                      <img src="<?php echo $pics[$i]; ?>"  style="width: 100px;height:170px;">
                    <?php endif ?>
                    
                    </div>

  
                    <div class="col-sm-6 col-md-6">
                   
                    <h5>タイトル</h5>
<h5><?php echo  $titles[$i]; ?></h5>
<!-- <?php var_dump($authors); ?> -->
<?php if (!isset($authors[$i])): ?>
    <h5>なし</h5>
          <?php else: ?>
            <h5><?php echo "著者:" .$authors[$i][0]; ?></h5>

   
     <?php endif; ?>
    

                    
                   
                   </div>
                  </div>
                 </div>
                </label>     
              </div>

           <?php endfor; ?>

   <button id="choose" style="width:50px; height:30px">選択</button>
   </div>
  </form>
 </div>


</body>
</html>  
    
