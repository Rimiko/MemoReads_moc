<?php
  session_start();
 require('dbconnect.php');

 //自動ログいん処理
 if (isset($_COOKIE['email']) && !empty($_COOKIE['email'])) {
    // 読むときはグローバル変数でできる,emailが入っているということはパスワードも入っていると「認識される
    // COOKIEに保存されているログイン情報が入力されてPOST送信されてきたかのように$_POSTに値を代入
      $_POST['email'] = $_COOKIE['email'];
      $_POST['password'] = $_COOKIE['password'];
      $_POST['save'] = 'on';
  } 


// post送信されていたら、emailとパスワードの入力チェックを行い、どちらかがor 両方が未入力の場合「メールアドレスとパスワードをご記入ください」とパスワード入力欄の下に表示
// $error['login']にblankという文字をセットして判別できるようにすること
if (!empty($_POST)) {
  if(empty($_POST['email'])){
    $error['login'] = 'blank';
  }


if(empty($_POST['password'])){
 $error['login'] = 'blank';
  }

if(empty($error)){
  // login処理
  // 入力されたemail,passwordでDBから会員情報を取得できたら、正常ログイン。取得できなかったら、$error['login']に　faildを代入して、パスワードの下に「ログインに失敗しました。正しくご記入ください」
  $sql = sprintf('SELECT `user_id`,`password`, `user_id` FROM `users` WHERE  `email` = "%s" AND `password` = "%s"',
 mysqli_real_escape_string($db,$_POST['email']),
 mysqli_real_escape_string($db,sha1($_POST['password']))
  );
    
  //SELECT分を記述！
  // sql実行
  $record = mysqli_query($db,$sql) or die(mysqli_error($db));
  if ($table = mysqli_fetch_assoc($record)){
     //login 成功

    // SESSION変数に会員IDを保存
      $_SESSION['login_member_id'] = $table['member_id'];
    // SESSION変数にログイン時間を保存
      $_SESSION['time'] = time();
      // 自動ログインをオンにしてたらcookieにログイン情報を保存する
      if($_POST['save']=='on'){
        // setcookie(保存するキー,保存する値,保存する期間（秒）)
        setcookie('email',$_POST['email'],time() + 60*60*24*14);
        setcookie('password',$_POST['password'],time() + 60*60*24*14);

      }

    // ログイン後のindex.php（ドップページ）に遷移
      header("Location: user_top.php");
      exit();
  }else{
    //login 失敗
    $error['login'] = 'faild';
  }
} 
} 
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MemoReads</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/form.css" rel="stylesheet">
    <link href="assets/css/timeline.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

  </head>
  <body>
  

  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 content-margin-top">
        <legend>ログイン</legend>
        <form method="post" action="" class="form-horizontal" role="form">
          <!-- メールアドレス -->
          <div class="form-group">
            <label class="col-sm-4 control-label">メールアドレス</label>
            <div class="col-sm-8">
              <input type="email" name="email" class="form-control" placeholder="例： seed@nex.com">
                
            </div>
          </div>
          <!-- パスワード -->
          <div class="form-group">
            <label class="col-sm-4 control-label">パスワード</label>
            <div class="col-sm-8">
              <input type="password" name="password" class="form-control" placeholder="">
              <?php if(isset($error['login']) && $error['login'] == 'blank'){ ?>
                  <p class ="error">*メールアドレスとパスワードをご記入ください</p>
            <?php } ?>
            <?php if(isset($error['login']) && $error['login'] == 'faild'){ ?>
                  <p class ="error">＊ログイン失敗しました。正しくご記入ください。</p>
            <?php } ?>
             </div>
          </div>
          <!-- 自動ログインのチェックボックス -->
          <div class="form-group">
            <label class="col-sm-4 control-label">自動ログイン</label>
            <div class="col-sm-8">
            <input type="checkbox" name="save" value="on">
            </div>
          </div>
          <input type="submit" class="btn btn-default" value="ログイン">
        </form>
      </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery-3.1.1.js"></script>
    <script src="../assets/js/jquery-migrate-1.4.1.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
  </body>
</html>
