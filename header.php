

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
                        <div class="navbar-brand">
                          <div class="row">
                            <div class="span12">



                  <form class="form-search form-horizontal pull-right" action="book_result.php" method="get">
                  <div class="input-append span12">
                  <input type="text" name="search_word" class="mac-style" placeholder="Search"><button class="btn btn-success" type="submit"><i class="icon-search"><span class="glyphicon glyphicon-search"></span></i></button>
                       </div>
                                </form>

                            </div>

                          </div>
                        </div>
                    </div>
                    <div class="navbar-collapse collapse">
                        <div class="menu">

                            <ul class="nav nav-tabs" role="tablist">
                            <?php if(isset($_SESSION['login_member_id'])){?>
                                <li role="presentation"><a href="user_top.php" style="color: #F7D76F; display: block; float: right;"><?php }else{?><li role="presentation"><a href="top.php"><?php }?>Home</a></li>
                                <?php if(isset($_SESSION['login_member_id'])){?>
                                <li role="presentation"><a href="mypage.php" class="active">My Page</a></li>
                                <li role="presentation"><a href="logout.php" style="color: #F7D76F;">Logout</a></li>
                                <?php }else{} ?>
                            </ul>
                        </div>
                    </div>
                </div>
        </nav>

    </header>



