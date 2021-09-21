<?php
$status = $_GET['status'];
$id = $_GET['id'];

$con = new mysqli('localhost', 'root', '', 'bikerental');
$sql = "update booking set pay_status = '".$status."' where o_Id = '".$id."'";
if ($con->query($sql) === TRUE) { ?>
  <script type="text/javascript">location.href = 'managebooking.php';</script>
<?php } else {
  echo "Error updating record: " . $con->error;
}
$con->close();

?>