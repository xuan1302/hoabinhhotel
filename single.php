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
$description = get_field("des");
?>

    <main id="primary" class="site-main single-page container-fluid">
        <div class="content-single-page">
            <div class="row">
                <div class="single-content col-12">
                    <div class="banner">
                        <div class="category-name"
                             data-aos="fade-down"
                             data-aos-duration="1000"
                             data-aos-easing="ease-in-sine"  data-aos-delay="50"
                        >
                            <?php
                            the_category(', ');
                            ?>
                        </div>
                        <div class="single-title"
                             data-aos="fade-down"
                             data-aos-duration="1000"
                             data-aos-easing="ease-in-sine"  data-aos-delay="50"
                        >
                           <h1><?php the_title()?></h1>
                        </div>
                        <div class="date"
                             data-aos="fade-down"
                             data-aos-duration="1000"
                             data-aos-easing="ease-in-sine"  data-aos-delay="50"
                        >
                            <p><?php echo get_the_date( 'd-m-Y' ); ?>
                            <span>- by Hoa Binh Hotel</span></p>
                        </div>
                    </div>
                    <div class="description-single"
                         data-aos="fade-down"
                         data-aos-duration="1000"
                         data-aos-easing="ease-in-sine"  data-aos-delay="50"
                    >
                        <p><?php echo $description ?></p>
                    </div>
                    <div class="inner-content"
                         data-aos="fade-down"
                         data-aos-duration="1000"
                         data-aos-easing="ease-in-sine"  data-aos-delay="50"
                    >
                        <?php
                        the_content();
                        ?>
                    </div>



                </div>

            </div>
        </div>


    </main>
    <!-- #main -->
    <div class="related-post"
         data-aos="fade-down"
         data-aos-duration="1000"
         data-aos-easing="ease-in-sine"  data-aos-delay="50"
    >
        <?php  related_posts() ?>
    </div>

<?php
// get_sidebar();
get_footer();
