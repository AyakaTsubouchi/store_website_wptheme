<?php get_header(); ?>
<div class="single-blog">


    <div class="container">

        <div class="single-blog-content">
            <div class="title">
                <h2> <?php the_title(); ?>
                </h2>
            </div>
            <?php the_content(); ?>
        </div>

    </div>
</div>



<?php get_footer(); ?>