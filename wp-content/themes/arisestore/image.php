<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();
get_header();
?>

<div class="content-container">
  <section id="primary" class="content-area image-attachment">
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
    <div id="content" class="site-content" role="main">
      <?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
	?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
          <div class="entry-meta"> <span class="entry-date">
            <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
            </span> <span class="full-size-link"><a href="<?php echo esc_url(wp_get_attachment_url()); ?>"><?php echo esc_attr($metadata['width']); ?> &times; <?php echo esc_attr($metadata['height']); ?></a></span> <span class="parent-post-link"><a href="<?php echo esc_url(get_permalink( $post->post_parent )); ?>" rel="gallery"><?php echo esc_attr(get_the_title( $post->post_parent )); ?></a></span>
            <?php edit_post_link( esc_html__('Edit', 'arise' ), '<span class="edit-link">', '</span>' ); ?>
          </div>
          <!-- .entry-meta -->
        </header>
        <!-- .entry-header -->
        <div class="entry-content">
          <div class="entry-attachment">
            <div class="attachment">
              <?php arise_the_attached_image(); ?>
            </div>
            <!-- .attachment -->
            <?php if ( has_excerpt() ) : ?>
            <div class="entry-caption">
              <?php the_excerpt(); ?>
            </div>
            <!-- .entry-caption -->
            <?php endif; ?>
          </div>
          <!-- .entry-attachment -->
          <?php
				the_content();
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'arise' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
        </div>
        <!-- .entry-content -->
      </article>
      <!-- #post-## -->
      <nav id="image-navigation" class="navigation image-navigation">
        <div class="nav-links">
          <?php previous_image_link( false, '<div class="previous-image">' . esc_html__('Previous Image', 'arise' ) . '</div>' ); ?>
          <?php next_image_link( false, '<div class="next-image">' . esc_html__('Next Image', 'arise' ) . '</div>' ); ?>
        </div>
        <!-- .nav-links -->
      </nav>
      <!-- #image-navigation -->
      <?php comments_template(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
    <!-- #content -->
  </section>
  <!-- #primary -->

  <?php get_sidebar(); ?>
   </div>

<?php get_footer(); ?>