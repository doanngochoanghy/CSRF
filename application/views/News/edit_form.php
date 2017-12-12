<h1><?php echo "Edit Post"; ?></h1>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<?php echo form_open(base_url().'News/Edit/'.$post['post_id']); ?>
		<div class="form-group">
			<?php 
				echo form_label('Title'); 
				echo form_input('title', $post['title'],$attribute = array('required', 'class'=>"form-control","placeholder"=>"Write title here" ));
			?>
		</div>
		<div class="form-group">
			<?php 
				echo form_label('Content');
			 	echo form_textarea('content', $post['content'],array('class' => 'form-control','placeholder'=>'Write content here','required')); 
			?>
		</div>
		<div class="form-group">
			<div class="col-xs-1 ">
				<?php 
					echo form_button(array('name'=> 'edit','type'=> 'submit','content'=> 'Edit','class'=>'btn btn-info'));
				 	echo form_close(); 
				?>
			</div>
			<div class="col-xs-1 col-xs-offset-1 ">
				<?php echo form_open(base_url().'News/Delete/'.$post['post_id'],'onsubmit="return confirm(\'Bạn có muốn xóa bài này không?\')"'); ?>
				<?php echo form_button(array('name'=> 'delete','type'=> 'submit','content'=> 'Delete','class'=>'btn btn-danger'));?>
				<?php echo form_close(); ?></div>
			</div>
		</div>
	</div>
</div>
<div class="row"><div class="col-lg-8 ">

</div>
