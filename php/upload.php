<?php
header("charset=utf-8");
$name = addslashes($_POST['name']);
$singer = addslashes($_POST['singer']);

echo $name;

//uploads

// $upload_path = "/Users/kung/Documents/3-个人成长/个人开发/爱尚吉他lite/guitartap/uploads/";
$upload_path = "/var/www/html/uploads/";
$dest_file = $upload_path.basename($_FILES['file']['name']);

$songname = $_FILES['file']['name'];
$songaddress = "uploads/".addslashes($songname);

move_uploaded_file($_FILES['file']['tmp_name'],$dest_file);
//将乐谱信息插入数据库中

$servername = "localhost:8889";
	$sqlusername = "root";
	$sqlpassword = "630207";
	$dbname = "guitartabs";
	$port = 8889;
 
// 创建连接
$conn = new mysqli($servername, $sqlusername, $sqlpassword, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
mysqli_query($conn,'set names utf8');

$sql = "SELECT name FROM tabs where name = '$name'";
$result = $conn->query($sql);
$num = $result->num_rows;

if($num){ 
 	echo "错误：该乐谱已存在"; 
 } 
else //不存在当前注册名称 
 { 
	 $sql_insert = "insert into tabs(name,singer,address) values ('$name','$singer','$songaddress')";
	 $res_insert = $conn->query($sql_insert);

	 if($res_insert) 
		 { 
		 echo "上传曲谱成功！"; 
		 } 
	 else 
		 {
		 echo "错误：上传失败，请稍候再试";
		 } 
}
$conn->close();
?>