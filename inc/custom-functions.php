<?php
define( 'THEME_VERSION', '1.2' );
define( 'HOME_URL', trailingslashit( home_url() ) );
define( 'THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'THEME_URL', trailingslashit( get_template_directory_uri() ) );

function vts_custom_jquery() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', ("https://code.jquery.com/jquery-2.2.4.min.js"), false);
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'vts_custom_jquery');
function xxx_scripts() {
    wp_enqueue_style('bootstrap-css' , THEME_URL . 'asset/css/bootstrap.min.css');
    wp_enqueue_style('swiper-css' , THEME_URL . 'asset/css/swiper.min.css');
    wp_enqueue_style('daterangepicker-css' , THEME_URL . 'asset/css/daterangepicker.css');
    wp_enqueue_style('style-css' , THEME_URL . 'asset/css/style.css');
    wp_enqueue_style('aboutus-css' , THEME_URL . 'asset/css/aboutus.css');
    wp_enqueue_style('service-css' , THEME_URL . 'asset/css/service.css');

    wp_enqueue_script( 'boostrap-js', get_template_directory_uri() . '/asset/js/bootstrap.min.js', array( ), THEME_VERSION, true );
    wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/asset/js/swiper-bundle.min.js', array( ), THEME_VERSION, true );
    wp_enqueue_script( 'moment-js', get_template_directory_uri() . '/asset/js/moment.min.js', array( ), THEME_VERSION, true );
    wp_enqueue_script( 'daterange-js', get_template_directory_uri() . '/asset/js/daterangepicker.js', array( ), THEME_VERSION, true );
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/asset/js/custom.js', array( ), THEME_VERSION, true );
        wp_enqueue_script( 'common-js', get_template_directory_uri() . '/asset/js/common.js', array( ), THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'xxx_scripts',10 );


// if ( ! function_exists( 'ssls_setup' ) ) :
//     function ssls_setup() {
//         register_nav_menus( array(
//             'menu-footer'   => esc_html__( 'Menu footer', 'SSls' ),
//         ) );
//     }
// endif;
// add_action( 'after_setup_theme', 'ssls_setup' );

add_image_size( 'blog-thumbnail', 420,240, true );

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
    
}

if ( !function_exists( 'elementor_pagination' ) ) {

    function elementor_pagination() {

        global $wp_query;
        $total = $wp_query->max_num_pages;
        $big = 99999; // need an unlikely integer
        if( $total > 1 )  {
            if( !$current_page = get_query_var('paged') )
                $current_page = 1;
            if( get_option('permalink_structure') ) {
                $format = 'page/%#%/';
            } else {
                $format = '&paged=%#%';
            }
            echo paginate_links(array(
                'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'		=> $format,
                'current'		=> max( 1, get_query_var('paged') ),
                'total' 		=> $total,
                'mid_size'		=> 3,
                'type' 			=> 'list',
                'prev_next' => false
            ) );
        }
    }
}

function create_orders_hotel_table() {
    global $wpdb;
    global $custom_table_version;

    $table_name = $wpdb->prefix . 'orders_hotel';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        totalRooms tinytext NOT NULL,
        totalMoney tinytext NOT NULL,
        totalAdult tinytext NOT NULL,
        totalChildren tinytext NOT NULL,
        fromDate datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        toDate datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    add_option('order_hotel_table_version', $custom_table_version);
}

function create_orders_hotel_rooms_table() {
    global $wpdb;
    global $custom_table_version;

    $table_name = $wpdb->prefix . 'orders_room_hotel';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        idRoomOrder tinytext NOT NULL,
        quantity tinytext NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    add_option('create_orders_hotel_rooms_table_version', $custom_table_version);
}
function create_custom_table_on_theme_activation() {
    create_orders_hotel_table();
    create_orders_hotel_rooms_table();
}
add_action('after_setup_theme', 'create_custom_table_on_theme_activation');

if ( !function_exists( 'related_posts' ) ){
    function  related_posts() {
        $posttype = get_post_type();
        if ( $posttype == 'post' ) {
            $categories = wp_get_post_categories(get_the_id(), array('orderby' => 'parent', ));
            $args = array(
                'cat'                 => $categories,
                'post__not_in'        => array(get_the_id()),
                'showposts'           => 3,
                'ignore_sticky_posts' => 1,
                'orderby'             => 'rand',
            );
        }
        $related_post = new wp_query($args);
        echo "<pre>";
        print_r($related_post);
        echo "</pre>";
        if( $related_post->have_posts() ){
            ?>
            <div class="show-related container">
                <div class="related-title-block">
                    <h3 class="related-title">
                        <?php
                        the_category(', ');
                        ?>
                    </h3>
                    <?php $posttype = get_post_type();
                    if ( $posttype == 'post' ) {
                        global $post;
                        $categories = wp_get_post_categories(get_the_id(), array('orderby' => 'parent', ));
                        $category_link = get_category_link( $categories[0] );
                        ?>
                        <div class="show-all">
                            <a href="<?php echo esc_url( $category_link ); ?>" title="Category Name">Xem thêm bài viết<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.77 6C5.77 5.58579 6.10579 5.25 6.52 5.25H19C19.4142 5.25 19.75 5.58579 19.75 6V18.48C19.75 18.8942 19.4142 19.23 19 19.23C18.5858 19.23 18.25 18.8942 18.25 18.48V7.81066L6.53033 19.5303C6.23744 19.8232 5.76256 19.8232 5.46967 19.5303C5.17678 19.2374 5.17678 18.7626 5.46967 18.4697L17.1893 6.75H6.52C6.10579 6.75 5.77 6.41421 5.77 6Z" fill="#324894"/>
                                </svg>
                            </a>
                        </div>

                    <?php } ?>
                </div>
                <div class="row related-post-content swiper">
                    <div class="swiper-wrapper">
                    <?php while ($related_post->have_posts()){
                        $related_post->the_post();
                        $url_thumbnail = get_the_post_thumbnail_url();
                        global $post;
                        ?>
                        <article class="col-lg-4 col-md-6 col-12 item swiper-slide " id="post-<?php esc_attr(the_ID()); ?>" <?php post_class(); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="entry-image">
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink() ?>" class="cct-image-wrapper">
                                            <img src="<?php echo $url_thumbnail ?>" alt="<?php the_title(); ?>"/>
                                        </a>
                                    </div>
                                    <div class="inner">
                                        <div class="entry-title">
                                            <h1><?php echo the_title(); ?></h1>
                                        </div>
                                        <div class="readmore-block">
                                            <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>" class="entry-readmore">
                                                <?php echo esc_html__('đọc thêm', 'cct'); ?>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </article>
                    <?php } ?>
                    </div>
                </div>
                <div class="blog-pagination "></div>
                <?php $posttype = get_post_type();
                if ( $posttype == 'post' ) {
                    global $post;
                    $categories = wp_get_post_categories(get_the_id(), array('orderby' => 'parent', ));
                    $category_link = get_category_link( $categories[0] );
                    ?>
                    <div class="show-all show-all-mobile">
                        <a href="<?php echo esc_url( $category_link ); ?>" title="Category Name">Xem thêm bài viết<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.77 6C5.77 5.58579 6.10579 5.25 6.52 5.25H19C19.4142 5.25 19.75 5.58579 19.75 6V18.48C19.75 18.8942 19.4142 19.23 19 19.23C18.5858 19.23 18.25 18.8942 18.25 18.48V7.81066L6.53033 19.5303C6.23744 19.8232 5.76256 19.8232 5.46967 19.5303C5.17678 19.2374 5.17678 18.7626 5.46967 18.4697L17.1893 6.75H6.52C6.10579 6.75 5.77 6.41421 5.77 6Z" fill="#324894"/>
                            </svg>
                        </a>
                    </div>

                <?php } ?>
            </div>

        <?php   }
        wp_reset_query();
    }
}
