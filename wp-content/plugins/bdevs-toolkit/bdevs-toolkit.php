<?php 
if ( !defined('ABSPATH') )
    exit;

/*
Plugin Name: Bdevs Toolkit
Plugin URI: http://bdevs.net/
Description: Bdevs Toolkit Plugin
Version: 1.0.1
Author: BDevs
Author URI: http://bdevs.net
*/

define( 'BDEVS_TOOLKIT_VER', '1.0.1' );
define( 'BDEVS_TOOLKIT_DIR', plugin_dir_path( __FILE__ ) );
define( 'BDEVS_TOOLKIT_URL', plugin_dir_url( __FILE__ ) );

define( 'BDEVS_TOOLKIT_METABOX_ACTIVED', in_array( 'cmb2/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

final class Bdevs_toolkit {

	private static $instance;

	function __construct() {

		require_once BDEVS_TOOLKIT_DIR . '/inc/custom-post.php';

    	require_once BDEVS_TOOLKIT_DIR . '/inc/acf-meta-field.php';
    	require_once BDEVS_TOOLKIT_DIR . '/inc/class-ocdi-importer.php';
    	/**
		* widgets
		*/
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-service-list.php';
		// require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-service-menu-list.php';
		// require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-service-cat-list.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-latest-posts-sidebar.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-latest-posts-footer.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-latest-posts-footer-2.php';
		// require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-services-form-widget.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-subscriber-widget.php';
		require_once BDEVS_TOOLKIT_DIR . '/widgets/bdevs-subscriber2-widget.php';

		add_filter( 'template_include', array( $this, '_custom_template_include' ) );
	}

	public static function instance() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Bdevs_toolkit ) ) {
			self::$instance = new Bdevs_toolkit;
		}
		return self::$instance;
	}

	public function _custom_template_include( $template ) {
		$post_types = bdevs_custom_post_types();
		foreach ( $post_types as $post_type => $fields ) {
			if ( is_singular( $post_type ) ) {
				return $this->_get_custom_template( 'single-'. $post_type .'.php');
			}
        }
        return $template;
		
	}
	
	public function _get_custom_template( $template ) {
		if ( $theme_file = locate_template( array( $template ) ) ) {
			$file = $theme_file;
		} 
		else {
			$file = BDEVS_TOOLKIT_DIR . 'template/'. $template;
		}
		return apply_filters( __FUNCTION__, $file, $template );
	}

}

function Bdevs_toolkit() {

	return Bdevs_toolkit::instance();
}

Bdevs_toolkit();

/** 
*
*/
function bdevs_custom_post_types() {
 
	$klenar_sv_slug = get_theme_mod('klenar_sv_slug','ourservices');
 
	$klenar_cases_slug = get_theme_mod('klenar_cases_slug','ourproject');

	return array (
		'bdevs-services' => array('title' => 'Service', 'plural_title' => 'Services', 'rewrite' => $klenar_sv_slug,'menu_icon' => 'dashicons-admin-generic'), 
		'bdevs-project'  => array( 'title' => 'Project', 'plural_title' => 'Projects', 'rewrite' => $klenar_cases_slug,'menu_icon' => 'dashicons-format-image' )
	);
}

add_filter('custom_bdevs_post_types', 'bdevs_custom_post_types');

/** 
*
*/
function bdevs_custom_taxonomies() {
	return array (
		'service-categories' => array(
			'title' => 'Services Category', 
			'plural_title' =>'Services Categories', 
			'rewrite' => 'services-cat', 
			'post_type' => 'bdevs-services'
		),
		'project-categories' => array(
			'title' => 'Project Category', 
			'plural_title' =>'Projects Categories', 
			'rewrite' => 'project-cat', 
			'post_type' => 'bdevs-project'
		),
	);
}

add_filter('custom_bdevs_taxonomies', 'bdevs_custom_taxonomies');


/**
* taxonomy category
*/
function bdevs_get_terms($id,$tax){
    $terms = get_the_terms( get_the_ID(), $tax ); 
    $list = '';
    if ( $terms && ! is_wp_error( $terms ) ) : 
        $i=1;
        $cats_count = count($terms);
        foreach ( $terms as $term ) {
            $exatra = ( $cats_count > $i ) ? ', ' : '';
            $list .= $term->name . $exatra;
            $i++;
        }
    endif;
    return trim($list,',');
}



function educal_related_posts_by_tags($post_id = '', $related_count = 4, $feature_image = true)
{

   try {
      if ($post_id == '') {
         $post_id = get_the_ID();
      }
      $tags  =  get_the_terms(get_the_id(), 'course_tag');

      if (!$tags) {
         return [];
      }

      $term_tags = wp_list_pluck($tags, 'term_id');

      $args = array(
         'post_type' => 'lp_course',
         'post__not_in' => array($post_id),
         'posts_per_page' => $related_count,
         'ignore_sticky_posts' => 1,
         'tax_query' => array(
            array(
               'taxonomy' => 'course_tag',
               'terms' => $term_tags,
               'field' => 'id',
               'operator' => 'IN'
            )
         ),
      );
      if ($feature_image) {
         $args["meta_query"] = array(
            array(
               'key' => '_thumbnail_id',
               'compare' => 'EXISTS'
            ),
         );
      }

      return get_posts($args);
   } catch (Exception $e) {

      return [];
   }
}


function tp_course_cageory_by_id($post_id = null, $single = true)
{
   $terms = get_the_terms($post_id, 'project-categories');
   $cat = '';
   $cat_with_link = '';

   if (is_array($terms)) :

      foreach ($terms as $tkey => $term) :

         $cat .= $term->slug . ' ';

         $cat_with_link .= sprintf("<a href='%s'>%s</a>", get_category_link($term->term_id), $term->name);

         if ($single) {
            break;
         }

         if ($tkey == 1) {
            break;
         }

      endforeach;

   endif;
   return $cat_with_link;
}



function tp_cats_related_post() {

    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );

    if(!empty($categories) && !is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);

    $query_args = array( 
        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post__not_in'    => array($post_id),
        'posts_per_page'  => '3',
     );

    $related_cats_post = new WP_Query( $query_args );

    if($related_cats_post->have_posts()):
         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>

            <div class="col-lg-4 col-md-6">
                <div class="tp-project z-index mb-30">
                    <div class="tp-project-img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="tp-project-text">
                        <div class="tp-project-text-content">
                            <span class="tp-project-subtitle"><?php echo tp_course_cageory_by_id();?></span>
                            <h4 class="tp-project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        </div>
                        <div class="tp-project-text-icon">
                            <a class="popup-image" href="<?php echo get_the_post_thumbnail_url(); ?>"><i class="fal fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile;

        // Restore original Post Data
        wp_reset_postdata();
     endif;

}