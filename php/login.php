<?php
	$username = $_POST["username"]; 
 	$password = $_POST["password"]; 
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
	$sql = "SELECT * FROM users where username = '$username'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {    
       $row = $result->fetch_assoc();
       if($row['password']===$password){
       		echo "success";
       }else{
       	 	echo "notfond1";
       }
   	}else{
   		echo "notfond2";
   	};	
	$conn->close();
   	
?>