<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Anonymous
 */

get_header();
$term = get_queried_object();
$banner = get_field( "banner", $term);
$des = get_field( "description", $term );
$args_system_room = array(
    'post_type' => 'rooms',
    'posts_per_page' => 5,
    'post_status' => 'publish',
);
$myposts_system_room = get_posts($args_system_room);
?>

	<main id="primary" class="site-main ">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
                <div class="single-banner" style="background-image: url(<?php echo $banner['url']; ?>)">
                    <div class="banner-contain">
                        <div class="category-name">
                            <?php
                            the_category(', ');
                            ?>
                        </div>
                        <div class="single-des">
                            <p><?php echo $des; ?></p>
                        </div>
                    </div>
                </div>
			</header><!-- .page-header -->
			<div class="archive-contain container-fluid">
				<div class="content">
					<div class="row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				$url_thumbnail = get_the_post_thumbnail_url();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				?>
				<article class="col-lg-4 col-md-6 col-12 item swiper-slide " id="post-<?php esc_attr(the_ID()); ?>" <?php post_class(); ?>>
					<div class="entry-image">
						<?php if ($url_thumbnail) : ?>
							<div class="post-thumbnail">
								<a href="<?php the_permalink() ?>" class="cct-image-wrapper">
									<img src="<?php echo $url_thumbnail ?>" alt="<?php the_title(); ?>"/>
								</a>
							</div>
						<?php endif; ?>
						<div class="inner">
							<div class="entry-title">
								<h1><?php echo the_title(); ?></h1>
							</div>
							<div class="entry-summary">
								<?php echo mb_strimwidth(get_the_excerpt(), 0, 85, '...'); ?>
							</div>
							<div class="readmore-block">
								<a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>" class="entry-readmore">
									<?php echo esc_html__('Xem thêm', 'cct'); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M13.3333 5L20 12M20 12L13.3333 19M20 12L4 12" stroke="#002D4A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</a>

							</div>
						</div>
					</div>
                </article>
				<?php
			endwhile;
			?>
					</div>
					<div class="col-12">
						<div class="pagination-custom">
							<?php echo elementor_pagination(); ?>
						</div>
            		</div>
				</div>
			</div>
            <?php
            if($myposts_system_room) { ?>
                <div class="section-system-room">
                    <div class="system-room-container">
                        <h3 class="title">Hệ thống phòng nghỉ</h3>
                        <div class="list-system-rooms swiper">
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
                                                <a href="<?php echo home_url('/booking/'); ?>" class="booking-link">ĐẶT PHÒNG NÀY <img src="<?php bloginfo('template_url'); ?>/asset/icons/arrow-right-black.png" alt=""></a>
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

			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
