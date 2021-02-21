<?php get_header(); ?>
<div class="single-blog">

    <div class="container">


        <div class="title">
            <h2>BRUNCH BLOG
            </h2>
        </div>
        <div class="all-posts">
            <a href="/blog/"><span class="left-triangle">&#9668</span> All Posts</a>
        </div>
        <div class="row">

            <div class="col-lg-9">

                <div class="single-blog-content">
                    <div class="title">
                        <h2> <?php the_title(); ?>
                        </h2>
                    </div>
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sidebar">
                    <?php
                    if (is_active_sidebar('page-sidebar')) {
                        dynamic_sidebar('page-sidebar');
                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="comment-form">

           <?php
          
            comment_form();
            ?> 
        </div>

    </div>
</div>



<?php get_footer(); ?>