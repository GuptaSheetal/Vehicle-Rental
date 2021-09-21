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
$queryy=mysqli_query($conn,"select* from booking ");

?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Two Wheeler Rental Portal |Admin Manage testimonials   </title>

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
						<h2 class="page-title">Manage Bookings</h2>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Bookings Info</div>
							<div class="panel-body">
								<table id="mdata" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>Booking Id</th>
											<th>Bike Id</th>
											<th>User Id</th>
											<th>Rent Period</th>
											<th>Total Rent</th>
											<th>From Date</th>
											<th>To Date</th>
											<th>Payment Status</th>
										</tr>
									</thead>
									<tbody>
<?php
$i=1;
while($row=mysqli_fetch_array($queryy))
{
	?>
										<tr>
											<td><?php echo $row['o_Id'];?></td>
											<td><?php echo $row['v_id'];?></td>
											<td><?php echo $row['u_Id'];?></td>
											<td><?php echo $row['rent_period'];?></td>
											<td><?php echo $row['total_rent'];?></td>
											<td><?php echo $row['start_date'];?></td>
											<td><?php echo $row['end_date'];?></td>
											<td>
												<div class="btn-group" style="width: 150px;">
                                            <?php if(isset($row['pay_status']) && $row['pay_status'] == 'paid'){  ?>
                                              <button type="button" class="btn btn-sm btn-info">Paid</button>
                                            <?php } elseif (isset($row['pay_status']) && $row['pay_status'] == 'pending') { ?>
                                              <button type="button" class="btn btn-sm btn-info">Pending</button>
                                            <?php } else { ?>
												<button type="button" class="btn btn-sm btn-info">Payment Status</button>
											<?php } ?>
                                              
                                            <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                              <span class="caret"></span>
                                              <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                              <li><a href="status.php?status=paid&id=<?php echo $row['o_Id'] ?>">Paid</a></li>
                                            
                                              <li><a href="status.php?status=pending&id=<?php echo $row['o_Id'] ?>">Pending</a></li>
                                            </ul>
                                          </div>
											</td>
										

										</tr>
<?php
echo "</tr>";
$i++;
}
?>
									</tbody>
								</table>
							</div>
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
