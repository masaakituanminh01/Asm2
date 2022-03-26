<?php include ('menu.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style> 
        body{
            background-image: url("https://hiepsibaotap.com/wp-content/uploads/2020/06/Piltover.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="container">
<div class="row">
<?php
include('connect.php');
$ID = $_GET["ID"];
$sql = "SELECT * FROM music,artist,category WHERE music.categoryID = category.categoryID and music.artistID = artist.artistID and musicID = {$ID}";
$result = mysqli_query($connect, $sql);
while($row= mysqli_fetch_array($result)){
?>
<div class="col-md-6" style="text-align: left;">
<h2 style="color: white";> <?php echo $row['musicName']?> </h2>
<p style="color: white";>Price: <?php echo $row['musicPrice']?> </p>
<audio controls controlsList="nodownload" ontimeupdate="myAudio(this)" style="width: 250px;">
    <source src="Audio/<?php echo $row['musicAudio']?>" type="audio/mpeg">
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
   <h5 style="color: white;"; > Artist: <?php echo $row["artistName"] ?></h5>
   <h4 style="color: white";> Category: <?php echo $row["categoryName"] ?></h4>
   <p style="color: white";> Lyric: <?php echo $row["musicLyrics"] ?> </p>
   <button type="submit" class='btn btn-primary'><i class="fas fa-cart-plus"></i> Add to cart</button>
</div> 
<div class="col-md-6">
<img src="images/<?php echo $row['musicImage'] ?>" style = "width: 500px;height: 500px;">
</div> 
<?php
}


?>
</div>
</div>
</body>
</html>