<?php

session_start();

// formからデータがPOST送信された時
if(!empty($_POST)){
  // 　　　　　↑スーパーグローバル変数
  // エラー項目の確認
  // ニックネームのチェック
 if($_POST['nick_name']== ''){
   // 変数に行ったん入れる
  $error['nick_name'] = 'blank';
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
 // $fileName = $_FILES['picture_path']['name'];
 // if (!empty($fileName)) {
    
 //    // 空でなければ拡張子を取得
 //    // ファイルネームの後ろから３文字分、字を切り出す
 //    $ext = substr($fileName, -3);
 //    $ext = strtolower($ext);

 //     if ($ext != 'jpg' && $ext != 'gif' && $ext != 'png') {
 //       $error['picture_path'] = 'type' ;
 //     }
 // }

 // エラーがない場合
 // if (empty($error)){
 //  // 画像をアップロード
 //  $picture_path = date('YmdHis') . $_FILES['picture_path']['name'];
 //  move_uploaded_file($_FILES['picture_path']['tmp_name'], '../member_picture/' . $picture_path);
 //  // セッションに値を保存
 //  $_SESSION['join'] = $_POST;
 //  $_SESSION['join']['picture_path'] = $picture_path; 
  // リダイレクト処理を実行する関数header()
   header('Location: check.php');
 }

 
 // 書き直しの処理
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'rewrite') {
    $_POST = $_SESSION['join'];
    $error['rewrite'] = true;
}
?>