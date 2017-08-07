<h2><?= $title ?></h2>
<h2> <?php print_r($sesh) ?></h2>
<?php foreach($posts as $post) : ?>
	<h3><?php echo $post['email']; ?></h3>
	<div class="row">
		<div class="col-md-3">
			<?php
			
				$ext = pathinfo($post['blueprint_image'], PATHINFO_EXTENSION);
            	if ($ext == 'pdf') { ?>
					<object data="<?php echo base_url(); ?>assets/pdfs/<?php echo $post['blueprint_image']?>" type="application/pdf" width="100%" height="auto">
					<p>Alternative text - include a link <a href="<?php echo base_url(); ?>assets/pdfs/<?php echo $post['blueprint_image']?>">to the PDF!</a></p>
					</object>
			<?php
				} else {
			?>
			<img style="width:100%;height:auto;" class="post-thumb" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['blueprint_image']; ?>">
			<?php
				}
			?>
		</div>
		<div class="col-md-9">
			<small class="post-date">Posted on: <?php echo $post['created_at']; ?> by <strong><?php echo $post['name']; ?></strong></small><br>
            <?php echo word_limiter($post['description'], 60); ?>
            <br><br>
            <p><a class="btn btn-default" href="<?php echo base_url('/price-qoute/admin/'.$post['phone_number']); ?>">Read More</a></p>
		</div>
	</div>
<?php endforeach; ?>