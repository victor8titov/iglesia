 <?php get_header(); ?>
 <div class="wrapper">
 	<h2 class="page_title"><?php _e('Sermons', 'aletheme'); ?></h2>
 	<!--********************************************************-->
 	<!--			модуль с предстоящими sermons			-->
 	<!--********************************************************-->
 		<?php if (have_posts()) : while (have_posts()) : the_post(); 
			if (time() <= ale_get_meta('sermons_date') ) { ?>
			<div class = "next_sermon">
 				<div class = "mask_sermon">
					<arcticle class = "next_item_sermon cf"> 
							<div class="next_seremon_info">
								<p class="text_next">Next sermony:</p>
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h4>
								<?php the_content(); ?>
								<span class="next_sermon_timer" data-dateSermon = "<?php echo ale_get_meta('sermons_date'); ?>"></span>
							</div>
							<?php echo get_the_post_thumbnail($post->ID,'sermons-biglist'); ?>

					</arcticle>
				</div>
 			</div>
			 <?php } ?>
		<?php endwhile; endif; ?>
		
		
 	<!--********************************************************-->
 	<!--			МОДУЛЬ С ПРОШЕДШИМИ sermons		-->
 	<!--********************************************************-->
 	<div class = "sermons_list">
 		<?php 
		
		global $query_string;
		query_posts($query_string . '&posts_per_page=9');
		
		if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<arcticle class = "item_sermon"> 
				
					<?php echo get_the_post_thumbnail($post->ID,'sermons-list'); ?>
					<h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 8, '...'); ?> </a></h3>
					<span class="post_date">
						<?php echo date( "d M Y", (int)ale_get_meta('sermons_date')); ?>	
					</span>
				
			</arcticle>
			   
		<?php endwhile; endif; ?>
 		<?php wp_reset_query(); ?>
 	</div>
 	
 </div>
 
 <!--********************************************************-->
 <!-- Пагинация страницы -->
 <!--********************************************************-->
<?php global $wp_query;
		 	if ($wp_query->max_num_pages > 1) 
			{ ?>
         <div class="pagination">
         	<div class="left_arrow">
         		<?php 
					if (get_previous_posts_link())	{
						echo get_previous_posts_link('<i class="fa fa-angle-left" aria-hidden="true"></i>');
						} 
						else {
						echo '<i class="fa fa-angle-left" aria-hidden="true"></i>';
						}
						?>
         	</div>
         	
         	<div class="paginate_items">
         		<?php ale_page_links(); ?>
         	</div>
         	
         	<div class="right_arrow">
         		<?php 
					if (get_next_posts_link()) {
						echo get_next_posts_link('<i class="fa fa-angle-right" aria-hidden="true"></i>');}
						else {
							echo '<i class="fa fa-angle-right" aria-hidden="true"></i>';
						}
						?>
         	</div>
	</div>  
	<?php } ?>
<?php get_footer(); ?>