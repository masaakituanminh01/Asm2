<?php include ('connect.php');
include ('menu.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST">
		<table>
			<tr>
				<td> User ID: </td>
				<td> <input type="number" name="userID" required> </td>
			</tr>
			<tr>
				<td> Full Name: </td>
				<td> <input type="text" name="userName" required> </td>
			</tr>
			<tr>
				<td> Email: </td>
				<td> <input type="text" name="userEmail" required> </td>
			</tr>
			<tr>
				<td> Password: </td>
				<td> <input type="password" name="userPassword" required> </td>
			</tr>
			<tr>
				<td> </td>
				<td> <input type="submit" name="signup" value="Sign Up"> </td>
			</tr>
		</table>
	</form>
	<?php 
		//Kết nối theo Mysqli procedural
	$connect = mysqli_connect('localhost','root','','sdlcweb');
	if(!$connect){
		echo "Kết nối thất bại";
	}
	
    // Nếu click vào nút register thì mới thực hiện 
    if(isset($_POST['signup'])){
    	$userID = $_POST['userID'];
    	$userName = $_POST['userName'];
    	$userEmail = $_POST['userEmail'];
	    $userPassword = $_POST['userPassword'];
	 $sql ="INSERT INTO user (userID, userName, userEmail, userPassword) VALUES('$userID','$userName','$userEmail','$userPassword')";
	 $result =mysqli_query($connect,$sql);
	 if($result){
	echo"Register successfully!";
}
else{
	echo"Register failed!";
}
    }
	?>
</body>
</html>