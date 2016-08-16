<?php
/**
 * omar460 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package omar460
 *echo "# omarcct460" >> README.md
*git init
*git add README.md
*git commit -m "first commit"
*git remote add origin https://github.com/omarakhund/omarcct460.git
*git push -u origin master
 */

//Enqueuing stylesheets for options page
function child_enqueue_scripts() {
    wp_enqueue_style ('parent-css', get_template_directory_uri() . '/style1.css');
    wp_enqueue_style ('parent-css', get_template_directory_uri() . '/style2.css');
    wp_enqueue_style ('parent-css', get_template_directory_uri() . '/style3.css');
  }
  add_action('wp_enqueue_scripts', 'child_enqueue_scripts');


//custom post type code begins. Code reference: http://www.wpbeginner.com/wp-tutorials/how-to-create-custom-post-types-in-wordpress/
function omar_cpt() {
    register_post_type( 'pdf',
    // CPT Option
        array(
            'labels' => array(
                'name' => __( 'Pakistan Development Fund' ),
                'singular_name' => __( 'PDF' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'pdf'),
        )
    );
}

// Hooking up our function to theme setup
add_action( 'init', 'omar_cpt' );

function omar_custom() {
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'PDF', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'PDFs', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Pakistan Development Fund', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent pdf', 'twentythirteen' ),
        'all_items'           => __( 'All projects', 'twentythirteen' ),
        'view_item'           => __( 'View project', 'twentythirteen' ),
        'add_new_item'        => __( 'Add new project', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Project', 'twentythirteen' ),
        'update_item'         => __( 'Update Project', 'twentythirteen' ),
        'search_items'        => __( 'Search Project', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );

// Set other options for Custom Post Type
    $args = array(
        'label'               => __( 'projects', 'twentythirteen' ),
        'description'         => __( 'pdf news and media', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    register_post_type( 'pdf', $args );

}

add_action( 'init', 'omar_custom', 0 );


add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'pdf' ) );
    return $query;
}

//Footer menu
register_nav_menus(
	array('secondary' => 'Menu Footer'
		));


//adding options page
require get_stylesheet_directory() . '/inc/options.php';


//adding a custom signature after every post

function omar_signature(){
	echo "OA";
}

if ( ! function_exists( 'omar460_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function omar460_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on omar460, use a find and replace
	 * to change 'omar460' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'omar460', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('thumbsize', 300, 300, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'omar460' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'omar460_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'omar460_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function omar460_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'omar460_content_width', 640 );
}
add_action( 'after_setup_theme', 'omar460_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function omar460_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'omar460' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'omar460' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'secondsidebar', 'omar460' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'omar460' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'omar460_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function omar460_scripts() {
	wp_enqueue_style( 'omar460-style', get_stylesheet_uri() );


	wp_enqueue_script( 'omar460-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'omar460-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'omar460_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
