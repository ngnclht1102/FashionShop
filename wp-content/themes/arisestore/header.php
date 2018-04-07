<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Templatemela
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,user-scalable=no">
<title>
<?php wp_title( '|', true, 'right'); ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php templatemela_header(); ?>
 
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>	
 
<style>
<?php templatemela_custom_css(); ?>
</style>	
<?php
if(is_rtl()):
	wp_enqueue_style('rtl', get_stylesheet_directory_uri() . '/rtl.css'); 
endif;
wp_head();
?> 
</head>
<body <?php body_class(); ?>>

<?php if ( get_option('tmoption_control_panel') == 'yes' ) do_action('tm_show_panel'); ?>

<div id="page" class="hfeed site">
<?php if ( get_header_image() ) : ?>
<div id="site-header"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt=""> </a> </div>
<?php endif; ?>
<!-- Header -->
<?php templatemela_header_before(); ?>

<header id="masthead" class="site-header<?php echo " header".esc_attr(get_option('tmoption_header_layout')); ?> <?php echo esc_attr(tm_sidebar_position()); ?> main">
<?php if (get_option('tmoption_show_topbar') == 'yes') : ?>
    <div class="topbar-outer">
    	<div class="topbar-main">
			   <?php if (get_option('tmoption_show_topbar_social') == 'yes') : ?>
			   		 <?php arise_get_topbar_social(); ?>
				<?php endif; ?>
   		</div>
	</div>
  <?php endif; ?>
  <div class="site-header-main">
  	  <div class="header_left">
		<?php if (get_option('tmoption_logo_image') != '') : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
        <?php arise_get_logo(); ?>
        </a>
        <?php else: ?>
        <h1 class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
          </a> </h1>
        <?php endif; ?>
        <?php if(get_option('tmoption_showsite_description') == 'yes') : ?>
        <h2 class="site-description">
          <?php bloginfo( 'description' ); ?>
        </h2>
        <?php endif; // End tmoption_showsite_description ?>	
		</div>
		<div class="header_center">
		 <div class="navigation-menu navigation-block ">
	  <div id="navbar" class="header-bottom navbar default">
							<nav id="site-navigation" class="navigation main-navigation">									
								<h3 class="menu-toggle"><?php esc_html_e( 'Menu', 'arise' ); ?></h3>
								<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'arise' ); ?>"><?php esc_html_e( 'Skip to content', 'arise' ); ?></a>	
								<div class="mega-menu">
									<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_class' => 'mega' ) ); ?>
								</div>	
														
							</nav><!-- #site-navigation -->
		</div>
	</div>
		</div>
		 
      <div class="header_right">		
				<div class="inner-left">
					<?php if (is_active_sidebar('header-search')) : ?>
							<div class="header-search">
								<div class="header-search-inner"></div>
								<?php arise_get_widget('header-search');  ?>	
							</div>
						<?php endif; ?>			
					<div class="header_cart headercart-block">
								<?php 
									// Woo commerce Header Cart
									if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
									
									<div class="cart togg">
									<?php global $woocommerce;
									ob_start();?>						
									<div id="shopping_cart" class="shopping_cart tog" title="<?php esc_html_e('View your shopping cart', 'arise'); ?>">
									
									<a class="cart-contents" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'arise'); ?>"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'arise'), $woocommerce->cart->cart_contents_count);?></a>
									</div>	
									<?php global $woocommerce; ?>
									<?php arise_get_widget('header-widget'); ?>		
								</div>							
									<?php endif; ?>	
						</div>
					</div>
					<div class="inner-right">						
						
						<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
							<div class="header_login"><!-- Start header cart -->
								<div class="header_logout">					
									<?php
									$logout_url = '';
														
									if ( is_user_logged_in() ) {
										$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' ); 
										if ( $myaccount_page_id ) { 
										$logout_url = wp_logout_url( get_permalink( $myaccount_page_id ) ); 
										if ( get_option( 'woocommerce_force_ssl_checkout' ) == 'yes' )
										$logout_url = str_replace( 'http:', 'https:', $logout_url );
									} ?>
									<div class="my_account"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="account">
									<?php echo esc_html_e('Myaccount','arise'); ?></a></div>
								    <div class="my_logout"><a href="<?php echo esc_attr($logout_url); ?>" class="logout"><?php echo esc_html_e('Logout','arise'); ?></a></div>
									<?php }
									else { ?>
									<div class="my_login"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="login show-login-link" id="show-login-link" ><?php echo esc_html_e('Login/Register','arise'); ?></a></div>
									<?php } ?>   
								</div>
							</div>		
						<?php endif; ?>		

	
      </div>
				
	
    <!-- End header-main -->
  </div>
  <!-- End site-main -->	
	
	</div>
</header>
<!-- #masthead -->
<?php templatemela_header_after(); ?>
<?php templatemela_main_before(); ?>
<!-- Center -->
<?php 
$shop = '0';
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
	if(is_shop())
		$tm_page_layout = 'wide-page';
		$shop = '1';
	endif;
?>
<div id="main" class="site-main <?php if (get_option('tmoption_show_topbar') == 'yes') echo "extra"; ?>">
<div class="main_inner">
	 <!-- Start main slider -->
		<?php if ( in_array( 'TemplatemelaSlideShow/TemplatemelaSlideShow.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ))):?>
			<?php if ( is_page_template('page-templates/home.php')): ?>
				<?php get_template_part('slider'); ?>
			<?php endif; ?>
		<?php endif; ?>
<!-- End main slider -->

<?php 
	$tm_page_layout = tm_page_layout(); 
	if( isset( $tm_page_layout) && !empty( $tm_page_layout ) ):
	$tm_page_layout = $tm_page_layout; 
	else:
	$tm_page_layout = '';
	endif;
	
if ( is_page_template('page-templates/home.php') || $tm_page_layout == 'wide-page' ) : ?>
<div class="main-content-inner-full">
<?php else: 
	if(is_archive() || is_tag() || is_404()) : ?>
		<div class="main-content">
	<?php else : ?>
		<div class="main-content-inner <?php echo esc_attr(tm_sidebar_position()); ?>">
	<?php endif; ?>
<?php endif; ?>
<?php templatemela_content_before(); ?>
