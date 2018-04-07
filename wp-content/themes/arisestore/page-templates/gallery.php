<?php
/* Template Name: Gallery */ 
?>
<?php get_header(); ?>
<!--Start gallery-page-->
<div id="main-content" class="main-content blog-page blog-filter <?php echo esc_attr(tm_sidebar_position()); ?>">
<div class="content-container">	
  <div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
	<?php if ( !is_page_template('page-templates/home.php')) : ?>
<div class="page-title header">
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
      <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
      <?php //comments_template( '', true ); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
    <!-- #content -->
  </div>
  <!-- #primary -->
  <?php get_sidebar(); ?>
</div>
</div>
<!-- End blog-filter -->
<?php get_footer(); ?>