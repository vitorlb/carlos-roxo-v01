<?php

/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

define('HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0');

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles()
{

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);
}
add_action('wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20);

/*
'ilustrations' POST TYPE
*/

function discos_custom_post_type()
{
	$labels = array(
		'name' => 'Ilustrações',
		'singular_name' => 'Ilustração',
		'add_new' => 'Adicionar ilustração',
		'all_items' => 'Todas as ilustrações',
		'add_new_item' => 'Adicionar nova ilustração',
		'edit_item' => 'Editar',
		'new item' => 'Nova ilustração',
		'view_item' => 'Ver ilustração',
		'search_item' => 'Pesquisar ilustrações',
		'not_found' => 'Não há :(',
		'not_found_in_trash' => 'Não há no lixo x(',
		'parent_item_colon' => 'Parent Item'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_icon' => 'dashicons-admin-customizer',
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'revision',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 6,
		'exclude_from_search' => false,
	);
	register_post_type('ilustrations', $args);
}
add_action('init', 'discos_custom_post_type');

/*
'ANIAMTIONS' POST TYPE
*/

function animations_custom_post_type()
{
	$labels = array(
		'name' => 'Animação',
		'singular_name' => 'Animações',
		'add_new' => 'Adicionar animação',
		'all_items' => 'Todas as animações',
		'add_new_item' => 'Adicionar nova animação',
		'edit_item' => 'Editar',
		'new item' => 'Nova animação',
		'view_item' => 'Ver animação',
		'search_item' => 'Pesquisar animações',
		'not_found' => 'Não há :(',
		'not_found_in_trash' => 'Não há no lixo x(',
		'parent_item_colon' => 'Parent Item'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_icon' => 'dashicons-welcome-view-site',
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'revision',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 6,
		'exclude_from_search' => false,
	);
	register_post_type('animation', $args);
}
add_action('init', 'animations_custom_post_type');

/*
'ANIAMTIONS' CERAMICS TYPE
*/

function ceramics_custom_post_type()
{
	$labels = array(
		'name' => 'Cerâmica',
		'singular_name' => 'Cerâmica',
		'add_new' => 'Adicionar cerâmica',
		'all_items' => 'Todas as cerâmicas',
		'add_new_item' => 'Adicionar nova cerâmica',
		'edit_item' => 'Editar',
		'new item' => 'Nova cerâmica',
		'view_item' => 'Ver cerâmica',
		'search_item' => 'Pesquisar cerâmicas',
		'not_found' => 'Não há :(',
		'not_found_in_trash' => 'Não há no lixo x(',
		'parent_item_colon' => 'Parent Item'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_icon' => 'dashicons-buddicons-activity',
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'revision',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 6,
		'exclude_from_search' => false,
	);
	register_post_type('ceramics', $args);
}
add_action('init', 'ceramics_custom_post_type');

/*
'GRAPHIC DESIGN' POST TYPE
*/

function graphic_design_custom_post_type()
{
	$labels = array(
		'name' => 'Graphic Design',
		'singular_name' => 'Graphic Design',
		'add_new' => 'Adicionar projeto',
		'all_items' => 'Todos os projetos',
		'add_new_item' => 'Adicionar novp projeto',
		'edit_item' => 'Editar',
		'new item' => 'Novo projeto',
		'view_item' => 'Ver projeto',
		'search_item' => 'Pesquisar projeto',
		'not_found' => 'Não há',
		'not_found_in_trash' => 'Não há no lixo',
		'parent_item_colon' => 'Parent Item'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => false,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'revision',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 6,
		'exclude_from_search' => false,
	);
	register_post_type('graphic_design', $args);
}
add_action('init', 'graphic_design_custom_post_type');

/*
'ABOUT' POST TYPE
*/

function about_custom_post_type()
{
	$labels = array(
		'name' => 'About text',
		'singular_name' => 'About text',
		'add_new' => 'Adicionar texto',
		'all_items' => 'About text - apenas permitido 1 post',
		'add_new_item' => 'Adicionar texto - apenas permitido 1 post',
		'edit_item' => 'Editar',
		'new item' => 'Novo texto',
		'view_item' => 'Ver texto',
		'search_item' => 'Pesquisar texto',
		'not_found' => 'Não há',
		'not_found_in_trash' => 'Não há no lixo',
		'parent_item_colon' => 'Parent Item'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_icon' => 'dashicons-format-status',
		'has_archive' => false,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'revision',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 6,
		'exclude_from_search' => false,
		'posts_per_page' => 1,
	);
	register_post_type('about_text', $args);
}
add_action('init', 'about_custom_post_type');


/**** Slider Call Function ****/
function grelha_discos()
{
	$args = array('post_type' => array('animation', 'ilustrations', 'graphic_design', 'ceramics', 'post'));
?>
	<ul class="discos">
		<?php
		wp_reset_query();
		$query = new WP_Query($args);
		while ($query->have_posts()) : $query->the_post();
			$authorName = get_post_meta(get_the_ID(), '_author_name_value_key')[0] ?? null;
			$permalink = get_permalink();
		?>
			<li class="disco"> <?php
								if (has_post_thumbnail()) {  ?>
					<div class="disco_thumb">
						<a href="<?= $permalink ?>"><?php the_post_thumbnail(); ?></a>
					</div>
				<?php } else {
				?>
					<div class="disco_thumb">
						<p><?php the_title(); ?></p>
					</div>
				<?php } ?>
				<div class="disco_title">
					<p class="disco_title__paragraph p-2">
						<a href="<?= $permalink ?>">
							<span style="font-size: 1.3rem"><?php the_title() ?><br></span>
							<span class="disco-autor">by <?= $authorName   ?></span>
						</a>
					</p>
				</div>
			</li>
		<?php
		endwhile;
		?>
	</ul>
<?php
}
/*
Gallery metabox
*/


/*
AUTHOR META BOX
*/

function author_name_metabox()
{
	$posttypes = array(
		'pessoas',
		'discos'
	);
	add_meta_box('author_name', 'author name', 'author_name_meta_callback', $posttypes, 'side');
}

function author_name_meta_callback($post)
{
	wp_nonce_field('save_author_name', 'author_name_meta_box_nonce');

	$value = get_post_meta($post->ID, '_author_name_value_key', true);

	echo '<label for="author_name_field">';
	echo '<input type="text" id="author_name_field" name="author_name_field" value="' . esc_attr($value) . '" size="25" />';
}

function save_author_name_link($post_id)
{

	if (!isset($_POST['author_name_meta_box_nonce'])) {
		return;
	}
	if (!wp_verify_nonce($_POST['author_name_meta_box_nonce'], 'save_author_name')) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (!isset($_POST['author_name_field'])) {
		return;
	}

	$author_name =  sanitize_text_field($_POST['author_name_field']);
	update_post_meta($post_id, '_author_name_value_key', $author_name);
}

add_action('add_meta_boxes', 'author_name_metabox');
add_action('save_post', 'save_author_name_link');

//enqueu javascript

function enqueue_js()
{
	wp_register_script('custom-js', get_stylesheet_directory_uri() . '/js/main.js', [], get_stylesheet_directory_uri() . '/js/main.js', true);
	wp_enqueue_script('custom-js');
}

add_action('wp_enqueue_scripts', 'enqueue_js');

function enqueue_colors()
{
	wp_register_script('colors-js', get_stylesheet_directory_uri() . '/js/colors.js', [], get_stylesheet_directory_uri() . '/js/colors.js', true);
	wp_enqueue_script('colors-js');
}

add_action('wp_enqueue_scripts', 'enqueue_colors');

function enqueue_croxo_gallery()
{
	wp_register_script('croxo-gallery-js', get_stylesheet_directory_uri() . '/js/croxoGallery.js', [], get_stylesheet_directory_uri() . '/js/croxoGallery.js', true);
	wp_enqueue_script('croxo-gallery-js');
}

add_action('wp_enqueue_scripts', 'enqueue_croxo_gallery');


function enqueue_go_back_button()
{
	wp_register_script('go-back-button-js', get_stylesheet_directory_uri() . '/js/goBackButton.js', [], get_stylesheet_directory_uri() . '/js/goBackButton.js', true);
	wp_enqueue_script('go-back-button-js');
}

add_action('wp_enqueue_scripts', 'enqueue_go_back_button');

function enqueue_about_menu_item()
{
	wp_register_script('about-menu-item', get_stylesheet_directory_uri() . '/js/aboutMenuItem.js', [], get_stylesheet_directory_uri() . '/js/aboutMenuItem.js', true);
	wp_enqueue_script('about-menu-item');
}

add_action('wp_enqueue_scripts', 'enqueue_about_menu_item');
