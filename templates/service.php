<?php
//Template Name: Service
$title_1 = get_field( "title_1" );
$main_title_1 = get_field("main_title_1");
$des_1 = get_field("des_1");
$btn_url = get_field("btn");
$image_1 = get_field("image_1");
$list_image_1 = get_field("list_image_1");
$title_2 = get_field( "title_2" );
$main_title_2 = get_field("main_title_2");
$des_2 = get_field("des_2");
$image_2 = get_field("image_2");
$list_image_2 = get_field("list_image_2");
$title_3 = get_field( "title_3" );
$main_title_3 = get_field("main_title_3");
$des_3 = get_field("des_3");
$image_3 = get_field("image_3");
$list_image_3 = get_field("list_image_3");
get_header();
?>
<div class="template-service">
    <div class="content-service">
        <section class="organizing-wedding">
            <div class="container-fluid">
                <div class="row top-contain">
                    <div class="section-left col-xl-5 col-12">
                        <div class="inner">
                            <h2 class="title"><?php echo $title_1 ?></h2>
                            <h2 class="main-title"><?php echo $main_title_1 ?></h2>
                            <p class="description"><?php echo $des_1 ?></p>
                            <a class="btn-contact" href="<?php echo $btn_url ?>">Liên hệ đặt dịch vụ 
                                <img src="<?php bloginfo('template_url'); ?>/asset/images/arrow-right.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="section-right col-xl-7 col-12">
                        <img  class="image" src="<?php echo $image_1['url']?>" />
                    </div>
                </div>
                <div class="row">
                    <?php
                        if($list_image_1){
                            foreach($list_image_1 as $item){
                                ?>
                                <div class="col-xl-4 col-12">
                                    <div class="item">
                                        <img src="<?php echo $item['image']['url']?>" />
                                    </div>
                                </div>
                                <?php
                            }
                        }
                     ?>
                </div>
            </div>
        </section>
        <section class="conference-organization">
            <div class="container-fluid">
                <div class="row top-contain">
                    <div class="section-left col-xl-7 col-12">
                        <img  class="image" src="<?php echo $image_2['url']?>" />
                    </div>
                    <div class="section-right col-xl-5 col-12">
                        <div class="inner">
                            <h2 class="title"><?php echo $title_2 ?></h2>
                            <h2 class="main-title"><?php echo $main_title_2 ?></h2>
                            <p class="description"><?php echo $des_2 ?></p>
                            <a class="btn-contact" href="<?php echo $btn_url ?>">Liên hệ đặt dịch vụ
                                <img src="<?php bloginfo('template_url'); ?>/asset/images/arrow-right.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                        if($list_image_2){
                            foreach($list_image_2 as $item){
                                ?>
                                <div class="col-xl-4 col-12">
                                    <div class="item">
                                        <img src="<?php echo $item['image']['url']?>" />
                                    </div>
                                </div>
                                <?php
                            }
                        }
                     ?>   
                </div>
            </div>
        </section>
        <section class="entertainment-service">
            <div class="container-fluid">
                <div class="row top-contain">
                    <div class="section-left col-xl-5 col-12">
                        <div class="inner">
                            <h2 class="title"><?php echo $title_1 ?></h2>
                            <h2 class="main-title"><?php echo $main_title_1 ?></h2>
                            <p class="description"><?php echo $des_1 ?></p>
                            <a class="btn-contact" href="<?php echo $btn_url ?>">Liên hệ đặt dịch vụ
                                <img src="<?php bloginfo('template_url'); ?>/asset/images/arrow-right.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="section-right col-xl-7 col-12">
                        <img  class="image" src="<?php echo $image_1['url']?>" />
                    </div>
                </div>
                <div class="row">
                    <?php
                        if($list_image_1){
                            foreach($list_image_1 as $item){
                                ?>
                                <div class="col-xl-4 col-12">
                                    <div class="item">
                                        <img src="<?php echo $item['image']['url']?>" />
                                    </div>
                                </div>
                                <?php
                            }
                        }
                     ?>
                </div>
            </div>
        </section>
    </div>
</div>
<?php get_footer();