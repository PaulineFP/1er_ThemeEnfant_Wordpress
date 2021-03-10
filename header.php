<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bakes_And_Cakes
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="https://schema.org/WebSite">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300&family=Merriweather:ital,wght@1,700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
<?php wp_body_open(); ?>
<!--Require my css Style-->
<?php
add_action( 'wp_enqueue_scripts', 'my_plugin_add_stylesheet' );
function my_plugin_add_stylesheet() {
    wp_enqueue_style( 'my-style', get_stylesheet_directory_uri() . '/style.css', false, '1.0', 'all' );
} ?>
<!------>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#acc-content"><?php esc_html_e( 'Skip to content (Press Enter)', 'bakes-and-cakes' ); ?></a>
    <header id="masthead" class="site-header" role="banner" itemscope itemtype="https://schema.org/WPHeader">
        <div class="header-t">
            <div class="container">
                <?php wp_nav_menu( array( 'theme_location' => 'third', 'menu_id' => 'third-menu' ) ); ?>
                <div class="site-branding" itemscope itemtype="https://schema.org/Organization">
                    <?php
                    if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                        the_custom_logo();
                    } ?>
                    <div class="text-logo site-social row">
                        <div class="L-5 float-l">
                            <?php if ( is_front_page() ) : ?>
                                <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        </div>
                        <!--Social link -->
                        <div class="column-2">
<!--                            --><?php //do_action( 'bakes_and_cakes_footer_top' ); ?>
                            <?php
                            if (is_active_sidebar('footer-first')) {
                                dynamic_sidebar('footer-first');
                            } ?>
                         </div>
                            <!---->
                        <?php else : ?>
                            <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php endif ?>

                    </div>
                </div><!-- .site-branding -->
                <div class="menu-opener">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

        <nav id="site-navigation" class="main-navigation" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->

<?php $enable_slider    = get_theme_mod('bakes_and_cakes_ed_slider');
$enabled_sections = bakes_and_cakes_get_sections();
$ed_breadcrumbs   = get_theme_mod('bakes_and_cakes_ed_breadcrumb');

if( (is_front_page() || is_page_template('template-home.php')) && $enable_slider ) {

    do_action('bakes_and_cakes_slider');

}
echo '<div id="acc-content">'; // added for accessibility purpose

if( is_home() || ! $enabled_sections || ! ( is_front_page()  || is_page_template( 'template-home.php' ) ) ){

    echo '<div class="container">';

    echo '<div id="content" class="site-content">';

    if($ed_breadcrumbs){ do_action('bakes_and_cakes_breadcrumbs'); }
}
?>