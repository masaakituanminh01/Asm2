<?php
include('connect.php');
include('menu.php'); 
$search = "";
if( !empty($_GET['Search'])){
  $search = $_GET['Search'];
}
?>
 <h3 class="title">Search Results for: <?= $search ?></h3>
<div class="container" style="margin-top: 20px">
<div class="row">
    <?php
    if( !empty($search)) {
      $rs = mysqli_query( $connect ,"SELECT * FROM music,artist,category WHERE music.musicName LIKE '%{$search}%' and music.artistID=artist.artistID and music.categoryID=category.categoryID");
      while($row = mysqli_fetch_assoc($rs)){
    ?>
    <div class="card" style="background-color: white;margin-top: 20px;margin-left: 35px;overflow: auto;width: 270px; 
          border: 2px solid #F8ABAB;border-radius: 1px;border-bottom: 6px solid #FCA5A5; float: left;">
              <a href="detail.php?ID=<?php echo $row['musicID']?>" style=" text-decoration: none; 
            text-align: center;">
            <div style="height:80px">
              <h2><?php echo $row['musicName'] ?></h2>
              </div>
              <div><img src="images/<?php echo $row['musicImage']?>" style="width: 247px;height: 200px;padding: 7px"></div>
              <p style="color: red"><?php echo $row['musicPrice']." $"; ?></p>
              <h4 style="color: #3BA33D"><?php echo $row['artistName'] ?></h4>
            <h5>Category: <?php echo $row['categoryName'] ?></h5>
            </a>
          </div>
         <?php
     }
    }
    ?>
  </div>
  </div>
  <?php 

   ?>