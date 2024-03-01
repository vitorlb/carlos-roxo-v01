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

/* about menu item */

function add_about_menu_item($items, $args)
{
	$about_text_post = get_posts(array(
		'post_type' => 'about_text',
		'numberposts' => 1,
		'orderby' => 'date',
		'order' => 'DESC',
	));
	$yolo = 'yolo';
	$post_title = esc_html($about_text_post[0]->post_title);
	$post_content = esc_html($about_text_post[0]->post_content);
	// Replace 'your-page-slug' with the actual slug of your page
	$page_slug = 'about';

	// Get the page by its slug
	$page = get_page_by_path($page_slug);

	// Check if the page is found
	if ($page) {
		// Get the page link
		$page_link = get_permalink($page->ID); 
	}  
	// Check if this is the target menu
	if ($args->theme_location == 'menu-1') {
		// Add your custom HTML menu item
		$custom_item = '<li id="aboutMenuItem" class="about-menu-item"><a href="' . $page_link . '">' . $post_title . '</a><div class="d-none"><span>' . $post_content . '</span><a class="croxo-underline-hover--right d-flex align-items-center" href="' . $page_link . '"><span>more about carlos roxo</span><span class="material-symbols-outlined croxo-icon-size-micro ps-1 tilt-b-2">last_page</span></a></div></li>';

		// Append the custom item to the menu
		$items .= $custom_item;
	}

	return $items;
}

add_filter('wp_nav_menu_items', 'add_about_menu_item', 10, 2);

/*
'ilustrations' POST TYPE
*/

function discos_custom_post_type()
{
	$labels = array(
		'name' => 'Illustrations',
		'singular_name' => 'Illustratio',
		'add_new' => 'Add Illustration',
		'all_items' => 'All Illustrations',
		'add_new_item' => 'Add new Illustration',
		'edit_item' => 'Edit',
		'new item' => 'New Illustration',
		'view_item' => 'See Illustration',
		'search_item' => 'Search Illustration',
		'not_found' => 'There is not :(',
		'not_found_in_trash' => 'No Illustrations on trash x(',
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
		'name' => 'Animations',
		'singular_name' => 'Animation',
		'add_new' => 'Add Animations',
		'all_items' => 'All Animations',
		'add_new_item' => 'Add new Animation',
		'edit_item' => 'Edit',
		'new item' => 'New Animation',
		'view_item' => 'See Animation',
		'search_item' => 'Search Animations',
		'not_found' => 'There is not :(',
		'not_found_in_trash' => 'No Animations on trash x(',
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
'CERAMICS' CUSTOM POST TYPE
*/

function ceramics_custom_post_type()
{
	$labels = array(
		'name' => 'Sculptures',
		'singular_name' => 'Sculpture',
		'add_new' => 'Add Sculptures',
		'all_items' => 'All Sculptures',
		'add_new_item' => 'Add new Sculpture',
		'edit_item' => 'Edit',
		'new item' => 'New Sculpture',
		'view_item' => 'See Sculpture',
		'search_item' => 'Search Sculptures',
		'not_found' => 'There is not :(',
		'not_found_in_trash' => 'No Sculptures on trash x(',
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
		'add_new' => 'Add project',
		'all_items' => 'All projects',
		'add_new_item' => 'Add new project',
		'edit_item' => 'Edit',
		'new item' => 'New project',
		'view_item' => 'See project',
		'search_item' => 'Search project',
		'not_found' => 'There is not :(',
		'not_found_in_trash' => 'No Projects on trash x(',
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
'CLOTHING' POST TYPE
*/

function clothing_custom_post_type()
{
	$labels = array(
		'name' => 'Clothing',
		'singular_name' => 'Piece',
		'add_new' => 'Add Piece',
		'all_items' => 'All Pieces',
		'add_new_item' => 'Add new Piece',
		'edit_item' => 'Edit',
		'new item' => 'New Piece',
		'view_item' => 'See Piece',
		'search_item' => 'Search Piece',
		'not_found' => 'There is not :(',
		'not_found_in_trash' => 'No Pieces on trash x(',
		'parent_item_colon' => 'Parent Item'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_icon' => 'dashicons-welcome-learn-more',
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
	register_post_type('clothing', $args);
}
add_action('init', 'clothing_custom_post_type');

/*
'ABOUT TEXT' POST TYPE
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
		'menu_icon' => 'dashicons-text',
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


/*
'GALINHEIRO TEXT' POST TYPE
*/

function galinheiro_custom_post_type()
{
	$labels = array(
		'name' => 'Galinheiro intro text',
		'singular_name' => 'Galinheiro intro text',
		'add_new' => 'Add texto',
		'all_items' => 'Galinheiro text - ATTENTION, only one post allowed',
		'add_new_item' => 'Add texto - ATTENTION, only one post allowed',
		'edit_item' => 'Edit',
		'new item' => 'New text',
		'view_item' => 'View text',
		'search_item' => 'Search text',
		'not_found' => 'No text',
		'not_found_in_trash' => 'None in trash',
		'parent_item_colon' => 'Parent Item'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_icon' => 'dashicons-text',
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
	register_post_type('galinheiro_text', $args);
}
add_action('init', 'galinheiro_custom_post_type');


/**** Slider Call Function ****/
function grelha_discos()
{
	$post_types = array('animation', 'ilustrations', 'graphic_design', 'ceramics', 'clothing');
	$selected_post_types = isset($_GET['post_types']) ? array_map('sanitize_text_field', $_GET['post_types']) : array();
	$args = null;
	$header_nav_menu = wp_nav_menu([
		'theme_location' => 'menu-1',
		'fallback_cb' => false,
		'echo' => false,
	]);
	if (is_home()) {
		$args = array(
			'post_type' => (!empty($selected_post_types) && !in_array('all', $selected_post_types)) ? $selected_post_types : $post_types,
			'posts_per_page' => 12
		);
	} else {
		$args = array(
			'post_type' => (!empty($selected_post_types) && !in_array('all', $selected_post_types)) ? $selected_post_types : $post_types
		);
	}
?>
	<div class="croxo-work-filters--main-nav d-none d-lg-flex justify-content-center">
		<div class="post-type-filter__main-nav ">
			<?php
			echo $header_nav_menu;
			?>
		</div>
	</div>
	<div class="croxo-work-filters">
		<div class="d-sm-none croxo-work-filters__mobile-btns d-flex align-items-center column-gap-2">
			<button class="d-block croxo-work-filters__mobile-btns__filters-modal-btn reset-button d-flex align-items-center">
				<span class="material-symbols-outlined material-symbols-medium theme-color croxo-text-filter-reset font-size-11">instant_mix</span>
			</button>
		</div>
		<form id="post-type-filter-form" method="get" action="">
			<div class="post-type-filter d-flex flex-column flex-lg-row">
				<div class="post-type-filter__top-bar d-flex d-sm-none justify-content-end py-2 border-y-theme-color">
					<div class="post-type-filter__top-bar__text-wrapper d-flex align-items-center flexone">
						<span class="croxo-font-text theme-color font-size-7 ps-2">Filters <span class="font-size-5"><strong>⌄</strong></span></span>
					</div>
					<div class="post-type-filter__top-bar__btn-wrapper top-bar__btn-wrapper--reset d-flex align-items-center">
						<label class="d-block position-relative c-pointer reset-btn px-0 m-0 d-flex align-items-center">
							<input class="opacity-0 absolute-stretch" type="checkbox" name="post_types[]" value="all" <?php checked(in_array('all', $selected_post_types)); ?>>
							<span class="material-symbols-outlined theme-color croxo-text-filter-reset font-size-8">restart_alt</span>
						</label>
					</div>
					<div class="post-type-filter__top-bar__btn-wrapper top-bar__btn-wrapper--close d-flex align-items-center">
						<button class="reset-button d-flex align-items-center mx-2">
							<span class="material-symbols-outlined theme-color font-size-9">close</span>
						</button>
					</div>
				</div>
				<div class="post-type-filter__wrapper d-flex flex-wrap flexone justify-content-center position-relative pe-5 pe-md-0 pt-2 pt-sm-0">
					<?php foreach ($post_types as $post_type) { ?>
						<label class="d-block position-relative border-theme-black croxo-font-text--deep theme-color-black c-pointer mb-0">
							<input class="opacity-0 absolute-stretch" type="checkbox" name="post_types[]" value="<?php echo $post_type ?>" <?php checked(in_array($post_type, $selected_post_types)) ?>>
							<span class="d-block py-1 px-2 croxo-text-filter-item croxo-menu-item theme-color--hover"><?php echo ucfirst(str_replace('_', ' ', $post_type)); ?></span>
						</label>
					<?php } ?>
					<label class="d-none d-sm-block ratio-square h-100 position-relative c-pointer  border-theme-black reset-btn px-0 mb-0">
						<input class="opacity-0 absolute-stretch" type="checkbox" name="post_types[]" value="all" <?php checked(in_array('all', $selected_post_types)); ?>>
						<span class="material-symbols-outlined theme-color-black croxo-text-filter-reset d-flex theme-color--hover align-items-center justify-content-center p-0 m-0 h-100">restart_alt</span>
					</label>
				</div>
			</div>
		</form>
	</div>
	<ul class="discos mt-5">
		<?php
		wp_reset_query();
		$query = new WP_Query($args);
		while ($query->have_posts()) : $query->the_post();
			$permalink = get_permalink();
		?>
			<li class="disco <?php echo implode(' ', get_post_class()); ?>">
				<?php if (has_post_thumbnail()) { ?>
					<div class="disco_thumb">
						<a href="<?= $permalink ?>"><?php the_post_thumbnail(); ?></a>
					</div>
				<?php } else { ?>
					<div class="disco_thumb">
						<p><?php the_title(); ?></p>
					</div>
				<?php } ?>
				<div class="disco_title croxo-font-text d-flex flex-column">
					<p class="disco_title__paragraph p-2 pb-3">
						<a href="<?= $permalink ?>">
							<span class="croxo-grid-headline"><?php the_title() ?><br></span>
						</a>
					</p>
				</div>
			</li>
		<?php endwhile; ?>
	</ul>
<?php
}

/**** Filter posts Function ****/
function filter_posts()
{
	$selected_post_types = isset($_GET['post_types']) ? array_map('sanitize_text_field', $_GET['post_types']) : array();

	$args = array(
		'post_type' => (!empty($selected_post_types) && !in_array('all', $selected_post_types)) ? $selected_post_types : array('animation', 'ilustrations', 'graphic_design', 'ceramics', 'clothing')
	);
	$query = new WP_Query($args);
?>
	<?php
	// Loop through the posts and display each one
	while ($query->have_posts()) : $query->the_post();
		$permalink = get_permalink();
	?>
		<li class="disco <?php echo implode(' ', get_post_class()); ?>">
			<?php if (has_post_thumbnail()) { ?>
				<div class="disco_thumb">
					<a href="<?= $permalink ?>"><?php the_post_thumbnail(); ?></a>
				</div>
			<?php } else { ?>
				<div class="disco_thumb">
					<p><?php the_title(); ?></p>
				</div>
			<?php } ?>
			<div class="disco_title croxo-font-text d-flex flex-column">
				<p class="disco_title__paragraph p-2 pb-3">
					<a href="<?= $permalink ?>">
						<span class="croxo-grid-headline"><?php the_title() ?><br></span>
					</a>
				</p>
			</div>
		</li>
	<?php
	endwhile;

	// Terminate the request
	wp_die();
}

add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');


/**** events list function ****/
function events_list($time)
{
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => -1,
		'meta_key'       => '_custom_date',
		'orderby'        => 'meta_value',
		'order'          => 'DESC', // Use 'DESC' for descending order
		'meta_query'     => array(
			array(
				'key'     => '_custom_date',
				'value'   => date('Y-m-d'), // Today's date
				'compare' => !!$time ? '>=' : '<', // Filter posts where the custom date is less than today
				'type'    => 'DATE',
			),
		),
	);
	?>
	<div class="croxo--events-list--main-wrapper mt-lg-5">
		<ul class="croxo--events-list__list d-flex flex-column">
			<?php
			// Display posts from the past 
			$query_past = new WP_Query($args);
			if ($query_past->have_posts()) {
				while ($query_past->have_posts()) {
					$query_past->the_post();

					// Display posts from the past here
					get_template_part('template-parts/components/event-list-item');
				}
				wp_reset_postdata(); // Reset post data
			} else {
				echo 'No posts found in the past.';
			}
			?>
		</ul>
	</div>
<?php
}

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

function enqueue_header_logo_size()
{
	wp_register_script('header-logo-size', get_stylesheet_directory_uri() . '/js/headerLogoSize.js', [], get_stylesheet_directory_uri() . '/js/headerLogoSize.js', true);
	wp_enqueue_script('header-logo-size');
}

add_action('wp_enqueue_scripts', 'enqueue_header_logo_size');

function enqueue_croxo_gallery()
{
	wp_register_script('croxo-gallery-js', get_stylesheet_directory_uri() . '/js/croxoGallery.js', [], get_stylesheet_directory_uri() . '/js/croxoGallery.js', true);
	wp_enqueue_script('croxo-gallery-js');
}

add_action('wp_enqueue_scripts', 'enqueue_croxo_gallery');

function enqueue_filters_mobile_modal()
{
	wp_register_script('enqueue-filters-mobile-modal', get_stylesheet_directory_uri() . '/js/filtersMobileModal.js', [], get_stylesheet_directory_uri() . '/js/filtersMobileModal.js', true);
	wp_enqueue_script('enqueue-filters-mobile-modal');
}

add_action('wp_enqueue_scripts', 'enqueue_filters_mobile_modal');


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

function enqueue_eventsList()
{
	wp_register_script('events-list', get_stylesheet_directory_uri() . '/js/eventsList.js', [], get_stylesheet_directory_uri() . '/js/eventsList.js', true);
	wp_enqueue_script('events-list');
}

add_action('wp_enqueue_scripts', 'enqueue_eventsList');

function enqueue_scrollNav()
{
	wp_register_script('scroll-nav', get_stylesheet_directory_uri() . '/js/scrollNav.js', [], get_stylesheet_directory_uri() . '/js/scrollNav.js', true);
	wp_enqueue_script('scroll-nav');
}

add_action('wp_enqueue_scripts', 'enqueue_scrollNav');

function enqueue_formData()
{
	wp_register_script('form-data', get_stylesheet_directory_uri() . '/js/formData.js', [], get_stylesheet_directory_uri() . '/js/formData.js', true);
	wp_enqueue_script('form-data');
}

add_action('wp_enqueue_scripts', 'enqueue_formData');

function enqueue_eventData()
{
	wp_register_script('event-data', get_stylesheet_directory_uri() . '/js/eventData.js', [], get_stylesheet_directory_uri() . '/js/eventData.js', true);
	wp_enqueue_script('event-data');
}

add_action('wp_enqueue_scripts', 'enqueue_eventData');

function enqueue_filtersAjax()
{
	wp_enqueue_script('filtersAjax', get_stylesheet_directory_uri() . '/js/filtersAjax.js', array('jquery'), '', true);
	wp_localize_script('filtersAjax', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'enqueue_filtersAjax');

// Custom date metabox
// Add meta box for date to a specific post type (replace 'your_post_type' with your actual post type)
function add_custom_date_metabox()
{
	add_meta_box(
		'custom-date-metabox', // Meta box ID
		'Event date', // Title displayed on the meta box
		'display_custom_date_metabox', // Callback function to display the metabox contents
		'post', // Your specific post type
		'side', // Context: 'normal', 'advanced', or 'side'
		'default' // Priority: 'high', 'core', 'default', or 'low'
	);
}
add_action('add_meta_boxes', 'add_custom_date_metabox');

// Callback function to display the contents of the metabox
function display_custom_date_metabox($post)
{
	// Retrieve previously saved date value
	$custom_date = get_post_meta($post->ID, '_custom_date', true);

	// Output HTML for the metabox
?>
	<label for="custom_date_field">Select Date:</label>
	<input type="date" id="custom_date_field" name="custom_date_field" value="<?php echo esc_attr($custom_date); ?>" required>
<?php
}

// Save the meta box data when the post is saved or updated
function save_custom_date_metabox($post_id)
{
	if (array_key_exists('custom_date_field', $_POST)) {
		// Check if the date field is empty
		if (empty($_POST['custom_date_field'])) {
			// If the date field is empty, prevent saving and display an error
			wp_die('Please select a date for the custom field.');
		} else {
			// Sanitize and save the date data
			update_post_meta($post_id, '_custom_date', sanitize_text_field($_POST['custom_date_field']));
		}
	}
}
add_action('save_post', 'save_custom_date_metabox');

// Add a custom metabox with a checkbox to your custom post type
function show_contact_form_metabox()
{
	$post_types = array('ilustrations', 'animation', 'ceramics', 'graphic_design', 'clothing'); // Replace with your custom post type slugs

	add_meta_box(
		'show_contact_form_metabox',
		'Show contact form',
		'render_show_contact_form_metabox',
		$post_types,
		'side',
		'high'
	);
}
add_action('add_meta_boxes', 'show_contact_form_metabox');

// Render the content of the custom metabox
function render_show_contact_form_metabox($post)
{
	// Retrieve the current value of the checkbox
	$checkbox_value = get_post_meta($post->ID, '_show_contact_form_checkbox', true);

	// Display the checkbox
?>
	<label>
		<input type="checkbox" name="show_contact_form_checkbox" value="1" <?php checked($checkbox_value, '1'); ?>>
		Show contact form
	</label>
<?php
}

// Save the value of the checkbox when the post is saved
function save_show_contact_form_metabox($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (isset($_POST['show_contact_form_checkbox'])) {
		update_post_meta($post_id, '_show_contact_form_checkbox', sanitize_text_field($_POST['show_contact_form_checkbox']));
	} else {
		delete_post_meta($post_id, '_show_contact_form_checkbox');
	}
}
add_action('save_post', 'save_show_contact_form_metabox');

/*
INSTITUTIONAL WORK META BOX
*/

function add_institutional_work_metabox()
{
	$post_types = array('animation', 'ceramics', 'graphic_design', 'ilustrations', 'clothing'); // Add your custom post types here
	foreach ($post_types as $post_type) {
		add_meta_box(
			'institutional_work_metabox',
			'Institutional Work',
			'render_institutional_work_metabox',
			$post_type,
			'side',
			'default'
		);
	}
}
add_action('add_meta_boxes', 'add_institutional_work_metabox');

function render_institutional_work_metabox($post)
{
	$value = get_post_meta($post->ID, '_institutional_work', true);
?>
	<label for="institutional_work">
		<input type="checkbox" name="institutional_work" id="institutional_work" <?php checked($value, 'on'); ?> />
		Institutional Work
	</label>
<?php
}

function save_institutional_work_metabox($post_id)
{
	if (isset($_POST['institutional_work'])) {
		update_post_meta($post_id, '_institutional_work', 'on');
	} else {
		delete_post_meta($post_id, '_institutional_work');
	}
}
add_action('save_post', 'save_institutional_work_metabox');

//animations metabox

// Save Metabox Data Function
function save_animations_metabox_data($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (!current_user_can('edit_post', $post_id)) return;

	$animations = isset($_POST['animations']) ? array_map('sanitize_text_field', $_POST['animations']) : array();
	$ratios = isset($_POST['animation_ratio']) ? array_map('sanitize_text_field', $_POST['animation_ratio']) : array();

	update_post_meta($post_id, '_animations', $animations);
	update_post_meta($post_id, '_animation_ratio', $ratios);
}

// Metabox Callback Function
function animations_metabox_callback($post)
{
	$animations = get_post_meta($post->ID, '_animations', true);
	$ratios = get_post_meta($post->ID, '_animation_ratio', true);
?>
	<label>Enter animation names:</label>
	<div id="animations-container">
		<?php
		if ($animations && is_array($animations)) {
			foreach ($animations as $index => $animation) {
		?>
				<div>
					<input type="text" name="animations[]" value="<?php echo esc_attr($animation); ?>" style="width:70%;" />
					<label>
						<input type="radio" name="animation_ratio[<?php echo $index; ?>]" value="square" <?php checked($ratios[$index], 'square'); ?> />
						Square
					</label>
					<label>
						<input type="radio" name="animation_ratio[<?php echo $index; ?>]" value="panoramic" <?php checked($ratios[$index], 'panoramic'); ?> />
						Panoramic
					</label>
				</div>
			<?php
			}
		} else {
			?>
			<div>
				<input type="text" name="animations[]" style="width:70%;" />
				<label>
					<input type="radio" name="animation_ratio[0]" value="square" checked />
					Square
				</label>
				<label>
					<input type="radio" name="animation_ratio[0]" value="panoramic" />
					Panoramic
				</label>
			</div>
		<?php
		}
		?>
	</div>
	<button type="button" id="add-animation">Add New Animation</button>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			document.getElementById('add-animation').addEventListener('click', function() {
				var container = document.getElementById('animations-container');
				var newIndex = container.children.length; // Index for the new input
				var newInput = document.createElement('div');
				newInput.innerHTML = `
                    <input type="text" name="animations[]" style="width:70%;" />
                    <label>
                        <input type="radio" name="animation_ratio[${newIndex}]" value="square" checked />
                        Square
                    </label>
                    <label>
                        <input type="radio" name="animation_ratio[${newIndex}]" value="panoramic" />
                        Panoramic
                    </label>`;
				container.appendChild(newInput);
			});
		});
	</script>
<?php
}

// Metabox Setup Function
function animations_metabox_setup()
{
	$post_types = array('animation', 'illustrations', 'graphic_design', 'ceramics', 'clothing');

	foreach ($post_types as $post_type) {
		add_meta_box('animations_metabox', 'Animations', 'animations_metabox_callback', $post_type, 'normal', 'high');
	}
}
add_action('add_meta_boxes', 'animations_metabox_setup');
add_action('save_post', 'save_animations_metabox_data');

//genral settings social links

function custom_general_settings_fields($settings)
{
	$settings['custom_instagram'] = array(
		'title'    => 'Instagram',
		'type'     => 'url',
		'id'       => 'custom_instagram',
		'desc'     => 'Enter your Instagram link.',
		'std'      => '',
		'section'  => 'general',
	);

	$settings['custom_instagram_text'] = array(
		'title'    => 'Instagram Display Text',
		'type'     => 'text',
		'id'       => 'custom_instagram_text',
		'desc'     => 'Enter the display text for your Instagram link.',
		'std'      => '',
		'section'  => 'general',
	);

	$settings['custom_email'] = array(
		'title'    => 'Email',
		'type'     => 'mail',
		'id'       => 'custom_email',
		'desc'     => 'Enter your Email link.',
		'std'      => '',
		'section'  => 'general',
	);

	$settings['custom_email_text'] = array(
		'title'    => 'Email Display Text',
		'type'     => 'text',
		'id'       => 'custom_email_text',
		'desc'     => 'Enter the display text for your Email link.',
		'std'      => '',
		'section'  => 'general',
	);

	return $settings;
}

function add_custom_general_settings()
{
	add_settings_section('general', 'Useful links', '__return_false', 'general');

	add_settings_field('custom_instagram', 'Instagram Link', 'custom_instagram_callback', 'general', 'general');
	add_settings_field('custom_instagram_text', 'Instagram Display Text', 'custom_instagram_text_callback', 'general', 'general');

	add_settings_field('custom_email', 'Email Link', 'custom_email_callback', 'general', 'general');
	add_settings_field('custom_email_text', 'Email Display Text', 'custom_email_text_callback', 'general', 'general');

	register_setting('general', 'custom_instagram');
	register_setting('general', 'custom_instagram_text');

	register_setting('general', 'custom_email');
	register_setting('general', 'custom_email_text');
}

function custom_instagram_callback()
{
	$value = get_option('custom_instagram');
	echo '<input type="url" id="custom_instagram" name="custom_instagram" value="' . esc_url($value) . '" />';
}

function custom_instagram_text_callback()
{
	$value = get_option('custom_instagram_text');
	echo '<input type="text" id="custom_instagram_text" name="custom_instagram_text" value="' . esc_attr($value) . '" />';
}

function custom_email_callback()
{
	$value = get_option('custom_email');
	echo '<input type="email" id="custom_email" name="custom_email" value="' . esc_attr($value) . '" />';
}

function custom_email_text_callback()
{
	$value = get_option('custom_email_text');
	echo '<input type="text" id="custom_email_text" name="custom_email_text" value="' . esc_attr($value) . '" />';
}

add_filter('admin_init', 'add_custom_general_settings');
add_action('admin_menu', 'add_custom_general_settings');
