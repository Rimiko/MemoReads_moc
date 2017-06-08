<?php
if (!empty($_REQUEST)) {
	# code...

$query = $_REQUEST['title']; 


$query = rawurlencode($query); 
 // var_dump($query); 
$url = "https://www.googleapis.com/books/v1/volumes?q=" . $query;
$json = file_get_contents($url);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$json_decode = json_decode($json);
// echo "<pre>";
// var_dump($json_decode);
// echo "</pre>";
// jsonデータ内の『entry』部分を複数取得して、postsに格納
$posts = $json_decode->items;
// echo "<pre>";
// var_dump($posts);
// echo "</pre>";



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
        $authors[] = array('なし');
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
<!-- <!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<form method="post" action="">
<input type="text" name="word" value="">
<button>検索</button>
</form>
</body>
</html> -->
