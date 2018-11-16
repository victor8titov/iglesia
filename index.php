<?php get_header(); ?>
    <!-- Content -->
<div class="ale_blog_page">
<h2 class = "blog_page_title">Blog</h2>
<!-- ----------------------------------------------------------- -->  
<!-- 						Blog Content 						-->
        <div class="blog-content cf">
            <?php 
			global $query_string;
			query_posts($query_string . '&posts_per_page=8');
			
			if (have_posts()) : while (have_posts()) : the_post(); ?>
               
			   <!-- Blog Item -->
			  
				<div class="blog-item <?php if (has_post_thumbnail()) { echo ale_get_meta('post_thumbnail_size');}; ?>">
					<?php if (has_post_thumbnail()): ?>
						<div class = "img-post">
							<a href="<?php the_permalink(); ?>" >
								<?php if (ale_get_meta('post_thumbnail_size') === 'big'): ?>
									<?php echo get_the_post_thumbnail($post->ID,'post-bigbox'); ?>
								<?php elseif (ale_get_meta('post_thumbnail_size') === 'little'): ?>
									<?php echo get_the_post_thumbnail($post->ID,'post-minibox'); ?>
								<?php endif; ?>
							</a>
						</div>
					<? endif; ?>
						
					<div class="item-content">
						<?php the_category(); ?>
						<h2 class="title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
						<div class="content">
							<?php if (ale_get_meta('post_thumbnail_size') === 'big' && has_post_thumbnail()): ?>	
							<?php echo ale_trim_excerpt('100'); ?>
							<?php else: ?>
							<?php echo ale_trim_excerpt('22'); ?>
							<?php endif ?>
						</div>
					</div>

					<div class = "date_comment_info">
							<span class = "comments"><?php comments_number('0 ','1','% '); ?><i class="fa fa-comment" aria-hidden="true"></i></span> 
							<span class = "heart"><i class="fa fa-heart " aria-hidden="true"></i></span>
							<span class = "date"><?php echo get_the_date('d M Y'); ?></span>
					</div>
				</div>
  				<!-- end Blog Item -->
			   
            <?php endwhile; else: ?>
                <?php ale_part('notfound')?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>

<!-- ----------------------------------------------------------- -->        
<!-- 					pagination  							 -->
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

        

        
</div>
    
    
<?php get_footer(); ?>