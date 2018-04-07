<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
  * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $product;
// Ensure visibility
	if ( empty( $product ) || ! $product->is_visible() ) {
		return;
	}
?>

<li <?php post_class(); ?> >	
		<div class="container-inner">
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		<div class="image-block">		
		<a href="<?php the_permalink(); ?>">
			<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
			?>			
			<div class="product-block-hover"></div>
			</a>
		</div>
		<div class="product_details">
		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10 
			 */do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
		<a href="<?php the_permalink(); ?>"><h3 class="product-name"><?php the_title(); ?></h3></a>	
		</div>
		<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
		</div>
</li>