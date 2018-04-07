<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
get_header();
?>
<div id="main-content" class="main-content <?php echo esc_attr(tm_sidebar_position()); ?> <?php echo esc_attr(tm_page_layout()); ?>">
  <?php
	if ( is_front_page() && arise_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
	?>
<div class="content-container">
  <div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
	<?php if ( !is_page_template('page-templates/home.php')) : ?>
<div class="page-title">
  <div class="page-title-inner">
    <h1 class="entry-title-main">
<?php	    
	  	$shop='';    
	   if($shop == '1') {
	       		if(is_shop()) :
		    		echo '';
				elseif(is_blog()):  ?>
					 <?php  echo get_the_title( get_option('page_for_posts', true));
				elseif(is_search()) : ?>
					<?php printf( esc_html__('Search Results for: "%s"', 'arise' ), get_search_query() ); 
				else :
				    the_title();
	        	endif; 	
	   }else {
			 if(is_blog()){  ?>
				 <?php  echo get_the_title( get_option('page_for_posts', true));
			}else if(is_search()) { ?>
				<?php printf( esc_html__('Search Results for: "%s"', 'arise' ), get_search_query() ); 
			}else {
				    the_title();
			}
		}  
	  ?>
    </h1>
    <?php arise_breadcrumbs(); ?>
  </div>
</div>
<?php endif; ?>
      <?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
			// Include the page content template.
			get_template_part( 'content', 'page' ); ?>
			<?php ?>  <?php // If comments are open or we have at least one comment, load up the comment template.
			if ( is_user_logged_in() ){
				if ( comments_open() || get_comments_number() ) {
				comments_template();
				}
			} ?>
      <?php  endwhile;	?>
    </div>
    <!-- #content -->
  </div>
  <!-- #primary -->
  <?php get_sidebar(); ?>
</div>
</div>
<!-- #main-content -->
<?php get_footer(); ?>