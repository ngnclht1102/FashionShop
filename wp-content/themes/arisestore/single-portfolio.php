<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 * @author         TemplateMela
 * @version        Release: 1.0
 */
?>
<?php
//taxonomy
$taxonomy = 'portfolio_categories';
$link_page= '';
//category link
$terms = get_the_terms($post->ID, $taxonomy);
$i=0;
foreach ($terms as $taxindex => $taxitem) {
	if($i==0):
		$link_cat=get_term_link($taxitem->slug,$taxonomy);
		$term_slug = $taxitem->slug;
		$term_id = $taxitem->term_id;    
	endif;
$i++;
}
?>
<?php get_header(); ?>
<!--Start #primary-->
<div class="content-container">
<div id="primary" class="site-content">
  <!--Start #content-->
  <div id="content" role="main">  
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
					<?php printf( __( 'Search Results for: "%s"', 'arise' ), get_search_query() ); 
				else :
				    the_title();
	        	endif; 	
	   }else {
			 if(is_blog()){  ?>
				 <?php  echo get_the_title( get_option('page_for_posts', true));
			}else if(is_search()) { ?>
				<?php printf( __( 'Search Results for: "%s"', 'arise' ), get_search_query() ); 
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
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_html__('Pages:', 'arise' ), 'after' => '</div>' ) ); ?>
      </div>
      <!-- .entry-content -->
      <div class="entry-utility-port">
        <?php edit_post_link( esc_html__('Edit', 'arise' ), '<span class="edit-link">', '</span>' ); ?>
      </div>
      <!-- .entry-utility -->
      <?php if ( comments_open() ) : ?>
      <?php comments_template( '', true ); ?>
      <?php endif; ?>
    </div>
    <!-- #post-## -->
    <?php endwhile; // end of the loop. ?>
  </div>
  <!-- End #content -->
</div>
<!-- End #primary-->
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>