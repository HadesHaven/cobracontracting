<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cobracontracting_setup() {

    //Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'cobracontracting' ),
	) );

    //enable theme logo
    add_theme_support( 'custom-logo' );
    
    //custom image sizes
    add_image_size( 'medium-vertical', '600', '750', true );
    add_image_size( 'banner', '2500', '1500', true );
    
    //move Yoast Metabox to bottom 
    add_filter( 'wpseo_metabox_prio', function() { return 'low';});
    
    // This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main'    => __( 'Main Navigation', 'cobra' ),
	) );
}
add_action( 'after_setup_theme', 'cobracontracting_setup' );



/**
 * Enqueue scripts and styles.
 */
function cobracontracting_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'cobracontracting-style', get_template_directory_uri(). '/style.css?'.rand() );
    
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/cobra.js', array ( 'jquery' ), 1.0, true);
}
add_action( 'wp_enqueue_scripts', 'cobracontracting_scripts' );


/**
 * Remove Gutenberg  editor in post and pages. ACF Fields are used instead
 */
add_filter('use_block_editor_for_post', '__return_false', 10);


/**
 * Remove default editor in post and portfolio post types. ACF Fields are used instead
 */

function remove_editor_from_post_type() {
    remove_post_type_support( 'post', 'editor' );
    remove_post_type_support( 'page', 'editor' );
    remove_post_type_support( 'notification', 'editor' );
}


add_action('init', 'remove_editor_from_post_type');

/**
 * Allow SVG through WordPress Media Uploader
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/**
 * Change default 'POST' name to 'Projects
 */
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Cobra Projects';
    $submenu['edit.php'][5][0] = 'Projects';
    $submenu['edit.php'][10][0] = 'Add Projects';
    $submenu['edit.php'][16][0] = 'Project Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Projects';
    $labels->singular_name = 'Projects';
    $labels->add_new = 'Add Projects';
    $labels->add_new_item = 'Add Projects';
    $labels->edit_item = 'Edit Projects';
    $labels->new_item = 'Projects';
    $labels->view_item = 'View Projects';
    $labels->search_items = 'Search Projects';
    $labels->not_found = 'No Projects found';
    $labels->not_found_in_trash = 'No Projects found in Trash';
    $labels->all_items = 'All Projects';
    $labels->menu_name = 'Projects';
    $labels->name_admin_bar = 'Projects';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );