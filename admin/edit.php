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
$v_id = $_GET['v_id'];
$query=mysqli_query($conn,"select * from vehicle where v_id=$v_id");

$data = mysqli_fetch_array($query); // fetch data

if(isset($_POST['submit'])) // when click on Update button
{
	$v_type = $_POST['v_type'];
	$brand = $_POST['brand'];
    $model = $_POST['model'];
    $model_year = $_POST['model_year'];
	$rent_amt = $_POST['rent_amt'];
	$image_desc = $_POST['image_desc'];
	$reg_no = $_POST['reg_no'];
	
    $edit = mysqli_query($conn,"update vehicle set v_type='$v_type', brand='$brand', model='$model', model_year='$model_year', rent_amt='$rent_amt', image_desc='$image_desc', reg_no='$reg_no' where v_id='$v_id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:managebike.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
     <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"> 
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        
        <br><br>
        
        <div class="row">
           <div class="page-header">
            <h1 style="text-align: center;">Edit Vehicle</h1>
            
      
          </div> 
            <div class="col-md-3"></div>
            <div class="col-md-6">
			
			<form method="post">

                     
                    <div class="input-group">
                      
                      <input id="v_type" type="hidden" class="form-control" name="v_type" value="<?php echo $data['v_type'] ?>" placeholder="Vehicle Type">
                    </div>
                    <br>
					
                    <div class="input-group">
                      <span class="input-group-addon"><b>Brand</b></span>
                      <input id="brand" type="text" class="form-control" name="brand" value="<?php echo $data['brand'] ?>" placeholder="Enter brand">
                    </div>
                    <br>
					
					<div class="input-group">
                      <span class="input-group-addon"><b>Model</b></span>
                      <input id="model" type="text" class="form-control" name="model" value="<?php echo $data['model'] ?>" placeholder="Enter model">
                    </div>
                    <br>
					
					<div class="input-group">
                      <span class="input-group-addon"><b>Model Year</b></span>
                      <input id="model_year" type="text" class="form-control" name="model_year" value="<?php echo $data['model_year'] ?>" placeholder="Enter model year">
                    </div>
                    <br>
					
					<div class="input-group">
                      <span class="input-group-addon"><b>Rent Amount</b></span>
                      <input id="rent_amt" type="text" class="form-control" name="rent_amt" value="<?php echo $data['rent_amt'] ?>" placeholder="Enter rent amount">
                    </div>
                    <br>
					
					<div class="input-group">
                      <span class="input-group-addon"><b>Overview</b></span>
                      <input id="image_desc" type="text" class="form-control" name="image_desc" value="<?php echo $data['image_desc'] ?>" placeholder="Enter vehicle overview">
                    </div>
                    <br>
					
					<div class="input-group">
                      <span class="input-group-addon"><b>Reg No.</b></span>
                      <input id="reg_no" type="text" class="form-control" name="reg_no" value="<?php echo $data['reg_no'] ?>" placeholder="Enter Reg No of Vehicle">
                    </div>
                    <br>
                     
                    <div class="input-group">
                        <input type="submit"  value="Submit" name="submit" class="btn btn-success">
                    </div>
                    
                   
                </form>
            </div> 
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>