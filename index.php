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
    width: 1000px;
    top:0;
    background-color: #FFF0F5;
    display: block;
    min-height: 100%;
}
.headline{
    position: absolute;
    display: block;
    width: 1000px;
    background-color: #FFFFFF; 
    height: 54px; 
    margin: 0; 
    border: 0;
    padding-top: 20px;
    z-index: 9999;
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

#gallery-wrapper {
  position: relative;
  max-width: 100%;
  width: 1000px;
  top: 100px;
}
img.thumb {
  width: 200px;
}
video.thumb {
  width: 200px;
}
.white-panel {
  position: absolute;
  background: white;
  border-radius: 5px;
  box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
  padding: 10px;
  width: 200px;
  margin: 10px;
}

.white-panel:hover {
  box-shadow: 1px 1px 10px rgba(0,0,0,0.5);
  margin-top: -3px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}     
        }
</style>
</head>
<body>
<div class="left">
    <img src="images/index.jpg" width="200px">
    <p>ようこそ、Take a Photoへ！</p>
    <p>こちらは、撮影愛好者たちの写真交流プラットフォームです！</p>
    <p>気軽いにご覧ください！</p>
</div>
<div class="right">
<div class="headline">

<div style="border:0; float: right">

<input class="button" name="login" type="button" value="ログイン"  onclick="location.href='login.html'" />
<input class="button" name="newlogin" type="button" value="新規登録"  onclick="location.href='newlogin.html'" />
</div>
</div>


<div style="height: 10px"></div>
<section id="gallery-wrapper">

<?php
$dsn = '//////////';
$user = '////////';
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
        echo "<article class='white-panel'>";
        echo "<video width='220px' controls>";
        echo "<source src='upload/".$filename."' type='video/mp4'>";
        echo "<object data='movie.mp4' width='200px' class='thumb'>";
        echo "</object></video><br>";
        echo $comment."<br>by. ".$username;
        echo "</article>";
        }

        else{
        echo "<article class='white-panel'>";
        echo "<img src='upload/".$filename."' width='200px' class='thumb'><br>";
        echo $comment."<br>by. ".$username;
        echo "</article>";
        
        }

    }
    }
?>        

</session>
</div>
    
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/pinterest_grid.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#gallery-wrapper").pinterest_grid({
                no_columns: 4,
                padding_x: 10,
                padding_y: 10,
                margin_bottom: 50,
                single_column_breakpoint: 700
            });
            
        });
    </script>
</body>

</html>
