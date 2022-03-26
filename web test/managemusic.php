<?php include ('menu.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<title></title>
</head>
<body>

<table border="1 solid black">
	<tr>
		<th>Music ID</th>
		<th>Name </th>
		<th>Price </th>
		<th>Images </th>
		<th>Category </th>
		<th>Artist </th>
		<th>Action </th>
	 </tr>

	 
	 	<?php 
	 	include("connect.php");
	 	$sql = "SELECT * FROM music,artist,category WHERE music.categoryID = category.categoryID and music.artistID = artist.artist.ID";
		$result = mysqli_query($connect, $sql);
		while($row= mysqli_fetch_array($result)){
   		$musicID = $row['musicID'];
			$musicName = $row['musicName'];
			$musicLyrics = $row['musicLyrics'];
			$musicImage = $row['musicImage'];
			$musicAudio = $row['musicAudio'];
			$categoryName = $row['categoryName'];
			$artistName = $row['artistName'];

			?>
		<tr>
			<td> <?php echo $musicID ?></td>

			<td> <?php echo $musicName ?></td>
			<td> <?php echo $musicPrice ?></td>
			<td> <img src="Images/<?php echo $musicImage ?>" style ="width: 100px;"></td>
			<td> <?php echo $categoryName ?></td>
			<td> <?php echo $artistName ?></td>
			<td> <a href="editsong.php?id=<?php echo $musicID ?>">Update Song </a></td>
			<td> <a href="?id=<?php echo $musicID ?>">Delete Song </a></td>
	 		</tr>
	 		<?php
	 		}
	 		?> 

	 
</table>
<?php 
if(isset($_GET["id"])){
	$id = $_GET["id"];
	$sql="DELETE FROM song where musicID = $id";
	$result=mysqli_query($connect,$sql);
	if($result) {
		echo "<script> alert ('Xóa thành công!')</script>";
	}
} else{
	echo"Lỗi";
}
?>
</body>
</html>