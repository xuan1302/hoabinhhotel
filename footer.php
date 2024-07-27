<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Anonymous
 */
$title_footer_top = get_field('title_footer_top', 'option');
$link_booking = get_field('link_booking', 'option');
$hotline_footer = get_field('hotline_footer', 'option');
$backgound_footer_top = get_field('backgound_footer_top', 'option');
$backgound_footer_content = get_field('backgound_footer_content', 'option');
$logo_footer = get_field('logo_footer', 'option');
$title_footer_bottom = get_field('title_footer_bottom', 'option');
$address_footer = get_field('address_footer', 'option');
$email_footer = get_field('email_footer', 'option');
$website_fotoer = get_field('website_fotoer', 'option');
$coppy_right = get_field('coppy_right', 'option');
$image_right_footer = get_field('image_right_footer', 'option');
?>
	<footer id="colophon" class="site-footer">
		<div class="footer-top" style="background-image: url(<?php echo $backgound_footer_top['url']; ?>);">
            <div class="custom-container">
                <div class="banner-footer-top" style="background-image: url(<?php echo $backgound_footer_content['url']; ?>);">
                    <div class="content-footer-top row">
                        <div class="left-ft-top col-md-8">
                            <?php echo $title_footer_top; ?>
                        </div>
                        <div class="right-ft-top col-md-4">
                            <a href="<?php echo $link_booking; ?>" class="action-booking-now">Đặt phòng ngay</a>
                            <div>hoặc gọi HOTLINE <?php echo $hotline_footer; ?></div>
                            <div>Chúng tôi hân hạnh phục vụ quý khách 24/7</div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
        <div class="footer-bottom">
            <div class="custom-container">
                <div class="left-footer-bottom">
                    <div class="logo-footer">
                        <img src="<?php echo $logo_footer['url']; ?>" alt="">
                    </div>
                    <h4 class="title-footer"><?php echo $title_footer_bottom; ?></h4>
                    <div class="list-item-inf">
                        <div class="item">
                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon_map.png">
                            <span><?php echo $address_footer; ?></span>
                        </div>
                        <div class="item">
                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/ri_phone-fill.png">
                            <span>HOTLINE <?php echo $hotline_footer; ?></span>
                        </div>
                        <div class="item">
                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/tabler_mail.png">
                            <span><?php echo $email_footer; ?></span>
                        </div>
                        <div class="item">
                            <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-web.png">
                            <span><?php echo $website_fotoer; ?></span>
                        </div>
                    </div>
                    <div class="copy-right"><?php echo $coppy_right; ?></div>
                </div>
                <div class="right-footer-bottom">
                    <img src="<?php echo $image_right_footer['url']; ?>" alt="">
                </div>
            </div>
        </div>
	</footer>
</div>
<button id="back-to-top" title="Back to Top"></button>
<?php wp_footer(); ?>

</body>
</html>
