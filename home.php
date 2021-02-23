<?php
/*
Template name: Home
*/
?>
<?php get_header(); ?>

<div class="home">
    <?php include('inc/home-hero.php') ?>
    <?php include('inc/home-banner1.php') ?>
    <div class="our-features">
        <div class="title">
            <h2><?php echo get_post_field('title_1', 1970);
                ?> </h2>
            <div>
                <hr>
            </div>

        </div>

        <div class="row">
            <?php include('inc/home-feature.php') ?>

        </div>
    </div>
    <?php include('inc/home-gallery.php'); ?>
    <?php include('inc/home-banner2.php'); ?>
    <?php include('inc/home-banner3.php'); ?>

    <div class="contact" id="contact">

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="googlemap">
                    <?php echo get_post_field("embed_googld_map", 533); ?>

                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="my-container">
                    <div class="title">
                        <h2><?php echo get_post_field('title_1', 1968); ?></h2>
                        <div>
                            <hr>
                        </div>
                    </div>

                    <div class="business-info  location">
                    </div>

                    <h4 class="title"><?php echo get_post_field('title_2', 1968); ?></h4>
                    <p><?php echo get_post_field("address", 533); ?></p>
                    <p class="phone"><?php echo get_post_field("phone", 533); ?></p>

                    <div class="business-info hour">
                        <h4 class="title"><?php echo get_post_field('title_3', 1968); ?></h4>
                        <div class="current-condition">

                            <?php echo do_shortcode('[mbhi location="Vancouver"]'); ?><span class="open">&#9660;</span>
                        </div>
                        <div class="business-hour-table hidden">
                            <span class="close">&#9650;</span>
                            <?php echo do_shortcode('[mbhi_hours location="Vancouver"]'); ?>
                        </div>
                    </div>
                    <div class="comment">
                        <p><?php echo get_post_field('description', 1982); ?></p>
                        <a data-toggle="modal" data-target="#messageModal"><?php echo get_post_field('button_title', 1982); ?></a>
                    </div>
                    <?php include('inc/message-modal.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('inc/home-banner4.php') ?>
</div>


<?php get_footer(); ?>