<?php
//トップページから、ユーザー名を変数としてpostする
//$user = $_POST['user'];
//今は値を設定している
$username = "RIN";
?>
<html>
<head>
<title>
<?php echo $username."のページ"; ?>
</title>
<meta name="viewport" content="width=320, height=480, initial-scale=1.0, minimumscale=1.0, maximum-scale=2.0, user-scalable=yes"><!-- for smartphone. スマホ対応にしたいので、 他のページでも入れてください。 -->

</head>
<body>
<?php echo $username."のページ";?>
<form id="submit_form" action="userpage.php" method="POST">
<select name="toukou" id="submit_select" onchange="submit(this.form)">
<option value="全て">全て</option>
<option value="食べ物">食べ物</option>
<option value="芸能人">芸能人</option>
<option value="ネット有名人">ネット有名人</option>
<option value="アニメ" >アニメ</option>
<option value="映画">映画</option>
<option value="音楽">音楽</option>
<option value="舞台">舞台</option>
<option value="スポーツ">スポーツ</option>
<option value="機械">機械</option>
<option value="その他">その他</option>
</select>
</form>
<script type="text/javascript">
	$(function(){
		$("#submit_select").change(function(){
			$("#submit_form").submit();
		});
	});
</script>
<?php
$dsn = 'mysql:dbname=tb210282db; host=localhost';
$user = 'tb-210282';
$password = 'BGHZyT7Gvh';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


if(empty($_POST["toukou"])){
	$sql = "SELECT comment,filename,genre FROM cmt_list WHERE user='$username'";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
	$comment = $row['comment'];
	$filename = $row['filename'];
	$genre = $row['genre'];
    echo "<img src='".$filename."' width='200px'><br>";
    echo $comment."<br>by. ".$username."jungle".$genre."<hr>";

}
}
else{
if($_POST["toukou"]=="食べ物"){
	$sql = "SELECT comment,filename FROM cmt_list WHERE user='$username' AND genre='1'";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
	$comment = $row['comment'];
	$filename = $row['filename'];
    echo "<img src='".$filename."' width='200px'><br>";
    echo $comment."<br>by. ".$username;
}

}

if($_POST["toukou"]=="芸能人"){
	$sql = "SELECT comment,filename FROM cmt_list WHERE user='$username' AND genre='2'";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
	$comment = $row['comment'];
	$filename = $row['filename'];
    echo "<img src='".$filename."' width='200px'><br>";
    echo $comment."<br>by. ".$username;
}

}

if($_POST["toukou"]=="ネット有名人"){
	$sql = "SELECT comment,filename FROM cmt_list WHERE user='$username' AND genre='3'";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
	$comment = $row['comment'];
	$filename = $row['filename'];
    echo "<img src='".$filename."' width='200px'><br>";
    echo $comment."<br>by. ".$username;
}

}


if($_POST["toukou"]=="アニメ"){
	$sql = "SELECT comment,filename FROM cmt_list WHERE user='$username' AND genre='4'";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
	$comment = $row['comment'];
	$filename = $row['filename'];
    echo "<img src='".$filename."' width='200px'><br>";
    echo $comment."<br>by. ".$username;
}

}


if($_POST["toukou"]=="映画"){
	$sql = "SELECT comment,filename FROM cmt_list WHERE user='$username' AND genre='5'";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
	$comment = $row['comment'];
	$filename = $row['filename'];
    echo "<img src='".$filename."' width='200px'><br>";
    echo $comment."<br>by. ".$username;
}

}


if($_POST["toukou"]=="音楽"){
	$sql = "SELECT comment,filename FROM cmt_list WHERE user='$username' AND genre='6'";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
	$comment = $row['comment'];
	$filename = $row['filename'];
    echo "<img src='".$filename."' width='200px'><br>";
    echo $comment."<br>by. ".$username;
}

}


if($_POST["toukou"]=="舞台"){
	$sql = "SELECT comment,filename FROM cmt_list WHERE user='$username' AND genre='7'";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
	$comment = $row['comment'];
	$filename = $row['filename'];
    echo "<img src='".$filename."' width='200px'><br>";
    echo $comment."<br>by. ".$username;
}

}

if($_POST["toukou"]=="スポーツ"){
	$sql = "SELECT comment,filename FROM cmt_list WHERE user='$username' AND genre='8'";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
	$comment = $row['comment'];
	$filename = $row['filename'];
    echo "<img src='".$filename."' width='200px'><br>";
    echo $comment."<br>by. ".$username;
}

}

if($_POST["toukou"]=="機械"){
	$sql = "SELECT comment,filename FROM cmt_list WHERE user='$username' AND genre='9'";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
	$comment = $row['comment'];
	$filename = $row['filename'];
    echo "<img src='".$filename."' width='200px'><br>";
    echo $comment."<br>by. ".$username;
}

}

if($_POST["toukou"]=="その他"){
	$sql = "SELECT comment,filename FROM cmt_list WHERE user='$username' AND genre='10'";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
	$comment = $row['comment'];
	$filename = $row['filename'];
    echo "<img src='".$filename."' width='200px'><br>";
    echo $comment."<br>by. ".$username;
}

}

}
?>
</body>
</html>