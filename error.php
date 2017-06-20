
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>確認ページ</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/error.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">

    <!-- =======================================================
        Theme Name: Company
        Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <body>
  <header>        
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                       <!--  <div class="navbar-brand"> -->

                         <!--  <div class="row">
                            <div class="span12"> -->
                  <!-- <form class="form-search form-horizontal pull-right" action="book_result.php" method="get">
                  <div class="input-append span12">
                  <input type="text" name="search_word" class="mac-style" placeholder="Search"><button class="btn btn-success" type="submit"><i class="icon-search"><span class="glyphicon glyphicon-search"></span></button>

                       </div>

                                </form> -->
                    <!--         </div>
                          </div> -->

                   <!--      </div> -->
                    </div>

                    <div class="navbar-collapse collapse">
                        <div class="menu">
                            <ul class="nav nav-tabs" role="tablist">
                            <?php if(isset($_SESSION['login_member_id'])){?>
                                <li role="presentation"><a href="user_top.php"><?php }else{?><li role="presentation"><a href="top.php"><?php }?>Home</a></li>
                                <?php if(isset($_SESSION['login_member_id'])){?>
                                <li role="presentation"><a href="mypage.php" class="active">My Page</a></li>
                                <li role="presentation"><a href="logout.php">Logout</a></li>
                                <?php }else{} ?>
                            </ul>
                        </div>
                    </div>
                </div>
        </nav>
    </header>


    <section id="contact-page">
    <div class="kabe">
    <div class="container">
            <div class="row main">
                <div class="main-login main-center">
                    <form class="form-horizontal" method="post" action="#">
                        
                        <div class="form-group">
                        <h4>ここから先は会員限定です。</h4>
                            <div class="cols-sm-10">
 <a href="register.php">会員登録ページへ</a>|
 <a href="top.php">Topへ戻る（ログイン）</a>
                            </div>
                        </div>

                    </form>
                </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="assets/js/bootstrap.js"></script>
<!--/#contact-page-->

    </section>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.1.min.js"></script>  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
    <script src="js/wow.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js/functions.js"></script>
    <script src="contactform/contactform.js"></script>
    
</body>
</html>