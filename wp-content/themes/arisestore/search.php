<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since Template Mela 1.0
 */
get_header(); ?>
<div class="main-content">
<div class="content-container">
 <section id="primary" class="content-area">
  <div id="content" class="site-content" role="main">
  <div class="page-title">
			<div class="page-title-inner">
				<h1 class="entry-title-main"><?php printf( esc_html__('Category Archives: %s', 'arise' ), single_cat_title( '', false ) ); ?></h1>
				<?php arise_breadcrumbs(); ?>
			</div>
		</div>
    <?php if ( have_posts() ) : ?>
        <!-- .page-header -->
    <?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
			endwhile;
			// Previous/next post navigation.
			templatemela_paging_nav();
		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );
		endif;
	?>
  </div>
  <!-- #content -->
</section>
<!-- #primary -->
<?php
get_sidebar( 'content' );
get_sidebar();?>
</div>
</div>
<?php 
get_footer();
?>