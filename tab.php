 
<script type="text/javascript"><!--
function ChangeTab(tabname) {
// 全部消す

 document.getElementById('tab1').style.display = 'none';
   document.getElementById('tab2').style.display = 'none';
   document.getElementById('tab3').style.display = 'none';
   // 指定箇所のみ表示
   document.getElementById(tabname).style.display = 'block';
}
// --></script>

<!-- <div class="tabbox">
   <p class="tabs">
      <a href="#tab1" class="tab1">タブ1</a>
      <a href="#tab2" class="tab2">タブ2</a>
      <a href="#tab3" class="tab3">タブ3</a>
   </p> -->
<div class="tabbox">

   <ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" href="#tab1"
                onclick="ChangeTab('tab1');return false;">TOP</a></li>

                <li><a class="btn btn-default" href="#tab2"
                onclick="ChangeTab('tab2');return false;">BOOK</a></li>
                <li><a class="btn btn-default" href="#tab3"
                onclick="ChangeTab('tab3');return false;">ユーザー</a></li>
                <!-- <li><a class="btn btn-default" href="#">キーワード</a></li> -->
            </ul><!--/#portfolio-filter-->
   <div id="tab1" class="tab">
      <p></p>
   </div>
   <div id="tab2" class="tab">
      <p><a href="user.php"></a></p>
   </div>
   <div id="tab3" class="tab">
      <p><a href="book.php"></a></p>
   </div>
</div>

 
            <script type="text/javascript"><!--
   // デフォルトのタブを選択
   ChangeTab('tab1');
// --></script>











<style type="text/css">
/* ▼(A)表示領域全体 */
div.tabbox { margin: 0px; padding: 0px; width: 400px; }
