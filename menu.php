<?php
/*
Template name: Menu
*/
?>
<?php get_header(); ?>
<div class="page-container">
    <div class="menu">

        <?php
        global $post;

        $menu_post = get_posts(array(
            'post_type' => 'menu',
            'posts_per_page' => 100,
        ));
        if ($menu_post) {
            foreach ($menu_post as $post) :
                setup_postdata($post);

        ?>
                <div class="title">
                    <h2><?php echo the_title(); ?></h2>
                    <div>
                        <hr>
                    </div>

                </div>
                <div><?php echo the_content(); ?></div>
        <?php
            endforeach;
            wp_reset_postdata();
        }
        ?>

    </div>
</div>

<?php get_footer(); ?>