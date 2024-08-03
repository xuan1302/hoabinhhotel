<?php
//Template Name: Liên hệ
get_header();
$banner = get_field( "banner" );
$title = get_field( "title" );
$sub_title = get_field( "sub_title" );
$shortcode = get_field( "shortcode" );
$title1 = get_field( "title1" );
$des1 = get_field( "des1" );
$des1 = get_field( "des1" );
$title2 = get_field( "title2" );
$address = get_field( "address" );
$hotline = get_field( "hotline" );
$email = get_field( "email" );
$web = get_field( "web" );
$map = get_field( "map" );
?>

<div class="content-template-contact">
    <div class="banner" style="background-image: url(<?php echo $banner['url']; ?>);">
        <h2 class="title"><?php echo $title; ?></h2>
        <h3 class="sub-title"><?php echo $sub_title; ?></h3>
    </div>
    <div class="content-contact">
        <div class="custom-container">
            <div class="item left-ct">
                <h4 class="title1">
                    <?php echo $title1; ?>
                </h4>
                <div class="des1">
                    <?php echo $des1; ?>
                </div>
                <h4 class="title2">
                    <?php echo $title2; ?>
                </h4>
                <div class="list-tt">
                    <div class="item">
                        <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-map-bl.png" alt="">
                        <span><?php echo $address; ?></span>
                    </div>
                    <div class="item">
                        <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-phone-bl.png" alt="">
                        <span><?php echo $hotline; ?></span>
                    </div>
                    <div class="item">
                        <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-mail-bl.png" alt="">
                        <span><?php echo $email; ?></span>
                    </div>
                    <div class="item">
                        <img src="<?php bloginfo('template_url'); ?>/asset/icons/icon-wb-bl.png" alt="">
                        <span><?php echo $web; ?></span>
                    </div>
                </div>
            </div>
            <div class="item right-ct">
                <h3 class="title-fo">Gửi tin nhắn cho Hòa Bình Hotel</h3>
                <?php echo do_shortcode($shortcode); ?>
            </div>
        </div>
        <div class="map">
            <?php echo $map; ?>
        </div>
    </div>
</div>
<?php get_footer();
