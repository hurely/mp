<?php
		$servername = "localhost:8889";
		$sqlusername = "root";
		$sqlpassword = "630207";
		$dbname = "guitartabs";
		$port = 8889;

		$address=$_POST["address"];
		 
		$conn = new mysqli($servername, $sqlusername, $sqlpassword, $dbname);
		mysqli_query($conn,'set names utf8');
		if ($conn->connect_error) {
		    die("����ʧ��: " . $conn->connect_error);
		} 
		
		$sql = "UPDATE tabs set searchnum=searchnum+1 where address = '$address'";
		$result = $conn->query($sql);
		if($result){
		       echo "added";
		    }
		$conn->close();
?>
