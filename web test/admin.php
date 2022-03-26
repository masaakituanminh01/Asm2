<?php include('connect.php');
include('menu.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<style> 
		body{
			background-image: url("https://hiepsibaotap.com/wp-content/uploads/2020/06/Piltover.jpg");
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
		button {
		  background-color: #04AA6D;
		  color: white;
		  padding: 14px 20px;
		  margin: 8px 0;
		  border: none;
		  cursor: pointer;
		  width: 100%;
		  opacity: 0.9;
		}
	</style>
</head>
<body>
<!-- end menu -->
<!-- slide -->
<div id="carouselExampleIndicators" class="carousel slide mt-1" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://i.imgur.com/twa9ifv.jpg" alt="First slide" style=" height: 600px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://i.pinimg.com/originals/5d/c0/b5/5dc0b51c328dfbd7856ccef618e3dddc.jpg" alt="Second slide" style="height: 600px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/blt2a24c87c7ab9e0bf/616a827d35be917f1d1fc0a7/101921_Preseason2022_Banner.jpg" alt="Third slide" style="height: 600px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- end slide -->
<!-- list product -->
<div class="container">
	<div class="row mt-5">
		<h2 class="list-product-title" style="color: white;">New releases</h2>
		<div class="list-product-subtitle" style="color: white;">
			<p>You may like these new music</p>
		</div>
		<div class="product-group">
			<div class="row">
				<?php
			include('connect.php');
			$sql = "SELECT * FROM `music`;";
			$result = mysqli_query($connect, $sql);
			while($row_music = mysqli_fetch_array($result)){
				$musicID = $row_music['musicID'];
				$musicName = $row_music['musicName'];
				$musicLyrics = $row_music['musicLyrics'];
				$musicImage = $row_music['musicImage'];
				$musicAudio = $row_music['musicAudio'];
				?>
				<div class="col-md-3 col-sm-6 col-12">
					<div class="card card-product mb-3">
					  <img class="card-img-top" src="images\<?php echo"$musicImage" ?>" alt="Enemy Cover" ; style="height: 280px">
					  <div class="card-body">
					    <h5 class="card-title"><?php echo $musicName ?></h5>
					    <audio controls controlsList = "nodownload" ontimeupdate="myAudio(this)" style="width: 230px;"> 
					    	<source src="audio\<?php echo"$musicAudio" ?>" type="audio/mpeg">
					    	</audio>
					     <script type="text/javascript">
   								function myAudio(event){
    							if(event.currentTime>30){
    							event.currentTime=0;
    							event.pause();
    							alert("You have to pay for the whole song!")
    						}
    						}
   						</script>
   						<a href="managemusic.php?ID=<?php echo $musicID?>" class="btn btn-primary">Manage</a>
					  </div>
					</div>
				</div>
				<?php }  ?>
			</div>	
		</div>
	</div>
</div>


<!-- end list product -->

<!-- Load jquery trước khi load bootstrap js -->
<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>	