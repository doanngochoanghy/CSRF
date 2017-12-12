<div class="panel-group">
<?php foreach ($list as $post):?>
	<div class=" panel panel-primary">
		<div class="panel-heading" style="font-size: 20px" ><?php echo $post['title']; ?></div>
		<div class="panel-body" style="padding-right: 0px;padding-top: 0px;padding-left: 0px;padding-bottom: 0px;">
			<pre style="margin-bottom: 0px;font-size: 15px;border-radius:0px" ><?php echo $post['content']; ?></pre>
		</div>
		<div class="panel-footer" style="">
			<small><?php echo $post['username']; ?></small>
			<small>created at <?php echo $post['date_created']; ?></small>
			<?php if ($post['user_id']==$this->session->userdata('user_id')): ?>
			<a href="<?php echo base_url(); ?>News/Edit/<?php echo $post['post_id']; ?>" class="btn btn-info btn-xs" style="float: right;">Edit</a>
		<?php endif;?>
		</div>
	</div>
<?php endforeach; ?>
</div>