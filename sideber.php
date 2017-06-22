
<!-- サイドバー -->
<?php

// session_start();

// bdconnect.php をよみこむ
require('dbconnect.php');


if (isset($_SESSION['login_member_id'])){

$sql = 'SELECT * ,`avatar`.`avatar_path`FROM `users` INNER JOIN `avatar` ON `users`.`avatar_id` = `avatar`.`avatar_id` WHERE `users`.`user_id` ='.$_SESSION['login_member_id'];



$avatars = mysqli_query($db,$sql) or die(mysqli_error($db));
$avatar_array = array();
$avatar = mysqli_fetch_assoc($avatars);
$avatar_array[] = $avatar;

}

?>


 <?php foreach($avatar_array as $avatar_each){?>

            <div class="profile-sidebar"
            style="width:262px; margin-top: 154px;">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="images/<?php echo $avatar_each['avatar_path']?>" class="img-responsive" alt="">

                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">

                        <h4>ようこそ <strong><?php echo $avatar_each['name']; ?></strong>さん</h4>
                    </div>
                     <div class="container">
                        <div class="row ptlv">
                            <div class="text-center date-body" style="width:100px">
                              <label for="" class="date-title">Point</label>
                              <div class="date-content">
                                <p class="dia"><strong><?php echo $avatar_each['point']?></strong> pt</p>

                              </div>
                            </div>
                                <div class="text-center date-body" style="width:100px">
                              <label for="" class="date-title">Level</label>
                              <div class="date-content">


                                <p class="dia"><strong><?php echo $avatar_each['level']?></strong> Lv.</p>
                              </div>
                            </div>
                        </div>
                    </div><?php } ?>
                </div>

                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm"><a href="mypage_edit.php" style="color:#333333;">編集ページ</a></button>
                    <button type="button" class="btn btn-danger btn-sm"><a href="record.php" style="color:white;">記録ページ</a></button>
                </div>

        </div>

