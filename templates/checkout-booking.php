<?php
//Template Name: Checkout Booking
get_header();
$fromDate = sanitize_text_field( $_GET['fromDate'] );
$toDate = sanitize_text_field( $_GET['toDate'] );
$num_adult = sanitize_text_field( $_GET['adult'] );
$num_child = sanitize_text_field( $_GET['child'] );
$idsPost = json_decode(wp_unslash($_GET['idsPost']), true);
$countRoom = json_decode(wp_unslash((wp_unslash($_GET['countRoom']))), true);
$args_system_room = array(
    'post_type' => 'rooms',
    'post_status' => 'publish',
    'post__in'   => $idsPost,
);
$myposts_system_room = get_posts($args_system_room);

?>

    <div class="content-template-checkout-booking">
        <div class="custom-container">
            <a href="" class="back-checkout">
                <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-back.png" alt="">
                Chỉnh sửa thông tin liên hệ</a>
            <div class="content-checkout-booking">
                <div class="left-content">
                    <h4 class="title">Thông tin đặt phòng</h4>
                    <div class="list-room-booking">
                        <?php
                            foreach ($myposts_system_room as $item) {
                                $price = number_format(get_post_meta( $item->ID, 'price', true  ), 0,'','.');
                                ?>
                                <div class="item">
                                    <div class="thumbnail">
                                        <?php echo get_the_post_thumbnail($item->ID,'blog-thumbnail'); ?>
                                    </div>
                                    <div class="content-room">
                                        <h5><?php echo get_the_title($item->ID); ?></h5>
                                        <div class="price">
                                            <span>Giá</span>
                                            <b><?php echo $price; ?> VND</b>
                                        </div>
                                        <div class="count">
                                            <span>Số lượng</span>
                                            <b><?php echo handleGetNumberRoom($countRoom, $item->ID)?></b>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        ?>
                    </div>
                    <div class="info-booking">
                        <div class="item">
                            <label>Ngày đến</label>
                            <b><?php echo $fromDate; ?></b>
                        </div>
                        <div class="item">
                            <label>Ngày về</label>
                            <b><?php echo $toDate; ?></b>
                        </div>
                        <div class="item">
                            <label>Đêm</label>
                            <b><?php echo diffDate($fromDate,$toDate); ?></b>
                        </div>
                        <div class="item">
                            <label>Số lượng phòng</label>
                            <b><?php echo count($countRoom); ?></b>
                        </div>
                        <div class="item">
                            <label>Người lớn</label>
                            <b><?php echo $num_adult; ?></b>
                        </div>
                        <div class="item">
                            <label>Trẻ em</label>
                            <b><?php echo $num_child; ?></b>
                        </div>
                    </div>
                    <div class="info-bottom">
                        <div class="item">
                            <div class="item-left">
                                <p>Giá tạm tính*</p>
                                <p>*Thanh toán khi trả phòng</p>
                            </div>
                            <div class="total-mn">
                                <?php echo getTotalMoney($countRoom, diffDate($fromDate,$toDate) );?> VND
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-left">
                                <p>Phí đặt trước* **</p>
                                <p>**Phí đặt trước sẽ được hoàn lại khi trả phòng</p>
                            </div>
                            <div class="total-mn">
                                400.000 VND
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-content">
                    <div class="form-content-right">
                        <h4 class="title">Điền thông tin liên hệ</h4>
                        <?php echo do_shortcode('[contact-form-7 id="12af700" title="Form checkout booking"]'); ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();
