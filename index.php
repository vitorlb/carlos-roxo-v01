<?php
/**
 * The site's entry point.
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); 
$is_elementor_theme_exist = function_exists( 'elementor_theme_do_location' );
?> 
<?php
if ( is_singular() ) { 
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'single' ) ) {
		get_template_part( 'template-parts/single' );
	} 
} elseif ( is_singular($post_types = 'ceramics') ) {
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'ceramics' ) ) {
		get_template_part( 'template-parts/ceramics' );
	}
} elseif ( is_singular($post_types = 'ilustrations') ) {
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'ilustrations' ) ) {
		get_template_part( 'template-parts/ilustrations' );
	}
} elseif (  is_home() ) {
?>	
<div class="discos-grelha container px-0">
	<?php grelha_discos(); ?>
</div><?php  } elseif (is_archive()) {	
	 if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'archive' ) ) {
		get_template_part( 'template-parts/archive' );
	} 
} elseif ( is_search() ) {
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'archive' ) ) {
		get_template_part( 'template-parts/search' );
	}
} else {
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'single' ) ) {
		get_template_part( 'template-parts/404' );
	}
}

get_footer();
