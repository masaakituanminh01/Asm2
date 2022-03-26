<?php include ('menu.php'); ?>
<?php
session_start() ;
?>
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
				<td> Email : </td>
				<td> <input type="text" name="email"> </td>
			</tr>
			<tr>
				<td> Password : </td>
				<td> <input type="password" name="password"> </td>
			</tr>
			<tr>
				<td> </td>
				<td> <input type="submit" name="login" value="Login">
			</tr>
		</table>
	</form>
	<?php 
	
	//Kết nối theo Mysqli procedural
	$connect = mysqli_connect('localhost','root','','sdlcweb');
    // Nếu click vào nút login thì mới thực hiện 
    if(isset($_POST['login'])){
	 $email= $_POST['email'];
	 $password =$_POST['password'];
	 // Truy vấn từ bảng user cột username = giá trị username nhập từ form và cột password = giá trị password nhập từ form
	 $sql = "SELECT * FROM user WHERE userEmail ='$email' AND userPassword = '$password'";

	 // Thực thi truy vấn
	 $result = mysqli_query($connect, $sql);
	 // Trả về kết quả , chính là các dòng được truy vấn
	 $row = mysqli_num_rows($result);
	 // Nếu $row > 0 --> có trên 1 dòng trong CSDL trùng với dữ liệu nhập vào form -> đăng nhập thành công 
	 if($row==1){
	 	echo "<script> alert('Log in successfully!')</script>";
	 	//Lưu tên đăng nhập lại vào biến toàn cục $_SESSION
	 	$_SESSION['email'] = $email;
	 }
	 else{
	 	echo"<script>alert('Wrong username or password!')</script>";
	 }
	 if(isset($_SESSION['email'])){
	 	if($_SESSION['email']=="admin@admin.com"){
	 		header('Location:admin.php');
	 	}
	 	else{
	 		header('Location:index.php');
	 	}
	 }
	}
	?>

</body>
</html>