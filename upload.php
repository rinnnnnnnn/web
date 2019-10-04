<html>
<head>
<title>マイページ</title>
<meta charset="UTF-8">
<style type="text/css">
body{background-color: #FFF0F5; margin: 0; padding: 0}
*{padding:0;margin:0;}
body{background-color: #FFF0F5; margin: 0; padding: 0}
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

<a href="index-login.php">ホームページへ</a><br>
</div>
<div class="right">
<div class="headline">
<div style="border:0; float: right">
<botton class="button"><?php if (!session_id()) session_start(); echo $_SESSION['userid']."   ".$_SESSION['username']."   ";?><a href="mypage.php">マイページ</a></botton>
</div>
</div>

<?php
header("Content-type:text/html;charset=UTF-8");


if(isset($_FILES['upfile'])){
$upfile = $_FILES['upfile'];
function upload_file($files, $path = "./upload",$imagesExt=['jpg','png','jpeg','gif','mp4'])
{
    // 判断错误号
    if ($files['error'] == 00) {
        $ext = strtolower(pathinfo($files['name'],PATHINFO_EXTENSION));
        // 判断文件类型
        if (!in_array($ext,$imagesExt)){
            return "illegal file";
        }
        if (!is_dir($path)){   // 判断是否存在上传到的目录
            mkdir($path,0777,true);
        }
        $filename = md5(uniqid(microtime(true),true)).'.'.$ext;//生成唯一的文件名
        $destname = $path."/".$filename;// 将文件名拼接到指定的目录下
        // 进行文件移动
        if (!move_uploaded_file($files['tmp_name'],$destname)){
            return "文件上传失败！";
        }
        else{
            echo "文件上传成功！";

            $dsn = 'mysql:dbname=tb210282db; host=localhost';
            $user = 'tb-210282';
            $password = 'BGHZyT7Gvh';
            $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

            $sql = "CREATE TABLE IF NOT EXISTS upload
             (
             num INT AUTO_INCREMENT PRIMARY KEY,
             userid INT NOT NULL,
             username VARCHAR(32) NOT NULL,
             comment TEXT,
             filename VARCHAR(128)
             )";
             $stmt = $pdo->query($sql);
            
             if (!session_id()) {
                session_start();
            }
                $userid = $_SESSION['userid'];
                $username = $_SESSION['username'];
                $comment = $_POST['comment'];


             $sql =  "INSERT INTO upload(userid,username,comment,filename) VALUES ('$userid','$username','$comment','$filename')";
             $stmt = $pdo->query($sql);
        }
    } 
    }

upload_file($upfile);
}

?>


<form action='upload.php' method=post enctype="multipart/form-data">
    
    <!-- 上传文件限制,会在传递至index.php之前先执行验证文件大小，value为上传文件的最大值 ，单位为b，600000为600kb-->
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <input type = "text" name="comment"></br>
    <input type="file" name="upfile">

    <input type="submit" value='上传文件'>

</form>



</div>
</body>
</html>
