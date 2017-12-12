<?php echo validation_errors('<div class="alert alert-dismissible alert-danger">','</div>'); ?>

<?php echo form_open('Users/Register'); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center">Sign Up</h1>

		<div class="form-group">
			<label>Username</label>

			<input type="text" class="form-control" name="username" placeholder="Username" required="">

		</div>
		<div class="form-group">
			<label>Password</label>

			<input type="password" class="form-control" name="password" placeholder="Password" required="">

		</div>
		<div class="form-group">
			<label ">Password Confirm</label>

			<input type="password" class="form-control" name="password2" placeholder="Password Confirm" required="">

		</div>

		<div class="form-group">
			<div class="col-md-12 col-md-offset-0">
				<button type="submit" class="btn btn-success">Submit</button>
				<button type="reset" class="btn btn-danger disable">Cancel</button>
			</div>

		</div>
	</div>
</div>
<?php form_close(); ?>