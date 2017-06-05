<?php
if (!empty($_POST)) {
	# code...

$query = $_POST['word']; 


$query = rawurlencode($query); 
 var_dump($query); 
$url = "https://www.googleapis.com/books/v1/volumes?q=" . $query;
$json = file_get_contents($url);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$json_decode = json_decode($json);
echo "<pre>";
var_dump($json_decode);
echo "</pre>";
// jsonデータ内の『entry』部分を複数取得して、postsに格納
$posts = $json_decode->items;
// echo "<pre>";{
// var_dump($posts);
// echo "</pre>";}



$c = count($posts); 

for ($i=0; $i < $c; $i++){ 
    if (isset($posts[$i]->volumeInfo->title)) { 
       $titles[] = $posts[$i]->volumeInfo->title; 

    }else{
        $titles[] = 'なし';
    }

    if (isset($posts[$i]->volumeInfo->authors)) { 
       $authors[] = $posts[$i]->volumeInfo->authors; 

    }else{
        $authors[] = 'なし';
    }
    if (isset($posts[$i]->volumeInfo->description)) { 
       $descriptions[] = $posts[$i]->volumeInfo->description; 

    }else{
        $descriptions[] = 'なし';
    }

    if (isset($posts[$i]->volumeInfo->imageLinks->thumbnail)) { 
       $pics[] = $posts[$i]->volumeInfo->imageLinks->thumbnail; 

    }else{
        $pics[] = 'なし';
    }
}
}


	 
	

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="">
<input type="text" name="word" value="">
<button>検索</button>


<!-- <?php for ($i=0; $i < $c; $i++) : ?>
<?php echo $titles[$i]; echo"<br>"?>
<?php endfor ; ?>

<?php for ($i=0; $i < $c; $i++) : ?>
<?php foreach ($authors[$i] as $author) {
	echo  ":" .$author ; 
} ?>
<?php echo"<br>"; ?>
<?php endfor ; ?>


<?php for ($i=0; $i < $c; $i++) : ?>
<?php echo $descriptions[$i]; echo"<br>" ?>
<?php endfor ; ?> -->
 

<!-- <?php for ($i=0; $i < $c; $i++) : ?> -->
<!-- <?php if ($pics[$i] == "なし" ): ?> -->
    <!-- 条件式Ａが「TRUE」のときに呼び出すHTMLブロック -->
   <!--  <h1>なし</h1> -->
	<!-- <?php else: ?>  -->
   <!--  条件式Ａが「FALSE」で、条件式Ｂが「TRUE」のときに呼び出すHTMLブロック -->
   <!-- <img src="<?php echo $pics[$i]; ?>";">
   <?php echo "<br>"; ?> -->

<!-- 
<?php endif; ?>	
<?php endfor ; ?>
 --> 
<?php echo "<br>"; ?>
  <?php if (!empty($_POST)): ?>

    <?php for ($i=0; $i < $c; $i++) :?>
    	
      <img src="<?php echo $pics[$i]; ?>">
 

      <h1>タイトルは<?php echo $titles[$i]; ?>です</h1>
      <p>サブタイトルは<?php echo $descriptions[$i]; ?></p>

      <?php foreach ((array)$authors[$i] as $au): ?>
          <p>著者は<?php echo $au ?>です</p>
      <?php endforeach; ?>
    <?php endfor; ?>
<?php endif ;?>



</form>
</body>
</html>