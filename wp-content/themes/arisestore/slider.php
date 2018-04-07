<?php
if(get_option('tmoption_slider_navigation') == 'yes')
	$tmoption_slider_navigation = 'true';
else 
	$tmoption_slider_navigation = 'false';
if(get_option('tmoption_slider_pagination') == 'yes')
	$tmoption_slider_pagination = 'true';
else 
	$tmoption_slider_pagination = 'false';
if(get_option('tmoption_slider_autoplay') == 'yes')
	$tmoption_slider_autoplay = 'true';
else 
	$tmoption_slider_autoplay = 'false'; 
$tmoption_slide_animation_type = get_option('tmoption_slide_animation_type'); 
$tmoption_slideshow_speed = get_option('tmoption_slideshow_speed');
$tmoption_animation_duration = get_option('tmoption_animation_duration'); ?>
<script>
jQuery(window).load(function(){
   "use strict";
  jQuery('.flexslider').flexslider({
	animation: "<?php echo esc_attr($tmoption_slide_animation_type); ?>",
	slideshow: <?php echo esc_attr($tmoption_slider_autoplay); ?>,
	slideshowSpeed: <?php echo esc_attr($tmoption_slideshow_speed); ?>,
	animationDuration: <?php echo esc_attr($tmoption_animation_duration); ?>,
	directionNav: <?php echo esc_attr($tmoption_slider_navigation); ?>,
	controlNav: <?php echo esc_attr($tmoption_slider_pagination); ?>,
	keyboardNav: true,
	mousewheel: false
  });
});
</script>
<?php 
$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$slider_args = array(
		'posts_per_page' 	=> 10, 
		'paged' 			=> $paged,
		'post_type'			=> 'slider',
		'status'			=> 'publish',
		'order'				=> 'ASC'
	);
	
	query_posts($slider_args);
	if ( have_posts() ): ?>
	
<div class="home-slider">
<div class="home-slider-inner slider-loading"></div>
	<div class="flexslider">
	<?php 	if(get_option('tmoption_slider_type') == 'single'): ?>
		<ul class="slides">	
			<?php 
			$i = 1;
			while(have_posts() ): the_post();
			get_post_meta($post->ID, 'slider_background_image', TRUE) ? $slider_background_image = get_post_meta($post->ID, 'slider_background_image', TRUE) : $slider_background_image = '';	
			get_post_meta($post->ID, 'slider_title', TRUE) ? $slider_title = get_post_meta($post->ID, 'slider_title', TRUE) : $slider_title = '';
			get_post_meta($post->ID, 'slider_text_1', TRUE) ? $slider_text_1 = get_post_meta($post->ID, 'slider_text_1', TRUE) : $slider_text_1 = '';
			get_post_meta($post->ID, 'slider_text_2', TRUE) ? $slider_text_2 = get_post_meta($post->ID, 'slider_text_2', TRUE) : $slider_text_2 = '';
			get_post_meta($post->ID, 'slider_text_3', TRUE) ? $slider_text_3 = get_post_meta($post->ID, 'slider_text_3', TRUE) : $slider_text_3 = '';
			get_post_meta($post->ID, 'slider_text_4', TRUE) ? $slider_text_4= get_post_meta($post->ID, 'slider_text_4', TRUE) : $slider_text_4 = '';
			get_post_meta($post->ID, 'slider_link_text', TRUE) ? $slider_link_text = get_post_meta($post->ID, 'slider_link_text', TRUE) : $slider_link_text = '';
			get_post_meta($post->ID, 'slider_link_url', TRUE) ? $slider_link_url = get_post_meta($post->ID, 'slider_link_url', TRUE) : $slider_link_url = '';
			get_post_meta($post->ID, 'slider_link', TRUE) ? $slider_link = get_post_meta($post->ID, 'slider_link', TRUE) : $slider_link = '#';
			?>	
			<li class="flex<?php echo $i;?>">	
				<?php if ( $slider_background_image != '' ) : ?>
				<div class="main_background_image">			
					<?php if ( $slider_link != '' ) : ?>
					<a href="<?php echo esc_url($slider_link); ?>" title="<?php echo esc_attr($slider_link); ?> " target="_blank"><img src="<?php echo esc_url($slider_background_image); ?>" alt=""></a>
					<?php else: ?>
						<img src="<?php echo esc_url($slider_background_image); ?>" alt="">
					<?php endif; ?>
				<?php else: ?>
				<div class="main_background_image">
				<?php endif; ?>
					<div class="slider_area_inner">
						<div class="slider_area_inner_container">
							<?php if ( $slider_title != '' ) : ?>
								<h2 class="slider-title"><?php echo esc_attr($slider_title); ?></h2>
							<?php endif; ?>
							
							<?php if ( $slider_text_1 != '' ) : ?>
								<h2 class="slider-title1"><?php echo esc_attr($slider_text_1); ?></h2>
							<?php endif; ?>
							<div class="smalltext">
							<?php if ( $slider_text_2 != '' ) : ?>
								<h2 class="slider-title2"><?php echo esc_attr($slider_text_2); ?></h2>
							<?php endif; ?>
							<?php if ( $slider_text_3 != '' ) : ?>
								<h2 class="slider-title3"><?php echo esc_attr($slider_text_3); ?></h2>
							<?php endif; ?>
							<?php if ( $slider_text_4 != '' ) : ?>
								<h2 class="slider-title4"><?php echo esc_attr($slider_text_4); ?></h2>
							<?php endif; ?>
							</div>
							<div class="slider-button-container">
							<?php if ( $slider_link_url != '' || $slider_link_url != '' ) : ?>
								<a href="<?php echo esc_url($slider_link_url); ?>" title="<?php echo esc_attr($slider_link_text); ?>" class="button"><?php echo esc_attr($slider_link_text); ?></a>
							<?php endif; ?>	
							</div>	
						</div>			
					</div>
				</div>
			</li>
			<?php $i++; endwhile; ?>
		</ul>
		<?php else: ?>
		<ul class="slides">	
			<?php 
			$i = 1;
			while(have_posts() ): the_post();
			get_post_meta($post->ID, 'slider_background_image1', TRUE) ? $slider_background_image1 = get_post_meta($post->ID, 'slider_background_image1', TRUE) : $slider_background_image1 = '';	
			get_post_meta($post->ID, 'slider_background_image2', TRUE) ? $slider_background_image2 = get_post_meta($post->ID, 'slider_background_image2', TRUE) : $slider_background_image2 = '';	
			get_post_meta($post->ID, 'slider_title1', TRUE) ? $slider_title1 = get_post_meta($post->ID, 'slider_title1', TRUE) : $slider_title1 = '';
			get_post_meta($post->ID, 'slider_title2', TRUE) ? $slider_title2 = get_post_meta($post->ID, 'slider_title2', TRUE) : $slider_title2 = '';
			get_post_meta($post->ID, 'slider_title3', TRUE) ? $slider_title3 = get_post_meta($post->ID, 'slider_title3', TRUE) : $slider_title3 = '';
			get_post_meta($post->ID, 'slider_title4', TRUE) ? $slider_title4 = get_post_meta($post->ID, 'slider_title4', TRUE) : $slider_title4 = '';
			get_post_meta($post->ID, 'slider_title5', TRUE) ? $slider_title5 = get_post_meta($post->ID, 'slider_title5', TRUE) : $slider_title5 = '';
			get_post_meta($post->ID, 'slider_title6', TRUE) ? $slider_title6= get_post_meta($post->ID, 'slider_title6', TRUE) : $slider_title6 = '';
			get_post_meta($post->ID, 'slider_description1', TRUE) ? $slider_description1 = get_post_meta($post->ID, 'slider_description1', TRUE) : $slider_description1 = '';
			get_post_meta($post->ID, 'slider_description2', TRUE) ? $slider_description2 = get_post_meta($post->ID, 'slider_description2', TRUE) : $slider_description2 = '';
			get_post_meta($post->ID, 'slider_link_text1', TRUE) ? $slider_link_text1 = get_post_meta($post->ID, 'slider_link_text1', TRUE) : $slider_link_text1 = '';
			get_post_meta($post->ID, 'slider_link_text2', TRUE) ? $slider_link_text2 = get_post_meta($post->ID, 'slider_link_text2', TRUE) : $slider_link_text2 = '';
			get_post_meta($post->ID, 'slider_link_url1', TRUE) ? $slider_link_url1 = get_post_meta($post->ID, 'slider_link_url1', TRUE) : $slider_link_url1 = '';
			get_post_meta($post->ID, 'slider_link_url2', TRUE) ? $slider_link_url2 = get_post_meta($post->ID, 'slider_link_url2', TRUE) : $slider_link_url2 = '';
			get_post_meta($post->ID, 'slider_link1', TRUE) ? $slider_link1 = get_post_meta($post->ID, 'slider_link1', TRUE) : $slider_link1 = '#';
			get_post_meta($post->ID, 'slider_link2', TRUE) ? $slider_link2 = get_post_meta($post->ID, 'slider_link2', TRUE) : $slider_link2 = '#';
			?>	
			<li>
				<div class="sub_flex">	
				<?php if ( $slider_background_image1 != '' ) : ?>
				<div class="main_background_image1 image">				
					<?php if ( $slider_link1 != '' ) : ?>
					<a href="<?php echo esc_url($slider_link1); ?>" title="<?php echo esc_attr($slider_link1); ?> " target="_blank"><img src="<?php echo esc_url($slider_background_image1); ?>" alt=""></a>
					<?php else: ?>
						<img src="<?php echo esc_url($slider_background_image1); ?>" alt="">
					<?php endif; ?>
				<?php else: ?>
				<div class="main_background_image1 image">
				<?php endif; ?>
					<div class="slider_area_inner1">
						<div class="slider_area_inner_container1">
							<?php if ( $slider_title1!= '' ) : ?>
								<h2 class="slider-title1"><?php echo esc_attr($slider_title1); ?></h2>
							<?php endif; ?>
							<?php if ( $slider_title2!= '' ) : ?>
								<h2 class="slider-title2"><?php echo esc_attr($slider_title2); ?></h2>
							<?php endif; ?>
							<?php if ( $slider_title3!= '' ) : ?>
								<h2 class="slider-title3"><?php echo esc_attr($slider_title3); ?></h2>
							<?php endif; ?>
							<?php if ( $slider_description1 != '' ) : ?>
								<h3 class="slider-description1"><?php echo esc_attr($slider_description1); ?></h3>
							<?php endif; ?>
							
							<?php if ( $slider_link_url1 != '' || $slider_link_url1 != '' ) : ?>
							<div class="slider-button-container1">
								<a href="<?php echo esc_url($slider_link_url1); ?>" title="<?php echo esc_attr($slider_link_text1); ?>" class="button"><?php echo esc_attr($slider_link_text1); ?></a>
							</div>	
							<?php endif; ?>	
							
						</div>			
					</div>
				</div>
				
				<?php if ( $slider_background_image2 != '' ) : ?>
				<div class="main_background_image2 image">				
					<?php if ( $slider_link2 != '' ) : ?>
					<a href="<?php echo esc_url($slider_link2); ?>" title="<?php echo esc_attr($slider_link2); ?> " target="_blank"><img src="<?php echo esc_url($slider_background_image2); ?>" alt=""></a>
					<?php else: ?>
						<img src="<?php echo esc_url($slider_background_image2); ?>" alt="">
					<?php endif; ?>
				<?php else: ?>
				<div class="main_background_image2">
				<?php endif; ?>
					<div class="slider_area_inner2">
						<div class="slider_area_inner_container2">
							<?php if ( $slider_title4 != '' ) : ?>
								<h2 class="slider-title1"><?php echo esc_attr($slider_title4); ?></h2>
							<?php endif; ?>
							<?php if ( $slider_title5!= '' ) : ?>
								<h2 class="slider-title2"><?php echo esc_attr($slider_title5); ?></h2>
							<?php endif; ?>
							<?php if ( $slider_title6 != '' ) : ?>
								<h2 class="slider-title3"><?php echo esc_attr($slider_title6); ?></h2>
							<?php endif; ?>
							<?php if ( $slider_description2 != '' ) : ?>
								<h3 class="slider-description2"><?php echo esc_attr($slider_description2); ?></h3>
							<?php endif; ?>
							<?php if ( $slider_link_url2 != '' || $slider_link_url2 != '' ) : ?>
							<div class="slider-button-container2">
								<a href="<?php echo esc_url($slider_link_url2); ?>" title="<?php echo esc_attr($slider_link_text2); ?>" class="button"><?php echo esc_attr($slider_link_text2); ?></a>
							</div>	
							<?php endif; ?>	
							
						</div>			
					</div>
				</div>
				</div>
			</li>
			<?php $i++; endwhile; ?>
			<div class="arrow">&nbsp;</div>
		</ul>
		<?php endif; ?>				
	</div>
</div>
<?php endif; ?>
<?php wp_reset_query(); ?>