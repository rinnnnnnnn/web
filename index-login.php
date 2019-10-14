<!DOCTYPE html>
<html>
<head>
<title>Take a Photo</title>
<meta charset="UTF-8">
<style type="text/css">
*{padding:0;margin:0;}
html{
    height: 100%;
    width: 100%;

}
body{
    height: 100%;
    width: 100%;
}
.left{
    width: 200px;
    background-color: #FFFFFF;
    display: block;
}
.right{
    position: absolute;
    float: right;
    left: 200px;
    top:0;
    background-color: #FFF0F5;
    display: block;
}
.headline{
    background-color: #FFFFFF; 
    height: 54px; 
    margin: 0; 
    border: 0;
    padding-top: 20px
}
.button{
    width: 100px; 
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
}
.box .pic img {
    display: block;
    width: 100%;
}
.box .pic video {
    display: block;
    width: 100%;
}
p{
    text-indent:5px;
    font-size: 14px;
}
</style>
</head>
<body>
<div class="left">
<img src="images/index.jpg" width="200px">
<p><?php if (!session_id()) session_start(); echo $_SESSION['username'];?>さん、こんにちは！</p>
<p>今日もよろしくお願いします。</p>
<p>気軽いにご覧ください！</p>
</div>
<div class="right">
<div class="headline">
<div style="border:0; float: right">
<botton class="button"><?php if (!session_id()) session_start(); echo $_SESSION['userid']."   ".$_SESSION['username']."   ";?><a href="mypage.php">マイページ</a></botton>
</div>
</div>
<div style="height: 50px"></div>
<div class="main" id="main">

<?php
$dsn = '///////////';
$user = '/////////';
$password = '///////////';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$sql = "SELECT id FROM login";
$stmt = $pdo->query($sql);
$results = $stmt->fetchAll();
foreach ($results as $row){
    $id = $row['id'];
    $sql = "SELECT username,comment,filename FROM upload WHERE userid='$id'";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
		$filename = $row['filename'];
		$comment = $row['comment'];
        $username = $row['username'];
        
        $type = substr(strrchr($filename, '.'), 1);

        if($type == "mp4"){
        echo "<div class='box'>";
        echo "<div class='pic'>";
        echo "<video width='220px' controls>";
        echo "<source src='upload/".$filename."' type='video/mp4'>";
        echo "<object data='movie.mp4' width='320'>";
        echo "</object></video>";
        echo $comment."<br>by. ".$username;
        echo "</div>";
        echo "</div>";

        }
        else{
        echo "<div class='box'>";
        echo "<div class='pic'><img src='upload/".$filename."' width='100%'><br>".$comment."<br>by. ".$username."</div>";
        echo "</div>";
        
        }


    }

    }

?>
</div>

</div>
</body>
</html>
