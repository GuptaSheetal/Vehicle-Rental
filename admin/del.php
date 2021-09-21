<?php
/*$conn=mysqli_connect('localhost','root','');
if(!$conn)
{
	echo 'Not Connected To Server';
}
if(!mysqli_select_db($conn , 'bikerental'))
{
	echo 'Database Not Selected';
}
$queryy=mysqli_query($conn,"select v_id,brand,model,model_year,rent_amt from vehicle ");
if(isset($_REQUEST['del']))
{
	$del=$_REQUEST['del'];
	$sql=mysqli_query($conn,"delete from vehicle where v_id='$del'");
	$result=mysqli_query($sql);
	header("location:http://localhost/vehiclerental1/admin/managebike.php");
}*/

$id = $_GET['del'];

$con = new mysqli('localhost', 'root', '', 'bikerental');
$sql = "delete from vehicle where v_id='$id'";
if ($con->query($sql) === TRUE) { ?>
  <script type="text/javascript">location.href = 'managebike.php';</script>
<?php } else {
  echo "Error deleting record: " . $con->error;
}
$con->close();
?>