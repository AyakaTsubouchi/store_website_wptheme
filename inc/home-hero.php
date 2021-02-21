<?php
global $post;

$hero_post = get_posts(array(
    'post_type' => 'hero',
    'posts_per_page' => 1,
));


if ($hero_post) {
    foreach ($hero_post as $post) :
        setup_postdata($post);



?>

        <div class="parallax" style="background-image:url('<?php echo get_field('background_image',1912) ?>');">

        </div>
        <div class="welcome">
            <div class="greeting">
                <h1><?php echo get_field('title',1912) ?></h1>
                <p><?php echo get_field('message',1912) ?></p>
                <a href="<?php echo get_field('button_link',1912) ?>"><?php echo get_field('button_title',1912) ?></a>

                <p class="phone"><?php echo get_field("contact_info", 1912); ?>
            </div>
            </p>
        </div>
        </div>


<?php
    endforeach;
    wp_reset_postdata();
}
?>