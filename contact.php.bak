<?php
/*
Template name: Contact
*/
?>
<?php

/**

 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

// if (!defined('ABSPATH')) {
//     exit; // Exit if accessed directly

// }
defined('ABSPATH') || exit;

get_header();
// get_header( 'shop' );
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');
?>
<?php get_header(); ?>
<!-- <?php
if (have_posts()) :

	while (have_posts()) : the_post();
?> -->

		<section class="contact-section">
			<?php
			global $post;

			$businessInfo_post = get_posts(array(
				'post_type' => 'businessInfo',
				'posts_per_page' => 1,
			));

			if ($businessInfo_post) {
				foreach ($businessInfo_post as $post) :
					setup_postdata($post);

			?>
					<div class="container my-container">
						<h5>Our Location</h5>
						<div>
							<div class="google-map">
								<?php echo get_field("embed_googld_map", 533); ?>

							</div>
						</div>
						<div class="row">


							<div class="col-md-5 text-container">
								<h5 class="title">Contact Us</h5>
								<address class="contact-card">

									<div class="address">
										<i class="fa fa-home"></i><?php echo get_field("address", 533); ?>
									</div>



									<div class="phone">
										<i class="fa fa-phone"></i><?php echo get_field("phone", 533); ?>
									</div>
									<div class="email">
										<i class="fa fa-envelope-o"></i><?php echo get_field("email", 533); ?>
									</div>

								</address>

							</div>
							<div class="col-md-7 text-container">
								<h5 class="title">Contact Form</h5>
								<?php echo do_shortcode('[contact-form-7 id="645" title="Untitled"]') ?>
							</div>

						</div>
					</div>
					</div>
			<?php
				endforeach;
				wp_reset_postdata();
			}
			?>
		</section>

		<a href="#">
			<div class="back-to-top">
				<i class="fa fa-angle-up"></i>
			</div>
		</a>
<?php
	endwhile;

else :
	_e('Sorry, no posts matched your criteria.', 'textdomain');

endif;

?>
<a href="#">
	<div class="back-to-top">
		<i>^</i>
		<p>TOP</p>
	</div>
</a>

<?php get_footer(); ?>