<?php
global $post;

$banner_post = get_posts(array(
    'post_type' => 'banner',
    'posts_per_page' => 1,
));


if ($banner_post) {
    foreach ($banner_post as $post) :
        setup_postdata($post);



?>

<div class="banner-business-hour" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url('<?php echo get_field('background_image',1918) ?>')">
            <h2><?php echo get_field('title',1918) ?></h2>
        </div>

<?php
    endforeach;
    wp_reset_postdata();
}
?>