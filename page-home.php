<?php
/*
  * Template name: Home
  * */
get_header(); ?>

<section class="home_slider cf">
	<div class="flexslider homeslider">
		<ul class="slides">
		<?php $slider = ale_sliders_get_slider(ale_get_option('homesliderslug')); ?>
		<?php if($slider): ?>
			<?php foreach ($slider['slides'] as $slide) : ?>
				<li>
					<figure>
						<?php if ($slide['image']) : ?>
							<img src="<?php echo $slide['image'] ?>"  alt="<?php echo $slide['title'];	?>">
							<?php endif ?>
							<?php if($slide['title'] or $slide['description']){ ?>
							<figcaption>
	 							<?php if($slide['title']){ echo '<span class="mainslidertitle">'.$slide['title'].'</span>'; } ?><br />
	 							<?php if($slide['description']){ echo '<span class="mainsliderdesc">'.$slide['description'].'</span>'; } ?><br />
								 <?php if($slide['url']){echo '<a href="'.$slide['url'].'" class="sliderlinkmore">'.__('Details','aletheme').'</a>'; } ?>
							</figcaption>
								<?php } ?>
					</figure>
				</li>
			<?php endforeach; ?>
			<?php endif; ?>
								
		</ul>
	</div>
</section>
<div class = " content_page_home wrapper">
<?php if( have_posts() ): while( have_posts() ): the_post(); ?>
	<p class = "content_page_home"><?php echo the_content();?></p>
	<!--**************************************************************
							Section Our Sermons
		***************************************************************-->
	<?php if (ale_get_meta('sermons_display') === 'show'): ?>						
	<section class = "our_sermons">
		<h2>Our sermons</h2>
		<p><?php ale_meta('sermons_title'); ?></p>

		<div class = "sermons_list">
			<?php
				
				$args = array('post_type' => 'sermons',
								'numberposts' => 3); // 3 записей из рубрики 9
				$myposts = get_posts( $args );
				foreach( $myposts as $post ): setup_postdata($post); ?>
					<article class = "item_sermon"> 
					
						<?php echo get_the_post_thumbnail($post->ID,'sermons-list'); ?>
						<h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 8, '...'); ?> </a></h3>
						<span class="post_date">
							<?php echo date( "d M Y", (int)ale_get_meta('sermons_date')); ?>	
						</span>
					
					</article>
				<?php	endforeach; ?>
			<?php wp_reset_postdata(); ?>
			
		</div>							

		<p><?php ale_meta('sermons_desc'); ?></p>

		<div class = "next_sermons">
			<!--********************************************************-->
			<!--			модуль с предстоящими sermons			-->
			<!--********************************************************-->						
			<?php 
				$args = array('post_type' => 'sermons',
							'numberposts' => 10);
				$myposts = get_posts($args);
				foreach( $myposts as $post ): setup_postdata($post); ?>
					<?php if (time() <= ale_get_meta('sermons_date') ) { ?>
					<div class = "next_sermon">
						<div class = "mask_sermon">
							<article class = "next_item_sermon cf"> 
									<div class="next_seremon_info">
										<p class="text_next">Next sermony:</p>
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h4>
										<?php the_content(); ?>
										<span class="next_sermon_timer" data-dateSermon = "<?php echo ale_get_meta('sermons_date'); ?>"></span>
									</div>
									<?php echo get_the_post_thumbnail($post->ID,'sermons-biglist'); ?>

							</article>
						</div>
					</div>				
					<?php } ?>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
		</div>



	</section>
	<?php endif; ?>

	<!--**************************************************************
							OUR PEOPLE
		***************************************************************-->
	<?php if(ale_get_meta('people_display') === 'show'): ?>
		<section class = "people">
			<div class = "our_people">
				<div class="bg_people_mask" <?php if(ale_get_meta('people_bg')) { echo 'style="background-image:url('.ale_get_meta('people_bg').');"'; }; ?>></div> 
					<div class="wrapper">
						<div class="top_tittle">
							<div class="left_arrow">
								<span class="left">
									<i class="fa fa-angle-left" aria-hidden="true"></i>
								</span>
							</div>
							<div class="center_info">
								<?php if (ale_get_meta('people_title')) {?><h3 class="people_title"><?php ale_meta('people_title'); ?></h3><?php };?>
								<?php if (ale_get_meta('people_text')) {?><span class="people_desc"><?php ale_meta('people_text'); ?></span><?php };?>
							</div>
							<div class="right_arrow">
								<span class="right">
									<i class="fa fa-angle-right" aria-hidden="true"></i>
								</span>
							</div>
						</div>
						<div class="peoples_list">
						<?php 
							$args = array('post_type' => 'people',
										'numberposts' => -1);
							$myposts = get_posts($args);
							foreach($myposts as $post): setup_postdata($post) ?>
								<div class="item_people">
									<div class="mask_hover">
										<div class="image_people">
										<?php echo get_the_post_thumbnail($post->ID,'people-user'); ?>
										</div>
										<div class="people_info">
										<h4 class="name"><?php echo the_title() ?></h4>
										<?php if(ale_get_meta('people_post')) {?>
										<span class="post"><?php ale_meta('people_post'); ?></span>
										<?php }?>
										</div>
									</div>
								</div>
							
							<?php endforeach;  ?>
							<?php wp_reset_postdata(); ?>		
							
						</div>
					</div>
			</div>	
			
		</section>
	<?php endif; ?>
	<!--**************************************************************
							EVENTS
		***************************************************************-->
	<?php if (ale_get_meta('events_display') === 'show'):?>
		<section class = "events">
			<div class = "events_section">
				<h3 >Events</h3>
				<ul>
					<?php 
						$args = array('post_type' => 'events',
									'numberposts' => 5);
						$myposts = get_posts($args);
						foreach($myposts as $post): setup_postdata($post); ?>
						<li>
							<?php echo wp_trim_words(get_the_title(),4); ?>
						</li>	
				
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</ul>
				<a href = "<?php echo get_post_type_archive_link('events');  ?>" > All events </a>
			</div>
			<div class = "video_section">
				<video width = "470" height = "296" id = "video" poster = "<?php ale_meta('event_poster'); ?>" >
					<source src = "<?php ale_meta('event_video'); ?>" type = "audio/mpeg">
					<div>Sorry your browser is not support tag video </div>
				</video>
				<div id = "playpause_block">
					<div class = "icon">
						<i class="fa fa-play" aria-hidden="true"></i>
						
					</div>
					<div class = "info">
						<span class = "title"><?php ale_meta('video_title'); ?></span>
						<span class = "content"><?php ale_meta('video_text'); ?></span>
					</div>
				</div>
				<!--        Controls panel      -->
				<div id = "controls">
					<span id = "playpause_button" >
						<i class="fa fa-play" aria-hidden="true"></i>
						<i class="fa fa-pause" aria-hidden="true"></i>
					</span>
					<span id="progress">
						<span id="total">   
							<span id="buffered"><span id="current">​</span></span>
						</span>
					</span>
					<span id="time">
						<span id="currenttime">00:00</span> / 
						<span id="duration">00:00</span>
					</span>
					<span id = "volume">
						<i class="fa fa-volume-up" aria-hidden="true"></i>
						<i class="fa fa-volume-off" aria-hidden="true"></i>
					</span>
				</div>
			</div>
			<div class = "people_say_section">
				<h3>People Say</h3>
				<?php 
					$args = array('post_type' => 'post',
									'numberposts' => 1,
									'category_name' => 'pople-say');
					$myposts = get_posts($args);
					foreach($myposts as $post): setup_postdata($post); ?>
					<?php echo get_the_post_thumbnail($post->ID,'post-minibox'); ?>
					<h4 class="title"><?php the_title(); ?></h4>
					<span class = "prof_autor"><?php ale_meta('prof_post'); ?></span>
					<span class = "content"><?php echo ale_trim_excerpt('22'); ?></span>
					<a href = "<?php echo get_category_link(13); ?>">Read  more</a>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>	
			</div>
			<div class = "info_section">
				<p class = "desc"><?php ale_meta('events_text'); ?></p>
				<span class = "title"><?php ale_meta('events_title'); ?></span>
			</div>
		</section>
	<?php endif;?>

	<!--**************************************************************
							OUR BLOG
		***************************************************************-->
	<section class = "our_blog"></section>

	<!--**************************************************************
							DONATION
		***************************************************************-->
	<section class = "donation"></section>

	<!--**************************************************************
							GALLeRY
		***************************************************************-->	
	<section class = "gallery"></section>	
<?php endwhile;?>
<?php endif; ?>
</div>

<?php get_footer(); 

