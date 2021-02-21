<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="robots" content="noindex,nofollow">
   <meta name="description" content="">
   <meta name="keywords" content="HTML,CSS,JavaScript">
   <meta name="author" content="">

   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
   <div class="overflow">

      <header class="">
      <div class="header-banner">
         <div class="banner-contents">
            
            <i class="fas fa-vector-square"></i><p>gift cards are available</p> <i class="fas fa-vector-square"></i>
         </div>
      </div>
      <nav class="navbar navbar-expand-lg nav-toggler-right no-padding-on-mobile">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
               <i class="fas fa-bars"></i>
            </button>
            <?php
            wp_nav_menu(array(
               'theme_location'  => 'bakery_menu',
               'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
               'container'       => 'div',
               'container_class' => 'collapse navbar-collapse nav-contents',
               'container_id'    => 'navbarNavAltMarkup',
               'menu_class'      => 'navbar-nav',
               'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
               'walker'          => new WP_Bootstrap_Navwalker(),

            ));
            ?>
           
         </nav>
      </header>

         
   