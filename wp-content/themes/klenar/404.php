<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package klenar
 */

get_header();
?>

<section class="error__area pt-200 pb-200">
   <div class="container">
      <div class="row">
         <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
            <?php 
               $klenar_error_404_text = get_theme_mod('klenar_error_404_text', __('404', 'klenar'));
               $klenar_error_title = get_theme_mod('klenar_error_title', __('Page not found', 'klenar'));
               $klenar_error_link_text = get_theme_mod('klenar_error_link_text', __('Back To Home', 'klenar'));
               $klenar_error_desc = get_theme_mod('klenar_error_desc', __('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'klenar'));
            ?>
            <div class="error__item text-center">
               <div class="error__thumb">
                  <h1><?php print esc_html($klenar_error_404_text); ?></h1>
               </div>
               <div class="error__content">
                  <h3 class="error__title"><?php print esc_html($klenar_error_title);?></h3>
                  <p><?php print esc_html($klenar_error_desc);?></p>
                  <a href="<?php print esc_url(home_url('/'));?>" class="theme-btn"><?php print esc_html($klenar_error_link_text);?></a>
               </div>
            </div>

         </div>
      </div>
   </div>
</section>

<?php
get_footer();
