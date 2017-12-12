<?php echo validation_errors('<div class="alert alert-dismissible alert-danger">','</div>'); ?>

<?php echo form_open('Users/Login'); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center">Sign In</h1>
		<div class="form-group">
			<label>Username</label>

			<input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="">

		</div>
		<div class="form-group">
			<label>Password</label>

			<input type="password" class="form-control" name="password" placeholder="Password" required="">

		</div>
		<button type="submit" class="btn btn-success">Submit</button>
	</div>

</div>
</div>
</div>
<?php form_close(); ?>