<html>
<head>
<title>マイページ</title>
<meta charset="UTF-8">
<style type="text/css">
*{padding:0;margin:0;}
html,body{background-color: #FFF0F5; margin: 0; padding: 0 height: 100%;}
.left{
    width:200px;
    height: 100%;
    background-color: #FFFFFF;
}
.right{
    position: absolute;
    top:0;
    left: 200px;
    right: 0;
    background-color: #FFF0F5;
    height: 100%;
}
.headline{
    background-color: #FFFFFF; 
    height: 54px; 
    margin: 0; 
    border: 0;
    padding-top: 20px}
.button{width: 100px; 
        height: 40px; 
        font-size: 20px; 
        font:"ＭＳ 明朝"; 
        border:0.5px; 
        margin-right:30px; 
        background-color: #FFFFFF;
        word-spacing: 1em;}


}
.main {
    -moz-column-count: 4;
    -webkit-column-count: 4;
    column-count: 4;
    -moz-column-width: 220px;
    -webkit-column-width: 220px;
    column-width: 220px
    -moz-column-gap: 10px;
    -webkit-column-gap: 10px;
    column-gap: 10px;
}

.box {
float: left;
padding: 15px 0 0 15px;
}
.pic {
    width: 220px;
    padding: 10px;
    margin: 0 5px 5px;
    -moz-page-break-inside: avoid;
    -webkit-column-break-inside: avoid;
    break-inside: avoid;
    background: white;
    box-sizing: border-box;
    -moz-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
    -webkit-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);

.box .pic img {
display: block;
width: 100%;
}
p{
    margin: 0,5px,0,5px;
}

</style>
</head>
<body>
<div class="left">
<img src="images/nothing.jpg" width="200px">
<p><?php if (!session_id()) session_start(); echo $_SESSION['username'];?>さん、こんにちは！</p>
<a href="upload.php">新規投稿</a><br>
<a href="index-login.php">ホームページへ</a><br>
</div>
<div class="right">
<div class="headline">
<div style="border:0; float: right">
<botton class="button"><?php if (!session_id()) session_start(); echo $_SESSION['userid']."   ".$_SESSION['username']."   ";?><a href="mypage.php">マイページ</a></botton>
</div>
</div>

<?php
$dsn = 'mysql:dbname=tb210282db; host=localhost';
$user = 'tb-210282';
$password = 'BGHZyT7Gvh';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

if (!session_id()) {
    session_start();
}
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];

$sql = "SELECT num,comment,filename FROM upload WHERE userid='$userid'";
$stmt = $pdo->query($sql);
$results = $stmt->fetchAll();
foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
    $num = $row['num'];
    echo $row['comment'];
    echo "<br>";
    $filename = $row['filename'];
    $type = substr(strrchr($filename, '.'), 1);

    if($type == "mp4"){
    echo "<video width='320' controls>";
    echo "<source src='upload/".$filename."' type='video/mp4'>";
    echo "<object data='movie.mp4' width='320'>";
    echo "</object></video>";

    }
    else{

    echo "<br><img src='upload/".$filename."' width='320px'>";
    }
    echo "<form action = 'edit.php' method = 'POST'>";
    echo "<div align='right'>";
    echo "<input type='hidden' name='num' value=".$num.">";
    echo "<input class='button' name='edit' type='submit' value='編集'>";
    echo "<input class='button' name='delete' type='submit' value='削除'>";  
    echo "</div></form>";
    echo "<hr>";
    }

?>


</div>
</body>
</html>
