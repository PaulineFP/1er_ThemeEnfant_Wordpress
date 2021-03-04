<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

//---------------resize img---------------------------

/**
 * Bakes And Cakes functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bakes_And_Cakes
 */

$bakes_and_cakes_theme_data = wp_get_theme();
if( ! defined( 'BAKES_AND_CAKES_THEME_VERSION' ) ) define ( 'BAKES_AND_CAKES_THEME_VERSION', $bakes_and_cakes_theme_data->get( 'Version' ) );
if( ! defined( 'BAKES_AND_CAKES_THEME_NAME' ) ) define( 'BAKES_AND_CAKES_THEME_NAME', $bakes_and_cakes_theme_data->get( 'Name' ) );

if (!function_exists('bakes_and_cakes_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function bakes_and_cakes_setup() {
        /*
                * Make theme available for translation.
                * Translations can be filed in the /languages/ directory.
                * If you're building a theme based on Bakes And Cakes, use a find and replace
                * to change 'bakes-and-cakes' to the name of your theme in all the template files.
        */
        load_theme_textdomain('bakes-and-cakes', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
                * Let WordPress manage the document title.
                * By adding theme support, we declare that this theme does not use a
                * hard-coded <title> tag in the document head, and expect WordPress to
                * provide it for us.
        */
        add_theme_support('title-tag');

        /*
                * Enable support for Post Thumbnails on posts and pages.
                *
                * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');

        /* Custom Logo */
        add_theme_support( 'custom-logo', array(
            'header-text' => array( 'site-title', 'site-description' ),
        ) );


        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'bakes-and-cakes'),
        ));

        /*
                * Switch default core markup for search form, comment form, and comments
                * to output valid HTML5.
        */
        add_theme_support('html5', array(
            'search-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
                * Enable support for Post Formats.
                * See https://developer.wordpress.org/themes/functionality/post-formats/
        */
        add_theme_support('post-formats', array(
            'aside',
            'status',
            'video',
            'quote',
            'link',
        ));

        // show excerpt in page
        add_post_type_support( 'page', 'excerpt' );

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('bakes_and_cakes_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        //Custom Image Sizes
        add_image_size('bakes-and-cakes-post-thumb', 60, 60, true);
        add_image_size('bakes-and-cakes-about-thumb', 600, 400, true);
        add_image_size('bakes-and-cakes-product-thumb', 235, 235, true);
        add_image_size('bakes-and-cakes-slider', 1420, 550, true);
        add_image_size('bakes-and-cakes-image-full', 1139, 498, true);
        add_image_size('bakes-and-cakes-image', 750, 400, true);
        add_image_size('bakes-and-cakes-staff-thumb', 487, 527, true);
        add_image_size('bakes-and-cakes-blog-thumb', 280, 255, true);
        add_image_size('bakes-and-cakes-events-thumb', 255, 255, true);
        add_image_size('bakes-and-cakes-schema', 600, 60, true);
    }
endif;
add_action('after_setup_theme', 'bakes_and_cakes_setup');