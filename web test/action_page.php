<?php
if(isset($_POST['register'])){
    	$username =$_POST['userName'];
	    $password =$_POST['userPassword'];
	 $sql ="INSERT INTO user VALUES('$userName','$userPassword')";
	 $result =mysqli_query($connect,$sql);
	 if($result){
	echo"Thêm mới người dùng thành công";
}
else{
	echo"Thêm mới thất bại";
}
    }
?>