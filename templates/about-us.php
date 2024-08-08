<?php
//Template Name: About us
get_header();
$title_1 = get_field( "title_1" );
$main_title_1 = get_field("main_title_1");
$des_1 = get_field("des_1");
$image_1 = get_field("image_1");
$title_2 = get_field("title_2");
$main_title_2 = get_field("main_title_2");
$des_2 = get_field( "des_2" );
$image_2 = get_field("image_2");
$title_3 = get_field("title_3");
$main_title_3 = get_field("main_title_3");
$des_3 = get_field( "des_3" );
$list_image = get_field("list_image");
$banner = get_field( "banner" );
$des = get_field( "des_banner" );
$args_system_room = array(
    'post_type' => 'rooms',
    'posts_per_page' => 5,
    'post_status' => 'publish',
);
$myposts_system_room = get_posts($args_system_room);
?>
<div class="template-about-us">
    <div class="content-about-us">
        <div class="single-banner" style="background-image: url(<?php echo $banner['url']; ?>)">
            <div class="banner-contain">
                <div class="single-title"
                     data-aos="fade-down"
                     data-aos-duration="1000"
                     data-aos-easing="ease-in-sine"  data-aos-delay="50"
                >
                    <h1><?php the_title()?></h1>
                </div>
                <div class="single-des"
                     data-aos="fade-down"
                     data-aos-duration="1000"
                     data-aos-easing="ease-in-sine"  data-aos-delay="50"
                >
                    <p><?php echo $des; ?></p>
                </div>
            </div>
        </div>
        <section id='' class="section-contain section-contain-1">
            <div class="container-fluid">
                <div class="row first-section">
                    <div class="section-left col-xl-5 col-12"
                         data-aos="fade-right"
                         data-aos-duration="1000"
                         data-aos-easing="ease-in-sine"  data-aos-delay="50"
                    >
                        <div class="inner">
                            <h2 class="title"><?php echo $title_1 ?></h2>
                            <h2 class="main-title"><?php echo $main_title_1 ?></h2>
                            <p class="description"><?php echo $des_1 ?></p>
                        </div>
                    </div>
                    <div class="section-right col-xl-7 col-12"
                         data-aos="fade-left"
                         data-aos-duration="1000"
                         data-aos-easing="ease-in-sine"  data-aos-delay="50"
                    >
                        <img  class="image" src="<?php echo $image_1['url']?>" />
                    </div>
                </div>
            </div>
        </section>
        <section id='' class="section-contain section-contain-2">
            <div class="container-fluid">
                <div class="row first-section">
                    <div class="section-left text-right col-xl-7 col-12"
                         data-aos="fade-right"
                         data-aos-duration="1000"
                         data-aos-easing="ease-in-sine"  data-aos-delay="50"
                    >
                        <img  class="image" src="<?php echo $image_2['url']?>" />
                    </div>
                    <div class="section-right col-xl-5 col-12"
                         data-aos="fade-left"
                         data-aos-duration="1000"
                         data-aos-easing="ease-in-sine"  data-aos-delay="50"
                    >
                        <div class="inner">
                            <h2 class="title"><?php echo $title_2 ?></h2>
                            <h2 class="main-title"><?php echo $main_title_2 ?></h2>
                            <p class="description"><?php echo $des_2 ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-contain-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="inner"
                             data-aos="fade-down"
                             data-aos-duration="1000"
                             data-aos-easing="ease-in-sine"  data-aos-delay="50"
                        >
                            <h2 class="title"><?php echo $title_3 ?></h2>
                            <h2 class="main-title"><?php echo $main_title_3 ?></h2>
                            <p class="description"><?php echo $des_3 ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-slide">
            <div class="slide-image-contain"
                 data-aos="fade-up"
                 data-aos-duration="1000"
                 data-aos-easing="ease-in-sine"  data-aos-delay="50"
            >
                <div class="swiper slide-list-image">
                    <div class="swiper-wrapper">
                        <?php
                            if($list_image){
                                foreach($list_image as $item){
                                    ?>
                                    <div class="swiper-slide">
                                        <img class="image" src="<?php echo $item['image']['url']?>" />
                                    </div>
                                    <?php
                                }
                            }
                         ?>

                    </div>
                </div>
                <div class="image-pagination"></div>
            </div>
        </section>
        <?php
        if($myposts_system_room) { ?>
            <div class="section-system-room">
                <div class="system-room-container">
                    <h3 class="title"
                        data-aos="fade-down"
                        data-aos-duration="1000"
                        data-aos-easing="ease-in-sine"  data-aos-delay="50"
                    >Hệ thống phòng nghỉ</h3>
                    <div class="list-system-rooms swiper"
                         data-aos="fade-up"
                         data-aos-duration="1000"
                         data-aos-easing="ease-in-sine"  data-aos-delay="50"
                    >
                        <div class="swiper-wrapper room-wrapper">
                            <?php
                            foreach ($myposts_system_room as $item) { ?>
                                <div class="swiper-slide item item-room">
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
                                                $number = get_field( 'price', $item->ID );
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
                                                $area = get_field( 'area', $item->ID );
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
                                                $bed = get_field( 'bed', $item->ID );
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
                                                $person = get_field( 'person', $item->ID );
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
<?php get_footer();
