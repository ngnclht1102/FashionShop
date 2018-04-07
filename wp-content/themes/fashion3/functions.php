<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 * @author         TemplateMela
 * @version        Release: 1.0
 */
/**  Set Default options : Theme Settings  */ 
function arise_set_default_options_child()
{
	add_option("tmoption_logo_image", get_stylesheet_directory_uri()."/images/megnor/logo.png"); // set logo image	
	add_option("tmoption_bodyfont_color","777777"); // body font color
	add_option("tmoption_button_hover_color","000000"); // button hover color
	add_option("tmoption_show_topbar","yes");
	add_option("tmoption_show_topbar_social","yes");
	add_option("tmoption_topbar_youtube","#");
	add_option("tmoption_topbar_rss","#");
	add_option("tmoption_header_bkg_color","OAOAOA"); // header background color	
	add_option("tmoption_h1color",'1A1B1B'); // h1 family font color	 
}
add_action('init', 'arise_set_default_options_child');

if ( ! function_exists( 'arise_load_scripts_child' ) ) :
function arise_load_scripts_child() {	
	wp_enqueue_script( 'jquery_slimscroll', get_stylesheet_directory_uri() . '/js/megnor/jquery.slimscroll.js', array(), '', true);
?>
<?php }
endif;
add_action( 'wp_enqueue_scripts', 'arise_load_scripts_child');

function arise_load_fonts_child() {
    $fonts_url = '';
 
     /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $sancreek = _x( 'on', 'Sancreek font: on or off', 'fashion3' );
	
	
	/* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $righteous = _x( 'on', 'Righteous font: on or off', 'fashion3' );
 
    if ( 'off' !== $sancreek || 'off' !== $righteous) {
        $font_families = array();
 
        if ( 'off' !== $sancreek ) {
            $font_families[] = 'Sancreek';	
        }
		
		if ( 'off' !== $righteous ) {
            $font_families[] = 'Righteous';						
        }
		
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    } 
    return esc_url_raw( $fonts_url );
}
function arise_google_fonts_child() {
    wp_enqueue_style( 'google_fonts1', arise_load_fonts_child(), array(), '1.0.0' );
}
add_action( 'get_header', 'arise_google_fonts_child' );
?>