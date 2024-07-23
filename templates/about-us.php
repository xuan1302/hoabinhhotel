<?php
//Template Name: About us
get_header();
$title_1 = get_field( "title_1" );
$main_title_1 = get_field("main_title_1");
$des_1 = get_field("des_1");
$image_1 = get_field("image_1");
$title_2 = get_field("title_2");
$main_title_2 = get_field("main_title_2");
$des_2 = get_field( "des_2" );
$image_2 = get_field("image_2");
$title_3 = get_field("title_3");
$main_title_3 = get_field("main_title_3");
$des_3 = get_field( "des_3" );
$list_image = get_field("list_image");
?>
<div class="template-about-us">
    <div class="content-about-us">
        <section id='' class="section-contain section-contain-1">
            <div class="container-fluid">
                <div class="row first-section">
                    <div class="section-left col-xl-5 col-12">
                        <div class="inner">
                            <h2 class="title"><?php echo $title_1 ?></h2>
                            <h2 class="main-title"><?php echo $main_title_1 ?></h2>
                            <p class="description"><?php echo $des_1 ?></p>
                        </div>
                    </div>
                    <div class="section-right col-xl-7 col-12">
                        <img  class="image" src="<?php echo $image_1['url']?>" />
                    </div>
                </div>
            </div>
        </section>
        <section id='' class="section-contain section-contain-2">
            <div class="container-fluid">
                <div class="row first-section">
                    <div class="section-left text-right col-xl-7 col-12">
                        <img  class="image" src="<?php echo $image_2['url']?>" />
                    </div>
                    <div class="section-right col-xl-5 col-12">
                        <div class="inner">
                            <h2 class="title"><?php echo $title_2 ?></h2>
                            <h2 class="main-title"><?php echo $main_title_2 ?></h2>
                            <p class="description"><?php echo $des_2 ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-contain-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="inner">
                            <h2 class="title"><?php echo $title_3 ?></h2>
                            <h2 class="main-title"><?php echo $main_title_3 ?></h2>
                            <p class="description"><?php echo $des_3 ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-slide">
            <div class="slide-image-contain">
                <div class="swiper slide-list-image">
                    <div class="swiper-wrapper">
                        <?php
                            if($list_image){
                                foreach($list_image as $item){
                                    ?>
                                    <div class="swiper-slide">
                                        <img class="image" src="<?php echo $item['image']['url']?>" />
                                    </div>
                                    <?php
                                }
                            }
                         ?>

                    </div>
                </div>
                <div class="image-pagination"></div>
            </div>
        </section>
    </div>
</div>
<?php get_footer();
