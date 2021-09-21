<?php
//if(!isset($_SESSION)) 
  //  { 
//session_start(); 
    //}
$conn=mysqli_connect('localhost','root','');
if(!$conn)
{
  echo 'Not Connected To Server';
}
if(!mysqli_select_db($conn , 'bikerental'))
{
  echo 'Database Not Selected';
}
//include "database.php";
//session_start();
//
include 'header.php';
if(isset($_GET['vid']))
{
$vhid=$_GET['vid'];
}
if (isset($_SESSION["userid"])) {
	
	$uid = $_SESSION["userid"];
	//$postcode = (int) $_POST['postcode'];
	$u = (int)$uid;
        //echo "$uid";
}

//if(isset($_GET['userid']))
//{
//$uid=$_GET['userid'];
//}

//$uid=$_SESSION['userid'];
if(isset($_POST['book']))
{
	//echo $result['rent_amt'];exit;
	//echo "test";exit;
// $id=$_POST['vid'];
//$id=$_SESSION['vid'];
$date1=$_POST['fromdate'];
$date2=$_POST['todate'];
$rent_amount = $_POST['rent_amount'];
//echo $rent_amount; exit;
//echo $date1; exit;
//$diff1=date_diff($date1,$date2);
//echo $diff1->format("%R%a days");
//$uid=$_SESSION['userid'];
//$uid=$_SESSION['u_id'];
//echo "$uid";
//echo "$id";
//echo "$vhid";
//$userid=1;
$date_format1 = date("Y-m-d", strtotime($date1));
$date_format2 = date("Y-m-d", strtotime($date2));

$date3 = date_create($date_format1);
//echo "$date3";
$date4 = date_create($date_format2);

//$date5 = strtotime($date1);
//echo "$date3";
//$date6 = strtotime($date2);

//$date7 = date('Y/m/d',$date3);
//echo "$date5";
//$date8 = date('Y/m/d',$date4);

/*$mydate="SELECT DATEDIFF(day, $date5, $date6) AS DateDiff";
if(!mysqli_query($conn,$mydate))
{
	//echo 'Not Inserted date';
	echo("Error description: " . mysqli_error($conn));
	$message = "date failed Successfully !";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
else
{
$message = "date Done Successfully !";
echo "<script type='text/javascript'>alert('$message');</script>";
}*/

$datediff = strtotime($date_format2) - strtotime($date_format1);

$rent_period = ($datediff / (60 * 60 * 24));
$total_rent_payable = $rent_amount*$rent_period;

//echo "<script type='text/javascript'>alert($diff);</script>";

$sql2="insert into booking( v_id,u_Id ,rent_period,total_rent, pay_status, start_date, end_date) values ($vhid,$u,'".$rent_period."', '".$total_rent_payable."', 'pending', '".$date_format1."','".$date_format2."')";
if(!mysqli_query($conn,$sql2))
{
	echo 'Not Inserted';
	echo("Error description: " . mysqli_error($conn));
	$message = "Booking failed Successfully !";
}
else
{
$message = "Booking Done Successfully !";
echo "<script type='text/javascript'>alert('$message');</script>";
//header("/invoice.php");
header('Location: invoice.php');
}
}

?>
		
<!doctype html>
<html lang="en">
<head>

<!--	
    <meta charset="utf-8">
	
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body> -->

<br><br><br><br><br>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	  <link rel="stylesheet" type="text/css" href="css/style2.css">
	  <link rel="stylesheet" type="text/css" href="css/stylelogin1.css">
      
<script>
 $( function() {
    $( "#req_date" ).datepicker();
 });
 
 $( function() {
   $( "#return_date" ).datepicker();                       
 } );
</script>
</head>
<body>
<!--Header-->

<!-- /Header --> 


<div class="border border-primary" align="center">

<h3>Booking Bike</h3>
<?php
if(isset($_GET['vid']))
{
$vid=$_GET['vid'];
 //echo $vid;
$_SESSION['vid'] = $vid;
$id = $_SESSION['vid'];
// echo $id;
$sql=mysqli_query($conn,"select image_path,model,model_year,brand,rent_amt,image_desc from vehicle where v_id='$id' limit 1 ");
$result=mysqli_fetch_array($sql);
}


if (isset($_SESSION["userid"])) {
	$loggenOnUser = $_SESSION["userid"];
        // echo "$loggenOnUser";
	
}


?>

<label style="float:left;color:white"><?php echo '$diff';?></label>

<div style="margin-top:40px"><img src="admin/images/<?php echo $result['image_path'];?>" class="img-responsive" width="611" height="376"></div><br>
<table height="40%" width="35%">
<tr>
<th align="left">Model:</th>
<th align="left"><?php echo $result['model'];?></th>
</tr>
<tr>
<th align="left">Brand:</th>
<th align="left"><?php echo $result['brand'];?></th>
</tr>
<tr>
<th align="left">Overview:</th>
<th align="left"><?php echo $result['image_desc'];?></th>
</tr>
<tr>
<th align="left">Rent Amount:</th>
<th align="left"><?php echo $result['rent_amt'];?></th>
</tr>
<tr>
<th align="left">Model year:</th>
<th align="left"><?php echo $result['model_year'];?></th>
</tr>
</table>
<form method="post">
<div align="center" >
<table height="40%" width="35%">
<?php
if (isset($_SESSION["userid"])) {
	$uid = $_SESSION["userid"];
	//$postcode = (int) $_POST['postcode'];
	$u = (int)$uid;
       // echo "$U";
}
?>
<tr>
<th>Enter From Date:</th>
<th>
   <input id="req_date" type="text" class="form-control" name="fromdate" required>
   <input id="rent_amount" type="hidden" class="form-control" name="rent_amount" value=<?php echo $result['rent_amt']; ?>>
</th>
</tr>
<br>

<tr>
<th>Enter To Date:</th>
<th>
   <input id="return_date" type="text" class="form-control" name="todate" required>
</th>
</tr>
<br>
<tr>
<?php 
if(isset($_SESSION['lemail'])==0)
{
?>
<th><p style="color:red">First Login Your Account</p>&nbsp;&nbsp;&nbsp;<a href="index.php">Login</a></th>
<?php
}
else
{
?>
<th colspan="2" align="center"><button type="submit" name="book" class="btn btn-primary">Book Now</button></th>
<?php
} ?>
</tr>
</table>
</div>
</form>
</div>

</body>
</html>