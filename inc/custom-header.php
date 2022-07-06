<?php
/**
 * @package Glauss
 * @since Glauss 1.0
 */

function glauss_custom_header_setup() {
	/**
	 * Filter Glauss custom-header support arguments.
	 *
	 * @since Glauss 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type bool   $header_text            Whether to display custom header text. Default false.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 1260.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 240.
	 *     @type bool   $flex_height            Whether to allow flexible-height header images. Default true.
	 *     @type string $admin_head_callback    Callback function used to style the image displayed in
	 *                                          the Appearance > Header screen.
	 *     @type string $admin_preview_callback Callback function used to create the custom header markup in
	 *                                          the Appearance > Header screen.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'glauss_custom_header_args', array(
		'default-text-color'     => 'fff',
		'width'                  => 1260,
		'height'                 => 240,
		'flex-height'            => true,
		'wp-head-callback'       => 'glauss_header_style',
		'admin-head-callback'    => 'glauss_admin_header_style',
		'admin-preview-callback' => 'glauss_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'glauss_custom_header_setup' );

if ( ! function_exists( 'glauss_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 */
function glauss_header_style() {
	$text_color = get_header_textcolor();

	// If no custom color for text is set, let's bail.
	if ( display_header_text() && $text_color === get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>

	<?php
}
endif; // glauss_header_style


if ( ! function_exists( 'glauss_admin_header_style' ) ) :
/**
 * Style the header image displayed on the Appearance > Header screen.
 * @since Glauss 1.0
 */
function glauss_admin_header_style() {
?>

<?php
}
endif; // glauss_admin_header_style

if ( ! function_exists( 'glauss_admin_header_image' ) ) :
/**
 * Create the custom header image markup displayed on the Appearance > Header screen.
 * @since Glauss 1.0
 */
function glauss_admin_header_image() {
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>">
		<?php endif; ?>
		<h1 class="displaying-header-text"><a id="name"<?php echo sprintf( ' style="color:#%s;"', get_header_textcolor() ); ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	</div>
<?php
}
endif; // glauss_admin_header_image
