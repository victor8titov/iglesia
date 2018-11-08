<?php get_header(); ?>
<?php 

$post_type = get_post_type( $post_id );
echo $post_type;
print_r(  is_single() && !is_attachment()  );

       
        




?>

    <!-- Content -->
<div class="blog-center-align">
<h1>Blog</h1>
<!-- ----------------------------------------------------------- -->  
<!-- 						Blog Content 						-->
        <div class="blog-content">
            <?php 
			global $query_string;
			query_posts($query_string . '&posts_per_page=8');
			
			if (have_posts()) : while (have_posts()) : the_post(); ?>
               
			   <!-- Blog Item -->
				<div class="blog-item">
					<a href="<?php the_permalink(); ?>" class="img-post">
						<?php echo get_the_post_thumbnail($post->ID,'post-bigbox') ?>
					</a>
					<div class="item-content">
						<p class="category"><?php the_category(); ?> </p>
						<a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
						<div class="content"><?php echo ale_trim_excerpt('22'); ?></div>
						<div class = "date_comment_info">
							<p class = "comments"><?php comments_number('0 ','1','% '); ?><i class="fa fa-comment" aria-hidden="true"></i></p> 
							<i class="fa fa-heart" aria-hidden="true"></i>
							<p class = "date"><?php echo get_the_date('d M Y'); ?></p>
						</div>
						
					</div>
				</div>
  
			   
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