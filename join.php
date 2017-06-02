<?php 
 session_start();

// formからデータがPOST送信された時
if(!empty($_POST)){
  // 　　　　　↑スーパーグローバル変数
  // エラー項目の確認
  // ニックネームのチェック
 if($_POST['name']== ''){
   // 変数に行ったん入れる
  $error['name'] = 'blank';
 }

  // email
 if($_POST['email']==''){
  $error['email'] = 'blank';
 }
// password(空チェック、文字の長さチェック：４文字以上)
 if($_POST['password']==''){
  $error['password'] = 'blank';
 }elseif(strlen($_POST['password']) < 4){
   $error['password'] = 'length';

 }
 // 画像ファイルの拡張子チェック($_FILES)
 $fileName = $_FILES['avatar_id']['name'];
 if (!empty($fileName)) {
    
    // 空でなければ拡張子を取得
    // ファイルネームの後ろから３文字分、字を切り出す
    $ext = substr($fileName, -3);
    $ext = strtolower($ext);

     if ($ext != 'jpg' && $ext != 'gif' && $ext != 'png') {
       $error['avatar_id'] = 'type' ;
     }
 }

 

 // if($POST['age'])

 // if($_POST['job'] = 'blanks';

 // エラーがない場合
 if (empty($error)){
  // 画像をアップロード
  $avatar_id = date('YmdHis') . $_FILES['avatar_id']['name'];
  move_uploaded_file($_FILES['avatar_id']['tmp_name'], '../member_picture/' . $avatar_id);
  // セッションに値を保存
  $_SESSION['join'] = $_POST;
  $_SESSION['join']['avatar_id'] = $avatar_id; 
  // リダイレクト処理を実行する関数header()
   header('Location: check.php');
 }
}
 
 // 書き直しの処理
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'rewrite') {
    $_POST = $_SESSION['join'];
    $error['rewrite'] = true;
}
?>
