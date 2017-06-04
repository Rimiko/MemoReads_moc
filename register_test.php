<?php 

session_start();

var_dump($_POST);
// var_dump($_REQUEST);
$name = '';
$email = '';
$password = '';
$password_2 = '';
$error[] = array();

if(!empty($_POST)){
	if(empty($_POST['name'])){
		$error['name'] = 'blank';
		echo 'a';
	}else {
		$name= $_POST['name'];
	}
	if(empty($_POST['email'])){
		$error['email'] = 'blank';
		echo 'a2';
	}else{
		$email = $_POST['email'];
	}
// パスワード
if(empty($_POST['password'])){
	$error['password'] = 'blank';
	echo 'c';
}elseif(strlen($_POST['password']) < 4){
	$error['password'] = 'length';
	echo "f";
}else{
	$password= $_POST['password'];
	echo 'k';
}
// 確認用パスワード
if(empty($_POST['password_2'])){
	$error['password_2'] = 'blank';
	echo 'd';
}elseif($password !== $_POST['password_2']){
	$error['password_2'] = 'notsame';
	echo 'd2';
}


}



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <form action="" method="POST">
 	<input type="name" name="name" value="<?php echo $name; ?>">
 	<?php if(isset($error['name']) && $error['name'] == 'blank'): ?>
 		<p>名前を入力してください</p>
 	<?php endif; ?>
 	<input type="email" name="email" value="<?php echo $email; ?>">
 	<?php if(isset($error['email']) && $error['email']=='blank'): ?>
 		<p>emailを入力してください</p>
 	<?php endif; ?>
 	<input type="password" name="password" value="<?php echo $password; ?>">
 	<?php if(isset($error['password']) && $error['password'] == 'blank' ):?>
 	 <p>パスワードが未入力です</p>
 	<?php elseif(isset($error['password']) && $error['password'] == 'length' ): ?>
 	<p>パスワードは４文字以上入力してください</p>
 	<?php endif; ?>
 		<input type="password" name="password_2" value="<?php echo $password_2; ?>">
 	<?php if(isset($error['password_2']) && $error['password_2'] == 'blank' ):  ?>
 		<p>確認用パスワードを入力してください</p>
 	<?php elseif(isset($error['password_2']) && 'notsame'): ?>
 		<p>パスワードが一致しません</p>
 	<?php endif; ?>
 		
 	

 	<button>submit</button>
 	</form>	

 </form>
</body>
</html>