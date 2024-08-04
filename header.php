<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Anonymous
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open();
$logo = get_field('logo', 'option');
$address_topbar = get_field('address_topbar', 'option');
$link_map = get_field('link_map', 'option');
$hotline_topbar = get_field('hotline_topbar', 'option');
$link_facebook = get_field('link_facebook', 'option');
$name_facebook = get_field('name_facebook', 'option');
?>

<div id="page" class="site">
    <div class="menu-responsive">
        <div class="icon-close-res-menu">
            <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-slose-black.svg" alt="">
        </div>

        <div class="content-menu-mobile">
            <nav id="site-navigation-mobile" class="main-navigation-mobile">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-mobile',
                        'menu_id'        => 'menu-mobile',
                    )
                );
                ?>
            </nav>
        </div>
    </div>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'anonymous' ); ?></a>
    <div id="topbar">
        <div class="custom-container">
            <div class="content-topbar">
                <div class="left-topbar">
                    <div class="item item-address">
                        <span class="icon">
                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon_map.svg" alt="">
                        </span>
                        <span><?php echo $address_topbar; ?></span>
                    </div>
                    <div class="item item-map">
                        <a href="<?php echo $link_map; ?>" target="_blank" class="item">
                            <span class="icon">
                                <img src="<?php bloginfo('template_url'); ?>/asset/icons/map-02.svg" alt="">
                            </span>
                            <span>Bản đồ chỉ dẫn</span>
                        </a>
                    </div>
                </div>
                <div class="right-topbar">
                    <div class="item item-hotline">
                        <a href="tel:<?php echo $hotline_topbar; ?>" class="item">
                            <span class="icon">
                                <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-phone.svg" alt="">
                            </span>
                            <span>HOTLINE ĐẶT PHÒNG <?php echo $hotline_topbar; ?></span>
                        </a>
                    </div>
                    <div class="item item-fb">
                        <a href="<?php echo $link_facebook; ?>" target="_blank" class="item">
                            <span class="icon">
                                <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-fb.svg" alt="">
                            </span>
                            <span><?php echo $name_facebook; ?></span>
                        </a>
                    </div>
                </div>
            </div>
</div>
    </div>
	<header id="masthead" class="site-header">
        <div id="head-main" class="custom-container">
            <div class="left-menu">
                <nav id="site-navigation-left" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'anonymous' ); ?></button>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-main-left',
                            'menu_id'        => 'menu-main-left',
                        )
                    );
                    ?>
                </nav>
            </div>
            <div class="site-branding">
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php echo $logo['url']; ?>" alt="">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </h1>
            </div>
            <div class="right-menu">
                <nav id="site-navigation-right" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'anonymous' ); ?></button>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-main-right',
                            'menu_id'        => 'menu-main-right',
                        )
                    );
                    ?>
                </nav>
            </div>
            <div class="icon-menu-mobile">
                <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-menu-mobile.svg" alt="">
            </div>
        </div>
	</header><!-- #masthead -->
