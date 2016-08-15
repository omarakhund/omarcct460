<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package omar460
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'omar460' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'omar460' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'omar460' ), 'omar460', '<a href="http://www.twitter.com/omarzaffar" rel="designer">Omar Akhund</a>' ); ?>
		</div><!-- .site-info -->
	

<div id="menu-footer">
	<?php wp_nav_menu( 
		array( 'theme_location'=>'secondary', 'menu_class'=>'menu-foot' 
		)); 
		?>
</div>
<?php 
$options = get_option( 'oa_options_settings' );
	echo $options['oa_text_field'] .'<br />';
	if (isset($options['oa_checkbox_field']) =='on'){
		echo $options['oa_checkbox_field'] .'<br />';
	} else {
		echo'off <br />';
	}
	echo $options ['oa_radio_field'] .'<br />';
	echo $options['oa_textarea_field'] .'<br />';
	echo $options['oa_select_field'];
?>	




	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
