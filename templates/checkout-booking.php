<?php
//Template Name: Checkout Booking
get_header();
$fromDate = sanitize_text_field( $_GET['fromDate'] );
$toDate = sanitize_text_field( $_GET['toDate'] );
$num_adult = sanitize_text_field( $_GET['adult'] );
$num_child = sanitize_text_field( $_GET['child'] );
$idsPost = json_decode(wp_unslash($_GET['idsPost']), true);
$countRoom = json_decode(wp_unslash((wp_unslash($_GET['countRoom']))), true);
$shortcode = get_field( "shortcode" );
$args_system_room = array(
    'post_type' => 'rooms',
    'post_status' => 'publish',
    'post__in'   => $idsPost,
);
$myposts_system_room = get_posts($args_system_room);

$qr_code = get_field('qr_code', 'option');
$bank_name = get_field('bank_name', 'option');
$acc_bank = get_field('acc_bank', 'option');
$bank_fullname = get_field('bank_fullname', 'option');

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
                        <?php echo do_shortcode($shortcode); ?>
                    </div>
                    <div class="info-prepayment">
                        <h4 class="title">Thông tin thanh toán Phí đặt trước</h4>
                        <div class="acc-bank">
                            <div class="qr-code">
                                <img src="<?php echo $qr_code['url']; ?>" alt="">
                                <div class="info-bank">
                                    <div class="content-info-bank">
                                        <div class="item">
                                            <label>Tên ngân hàng</label>
                                            <b><?php echo $bank_name; ?></b>
                                        </div>
                                        <div class="item">
                                            <label>Số tài khoản</label>
                                            <b><?php echo $acc_bank; ?></b>
                                        </div>
                                        <div class="item">
                                            <label>Tên chủ tài khoản</label>
                                            <b><?php echo $bank_fullname; ?></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="note">
                            <h5>LƯU Ý: </h5>
                            <ul>
                                <li>Nội dung chuyển khoản ghi số điện thoại đã điền ở thông tin liên hệ.</li>
                                <li>Chuyển chính xác số tiền Phí đặt trước được ghi ở cột bên phải.</li>
                                <li>Phí đặt trước sẽ được hoàn lại khi trả phòng.</li>
                                <li>Tiền Phí đặt trước sẽ không được hoàn lại khi khách hủy đặt phòng. </li>
                            </ul>
                        </div>
                        <div class="booking-success">
                            <div class="icon">
                                <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-succes.png" alt="">
                            </div>
                            <div class="text">
                                Booking của bạn sẽ được xác nhận sau khi bạn thanh toán Phí đặt trước. Chúng tôi sẽ sớm liên hệ với bạn qua số điện thoại.
                            </div>
                        </div>
                        <div class="hotline-booking-success">
                            Gọi Hotline <b>0238 3746 888</b>  để được hỗ trợ 24/7
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();
