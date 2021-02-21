<?php get_header(); ?>
<?php get_the_title(); ?>
<div class="page-container">
<div class="single-page container">
    <?php
    if (have_posts()) :

        while (have_posts()) : the_post();
        
            ?>
            <div class="title">
                <h2><?php echo the_title(); ?></h2>
                <div>
                    <hr>
                </div>
                
            </div>
            <div><?php  echo the_content(); ?></div>
            
        <?php endwhile;

    else :
        _e('Sorry, no posts matched your criteria.', 'textdomain');

    endif;

    ?>
</div>
</div>

<?php get_footer(); ?>