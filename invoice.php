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

/*if (isset($_SESSION["fn"])) {
	$username = $_SESSION["fn"];
        echo "$username"; exit;
	
}
*/
/*if (isset($_SESSION["fname"])) {
	$fname = $_SESSION["fname"];
	//$postcode = (int) $_POST['postcode'];
	//$u = (int)$uid;
        //echo "$uid";
}*/

//session_start();
include "header.php";

$sql=mysqli_query($conn,"select * from booking order by o_id desc limit 1");
$row=mysqli_fetch_array($sql);
$uid1=$row['u_Id'];
$bike1=$row['v_id'];
//echo $uid1;
$sql2=mysqli_query($conn,"select * from vehicle where v_id=$bike1");
$row2=mysqli_fetch_array($sql2);
$model=$row2['model'];
$modelyear=$row2['model_year'];
//echo $bike;
$sql1=mysqli_query($conn,"select first_name,last_name from user where u_Id=$uid1");
$row1=mysqli_fetch_array($sql1);
$cfname=$row1['first_name'];
$clname=$row1['last_name'];
//echo $cname; exit;



?>
<br><br><br><br><br>
<div class="border border-primary container">
<center><img src="images/headerlogo.jpg" width="434" height="187"></center><br> 
<h1 align="center">Vehicle Rental System</h1>
<h2 align="center">Invoice</h2>
<div align="left">
<h4><p align="left">

Address:<br>
Rental System <br>
Vasai Road(E)<br>
</h4></p>
<p><h4>Name:<?php echo "$cfname";?>&nbsp;<?php echo "$clname";?></h4></p>

<table border="1" align="left" width="100%">
<tr>
<td><h4>Booking Id</h4></td>
<td><h4>Customer Id</h4></td>
<td><h4>Bike Model</h4></td>
<td><h4>From Date</h4></td>
<td><h4>To Date</h4></td>
<td><h4>Duration</h4></td>
<td><h4>Total Rent</h4></td>

</tr>
<tr>
<td><h4><?php echo $row['o_Id'];?></h4></td>
<td><h4><?php echo $row['u_Id'];?></h4></td>
<td><h4><?php echo $model;?></h4>(Year -<?php echo $modelyear;?>)</td>
<td><h4><?php echo $row['start_date'];?></h4></td>
<td><h4><?php echo $row['end_date'];?></h4></td>
<td><h4><?php echo $row['rent_period'];?> Days </h4></td>
<td><h4><?php echo $row['total_rent'];?></h4></td>

</tr>
</table>
<br><br><br><br><br>
<center><h4><font style="color:red">Note:Please take the copy of this Invoice as Booking Recipt.</font></h4><br>
<button onclick="window.print()">Print this page</button></center><br>
</div>
</div>
</body>
</html>