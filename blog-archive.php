<?php
/*
Template name: Blog Archive
*/
?>
<?php get_header(); ?>
<?php
if (have_posts()) :

    while (have_posts()) : the_post();

?>

        <div class="page-container">

            <div class="blog-archive" style="background: linear-gradient( rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2) ), url('<?php echo
                                                                                                                            get_the_post_thumbnail_url(); ?>'); ">

                <div class="blog-post">
                    <div class="title">
                        <h2><?php the_title(); ?>
                        </h2>
                    </div>

                    <div class="card-deck owl-carousel owl-theme">

                        <?php
                        global $post;


                        $blog_posts = get_posts(array(
                            'post_type' => 'blogs',
                            'posts_per_page' => 3

                        ));

                        if ($blog_posts) {
                            foreach ($blog_posts as $post) :
                                setup_postdata($post);

                        ?>
                                <div class="card">

                                    <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Card image cap">

                                    <div class="card-body">
                                        <div class="post-content-wrapper">
                                            <header>

                                                <div class="post-date">
                                                    <?php the_date(); ?>
                                                </div>
                                                <h3>
                                                    <a href="<?php the_permalink(); ?>" class="entry-title"> <?php the_title(); ?></a>
                                                </h3>

                                            </header>
                                            <div class="content">
                                                <p>
                                                    <a href="<?php the_permalink(); ?>" class="entry-title">Read More</a>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        <?php
                            endforeach;
                            wp_reset_postdata();
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
<?php
    endwhile;

else :
    _e('Sorry, no posts matched your criteria.', 'textdomain');

endif;

?>
<?php get_footer(); ?>