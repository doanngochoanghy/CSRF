<?php 
echo validation_errors('<div class="alert alert-dismissible alert-danger">','</div>');
echo form_open('/Users/Change_password');
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center">Change Password</h1>

		<div class="form-group">
			<?php echo form_label('New password', 'new_password');?>

			<?php echo form_password('new_password', '', array("required"=>"","placeholder"=>"New Password","class"=>"form-control","id"=>"new_password"));?>
		</div>
		<div class="form-group">
			<?php echo form_label('Confirm password', 'comfirm_password');?>

			<?php echo form_password('confirm_password', '', array("required"=>"","placeholder"=>"Confirm Password","class"=>"form-control","id"=>"confirm_password"));?>
		</div>

		<div class="form-group">
			<div class="col-md-12 col-md-offset-0">
				<button type="submit" class="btn btn-success">Submit</button>
				<button type="reset" class="btn btn-danger disable">Cancel</button>
			</div>

		</div>
	</div>
</div>
<?php
echo form_close(); ?>