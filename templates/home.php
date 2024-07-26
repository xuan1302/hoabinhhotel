<?php
//Template Name: Home
get_header();
$home_slide = get_field( "home_slide" );
$abous = get_field( "abous" );
$service = get_field( "service" );
$images_hotel = get_field( "images_hotel" );
$bg_service = get_field( "backgound_service" );
$bg_abous = get_field( "backgound_abous" );
$link_all_post = get_field( "link_all_post" );

$args_system_room = array(
    'post_type' => 'rooms',
    'posts_per_page' => 5,
    'post_status' => 'publish',
);
$myposts_system_room = get_posts($args_system_room);

$args_experience = array(
    'posts_per_page' => 3,
    'post_status' => 'publish',
);
$myposts_experience = get_posts( $args_experience );

?>
    <div class="template-home-custom">
        <?php
            if($home_slide) { ?>
                <div class="home-slide">
                    <div class="swiper slide-home">
                        <div class="swiper-wrapper">
                            <?php
                                foreach ($home_slide as $value) { ?>
                                    <div class="swiper-slide item-slide">
                                        <img src="<?php echo $value['image']['url']; ?>" alt="">
                                        <div class="content-slide-home">
                                            <div class="container text-center">
                                                <h4 class="sub-title"><?php echo $value['sub_title']; ?></h4>
                                                <h3 class="title"><?php echo $value['title']; ?></h3>
                                                <a href="<?php echo $value['link']; ?>" class="system-hotel-link">Hệ thống phòng nghỉ</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            ?>
                        </div>
                        <div class="swiper-pagination-slide-home"></div>
                    </div>
                </div>
            <?php }


            if($abous) { ?>
                <div class="about-us-home" style="background-image: url(<?php echo $bg_abous['url']; ?>);">
                    <div class="container">
                        <div class="content">
                            <div class="left-col">
                                <img src="<?php echo $abous[0]['thumbnail']['url']; ?>" alt="">
                            </div>
                            <div class="right-col">
                                <h4><?php echo $abous[0]['subtitle']; ?></h4>
                                <h5><?php echo $abous[0]['title']; ?></h5>
                                <div class="des"><?php echo $abous[0]['content']; ?></div>
                                <a href="<?php echo $abous[0]['link']; ?>" class="action-yellow-arr-right">Khám phá về chúng tôi</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }

            if($myposts_system_room) { ?>
                <div class="system-room">
                    <div class="custom-container">
                        <h3 class="title">Hệ thông phòng nghỉ</h3>
                        <div class="list-post-system">
                            <div class="row">
                                <?php
                                    foreach ($myposts_system_room as $item) { ?>
                                        <div class="col-sm-6 col-md-4 item">
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
                                                    Từ 500.000 VND/đêm
                                                </div>
                                                <div class="option-room">
                                                    <div class="op">
                                                        <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-m2.png" alt="">
                                                        <span>25 m²</span>
                                                    </div>
                                                    <div class="op">
                                                        <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-bed.png" alt="">
                                                        <span>25 m²</span>
                                                    </div>
                                                    <div class="op">
                                                        <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-profile.png" alt="">
                                                        <span>25 m²</span>
                                                    </div>
                                                </div>
                                                <div class="link-to-room">
                                                    <a href="<?php echo get_permalink($item->ID); ?>">Chi tiết phòng</a>
                                                    <a href="<?php echo get_permalink($item->ID); ?>" class="">Đặt phòng <img src="<?php bloginfo('template_url'); ?>/asset/icons/arrow-right-black.png" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }

            if($service) { ?>
                <div class="service" style="background-image: url(<?php echo $bg_service['url']; ?>);">
                    <div class="custom-container">
                        <h3 class="title">Các dịch vụ</h3>
                        <div class="list-service">
                            <?php
                                foreach ($service as $value){ ?>
                                    <div class="item">
                                        <div class="img-service">
                                            <img src="<?php echo $value['thumbnail']['url']; ?>" alt="">
                                        </div>
                                        <div class="right-service">
                                            <div class="content-service">
                                                <h4><?php echo $value['title'] ?></h4>
                                                <div class="description">
                                                    <?php echo $value['content'] ?>
                                                </div>
                                                <a href="<?php echo $value['link'] ?>" class="action-arrow-right-blue">Tìm hiểu thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            ?>
                        </div>
                    </div>
                </div>
            <?php }

            if($images_hotel){ ?>
                <div id="list-img-hotel">
                    <h3 class="title">Hình ảnh khách sạn</h3>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                                foreach ($images_hotel as $item) { ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo $item['thumbnail']['url']; ?>" alt="">
                                    </div>
                                <?php }
                            ?>
                        </div>
                        <div class="swiper-pagination-img-hotel"></div>
                    </div>
                </div>
            <?php }

            if($myposts_experience) { ?>
                <div class="posts-experience">
                    <div class="custom-container">
                        <div class="title">
                            <h3>Tin tức & Trải nghiệm</h3>
                            <a href="<?php echo $link_all_post; ?>" class="action-arrow-right-blue">Xem tất cả bài viết</a>
                        </div>
                        <div class="list-post">
                            <div class="row">
                                <?php
                                    foreach ($myposts_experience as $item) { ?>
                                        <div class="col-md-4 item">
                                            <div class="img">
                                                <a href="<?php echo get_permalink($item->ID); ?>">
                                                    <?php
                                                        echo get_the_post_thumbnail($item->ID,'blog-thumbnail');
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="content">
                                                <a href="<?php echo get_permalink($item->ID); ?>">
                                                    <h4 class="title-post"><?php echo get_the_title($item->ID); ?></h4>
                                                </a>
                                                <div class="description"><?php echo wp_trim_words(get_post_field('post_content', $item->ID), 20, '...'); ?></div>
                                                <a href="<?php echo get_permalink($item->ID); ?>" class="action-arrow-right-blue">Xem thêm</a>
                                            </div>
                                        </div>
                                    <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        ?>

    </div>
<?php get_footer();