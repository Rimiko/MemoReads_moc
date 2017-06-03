<?php
  header('Content-Type: text/css; charset=utf-8');


  session_start();
  require('dbconnect.php');
?>
@charset "UTF-8";
/*プロフィール*/
input,
input::-webkit-input-placeholder{
    font-size: 11px;
    padding-top: 3px;

}


.containter h3{
    padding-bottom: 0;
    color: black;

}
.img-center{
    display: block;
    margin: 0px auto;
    text-align: center;
}
#img-profile{
    padding: 10px;
}
.container #img-profile{
    margin-top: 16px;
}
.margin-img{
    margin-right: 20px;
}
.text-center{
    margin-top: 10px;
}

@media(min-width: 767px){ /*Desktop*/
    .container #img-profile{
        margin-bottom: 16px;
    }
    .margin-well{
        margin-top: 16px;
        background-image: url(../images/paper.png);
        box-shadow: 5px 5px 5px rgba(0,0,0,1);
    }
}

@media(max-width: 767px){ /*Mobile and Tablet*/
    .margin-well{
        margin-top: 10px;

    }
}
h3{
    padding-left: 80px;

}

.bestbook-title{
    color: blue;
    border-bottom: 1px solid blue;
}
.bestbook strong{

}
.glyphicon{
    text-align: -webkit-right;
}
/*ポイントとレベル*/
/*.ptlv{
    margin-left: 50px;
}*/

.date-body{
  background-color: white;
  padding:0 5px 5px 5px;
  float: left;
  border: 1px solid green;
}
.date-body .date-title{
  color: green;
}


.date-body .date-content{
  background-color: white;
}
.date-body .date-content p.dia{
  margin: 0; font-size: 15px; font-weight: bold;
}
.nomargin{
  margin: 0;
}

.well p{
    padding-top: 10px;
    font-size: 15px;
}
.free strong{
    font-size:5px;
}

.fa-bookmark-o{
    color: red;
}

/*本棚*/
.container{
    margin: 0 auto;
}
.bookshelf {
/*    margin-left:300px;*/
    position: relative;
    width: 700px;
    height: 897px;
    margin-left: 200px;
    box-shadow:5px 5px 5px 5px rgba(0,0,0,1);

}

.absolute{
    float: left;
    position: absolute;
    padding:0px 10px 0px 10px;
    left: 30px;
    top:10px;
}

.absolute img{
padding-bottom: 15px;
opacity: 0.8;
}

.best{
    border: 5px solid;
    border-color: red;
}
.favorite{
    border: 5px solid;
    border-color: yellow;
}
.text-center{
    width: 700px;
    text-align: -webkit-center;
}
.containter{
 /*   width: 700px;*/
    text-align: -webkit-center;
    background-color: white;
    z-index: 1;
}
.shelf{
    border-radius: 20px;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
}
a:hover img{
    opacity: 1;
}
.paging li{
float: left;
list-style: none;
}
.paging .right{
    margin-left: 870px
}
.paging .left{
    margin-left: 30px
}



/*バックグラウンド*/
#background{
    background-image:url("../images/background.png");
    z-index:1;
    background-position:    top center;
    -moz-background-size:   cover;
/*    background-size:        cover;*/
    margin-bottom:0px;
    }
.aboutus{
        background-color:       rgba(0,0,0,0);
        margin-top: 50px;
    }
.aboutus h3{
    color:white;
}

    /*吹き出し*/
.detail{
position:relative;
}
.detail:hover:after{
content:"<?php echo $_SESSION['book_start'];?>-<?php echo $_SESSION['book_start'];?>";
display:block;
position:absolute;
margin-bottom: 70px;
bottom:0px;
left:0;
width:100px;
height:50px;
line-height:20px;
background-color:#fbd76f;
/*font-weight:bold;*/
text-align:center;
color:black;
}


