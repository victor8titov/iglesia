<?php get_header(); ?>
  	
  	
   	<div class = "container single_sermons">
		<div class = "wrapper">
		 	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		 		<div class="inner_wrapper">
					 <h2 class="post_title"><?php the_title(); ?></h2>
					 
					 <?php if (has_excerpt()){ ?>
						 <div class="excerpt">
							<?php the_excerpt(); ?>
						 </div>
					 <?php }?>
					 <div class="post_info">
						<div class="post_author">
							<i class="fa fa-user" aria-hidden="true"></i>
							<?php echo the_author_posts_link(); ?>
						</div>
						<div class="post_date">
						 	<i class="fa fa-clock-o" aria-hidden="true"></i>
							 <?php echo get_the_date(); ?> 
						</div>
					 </div>
					 <div class = "post_img">
						 <?php
							$attachments = get_posts(array(
								'post_type' => 'attachment',
								'posts_per_page' => -1,
								'post_parent' => get_the_ID()
							));
							 if($attachments) :	foreach($attachments as $attachment) {
								echo wp_get_attachment_image($attachment->ID, 'sermons-biglist');

								//print_r($attachment);
								/*
								$img_url = wp_get_attachment_image_src($attachment->ID, 'sermons-biglist')[0];
								echo '<img src="'.$img_url.'" class="img-fluid" />';
								*/
							}
							endif;
						?>
					</div>
				 </div>
			 	
			 	
				
				
				<div class="post_content story">
			  		<?php the_content(); ?>
			  	</div>
			 
			 <?php endwhile;  endif;  ?>
			<?php comments_template(); ?> 
		</div>
 	</div>
   
   
<?php get_footer(); ?>