<!DOCTYPE html>
<html>
<head>
	<?php include 'add_ons_head.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php include 'header.php'; ?>
		<?php include 'left_sidebar.php'; ?>
		<!-- Content Wrapper.z Contains page content -->
  		<div class="content-wrapper" style="height: 1300px">
  			<div class="col-md-12">
  				<h2> Comman Type </h2>
				<form method="post">	
       			<div class="form-group">
      					<label for="type_name">Type Name</label>
      					<input type="text" class="form-control" id="type_name" placeholder="enter type name...." name="type_name">
    				</div>
    				<div class="form-group">
      					<label for="comman_key">Comman Type Key</label>
      					<input type="text" class="form-control" id="comman_key" placeholder="enter Comman  Key...." name="comman_key">
    				</div>
    				<div class="form-group">
      					<label for="description">Description</label>
      					<input type="text" class="form-control" id="description" placeholder="enter description...." name="description">
    				</div>
    				<div>
    			   		<input type="submit" class="btn btn-default" name="sinsert">
    				</div>
    		</div>	

		</div>
  		<!-- /.content-wrapper -->
		<?php include 'footer.php'; ?>
		<?php include 'right_sidebar.php'; ?>

	</div>
	<!-- ./wrapper -->
	
	<?php include 'add_ons_body.php'; ?>

</body>
</html>