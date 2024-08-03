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
$range_date = isset($_GET['range_date']) ? sanitize_text_field( $_GET['range_date'] ) : '';
$num_adult = isset($_GET['adults']) ? sanitize_text_field( $_GET['adults'] ) : '';
$num_child = isset($_GET['children']) ? sanitize_text_field( $_GET['children'] ) : '';
?>

    <div class="content-template-booking">
        <div class="banner" style="background-image: url(<?php echo $banner['url']; ?>);">
            <div class="custom-container">
                <h2 class="title"><?php echo $title; ?></h2>
                <h3 class="sub-title"><?php echo $sub_title; ?></h3>
            </div>
        </div>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <div class="booking-f">
                <div class="">
                    <div class="container">
                        <div class="content-form-booking">
                            <div class="form-booking">
                                <div class="date-range">
                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-calandar.svg" alt="">
                                    <input type="text" class="dateRange" id="dateRange" name="range_date">
                                    <div class="count-date">(<span class="totalDate">1</span>đêm )</div>
                                    <div class="icon-date">
                                        <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-arrow-bt.svg" alt="">
                                    </div>
                                </div>
                                <div class="select-person">
                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-user.svg" alt="">
                                    <span> <span id="num-adult">1</span> người lớn - <span id="num-child">0</span> trẻ em </span>
                                    <div class="icon">
                                        <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-arrow-bt.svg" alt="">
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
                                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/-.svg" alt="">
                                                        </button>
                                                        <input id="numberAdults" onchange="" name="adults" type="number" class="numberInput numberInputAdult" value="1" min="0" max="100">
                                                        <button class="increase" type="button">
                                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/+.svg" alt="">
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
                                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/-.svg" alt="">
                                                        </button>
                                                        <input name='children' id="numberChildren" type="number" class="numberInput" value="0" min="0" max="100">
                                                        <button class="increase" type="button">
                                                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/+.svg" alt="">
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
                                <button type="button" class="btn-submit">
                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-search.svg" alt="">
                                </button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-room-booking">
                <div class="custom-container">
                    <div class="system-room">
                        <div class="row">
                            <div class="col-8 item-bk">
                                <?php
                                if($myposts_system_room) { ?>
                                    <div class="list-post-system">
                                        <div class="row">
                                            <?php
                                            foreach ($myposts_system_room as $item) {
                                                $price = number_format(get_post_meta( $item->ID, 'price', true), 0,'','.');
                                                ?>
                                                <div class="item item-room-booking">
                                                    <div class="img">
                                                        <div class="thumbnail">
                                                                <?php
                                                                echo get_the_post_thumbnail($item->ID,'blog-thumbnail');
                                                                ?>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="ct-top">
                                                            <h4 class="title-post"><?php echo get_the_title($item->ID); ?></h4>
                                                            <div class="price">
                                                                Từ <?php echo $price; ?> VND/đêm
                                                            </div>
                                                            <div class="option-room">
                                                                <div class="op">
                                                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-m2.svg" alt="">
                                                                    <span><?php echo get_post_meta( $item->ID, 'area', true); ?> m²</span>
                                                                </div>
                                                                <div class="op">
                                                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-bed.svg" alt="">
                                                                    <span><?php echo get_post_meta( $item->ID, 'bed', true); ?> giường</span>
                                                                </div>
                                                                <div class="op">
                                                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-profile.svg" alt="">
                                                                    <span><?php echo get_post_meta( $item->ID, 'person', true); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="description"><?php echo wp_trim_words(get_post_field('post_content', $item->ID), 20, '...'); ?></div>
                                                        </div>
                                                        <div class="ct-bottom">
                                                            <div class="input-group">
                                                                <button class="decrease" type="button">
                                                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/-.svg" alt="">
                                                                </button>
                                                                <input disabled id="numberAdults" name="count_room_<?php echo $item->ID; ?>" type="number" class="numberInput numberInputReset" value="0" min="0" max="<?php echo get_post_meta( $item->ID, 'limited_booking_room', true); ?>">
                                                                <input type="hidden" class="id_post" name="id_post" value="<?php echo $item->ID; ?>">
                                                                <input type="hidden" class="deposit" name="deposit" value="<?php echo get_post_meta( $item->ID, 'deposit', true); ?>">
                                                                <input type="hidden" class="price_post" name="price_room" value="<?php echo get_post_meta( $item->ID, 'price', true); ?>">
                                                                <button class="increase" type="button">
                                                                    <img src="<?php bloginfo('template_url'); ?>/asset/icons/+.svg" alt="">
                                                                </button>
                                                            </div>
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
                            <div class="col-4 item-bk item-sticky">
                                <div class="book-now ">
                                    <div class="total-room">
                                        <span id="totalRoom">0</span> phòng
                                    </div>
                                    <div class="total-price">
                                        <span id="total_money_room">0</span> VND
                                        <p>(Giá tạm tính *)</p>
                                        <p>cho <span class="totalDate">1</span> đêm</p>
                                    </div>
                                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                                        <input type="hidden" name="action" value="handle_form_submit_checkout">
                                        <input type="hidden" id="sing-booking-range-date" name="range_date" value="<?php echo $range_date; ?>">
                                        <input type="hidden" id="sing-booking-adults" name="adults" value="<?php echo $num_adult; ?>">
                                        <input type="hidden" id="sing-booking-children" name="children" value="<?php echo $num_child; ?>">
                                        <input type="hidden" id="posts" name="posts" value="[]">
                                        <input type="hidden" id="count_room" name="count_room" value="[]">
                                        <input class="booking-n"  type="submit" value="Đặt ngay" disabled>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php get_footer();
