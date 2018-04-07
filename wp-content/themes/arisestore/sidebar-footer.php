<?php
/**
 * The Footer Sidebar
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
if ( !is_active_sidebar( 'first-footer-widget-area'  )
	&& ! is_active_sidebar( 'second-footer-widget-area' )
	&& ! is_active_sidebar( 'third-footer-widget-area'  )
	&& ! is_active_sidebar( 'fourth-footer-widget-area' )
)
{
	return;
}
?>
<div class="footer-widget-right">
<div id="footer-widget-area">
  <?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
  <div id="second" class="second-widget footer-widget">
    <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
  </div>
  <!-- #second .widget-area -->
  <?php endif; ?>
  <?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
  <div id="third" class="third-widget footer-widget">
    <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
  </div>
  <!-- #third .widget-area -->
  <?php endif; ?>
  <?php if ( is_active_sidebar( 'forth-footer-widget-area' ) ) : ?>
  <div id="fourth" class="fourth-widget footer-widget">
    <?php dynamic_sidebar( 'forth-footer-widget-area' ); ?>
  </div>
  <!-- #fourth .widget-area -->
  <?php endif; ?>
  <?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
  <div class="footer-widget footer-widget">
    <?php dynamic_sidebar( 'footer-widget' ); ?>
  </div>
  <!-- #fourth .widget-area -->
  <?php endif; ?>
 </div>
  <div class="footer-bottom">
	<div class="footer-bottom-container">	
	   <div class="footer_bottom_left">
			  <div class="footer-menu-links">
				<?php
							$tm_footer_menu=array(
							'menu' => 'TM Footer Navigation',
							'depth'=> 1,
							'echo' => false,
							'menu_class'      => 'footer-menu', 
							'container'       => '', 
							'container_class' => '', 
							'theme_location' => 'footer-menu'
							);
							echo wp_nav_menu($tm_footer_menu);				    
							?>
			  </div>
			  <!-- #footer-menu-links -->
			  <div class="site-info">  <?php esc_html__('Copyright', 'arise' ); ?> &copy; <?php echo esc_attr(date('Y')); ?> <a href="<?php echo esc_url(get_option('tmoption_footer_link')); ?>" target="_blank" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr(get_option('tmoption_footer_slog'));?>
				</a>
				<?php do_action( 'templatemela_credits' ); ?>
			  </div>
			</div>
			  <?php if (is_active_sidebar('fifth-footer-widget-area')) : ?>
		<div class="footer_bottom_right">	
	  		<?php dynamic_sidebar('fifth-footer-widget-area'); ?>
	  	</div>
		<?php endif; ?>
	    
</div>