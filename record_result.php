<?php  
require('api.php');



if ($_REQUEST['title'] == '') {
  header('Location: record.php');
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
<body>
<div id="a-box">
<h1>選択</h1>
        
<form method="post">
　　　　　　　<?php for ($i=0; $i < $c ; $i++): ?>
                   
       
                    <div class="portfolio-item bootstrap wordpress col-xs-6 col-sm-6 col-md-6 serch"  style="width: 380px;height: 225px;">

                   
<label>
      <input type="radio" name="book-select" id="radios-0" value="<?php echo $i ?>" checked="checked">
            <div class="well well-sm" >
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="width: 170px;">
                     <img src="<?php echo $pics[$i]; ?>"  style="width: 100px;height:170px;">
                    </div>

  
                    <div class="col-sm-6 col-md-6">
                   
                    <h5>タイトル</h5>
　　　　　　　　　　　<h5><?php echo  $titles[$i]; ?></h5>
<!-- <?php var_dump($authors); ?> -->
<?php if (!isset($authors[$i])): ?>
    <h5>なし</h5>
          <?php else: ?>
            <?php foreach ($authors[$i] as $au): ?>　
　　　　　　　　　　　<h5><?php echo "著者:" .$au; ?></h5>

    <?php endforeach; ?>
     <?php endif; ?>
     </label>

                    
                   </div>

                  </div>
                   
                </div>

              

              </div>
             
       
              
         
      
  <?php endfor; ?>

  <input type="submit" value="選択">

  </form>


                  
  

                  







</body>
</html>  
    
