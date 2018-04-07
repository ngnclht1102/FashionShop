<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
get_header(); ?>
<div class="main-content">
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
			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );
			$arise_is_author_info = arise_is_author_info();
			if($arise_is_author_info == 1):
				get_template_part( 'author-bio' );
			endif;
			// Previous/next post navigation.
			templatemela_post_nav();
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
		$arise_is_related_posts = arise_is_related_posts();	
	?>
  </div>
  <!-- #content -->
</div>
<!-- #primary -->
<?php
get_sidebar( 'content' );
get_sidebar();?>
</div>
</div>
<?php 
get_footer(); ?>