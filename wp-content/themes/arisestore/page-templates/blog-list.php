<?php
/* Template Name: Blog List */
?>
<?php get_header(); 
$arise_content_position = arise_content_position();
?>
<!-- Start blog-list -->
<div id="main-content" class="main-content blog-page blog-list <?php echo tm_sidebar_position(); ?>">
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
      <?php if($arise_content_position == 'above') : 
				// Page thumbnail
				templatemela_post_thumbnail();
				the_content(); 
			endif; ?>
      <div id="container" class="blog-list-container">
        <?php	
			if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }			
			wp_reset_postdata();  // re-sets query
  			$last_class = "";
				$blog_args = array(
					'posts_per_page' 	=> arise_blog_list_posts_per_page(), 
					'paged' 			=> $paged,
					'post_type'			=> 'post',
					'status'			=> 'publish',
				);
				$wp_query = new WP_Query();
    			$wp_query->query( $blog_args );
				if ( $wp_query->have_posts() ): ?>
        <?php 
				while( $wp_query->have_posts() ): $wp_query->the_post(); ?>
        <div class="item">
          <?php  $post_format = get_post_format();
					get_template_part( 'content', $post_format );
			  ?>
        </div>
        <?php endwhile; ?>
        <?php else: ?>
        <p>
          <?php  esc_html__('Sorry, no posts matched your criteria.', 'arise' ); ?>
        </p>
        <?php endif;
				 ?>
        <?php // Post navigation.
			   templatemela_paging_nav();
			   wp_reset_postdata();  ?>
      </div>
      <?php if($arise_content_position == 'below') : 
				// Page thumbnail
				templatemela_post_thumbnail();
				the_content(); 
			endif; ?>
    </div>
    <!-- #content -->
  </div>
  <!-- #primary -->
  <?php get_sidebar(); ?>
</div>
</div>
<!-- End blog-list -->
<?php get_footer(); ?>