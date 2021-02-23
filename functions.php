<?php



function load_stylesheets()
{
  wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), false, 'all');
  wp_enqueue_style('bootstrap');
  


  wp_register_style('fontawsome', get_template_directory_uri() . '/css/fontawesome.min.css', array(), false, 'all');
  wp_enqueue_style('fontawsome');
  
  wp_register_style('owlcarousel', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), false, 'all');
  wp_enqueue_style('owlcarousel');

  wp_register_style('owltheme', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), false, 'all');
  wp_enqueue_style('owltheme');
  
  wp_register_style('custom', get_template_directory_uri() . '/css/app.css', '', 1, 'all');
  wp_enqueue_style('custom');

}
add_action('wp_enqueue_scripts', 'load_stylesheets');


function include_jquery()
{
  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.5.1.js', '', 1, true);
  wp_enqueue_script('jquery');
  
  
  wp_deregister_script('jquery-migrate');
  wp_register_script('jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate.min.js', '', 1, true);
  wp_enqueue_script('jquery-migrate');


}
add_action('wp_enqueue_scripts', 'include_jquery');

function load_js()
{

  
  wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', '', 1, true);
  wp_enqueue_script('bootstrap');
 
  wp_register_script('fontawesome', get_template_directory_uri() . '/js/fontawesome.min.js', '', 1, true);
  wp_enqueue_script('fontawesome');
  
  wp_register_script('kit.fontawesome', get_template_directory_uri() . '/js/kit.fontawesome.js', '', 1, true);
  wp_enqueue_script('kit.fontawesome');
  
  wp_register_script('owlcarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', '', 1, true);
  wp_enqueue_script('owlcarousel');
  

  wp_register_script('customjs', get_template_directory_uri() . '/js/scripts.js', '', 1, true);
  wp_enqueue_script('customjs'); 
}
add_action('wp_enqueue_scripts', 'load_js');




/**************
 * Supporting Elements
 ****************************/


/*-----Nav Walker-----------*/
require_once('class-wp-bootstrap-navwalker.php');
/*-----Nav Walker-----------*/


/*Added Support Custom Logo*/
add_theme_support('custom-logo', array(
  'height'      => 100,
  'width'       => 400,
  'flex-height' => true,
  'flex-width'  => true,
  'header-text' => array('site-title', 'site-description'),
));
/*Added Support Custom Logo*/


/*Added Support Slider Images*/
add_theme_support('post-thumbnails');
add_theme_support('post-thumbnails', array('post'));          // Posts only
add_theme_support('post-thumbnails', array('page'));          // Pages only
add_theme_support('post-thumbnails', array('post', 'slider')); // Posts and Movies

/*Added Support Slider Images*/

/*Added Nav Menu*/

function consilting_register_nav_menu()
{
  register_nav_menus(array(

    'bakery_menu' => __('Bakery Primary Menu', 'goopter'),
    'bakeryfooter_menu' => __('Bakery Footer Menu', 'goopter'),
   
  ));
}
add_action('after_setup_theme', 'consilting_register_nav_menu');

/*Added Nav Menu*/

// Register widget area.
function my_widgets_init()

{
  register_sidebar(array(
    'name'          => 'Custom Header Widget Area',
    'id'            => 'custom-header-widget',
    'before_widget' => '<div class="chw-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="chw-title">',
    'after_title'   => '</h2>',
  ));
}
add_action('widgets_init', 'my_widgets_init');
// Register widget area.


// Register widget area.
function topheader_widget_init()

{
  register_sidebar(array(
    'name'          => 'Custom Top Header Widget Area',
    'id'            => 'custom-topheader-widget',
    'before_widget' => '<div class="topheader-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="topheader-title">',
    'after_title'   => '</h2>',
  ));
}
add_action('widgets_init', 'topheader_widget_init');
// Register widget area.

//Register custom sidebar
function sidebar_widgets_init()

{
  register_sidebar(array(
    'name'          => 'Page Sidebar',
    'id'            => 'page-sidebar',
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="middle-bar"><h4 class="sidebar-title">',
    'after_title'   => '</h4></div>',
    
    
  ));
}
add_action('widgets_init', 'sidebar_widgets_init');


/*Added Blog Post in Wordpress*/
function blog_post_type()
{

  $blog_labels = array(
    'name' => __('Blogs', 'bakery_site'),
    'singular_name' => __('Blog', 'bakery_site'),
    'add_new' => __('Add new blog', 'bakery_site'),
    'add_new_item' => __('Add new blog', 'bakery_site'),
    'featured_image' => __('blog post image', 'bakery_site'),
    'set_featured_image' => __('Set blog image', 'bakery_site'),

  );

  $blog_args = array(

    'labels' =>  $cs_labels,
    'public' => true,
    'show_ui' => true,
    'rewrite' => array('slug' => 'cs'),
    'capability_type' => 'post',
    'menu_position' => null,
    'supports' => array(
      'title', 'editor', 'thumbnail', 'excerpt', 'author', 'permalinks',
      'comments', 'revisions', 'custom-fields'
    ),
    'taxonomies'          => array('category', 'post_tag'),

  );

  register_post_type('blogs', $blog_args);
}

add_action('init', 'blog_post_type');

/*Added Blog Post in Wordpress*/

// get post image url
add_action('rest_api_init', 'register_rest_images');
function register_rest_images()
{
  register_rest_field(
    array('gallery'),
    'fimg_url',
    array(
      'get_callback'    => 'get_rest_featured_image',
      'update_callback' => null,
      'schema'          => null,
    )
  );
}
function get_rest_featured_image($object, $field_name, $request)
{
  if ($object['featured_media']) {
    $img = wp_get_attachment_image_src($object['featured_media'], 'href');
    return $img[0];
  }
  return false;
}
// end of get post image url

/*Added  menu Post in Wordpress*/
function menu_post_type()
{

  $menu_labels = array(
    'name' => __('Menu', 'bakery_site'),
    'singular_name' => __('Menu', 'bakery_site'),
    'add_new' => __('Add new Menu', 'bakery_site'),
    'add_new_item' => __('Add new Menu', 'bakery_site'),
    'featured_image' => __('Menu post image', 'bakery_site'),
    'set_featured_image' => __('Set Menu image', 'bakery_site'),

  );

  $menu_args = array(

    'labels' =>  $menu_labels,
    'public' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'rewrite' => array('slug' => 'menu'),
    'capability_type' => 'post',
    'menu_position' => null,
    'supports' => array(
      'title', 'editor', 'thumbnail', 'excerpt', 'author', 'permalinks',
      'comments', 'revisions', 'custom-fields'
    ),
    'taxonomies'          => array('menu', 'post_tag'),

  );

  register_post_type('menu', $menu_args);
}

add_action('init', 'menu_post_type');

/*Added menu Post in Wordpress*/

/*banner Post in Wordpress*/
function banner_post_type()
{

  $banner_labels = array(
    'name' => __('banner', 'bakery_site'),
    'singular_name' => __('banner', 'bakery_site'),
    'add_new' => __('Add new banner', 'bakery_site'),
    'add_new_item' => __('Add new banner', 'bakery_site'),
    'featured_image' => __('banner post image', 'bakery_site'),
    'set_featured_image' => __('Set banner image', 'bakery_site'),

  );

  $banner_args = array(

    'labels' =>  $banner_labels,
    'public' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'rewrite' => array('slug' => 'banner'),
    'capability_type' => 'post',
    'banner_position' => null,
    'supports' => array(
      'title', 'editor', 'thumbnail', 'excerpt', 'author', 'permalinks',
      'comments', 'revisions', 'custom-fields'
    ),
    'taxonomies'          => array('banner', 'post_tag'),

  );

  register_post_type('banner', $banner_args);
}

add_action('init', 'banner_post_type');

/*end of banner Post in Wordpress*/
/*hero Post in Wordpress*/
function hero_post_type()
{

  $hero_labels = array(
    'name' => __('hero', 'bakery_site'),
    'singular_name' => __('hero', 'bakery_site'),
    'add_new' => __('Add new hero', 'bakery_site'),
    'add_new_item' => __('Add new hero', 'bakery_site'),
    'featured_image' => __('hero post image', 'bakery_site'),
    'set_featured_image' => __('Set hero image', 'bakery_site'),

  );

  $hero_args = array(

    'labels' =>  $hero_labels,
    'public' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'rewrite' => array('slug' => 'hero'),
    'capability_type' => 'post',
    'hero_position' => null,
    'supports' => array(
      'title', 'editor', 'thumbnail', 'excerpt', 'author', 'permalinks',
      'comments', 'revisions', 'custom-fields'
    ),
    'taxonomies'          => array('hero', 'post_tag'),

  );

  register_post_type('hero', $hero_args);
}

add_action('init', 'hero_post_type');

/*end of hero Post in Wordpress*/

/*feature Post in Wordpress*/
function feature_post_type()
{

  $feature_labels = array(
    'name' => __('feature', 'bakery_site'),
    'singular_name' => __('feature', 'bakery_site'),
    'add_new' => __('Add new feature', 'bakery_site'),
    'add_new_item' => __('Add new feature', 'bakery_site'),
    'featured_image' => __('feature post image', 'bakery_site'),
    'set_featured_image' => __('Set feature image', 'bakery_site'),

  );

  $feature_args = array(

    'labels' =>  $feature_labels,
    'public' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'rewrite' => array('slug' => 'feature'),
    'capability_type' => 'post',
    'feature_position' => null,
    'supports' => array(
      'title', 'editor', 'thumbnail', 'excerpt', 'author', 'permalinks',
      'comments', 'revisions', 'custom-fields'
    ),
    'taxonomies'          => array('feature', 'post_tag'),

  );

  register_post_type('feature', $feature_args);
}

add_action('init', 'feature_post_type');

/*end of feature Post in Wordpress*/


/*Added sectionTitle Post in Wordpress*/
function sectionTitle_post_type()
{

  $sectionTitle_labels = array(
    'name' => __('sectionTitle', 'bakery_site'),
    'singular_name' => __('sectionTitle', 'bakery_site'),
    'add_new' => __('Add new sectionTitle', 'bakery_site'),
    'add_new_item' => __('Add new sectionTitle', 'bakery_site'),
    'featured_image' => __('sectionTitle post image', 'bakery_site'),
    'set_featured_image' => __('Set sectionTitle image', 'bakery_site'),

  );

  $sectionTitle_args = array(

    'labels' =>  $sectionTitle_labels,
    'public' => true,
    'show_ui' => true,
    'rewrite' => array('slug' => 'section_title'),
    'capability_type' => 'post',
    'menu_position' => null,
    'supports' => array(
      'title', 'editor', 'thumbnail', 'excerpt', 'author', 'permalinks',
      'comments', 'revisions', 'custom-fields'
    ),
    'taxonomies'          => array('category', 'post_tag'),

  );

  register_post_type('sectionTitle', $sectionTitle_args);
}

add_action('init', 'sectionTitle_post_type');

/*Added sectionTitle Post in Wordpress*/

/*Added businessInfo Post in Wordpress*/
function businessInfo_post_type()
{

  $businessInfo_labels = array(
    'name' => __('businessInfo', 'bakery_site'),
    'singular_name' => __('Business Info', 'bakery_site'),
    'add_new' => __('Add new business Info', 'bakery_site'),
    'add_new_item' => __('Add new business info', 'bakery_site'),
    'featured_image' => __('Business info post image', 'bakery_site'),
    'set_featured_image' => __('Set business info image', 'bakery_site'),

  );

  $businessInfo_args = array(

    'labels' =>  $businessInfo_labels,
    'public' => true,
    'show_ui' => true,
    'rewrite' => array('slug' => 'businessInfo'),
    'capability_type' => 'post',
    'menu_position' => null,
    'supports' => array(
      'title', 'editor', 'thumbnail', 'excerpt', 'author', 'permalinks',
      'comments', 'revisions', 'custom-fields'
    ),
    'taxonomies'          => array('category', 'post_tag'),

  );

  register_post_type('businessInfo', $businessInfo_args);
}

add_action('init', 'businessInfo_post_type');

/*Added businessInfo Post in Wordpress*/

/*Added customButton Post in Wordpress*/
function customButton_post_type()
{

  $customButton_labels = array(
    'name' => __('Custom Button', 'bakery_site'),
    'singular_name' => __('Custom Button', 'bakery_site'),
    'add_new' => __('Add new Custom Button', 'bakery_site'),
    'add_new_item' => __('Add new Custom Button', 'bakery_site'),
    'featured_image' => __('Custom Button post image', 'bakery_site'),
    'set_featured_image' => __('Set Custom Button image', 'bakery_site'),

  );

  $customButton_args = array(

    'labels' =>  $customButton_labels,
    'public' => true,
    'show_ui' => true,
    'rewrite' => array('slug' => 'customButton'),
    'capability_type' => 'post',
    'menu_position' => null,
    'supports' => array(
      'title', 'editor', 'thumbnail', 'excerpt', 'author', 'permalinks',
      'comments', 'revisions', 'custom-fields'
    ),
    'taxonomies'          => array('category', 'post_tag'),

  );

  register_post_type('customButton', $customButton_args);
}

add_action('init', 'customButton_post_type');

/*Added customButton Post in Wordpress*/

/*Added gallery Post in Wordpress*/
function gallery_post_type()
{

  $gallery_labels = array(
    'name' => __('gallery', 'bakery_site'),
    'singular_name' => __('Gallery Info', 'bakery_site'),
    'add_new' => __('Add new Gallery Info', 'bakery_site'),
    'add_new_item' => __('Add new Gallery info', 'bakery_site'),
    'featured_image' => __('Gallery info post image', 'bakery_site'),
    'set_featured_image' => __('Set Gallery info image', 'bakery_site'),

  );

  $gallery_args = array(

    'labels' =>  $gallery_labels,
    'public' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'rewrite' => array('slug' => 'gallery'),
    'capability_type' => 'post',
    'menu_position' => null,
    'supports' => array(
      'title', 'editor', 'thumbnail', 'excerpt', 'author', 'permalinks',
      'comments', 'revisions', 'custom-fields'
    ),
    'taxonomies'          => array('category', 'post_tag'),

  );

  register_post_type('gallery', $gallery_args);
}

add_action('init', 'gallery_post_type');

/*Added gallery Post in Wordpress*/



/*Added  header info in Wordpress*/
function header_post_type()
{

  $header_labels = array(
    'name' => __('header', 'bakery_site'),
    'singular_name' => __('header', 'bakery_site'),
    'add_new' => __('Add new header', 'bakery_site'),
    'add_new_item' => __('Add new header', 'bakery_site'),
    'featured_image' => __('header post image', 'bakery_site'),
    'set_featured_image' => __('Set header image', 'bakery_site'),

  );

  $header_args = array(

    'labels' =>  $header_labels,
    'public' => true,
    'show_ui' => true,
    'rewrite' => array('slug' => 'header'),
    'capability_type' => 'post',
    'menu_position' => null,
    'supports' => array(
      'title', 'editor', 'thumbnail', 'excerpt', 'author', 'permalinks',
      'comments', 'revisions', 'custom-fields'
    ),
    'taxonomies'          => array('category', 'post_tag'),

  );

  register_post_type('header', $header_args);
}

add_action('init', 'header_post_type');




// Changing excerpt more
function new_excerpt_more($more)
{
  global $post;
  return '… <a href="' . get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Changing excerpt more


//for easy appointment translate(loco translate)
load_theme_textdomain('themify', TEMPLATEPATH . '/languages');



//for woocommerce
function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
  
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


 
function yourtheme_setup() {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'yourtheme_setup' );

/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
function rd_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}
 
	/*
	 * Nonce verification
	 */
	if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
		return;
 
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );
 
	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;
 
	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {
 
		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
 
		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
 
		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
 
		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				if( $meta_key == '_wp_old_slug' ) continue;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}
 
 
		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );


//custom comment field

