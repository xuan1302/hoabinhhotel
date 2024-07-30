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
								<?php the_excerpt(); ?>
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

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
