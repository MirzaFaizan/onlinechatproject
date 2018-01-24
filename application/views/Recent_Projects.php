<!DOCTYPE html>
<html>
<head>
	<title></title>
<script type="text/javascript">
	var project_id;
	function set_project_cancel(id){
		project_id=id;
		$.ajax({
							url: '<?php echo base_url(); ?>Project_Controller/update_project',
							type: 'POST',
							dataType: 'html',
							data: {action: 'cancelled',id:project_id},
					})
					.done(function(res) {
					$('.data').html(res);
					})
					.fail(function() {
							console.log("error");
					});
	}
	function set_project_complete(id){
		project_id=id;
		$.ajax({
							url: '<?php echo base_url(); ?>Project_Controller/update_project',
							type: 'POST',
							dataType: 'html',
							data: {action: 'completed',id:project_id},
					})
					.done(function(res) {
					$('.data').html(res);
					})
					.fail(function() {
							console.log("error");
					});
	}
</script>
</head>
<body>
<div class="data">
<div class="container-fluid">
<div class="panel panel-primary panel-responsive">
<div class="panel-heading">Recent & Ongoing Projects</div>
<div class="panel-body">
<table class="table table-responsive table-hover table-bordered">
	<thead>
		<tr>
		<th>P.No#</th><th>Project Title</th><th>Developer</th><th>Client</th><th>Budget</th><th>Order Date</th><th>DeadLine</th><th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php if(isset($project)){
		foreach ($project as $row) {
               ?>
		<tr>
			<td><?php echo $row['project_id']; ?></td>
			<td><?php echo $row['project_name']; ?></td>
			<td><?php echo $row['developer_email']; ?></td>
			<td><?php echo $row['client_email']; ?></td>
			<td><?php echo $row['project_budget']; ?></td>
			<td><?php echo $row['project_order_date']; ?></td>
			<td><?php echo $row['project_deadline']; ?></td>
			<?php
			if($this->session->userdata('role')=='desktop_developer'||$this->session->userdata('role')=='graphic_designer'||$this->session->userdata('role')=='mobile_developer'||$this->session->userdata('role')=='web_developer'){
				if($row['project_completion_report']=='progress'){
					?>
					<td>
					<button type="button" class="btn btn-danger" id="cancel" onclick="set_project_cancel(<?php echo $row['project_id']; ?>)">Cancel</button>
					<button type="button" class="btn btn-success" id="complete" onclick="set_project_complete(<?php echo $row['project_id']; ?>)">Complete</button>
					</td>
					<?php
					}
					else{ ?>

					<td><?php echo $row['project_completion_report']; ?></td>


				<?php	}

				}
			else{ ?>

			<td><?php echo $row['project_completion_report']; ?></td>
			<?php } ?>
		</tr>
		<?php }	} ?>
	</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>
