<?php
session_start();
if(!empty($_SESSION)){
var_dump($_SESSION['score']);

}
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="css/jquery.raty.css">
</head>
<body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.raty.js"></script>



<div></div>
<div class="star"></div>

<script type="text/javascript">
$.fn.raty.defaults.path = "images";
$('div').raty({
     click: function(score, evt) {
          $.post('./star_result.php',{score:score},
          function(data){
               location.href = './star.php';
          });
     }
});
</script>
<script>
$(function raty() {
     $(".star").raty({
          number: 5,
          score : <?php echo $users_each['stars'];?>
     });
});
</script>
</body>
</html>