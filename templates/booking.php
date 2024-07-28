<?php
//Template Name: Booking
get_header();
$banner = get_field( "banner" );
$title = get_field( "title" );
$sub_title = get_field( "sub_title" );
$args_system_room = array(
    'post_type' => 'rooms',
    'post_status' => 'publish',
);
$myposts_system_room = get_posts($args_system_room);
?>

    <div class="content-template-booking">
        <div class="banner" style="background-image: url(<?php echo $banner['url']; ?>);">
            <div class="custom-container">
                <h2 class="title"><?php echo $title; ?></h2>
                <h3 class="sub-title"><?php echo $sub_title; ?></h3>
            </div>
        </div>
        <div class="content-room-booking">
            <div class="custom-container">
                <div class="system-room">
                    <div class="row">
                        <div class="col-8">
                            <?php
                            if($myposts_system_room) { ?>
                                <div class="list-post-system">
                                    <div class="row">
                                        <?php
                                        foreach ($myposts_system_room as $item) { ?>
                                            <div class="item item-room-booking">
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
                                                    <div class="ct-top">
                                                        <h4 class="title-post"><?php echo get_the_title($item->ID); ?></h4>
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
                                                        <div class="description"><?php echo wp_trim_words(get_post_field('post_content', $item->ID), 20, '...'); ?></div>
                                                    </div>
                                                    <div class="ct-bottom">
                                                        text
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <div class="col-4">
                            <div class="book-now">
                                <div class="total-room">
                                    <span>3</span> phòng
                                </div>
                                <div class="total-price">
                                    <span>12.000.000</span> VND
                                    <p>(Giá tạm tính *)</p>
                                    <p>cho 8 đêm</p>
                                </div>
<!--                                <a href="" class="booking-n">Đặt ngay</a>-->
                                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                                    <input type="hidden" name="action" value="handle_form_submit_checkout">
                                    <input class="booking-n"  type="submit" value="Đặt ngay">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        <h1>Thank You!</h1>-->
<!--        <p>-->
<!--            --><?php
//            if (isset($_GET['range_date'])) {
//                echo 'Thank you, ' . esc_html($_GET['range_date']) . ', for your submission.';
//            } else {
//                echo 'Thank you for your submission.';
//            }
//            ?>
<!--        </p>-->
    </div>
<?php get_footer();
