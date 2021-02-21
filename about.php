<?php
/*
Template name: About us
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
<?php
if (have_posts()) :

    while (have_posts()) : the_post();
        the_content();
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