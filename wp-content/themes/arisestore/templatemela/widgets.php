<?php
/*
  Plugin Name: Templatemela Custom Widgets
  Plugin URI: http://www.templatemela.com
  Description: Templatemela Default Homepage Slide Show for templatemela wordpress themes.
  Version: 1.0
  Author: Templatemela
  Author URI: http://www.templatemela.com
  @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
  @license    http://www.templatemela.com/license/
 */
?>
<?php 
//  Creating Widget 
// Reference : http://codex.wordpress.org/Widgets_API
/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override arise_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 
 * @uses register_sidebar
 */
function arise_register_sidebars() {
	register_sidebar( array(
		'name' => esc_html__('Header Area', 'arise' ),
		'id' => 'header-widget',
		'description' => esc_html__('The primary widget area on header', 'arise' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s tab_content">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );		
	
	register_sidebar( array(
		'name' => esc_html__('First Footer Widget Area', 'arise' ),
		'id' => 'first-footer-widget-area',
		'description' => esc_html__('The first footer widget area', 'arise' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__('Second Footer Widget Area', 'arise' ),
		'id' => 'second-footer-widget-area',
		'description' => esc_html__('The second footer widget area', 'arise' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__('Third Footer Widget Area', 'arise' ),
		'id' => 'third-footer-widget-area',
		'description' => esc_html__('The third footer widget area', 'arise' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__('Fourth Footer Widget Area', 'arise' ),
		'id' => 'forth-footer-widget-area',
		'description' => esc_html__('The forth footer widget area', 'arise' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__('Fifth Footer Widget Area', 'arise' ),
		'id' => 'fifth-footer-widget-area',
		'description' => esc_html__('The fifth footer widget area', 'arise' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__('Header Search Widget Area', 'arise' ),
		'id' => 'header-search',
		'description' => esc_html__('The header search widget area', 'arise' ),
		'before_widget' => '',
		'after_widget' => " ",
		'before_title' => ' ',
		'after_title' => ' ',
	) );	
	register_sidebar( array(
		'name' => esc_html__('Single Product Side Widget Area', 'arise' ),
		'id' => 'single-product-side-widget-area',
		'description' => esc_html__('The Single Product Side widget area', 'arise' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
}
/**
 * Register sidebars by running arise_widgets_init() on the widgets_init hook. 
 */
add_action( 'widgets_init', 'arise_register_sidebars' );

get_template_part('templatemela/widgets/tm-aboutus');
get_template_part('templatemela/widgets/tm-advertise');
get_template_part('templatemela/widgets/tm-flickr');
get_template_part('templatemela/widgets/tm-follow-us');
get_template_part('templatemela/widgets/tm-footer-contactus');
get_template_part('templatemela/widgets/tm-header-contact');
get_template_part('templatemela/widgets/tm-static-links');
get_template_part('templatemela/widgets/tm-static-text');
get_template_part('templatemela/widgets/tm-left-banner');
get_template_part('templatemela/widgets/tm-cmsblock');
get_template_part('templatemela/widgets/tm-footer-aboutus');
?>