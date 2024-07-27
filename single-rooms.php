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
?>

    <main id="primary" class="site-main single-room-page" style="background-image: url(<?php echo $banner['url']; ?>)">
        <div class="content-single-room" >
            <div class="row">
                <div class="single-room-content col-12">
                    <div class="banner">
                        <div class="category-name">
                            <?php
                            the_category(', ');
                            ?>
                        </div>
                        <div class="single-title">
                            <h1><?php the_title()?></h1>
                        </div>
                    </div>
                    <div class="inner-content">
                        <?php
                        the_content();
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </main>


<?php
get_footer();
