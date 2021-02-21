<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php

		if ('blogs' == get_post_type()) {
			include('custom-single-post/single-blog.php');
		}

		elseif ('customer-service' == get_post_type()) {
			include('single-customer-service.php');
		}
		elseif ('page' == get_post_type()) {
			include('content-page.php');
		}

		elseif ('posts' == get_post_type()) {
			include('custom-single-post/single-blog.php');
		}
		

		else{

			include('content-none.php');

		}


		?>

	
</article><!-- #post-<?php the_ID(); ?> -->
