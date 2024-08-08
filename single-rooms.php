<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Anonymous
 */
if (!defined('ABSPATH')) {
    return;
}
get_header();
$banner = get_field( "image_banner" );
$des = get_field( "description" );
$number = get_field( "price" );
$area = get_field( "area" );
$bed = get_field( "bed" );
$person = get_field( "person" );
$wifi = get_field( "wifi" );
$air_conditioner = get_field( "air_conditioner" );
$tv = get_field( "tv" );
$bar = get_field( "bar" );
$elevator = get_field( "elevator" );
$park = get_field( "park" );
$receptionist = get_field( "receptionist" );
$family_room = get_field( "family_room" );
$karaoke = get_field( "karaoke" );
$service_rules = get_field( "service_rules" );
$booking_step = get_field( "booking_step" );
$args_system_room = array(
    'post_type' => 'rooms',
    'posts_per_page' => 5,
    'post_status' => 'publish',
);
$myposts_system_room = get_posts($args_system_room);
$list_image_room = get_field( "image_room" );

?>

    <main id="primary" class="site-main single-room-page">
        <div class="single-banner" style="background-image: url(<?php echo $banner['url']; ?>)">
            <div class="banner-contain"
                 data-aos="fade-down"
                 data-aos-duration="1000"
                 data-aos-easing="ease-in-sine"  data-aos-delay="50"
            >
                <div class="category-name">
                    <?php
                    the_category(', ');
                    ?>
                </div>
                <div class="single-title">
                    <h1><?php the_title()?></h1>
                </div>
                <div class="single-des">
                    <p><?php echo $des; ?></p>
                </div>
            </div>
        </div>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <div class="booking-f"
                 data-aos="fade-down"
                 data-aos-duration="1000"
                 data-aos-easing="ease-in-sine"  data-aos-delay="50"
            >
                <div class="">
                    <div class="container">
                        <div class="content-form-booking">
                            <div class="form-booking">
                                <div class="date-range">
                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-calandar.png" alt="">
                                    <input type="text" class="dateRange" id="dateRange" name="range_date">
                                    <div class="count-date">(<span class="totalDate">1</span>đêm )</div>
                                    <div class="icon-date">
                                        <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-arrow-bt.png" alt="">
                                    </div>
                                </div>
                                <div class="select-person">
                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-user.png" alt="">
                                    <span> <span id="num-adult">1</span> người lớn - <span id="num-child">0</span> trẻ em </span>
                                    <div class="icon">
                                        <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-arrow-bt.png" alt="">
                                    </div>
                                    <div class="change-number-person">
                                        <div class="list-item">
                                            <div class="item">
                                                <div class="item-left">
                                                    <label>Người lớn</label>
                                                    <span>16 tuổi trở lên</span>
                                                </div>
                                                <div class="item-right">
                                                    <div class="input-group">
                                                        <button class="decrease" type="button">
                                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/-.png" alt="">
                                                        </button>
                                                        <input id="numberAdults" onchange="" name="adults" type="number" class="numberInput numberInputAdult" value="1" min="0" max="100">
                                                        <button class="increase" type="button">
                                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/+.png" alt="">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-left">
                                                    <label>Trẻ em</label>
                                                    <span>0 - 16 tuổi</span>
                                                </div>
                                                <div class="item-right">
                                                    <div class="input-group">
                                                        <button class="decrease" type="button">
                                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/-.png" alt="">
                                                        </button>
                                                        <input name='children' id="numberChildren" type="number" class="numberInput" value="0" min="0" max="100">
                                                        <button class="increase" type="button">
                                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/+.png" alt="">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-action">
                                            <button type="button" class="submit-persion">Xác nhận</button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="action" value="my_custom_form_action">
                                <button type="submit" class="btn-submit">
                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-search.png" alt="">
                                    <span>Tìm phòng</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="content-single-room">
            <div class="single-room-content">
                <div class="section-content-room container-fluid">
                    <div class="contain row">
                        <div class="col-12">
                            <div class="section-content"
                                 data-aos="fade-down"
                                 data-aos-duration="1000"
                                 data-aos-easing="ease-in-sine"  data-aos-delay="50"
                            >
                                <?php
                                the_content();
                                ?>
                            </div>
                            <div class="section-price"
                                 data-aos="fade-down"
                                 data-aos-duration="1000"
                                 data-aos-easing="ease-in-sine"  data-aos-delay="50"
                            >
                                <h1>GIÁ PHÒNG</h1>
                                <p>
                                    <?php
                                    if ($number) {
                                        $formatted_number = number_format($number, 0, '', '.');
                                        echo 'Từ ' . $formatted_number . ' VND/đêm';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-list-image-room"
                     data-aos="fade-down"
                     data-aos-duration="1000"
                     data-aos-easing="ease-in-sine"  data-aos-delay="50"
                >
                    <div class="list-image-room swiper">
                        <div class="swiper-wrapper">
                            <?php
                            if($list_image_room){
                                foreach($list_image_room as $item){
                                    ?>
                                    <div class="swiper-slide">
                                        <img class="image" src="<?php echo $item['img']['url']?>" />
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="image-room-pagination"></div>
                </div>
                <div class="utilities-contain"
                     data-aos="fade-down"
                     data-aos-duration="1000"
                     data-aos-easing="ease-in-sine"  data-aos-delay="50"
                >
                    <div class="section-utilities container">
                        <div class="utilities-inner">
                            <h1>Tính năng phòng</h1>
                            <div class="row list-utilities">
                                <div class="col-xl-4 col-12 grid-contain">
                                    <?php
                                    if ($area) {
                                        ?>
                                        <div class="utilities">
                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon_area.svg" alt="">
                                            <?php echo $area.'m2'; ?>
                                        </div>
                                        <?php
                                    }
                                    if ($bed) {
                                        ?>
                                        <div class="utilities">
                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/lucide_bed-single.svg" alt="">
                                            <?php echo $bed . ' giường'; ?>
                                        </div>
                                        <?php
                                    }
                                    if ($person) {
                                        ?>
                                        <div class="utilities">
                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/Icons-person.svg" alt="">
                                            <?php echo $person; ?>
                                        </div>
                                        <?php
                                    }
                                    if ($wifi) {
                                        ?>
                                        <div class="utilities">
                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/Icons-wifi.svg" alt="">
                                            <?php echo $wifi; ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-xl-4 col-12 grid-contain">
                                    <?php
                                    if ($air_conditioner) {
                                        ?>
                                        <div class="utilities">
                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon_air_conditioner.svg" alt="">
                                            <?php echo 'Điều hòa'; ?>
                                        </div>
                                        <?php
                                    }
                                    if ($tv) {
                                        ?>
                                        <div class="utilities">
                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/Icons-tv.svg" alt="">
                                            <?php echo 'TV'; ?>
                                        </div>
                                        <?php
                                    }
                                    if ($bar) {
                                        ?>
                                        <div class="utilities">
                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/Icons-bar.svg" alt="">
                                            <?php echo 'Quầy bar mini'; ?>
                                        </div>
                                        <?php
                                    }
                                    if ($elevator) {
                                        ?>
                                        <div class="utilities">
                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/Icons-elevator.svg" alt="">
                                            <?php echo 'Thang máy'; ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-xl-4 col-12 grid-contain">
                                    <?php
                                    if ($park) {
                                        ?>
                                        <div class="utilities">
                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/Icons-park.svg" alt="">
                                            <?php echo $park; ?>
                                        </div>
                                        <?php
                                    }
                                    if ($receptionist) {
                                        ?>
                                        <div class="utilities">
                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/Icons-receptionist.svg" alt="">
                                            <?php echo $receptionist; ?>
                                        </div>
                                        <?php
                                    }
                                    if ($family_room) {
                                        ?>
                                        <div class="utilities">
                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/Icons-family-room.svg" alt="">
                                            <?php echo 'Phòng gia đình'; ?>
                                        </div>
                                        <?php
                                    }
                                    if ($karaoke) {
                                        ?>
                                        <div class="utilities">
                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/Icons-karaoke.svg" alt="">
                                            <?php echo 'Karaoke'; ?>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="btn-book">
                                <a href="#">Đặt phòng<img src="<?php bloginfo('template_url'); ?>/asset/images/arrow-right.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-service-rules container-fluid">
                    <div class="row section-rules-contain">
                        <div class="col-xl-6 col-12 rule-wrapper"
                             data-aos="fade-right"
                             data-aos-duration="1000"
                             data-aos-easing="ease-in-sine"  data-aos-delay="50"
                        >
                            <div class="contain">
                                <h1>Điều khoản & Dịch vụ</h1>
                                <ol>
                                    <?php
                                    if ($service_rules) {
                                        foreach($service_rules as $item){
                                            ?>
                                            <li><?php echo $item['item'] ?></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ol>
                            </div>
                        </div>
                        <div class="col-xl-6 col-12"
                             data-aos="fade-left"
                             data-aos-duration="1000"
                             data-aos-easing="ease-in-sine"  data-aos-delay="50"
                        >
                            <div class="contain">
                                <h1>Các bước đặt phòng</h1>
                                <ol>
                                    <?php
                                    if ($booking_step) {
                                        foreach($booking_step as $item){
                                            ?>
                                            <li><?php echo $item['step'] ?></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if($myposts_system_room) { ?>
                    <div class="section-system-room"
                         data-aos="fade-down"
                         data-aos-duration="1000"
                         data-aos-easing="ease-in-sine"  data-aos-delay="50"
                    >
                        <div class="system-room-container">
                            <h3 class="title">Hệ thống phòng nghỉ</h3>
                            <div class="list-system-rooms swiper">
                                <div class="swiper-wrapper">
                                    <?php
                                    foreach ($myposts_system_room as $item) { ?>
                                        <div class="swiper-slide item">
                                            <div class="img">
                                                <div class="thumbnail">
                                                    <a href="<?php echo get_permalink($item->ID); ?>">
                                                        <?php
                                                        echo get_the_post_thumbnail($item->ID,'blog-thumbnail');
                                                        ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <a href="<?php echo get_permalink($item->ID); ?>">
                                                    <h4 class="title-post"><?php echo get_the_title($item->ID); ?></h4>
                                                </a>
                                                <div class="price">
                                                    <p>
                                                        <?php
                                                        if ($number) {
                                                            $formatted_number = number_format($number, 0, '', '.');
                                                            echo 'Từ ' . $formatted_number . ' VND/đêm';
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="option-room">
                                                    <div class="op">
                                                        <?php
                                                        if ($area) {
                                                            ?>
                                                            <div class="utilities">
                                                                <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon_area.svg" alt="">
                                                                <?php echo $area.'m2'; ?>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="op">
                                                        <?php
                                                        if ($bed) {
                                                            ?>
                                                            <div class="utilities">
                                                                <img src="<?php bloginfo('template_url'); ?>/asset/icons/lucide_bed-single.svg" alt="">
                                                                <?php echo $bed . ' giường'; ?>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="op">
                                                        <?php
                                                        if ($person) {
                                                            ?>
                                                            <div class="utilities">
                                                                <img src="<?php bloginfo('template_url'); ?>/asset/icons/Icons-person.svg" alt="">
                                                                <?php echo $person; ?>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="link-to-room">
                                                    <a href="<?php echo get_permalink($item->ID); ?>">Chi tiết phòng</a>
                                                    <a href="<?php echo home_url('/booking/'); ?>" class="booking-link">ĐẶT PHÒNG<img src="<?php bloginfo('template_url'); ?>/asset/icons/arrow-right-black.png" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <div class="room-pagination"></div>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </main>


<?php
get_footer();
