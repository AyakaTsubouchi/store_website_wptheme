<?php
global $post;

$feature_post = get_posts(array(
    'post_type' => 'feature',
    'posts_per_page' => 3,
));


if ($feature_post) {
    foreach ($feature_post as $post) :
        setup_postdata($post);



?>

        <div class="col align-self-stretch">
            <div class="title">
                
                <h5><?php echo the_title(); ?></h5>
            </div>
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
            <div class="content"><?php echo the_content(); ?></div>

            <a href="<?php echo get_field('button_link') ?>"><?php echo get_field('button_title') ?></a>

        </div>

<?php
    endforeach;
    wp_reset_postdata();
}
?>