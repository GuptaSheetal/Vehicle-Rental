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
$queryy=mysqli_query($conn,"select v_id,v_type,brand,model,model_year,rent_amt,image_path from vehicle");
$queryy1=mysqli_query($conn,"select distinct brand from vehicle");
include "header.php";
?>

<br><br><br><br><br><br>
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
<h1 align="center">Bike List</h1>

<?php
$i=1;
while($row=mysqli_fetch_array($queryy))
{
?>

<div  class="border border-primary card-body">
          <div class="align-middle"><img src="admin/images/<?php echo $row['image_path'];?>" class="img-fluid" alt="Image"  width="585" height="374" />
          </div>
          <div class="product-listing-content"> 
            <h5><?php echo $row['model'];?>(<?php echo $row['brand'];?>)</h5>
            <p class="list-price">Price: <?php echo $row['rent_amt']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Model:<?php echo $row['model_year']; ?> - 
			<a href="booking.php?vid=<?php echo $row['v_id'];?>" type="button" class="btn btn-primary">Book Bike <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
			</p>    
          </div>
        </div>
		<?php
//echo "<br>";
echo"<hr>";
$i++;
}
?>
	</div>
		<a href="index.php" >Back</a>
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

				echo "<option value='". $row['brand'] ."'>" .$row['brand'] ."</option>" ;
				$i++;
				}
				?>
                </select>
              </div>
              <div class="form-group">
                <button type="submit" name="search" class="btn btn-danger">Search Bike</button>
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

		


</body>
</html>