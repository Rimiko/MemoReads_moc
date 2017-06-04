<?php 
session_start();
require('dbconnect.php');

if(isset($_POST) && !empty($_POST)){
$sql = sprintf('UPDATE `users` SET `name`= "%s" ,`avatar_id`=%d,`hobby`="%s",`job`="%s",`great_man`="%s",`comment`="%s",`point`=%d WHERE `user_id`=1',
    mysqli_real_escape_string($db,$_POST['name']),
    mysqli_real_escape_string($db,$_POST['avatar_id']),
    mysqli_real_escape_string($db,$_POST['hobby']),
    mysqli_real_escape_string($db,$_POST['job']),
    mysqli_real_escape_string($db,$_POST['great_man']),
    mysqli_real_escape_string($db,$_POST['comment']),
    mysqli_real_escape_string($db,$_POST['point'])
    );
    //SQL文実行
    mysqli_query($db,$sql) or die(mysqli_error($db));
    //一覧に戻る
    header("Location: mypage.php");
    exit();

}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>sample</title>
</head>
<body>

            <form method="post" action="" class="form-horizontal" role="form">
              <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your name">
              <input type="text" class="form-control" name="hobby" id="name"  placeholder="Enter your hobby">
              <input type="text" class="form-control" name="job" id="name"  placeholder="Enter your job">
              <input type="text" class="form-control" name="great_man" id="name"  placeholder="Enter your great_man">
              <input type="text" class="form-control" name="comment" id="name"  placeholder="Enter your comment">
              <input type="text" class="form-control" name="avatar_id" id="name"  placeholder="Enter your avatar_id">
                <input type="submit" class="btn btn-info" value="保存">
            </form>

            


</body>
</html>