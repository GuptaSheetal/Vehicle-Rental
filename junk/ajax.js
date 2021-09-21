<script type="text/javascript">

	$(document).ready(function () {
		$('#search_bike').click(function (e) {
			e.preventDefault();
			$.ajax({
				method:"post",
				url:"fetchdata.php";
				data:$('#displaydata').serialize(),
				dataType:"text",
				success: function (response) {
					$('#msg_display').text(response);
				}
			});
		});
	});

</script>
