<?php 
 session_start();
 require('dbconnect.php');
   $sql = 'SELECT `name`,`avatar_id`,`point`,`level` FROM `users` WHERE `user_id`=1';

   $test_u = mysqli_query($db,$sql) or die(mysqli_error($db));
   $user = mysqli_fetch_assoc($test_u);

var_dump($test_u);


    if(isset($_REQUEST['record_id'])){
        
    $sql = 'UPDATE `users` SET `level` = `level`+1 WHERE `point`=`point`+10';
    $level = mysqli_query($db,$sql) or die(mysqli_error($db));
    $level_up = mysqli_fetch_assoc($level);

    // アバター進化
    $sql = 'UPDATE `users` SET `avatar_id`=`avatar_id`+1 WHERE `user_id`=1';
            
     $evolution = mysqli_query($db,$sql) or die(mysqli_error($db));
     $e = mysqli_fetch_assoc($evolution);
 }elseif{

 }



    $sql = 'UPDATE `users` SET `level` = `level`+1 WHERE `point`=`point`+10';
    $level = mysqli_query($db,$sql) or die(mysqli_error($db));
    $level_up = mysqli_fetch_assoc($level);

   

?>
<!-- サイドバー -->
  <div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar"
            style="width:262px; margin-top: 154px;">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="images/dog.jpg" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        
                    </div>
 <div class="container">
    <div class="row ptlv">
        <div class="text-center date-body" style="width:100px">
          <label for="" class="date-title">Point</label>
          <div class="date-content">
            <p class="dia"><strong><?php echo $user['point']; ?></strong> pt</p>
          </div>
        </div>
            <div class="text-center date-body" style="width:100px">
          <label for="" class="date-title">Level</label>
          <div class="date-content">
            <p class="dia"><strong><?php echo $user['level']; ?></strong> Lv.</p>
          </div>
        </div>
    </div>
</div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">編集ページ</button>
                    <button type="button" class="btn btn-danger btn-sm">記録ページ</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->

                <!-- END MENU -->
            </div>
        </div>
    </div>
