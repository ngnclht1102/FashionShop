<?php
/**
 * The template for displaying posts in the Video post format
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-main-content">
  <?php if ( is_search() || !is_single()) : // Only display Excerpts for Search and not single pages ?>
	  <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		  <div class="entry-thumbnail">
			<?php 
			the_post_thumbnail('blog-posts-list');
			$postImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
			?>
			<?php 
	if(!empty($postImage)): ?>
	<div class="block_hover">
		<div class="links">
			  <a href="<?php echo esc_url($postImage); ?>" title="Click to view Full Image" data-lightbox="example-set" class="icon mustang-gallery"><i class="fa fa-search"></i></a> <a href="<?php echo esc_url(get_permalink()); ?>" title="Click to view Read More" class="icon readmore"><i class="fa fa-link"></i></a> 
		</div>
	</div>
	<?php	endif; ?>
		  </div>		
		  <?php else : ?>
			  <?php if ($postImage = templatemela_get_first_post_images(get_the_ID())):?>
				  <?php if( $postImage!="0" ) : ?>
				  <div class="entry-thumbnail">
					<div class="entry-image-loop-con main">
					  <?php arise_print_images_thumb($postImage, get_the_title(get_the_ID()) , 885, 330,'center'); ?>
					  <article class="da-animate da-slideFromRight" style="display: block;">
						<div class="blog-icon-container"> <span class="zoom"><a data-lightbox="example-set" id="blog-zoom" href="<?php echo esc_url($postImage); ?>" title="Standard Post"></a></span> <span class="single_link"><a href="<?php echo esc_url(get_permalink()); ?>" title="View Full Image" class="standard"></a></span> </div>
					  </article>
					</div>
				  </div>
			  <?php endif; ?>
			<?php endif; ?>
  		<?php endif; ?>
  	<?php endif; ?>
	
	  <div class="entry-content-other">
	   <header class="entry-header">
	   <div class="entry-content-date">
		  	<?php arise_post_entry_date(); ?>
		</div>
			<?php 		
					if ( is_single() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
					endif;
				?>
		  </header>
      <!-- .entry-header -->
	 <?php if ( is_search() || !is_single()) : // Only display Excerpts for Search and not single pages ?> 
	  <div class="entry-summary">
        <div class="excerpt"> <?php echo arise_posts_short_description(); ?> 
		<?php if(!is_single()): ?>
			<div class="entry-content-inner"> 
			
						<div class="entry-meta-inner">    
							<div class="entry-meta"><span class="post-format"> <a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'video' ) ); ?>"><?php echo esc_attr(get_post_format_string( 'video' )); ?></a> </span>
								<?php arise_comments_link(); ?>
							  <?php arise_author_link(); ?>							  
							  <?php edit_post_link( esc_html__('Edit', 'arise' ), '<span class="edit-link"><i class="fa fa-pencil"></i>', '</span>' ); ?>
							</div>	
							<!-- .entry-meta -->
							</div>
			</div>
			<?php endif; ?>
			</div>
      </div>
      <!-- .entry-summary -->
      <?php else : ?>
      <div class="entry-content">
        <?php the_content( wp_kses( __('Continue reading <span class="meta-nav">&rarr;</span>', 'arise' ),arise_allowed_html())); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'arise' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
      </div>
	   <?php if(is_single()): ?>
			<div class="entry-content-inner"> 
			
						<div class="entry-meta-inner">    
							<div class="entry-meta">
								<?php if (is_single()):
									arise_categories_links(); 
								endif;?>		  
							  <?php //arise_tags_links(); ?>
							  <?php arise_author_link(); ?>
							  <?php arise_comments_link(); ?>
							  <?php edit_post_link( esc_html__('Edit', 'arise' ), '<span class="edit-link"><i class="fa fa-pencil"></i>', '</span>' ); ?>
							</div>	
							<!-- .entry-meta -->
							</div>
				  </div>
			<?php endif; ?> 
      <!-- .entry-content -->
      <?php endif; ?>
    </div>
			
	  
	 	
			<!-- .entry-meta -->
	
      </div>
      <!-- .entry-content -->
    <!-- .entry-content-other -->
  <!-- .entry-main-content -->
</article>
<!-- #post-## -->