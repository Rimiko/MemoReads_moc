<?php 
 require('dbconnect.php');

 $sql = sprintf('INSERT INTO `records`(`stars`) VALUES(%d);');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company-HTML Bootstrap theme</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/share.css">    
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/star.css">


    <!-- =======================================================
        Theme Name: Company
        Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <body>
    <?php include('header.php'); ?>

  <div id="allbox">
     　<div id="allbox-sub">
          <div class="container">
               
                <div id="b-box">
                   <div class="panel panel-default">
                        <div class="panel-body">
                          <form>

                              <!-- 本けんさく -->
                            <div class="form-group">
                                <label for="concept" class="col-sm-3 control-label">タイトル</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="concept" name="concept">
                                      <div class="form-group">
                                        <label class="col-ms-4 control-label" for="singlebutton"></label>
                                           <div class="col-ms-4">
                                             <button id="singlebutton" name="singlebutton" class="btn btn-primary">検索</button>
                                          </div>
                                      </div>
                                  </div>
                            </div>
                          

                          　　　　
                            <div class="form-group">

                                    <!-- 感想入力 -->
                                <label for="status" class="col-sm-4 control-label">感想</label>
                                <div class="col-sm-9">
                                    <div class="form-group"> 
                                      <div class="col-ms-4">
                                      　<textarea id="textinput" name="textinput" type="text" placeholder="book name" class="form-control input-ms" required=""> </textarea>
                                      </div>
                                    </div>
                                </div>    

                                    


                                    <!-- キーワード選択 -->
                                <div class="col-sm-9">
                                    <div class="form-group">
                                      <label class="col-ms-4 control-label" for="keyword">キーワード</label>
                                      <div class="col-ms-4"> 
                                        <label class="checkbox-inline" for="keyword-0">
                                          <input type="checkbox" name="keyword" id="keyword-0" value="1" checked="checked">
                                          予想外
                                        </label> 
                                        <label class="checkbox-inline" for="keyword-1">
                                          <input type="checkbox" name="keyword" id="keyword-1" value="2">
                                          面白い
                                        </label> 
                                        <label class="checkbox-inline" for="keyword-2">
                                          <input type="checkbox" name="keyword" id="keyword-2" value="3">
                                          笑える
                                        </label> 
                                        <label class="checkbox-inline" for="keyword-3">
                                          <input type="checkbox" name="keyword" id="keyword-3" value="4">
                                          つまらない
                                        </label> 
                                        <label class="checkbox-inline" for="keyword-4">
                                          <input type="checkbox" name="keyword" id="keyword-4" value="5">
                                          びっくり
                                        </label> 
                                        <label class="checkbox-inline" for="keyword-5">
                                          <input type="checkbox" name="keyword" id="keyword-5" value="6">
                                          胸キュン
                                        </label> 
                                        <label class="checkbox-inline" for="keyword-6">
                                          <input type="checkbox" name="keyword" id="keyword-6" value="7">
                                          元気
                                        </label> 
                                        <label class="checkbox-inline" for="keyword-7">
                                          <input type="checkbox" name="keyword" id="keyword-7" value="8">
                                          価値観変わる
                                        </label> 
                                        <label class="checkbox-inline" for="keyword-8">
                                          <input type="checkbox" name="keyword" id="keyword-8" value="9">
                                          とりあえず読め
                                        </label> 
                                        <label class="checkbox-inline" for="keyword-9">
                                          <input type="checkbox" name="keyword" id="keyword-9" value="10">
                                          考えさせられる
                                        </label>
                                      </div>
                                    </div>
                                </div>
                             
                                <!-- 星評価 -->
                                <div class="col-sm-9">
                                  <label for="input-1" class="control-label">星いくつ？</label>
                                  <!-- <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="1"> -->
                                　 <div class="row lead">
                                      <div id="stars" class="starrr"></div>
                                      　星 <span id="count">0</span> つ！
                                   </div>
                                </div>

                             　　<!-- 読書期間 -->
                                    <div class="form-group">
                                        <label for="date" class="col-sm-3 control-label">読み始め</label>
                                          <div class="col-sm-9">
                                              <input type="date" class="form-control" id="date" name="date">
                                          </div>
                                　　 </div>
                                    <div class="form-group">
                                      <label for="date" class="col-sm-3 control-label">読み終わり</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="date" name="date">
                                        </div>
                                  　</div>    
                                    <div class="form-group">
                                      <div class="col-sm-12 text-right">
                                          <button type="button" class="btn btn-default preview-add-button">
                                              <span class="glyphicon glyphicon-plus"></span> 記録する
                                          </button>
                                      </div>
                                  </div>
                        　　　</div>
                      </form>
                    </div>            
              </div>
            </div>   
          </div>
      </div>
  </div>
           <section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Developers</h2>
                <div class="footer">
            <div class="container">
                <!-- <div class="container"> -->
            <div class="developers">
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/rimiko.JPG">
                        <div><img class="image-circle" src="images/rimiko.JPG"> </div>  
                        <h2>Rimiko Fukumitsu</h2>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
                        <div><img class="image-circle" src="images/naru.JPG"></div> 
                        <h2>Naru<br> Nishimura</h2>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" >
                        <div><img class="image-circle" src="images/atsushi.JPG"></div>  
                        <h2>Atsushi Miyamoto</h2>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
                        <div><img class="image-circle" src="images/IMG_1696.jpg"></div> 
                        <h2>Ayumi <br>Maeda</h2>
                        
                    </div>
                </div>
            </div>
        </div>
            </div>    

            
                   </div>
            </div>        
        </div><!--/.container-->
    </section>
        </body>
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.1.min.js"></script>  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
    <script src="js/wow.min.js"></script>
    <!-- <script src="js/functions.js"></script> -->

    <!-- 星評価機能javascript -->
    <script>
        var __slice = [].slice;

        (function($, window) {
          var Starrr;

          Starrr = (function() {
            Starrr.prototype.defaults = {
              rating: void 0,
              numStars: 5,
              change: function(e, value) {}
            };

            function Starrr($el, options) {
              var i, _, _ref,
                _this = this;

              this.options = $.extend({}, this.defaults, options);
              this.$el = $el;
              _ref = this.defaults;
              for (i in _ref) {
                _ = _ref[i];
                if (this.$el.data(i) != null) {
                  this.options[i] = this.$el.data(i);
                }
              }
              this.createStars();
              this.syncRating();
              this.$el.on('mouseover.starrr', 'span', function(e) {
                return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
              });
              this.$el.on('mouseout.starrr', function() {
                return _this.syncRating();
              });
              this.$el.on('click.starrr', 'span', function(e) {
                return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
              });
              this.$el.on('starrr:change', this.options.change);
            }

            Starrr.prototype.createStars = function() {
              var _i, _ref, _results;

              _results = [];
              for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
              }
              return _results;
            };

            Starrr.prototype.setRating = function(rating) {
              if (this.options.rating === rating) {
                rating = void 0;
              }
              this.options.rating = rating;
              this.syncRating();
              return this.$el.trigger('starrr:change', rating);
            };

            Starrr.prototype.syncRating = function(rating) {
              var i, _i, _j, _ref;

              rating || (rating = this.options.rating);
              if (rating) {
                for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                  this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                }
              }
              if (rating && rating < 5) {
                for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                  this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                }
              }
              if (!rating) {
                return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
              }
            };

            return Starrr;

          })();
          return $.fn.extend({
            starrr: function() {
              var args, option;

              option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
              return this.each(function() {
                var data;

                data = $(this).data('star-rating');
                if (!data) {
                  $(this).data('star-rating', (data = new Starrr($(this), option)));
                }
                if (typeof option === 'string') {
                  return data[option].apply(data, args);
                }
              });
            }
          });
        })(window.jQuery, window);

        $(function() {
          return $(".starrr").starrr();
        });

        $( document ).ready(function() {
              
          $('#stars').on('starrr:change', function(e, value){
            $('#count').html(value);
          });
          
          $('#stars-existing').on('starrr:change', function(e, value){
            $('#count-existing').html(value);
          });
        });
</script>
    <!-- <script src="js/star.js"></script> -->
    
</body>
</html>