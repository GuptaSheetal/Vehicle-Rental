<?php
$conn=mysqli_connect('localhost','root','');
if(!$conn)
{
echo 'Not Connected To Server';
}
if(!mysqli_select_db($conn , 'bikerental'))
{
	echo 'Database Not Selected';
}
$queryy1=mysqli_query($conn,"select distinct brand from vehicle");
if(isset($_POST['brandname']))
{
$vb=$_POST['brandname'];
// echo $vb;
$_SESSION['vb'] = $vb;
$vbrand = $_SESSION['vb'];
// echo $vbrand;
	$sql=mysqli_query($conn,"select v_id,v_type,brand,model,model_year,rent_amt,image_path from vehicle where brand='$vbrand' ");
}
 include 'header.php';?>
 <html>
 <head>
 <style>
 .product-listing-content {
  float: right;
  margin-top:-180px;
  width:300px;
 }
 </style>
 <link rel="stylesheet" href="mycss/style2.css" type="text/css">
 </head>
 <body>
<!-- /Header --> 
<br><br><br><br>
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="border border-primary">
<h1 align="center">Bike List</h1>
<?php
$i=1;
while($result=mysqli_fetch_array($sql))
{
?>
<div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img src="admin/images/<?php echo $result['image_path'];?>" class="img-fluid" alt="Image" /> </a> 
          </div>
          <div class="product-listing-content"> 
            <h5><?php echo $result['model'];?>(<?php echo $result['brand'];?>)</h5>
            <p class="list-price">Price: <?php echo $result['rent_amt']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Model:<?php echo $result['model_year']; ?>
			</p>
            <a href="booking.php?vid=<?php echo $result['v_id'];?>" type="button" class="btn btn-primary">Book Bike <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
       </div>
		<?php
echo "<hr>";
$i++;
}
?>
		</div>
		<a href="bikelist.php" >Back</a>
	</div>
	<!--Side-Bar-->
      <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget" style="border:2px">
          <div class="widget_heading">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Bike </h5>
          </div>
          <div class="sidebar_filter">
            <form action="searchbike.php" method="post">
              <div class="form-group select">
                <select class="form-control" name="brandname">
				<option>Select Brand</option>
				<?php
$i=1;
while($row=mysqli_fetch_array($queryy1))
{
?>
                  
				  <?php
echo "<option value='". $row['brand'] ."'>" .$row['brand'] ."</option>" ;
$i++;
}
?>
                </select>
              </div>
              <div class="form-group">
                <button type="submit" name="search" type="button" class="btn btn-danger">Search Bike</button>
              </div>
            </form>
          </div>
        </div>
      </aside>
      <!--/Side-Bar-->
</div>
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	
	<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	-->	
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" 
		integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



</body>
</html>