
<?php
session_start();

if(!empty($_POST['score'])){
$_SESSION['score']= $_POST['score'];
}

?>
