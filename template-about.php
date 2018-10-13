<?php
/**
 * Template Name: Template About 
 */
get_header(); ?>
    <!-- Content -->
<div class = "container ale_about_page">
	
	<h2 class = "page_title"><?php the_title(); ?></h2>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="about_container">
		 
			<section class="content wrapper">
				<?php the_content(); ?>
			</section>
			<?php if(ale_get_meta('info_display') === 'show') {?>
				<section class="info_box" <?php if(ale_get_meta('info_bg')) { echo 'style="background-image:url('.ale_get_meta('info_bg').');"'; }; ?>>
					<div class="center_block">
					<h3 class="info_title"><?php ale_meta('info_title'); ?></h3>
					<span class="description"><?php ale_meta('info_desc'); ?></span>
					<div class="divider"></div>
					</div>
				</section>
			<?php };?>
			
			<?php if(ale_get_meta('service_display') === 'show') {?>
				<section class="services_items wrapper">
					<div class="services_list">
						<!-- block 1 services -->
						<div class="serv_item">
							<?php if(ale_get_meta('service_icon1')) { ?>
								<div class="icon_box">
									<img src = "<?php ale_meta('service_icon1')?>" alt="">
								</div>
								
							<?php } ?>
							
							<?php if(ale_get_meta('service_text1')) { ?>
									<p>
										<?php ale_meta('service_text1') ?>
									</p>														
							<?php } ?>
						</div>
						<!-- block 2 services -->
						<div class="serv_item">
							<?php if(ale_get_meta('service_icon2')) { ?>
								<div class="icon_box">
									<img src = "<?php ale_meta('service_icon2')?>" alt="">
								</div>
								
							<?php } ?>
							
							<?php if(ale_get_meta('service_text2')) { ?>
									<p>
										<?php ale_meta('service_text2') ?>
									</p>														
							<?php } ?>
						</div>
						<!-- block 3 services -->
						<div class="serv_item">
							<?php if(ale_get_meta('service_icon3')) { ?>
								<div class="icon_box">
									<img src = "<?php ale_meta('service_icon3')?>" alt="">
								</div>
								
							<?php } ?>
							
							<?php if(ale_get_meta('service_text3')) { ?>
									<p>
										<?php ale_meta('service_text3') ?>
									</p>														
							<?php } ?>
						</div>
						<!-- block 4 services -->
						<div class="serv_item">
							<?php if(ale_get_meta('service_icon4')) { ?>
								<div class="icon_box">
									<img src = "<?php ale_meta('service_icon4')?>" alt="">
								</div>
								
							<?php } ?>
							
							<?php if(ale_get_meta('service_text4')) { ?>
									<p>
										<?php ale_meta('service_text4') ?>
									</p>														
							<?php } ?>
						</div>
					</div>
				</section>
			<?php };?>
			
			<?php if(ale_get_meta('people_display') === 'show') {?>
				<section class="our_people" <?php if(ale_get_meta('people_bg')) { echo 'style="background-image:url('.ale_get_meta('people_bg').');"'; }; ?>>
					<div class="wrapper">
						<div class="top_tittle">
							<div class="left_arrow">
							</div>
							<div class="center_info">
								<?php if (ale_get_meta('people_title')) {?><h3 class="people_title"><?php ale_meta('people_title'); ?></h3><?php };?>
								<?php if (ale_get_meta('people_text')) {?><span class="people_desc"><?php ale_meta('people_text'); ?></span><?php };?>
							</div>
							<div class="right_arrow">
							</div>
						</div>
					</div>
				</section>
			<?php };?>		
		</div>
	<?php endwhile; endif; ?>
 		 		
</div>
 	
<?php get_footer(); ?> 