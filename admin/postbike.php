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
if(isset($_POST['submit']))
{
	
$model = $_POST['model'];
$brandname = $_POST['brand'];
$detail=$_POST['image_desc'];
$total=$_POST['rent_amt'];
$year=$_POST['model_year'];
$reg_no=$_POST['reg_no'];
$vimage1=$_FILES["img1"]["name"];
 // $vimage2=$_FILES["img2"]["name"];
 // $vimage3=$_FILES["img3"]["name"];

$sql2="insert into vehicle(model, brand ,image_desc, rent_amt ,model_year,image_path,reg_no) values ('$model','$brandname','$detail','$total','$year','$vimage1','$reg_no')";
move_uploaded_file($_FILES["img1"]["tmp_name"],"images/".$_FILES["img1"]["name"]);
 // move_uploaded_file($_FILES["img2"]["tmp_name"],"images/".$_FILES["img2"]["name"]);
 // move_uploaded_file($_FILES["img3"]["tmp_name"],"images/".$_FILES["img3"]["name"]);

if(!mysqli_query($conn,$sql2))
{
	echo 'Not Inserted';
	echo("Error description: " . mysqli_error($conn));
}
else
{
$message = "Data Submitted Successfully !";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}
?>


<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Two Wheeler Rental Portal | Admin Post Vehicle</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css" type="text/css">
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('nav.php');?>
	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Add Vehicle</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<form method="post" class="form-horizontal" action="postbike.php" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Vehicle Model<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="model" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="brand" required>
<option value="select"> Select </option>
<option value="Honda">Honda</option>
		<option value="Hero">Royal Enfield</option>
		<option value="TVS">Bajaj</option>
		<option value="Suzuki">Suzuki</option>
		<option value="Yahama">Yahama</option>
</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="image_desc" rows="3" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Rent amount Per Day<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="rent_amt" class="form-control" required>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="model_year" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Registration No.<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="reg_no" class="form-control" required>
</div>
</div>

<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
</div>
</div>

<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
</div>
							
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>