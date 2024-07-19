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
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'anonymous' ); ?></a>
    <div id="topbar">
        <div class="container-fluid">
            <div class="content-topbar">
                <div class="left-topbar">
                    <div class="item item-address">
                            <span class="icon">
                                <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon_map.png" alt="">
                            </span>
                        <span>Số 279, khối Hòa Bắc, thị trấn Thạch Giám, Tương Dương, Nghệ An</span>
                    </div>
                    <div class="item item-map">
                        <a href="" target="_blank" class="item">
                                <span class="icon">
                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/map-02.png" alt="">
                                </span>
                            <span>Bản đồ chỉ dẫn</span>
                        </a>
                    </div>
                </div>
                <div class="right-topbar">
                    <div class="item item-hotline">
                        <a href="tel:02383746888" class="item">
                                <span class="icon">
                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-phone.png" alt="">
                                </span>
                            <span>HOTLINE ĐẶT PHÒNG 0238 3746 888</span>
                        </a>
                    </div>
                    <div class="item item-fb">
                        <a href="#" target="_blank" class="item">
                                <span class="icon">
                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-fb.png" alt="">
                                </span>
                            <span>Hoa Binh Hotel</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<header id="masthead" class="site-header">
        <div id="head-main">
            <div class="left-menu">
                <nav id="site-navigation-left" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'anonymous' ); ?></button>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                </nav>
            </div>
            <div class="site-branding">
                <?php
                the_custom_logo();
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
                endif;
                $anonymous_description = get_bloginfo( 'description', 'display' );
                if ( $anonymous_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $anonymous_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif; ?>
            </div>
            <div class="right-menu">
                <nav id="site-navigation-right" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'anonymous' ); ?></button>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>


	</header><!-- #masthead -->
