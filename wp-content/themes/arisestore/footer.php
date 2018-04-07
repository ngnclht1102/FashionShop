<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
?>
<?php templatemela_content_after(); ?>
</div>
<!-- .main-content-inner -->
</div>
<!-- .main_inner -->
</div>
<!-- #main -->
<?php templatemela_footer_before(); ?>
<footer id="colophon" class="site-footer" role="contentinfo">
<?php if (get_option('tmoption_custom_banner') == 'yes') : ?>
	<div class="top_main">
		<div class="topbar-banner">
		<?php arise_get_footer_banner(); ?>
		</div>
	</div>
	<?php endif; ?>	
   <div class="footer_inner">
   <div class="footer_inner_sub">
   <div class="footer-widget-left">
   <?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
  <div id="first" class="first-widget footer-widget">
    <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
  </div>
  <!-- #first .widget-area -->
  <?php endif; ?>
  </div>
    <?php templatemela_footer_inside(); ?>
    <?php get_sidebar('footer'); ?>
	<!-- .footer-bottom -->	 
	  </div>
  </div>
    </div>
	</div>
  <!--. Footer inner -->
</footer>
<!-- #colophon -->
<?php templatemela_footer_after(); ?>
</div>
<!-- #page -->
<?php tm_go_top(); ?>
<?php arise_get_widget('before-end-body-widget'); ?>
<?php wp_footer(); ?>
</body></html>