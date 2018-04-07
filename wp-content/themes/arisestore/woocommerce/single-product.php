<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header( 'shop' ); ?>

<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?> 
          <div class="page-title">
			  <div class="page-title-inner">
				<h1 class="entry-title-main"><?php the_title(); ?></h1>
		  	</div>
		  </div>
	<?php endif;  ?>
<?php if (get_option('tmoption_single_sidebar') == 'yes') : ?>
<div class="single-product-sidebar">
<div class="content-container">
<?php else: ?>
<div class="single-product-full">
<?php endif; ?>
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>
		<div class="Single_Product_Sidebar">
			<?php arise_get_widget('single-product-side-widget-area'); ?>
		</div>
	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	<?php if (get_option('tmoption_single_sidebar') == 'yes') : ?>
	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
	<?php endif; ?>
	</div>
<?php get_footer( 'shop' ); ?>
