<h2><?php echo $title; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>
<?php

	$ext = pathinfo($post['blueprint_image'], PATHINFO_EXTENSION);
	if ($ext == 'pdf') { ?>
		<object data="<?php echo base_url(); ?>assets/pdfs/<?php echo $post['blueprint_image']?>" type="application/pdf" width="100%" height="100%">
		<p>Alternative text - include a link <a href="<?php echo base_url(); ?>assets/pdfs/<?php echo $post['blueprint_image']?>">to the PDF!</a></p>
		</object>
<?php
	} else {
?>
<img style="width:100%;height:auto;" class="post-thumb" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['blueprint_image']; ?>">
<?php
	}
?>
<div class="post-body">
	<?php echo $post['description']; ?>
</div>

<hr>
<?php echo form_open('price-qoute/admin/delete/'.$post['phone_number']); ?>
	<input type="submit" value="Delete" class="btn btn-danger">
</form>