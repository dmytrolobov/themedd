<?php
/**
 * A single download inside of the [downloads] shortcode.
 *
 * @since 2.9.0
 *
 * @package EDD
 * @category Template
 * @author Easy Digital Downloads
 * @version 1.0.0
 */

global $edd_download_shortcode_item_atts, $edd_download_shortcode_item_i;

$download_grid_options = themedd_edd_download_grid_options();
?>

<?php $schema = edd_add_schema_microdata() ? 'itemscope itemtype="http://schema.org/Product" ' : ''; ?>

<div <?php echo $schema; ?>class="<?php echo esc_attr( apply_filters( 'edd_download_class', 'edd_download', get_the_ID(), $edd_download_shortcode_item_atts, $edd_download_shortcode_item_i ) ); ?>" id="edd_download_<?php the_ID(); ?>">

	<div class="<?php echo esc_attr( apply_filters( 'edd_download_inner_class', 'edd_download_inner', get_the_ID(), $edd_download_shortcode_item_atts, $edd_download_shortcode_item_i ) ); ?>">

		<?php
			do_action( 'edd_download_before' );

			if ( 'false' !== $edd_download_shortcode_item_atts['thumbnails'] ) :
				edd_get_template_part( 'shortcode', 'content-image' );
				do_action( 'edd_download_after_thumbnail' );
			endif;

			/**
			 * Used by themedd_edd_download_meta_before_title()
			 */
			do_action( 'edd_download_before_title' );

			if ( true === $download_grid_options['title'] ) {
				edd_get_template_part( 'shortcode', 'content-title' );
			}

			do_action( 'edd_download_after_title' );

			if ( 'yes' === $edd_download_shortcode_item_atts['excerpt'] && 'yes' !== $edd_download_shortcode_item_atts['full_content'] ) :
				edd_get_template_part( 'shortcode', 'content-excerpt' );
				do_action( 'edd_download_after_content' );
			elseif ( 'yes' === $edd_download_shortcode_item_atts['full_content'] ) :
				edd_get_template_part( 'shortcode', 'content-full' );
				do_action( 'edd_download_after_content' );
			endif;

			/**
			 * Download footer
			 */
			themedd_edd_download_footer( $edd_download_shortcode_item_atts );

			do_action( 'edd_download_after' );

		?>
	</div>

</div>
