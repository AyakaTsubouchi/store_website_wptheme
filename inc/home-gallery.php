<div class="image-gallery">
    <div class="flex-box">


        <?php
        global $post;

        $gallery_post = get_posts(array(
            'post_type' => 'gallery',
            'posts_per_page' => 100,
        ));
        $count = wp_count_posts('gallery')->publish;


        if ($gallery_post) {
            foreach ($gallery_post as $post) :
                setup_postdata($post);

                $obj = array(
                    'content' => $post->post_content,
                    'title' => esc_html(get_the_title()),
                    'img' => get_the_post_thumbnail_url(),
                    'discription' => get_the_title(),
                    'post_id' => esc_html(get_the_ID()),
                );

        ?>

                <button href="#" class="flex-box get_button_more_info square img-wrapper" data-toggle="modal" data-target="#exampleModal" value='<?= json_encode($obj) ?>'>
                    <div class="image" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>')">

                    </div>

                </button>


        <?php
            endforeach;
            wp_reset_postdata();
        }
        ?>
        <?php include('modal.php'); ?>
    </div>
    
    
    <?php if ($count == 0) : ?>
        <p class="woocommerce-noreviews"><?php esc_html_e('There are no reviews yet.', 'woocommerce'); ?></p>
    <?php elseif ($count > 3) : ?>
        <div class="read-more">+ Show More</div>

    <?php endif; ?>
    
    
</div>