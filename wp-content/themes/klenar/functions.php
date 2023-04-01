<?php

/**
 * klenar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package klenar
 */

if ( !function_exists( 'klenar_setup' ) ):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function klenar_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on klenar, use a find and replace
         * to change 'klenar' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'klenar', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( [
            'main-menu' => esc_html__( 'Main Menu', 'klenar' ),
            'onepage-menu' => esc_html__( 'Oenpage Menu', 'klenar' ),
        ] );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ] );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'klenar_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ] ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        //Enable custom header
        add_theme_support( 'custom-header' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ] );

        /**
         * Enable suporrt for Post Formats
         *
         * see: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', [
            'image',
            'audio',
            'video',
            'gallery',
            'quote',
        ] );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        remove_theme_support( 'widgets-block-editor' );

        add_image_size( 'klenar-case-details', 1170, 600, [ 'center', 'center' ] );
    }
endif;
add_action( 'after_setup_theme', 'klenar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function klenar_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'klenar_content_width', 640 );
}
add_action( 'after_setup_theme', 'klenar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function klenar_widgets_init() {

    $footer_style_2_switch = get_theme_mod( 'footer_style_2_switch', true );
    $footer_style_3_switch = get_theme_mod( 'footer_style_3_switch', true );
    $footer_subcriber_switch = get_theme_mod( 'footer_subcriber_switch', true );
    $footer_subcriber2_switch = get_theme_mod( 'footer_subcriber2_switch', true );

    /**
     * blog sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'klenar' ),
        'id'            => 'blog-sidebar',
        'before_widget' => '<div id="%1$s" class="widget mb-45 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="sidebar__widget--title mb-30">',
        'after_title'   => '</h3>',
    ] );


    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    // footer default
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer %1$s', 'klenar' ), $num ),
            'id'            => 'footer-' . $num,
            'description'   => sprintf( esc_html__( 'Footer %1$s', 'klenar' ), $num ),
            'before_widget' => '<div id="%1$s" class="tp-footer-widget footer-col-'.$num.' mb-50 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="tp-footer-widget-title mb-35">',
            'after_title'   => '</h4>',
        ] );
    }

    // Footer Subscribe
    if ( $footer_subcriber_switch ) {
        register_sidebar(array(
            'name' => esc_html__('Footer Subscribe Widget', 'klenar'),
            'id' => 'footer-subcriber',
            'before_widget' => '<div id="%1$s" class="footer-sub-widgets %2$s">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => '',
        ));
    }

    // Footer Subscribe 2
    if ( $footer_subcriber2_switch ) {
        register_sidebar(array(
            'name' => esc_html__('Footer Subscribe 2 Widget', 'klenar'),
            'id' => 'footer-subcriber2',
            'before_widget' => '<div id="%1$s" class="footer-sub-widgets %2$s">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => '',
        ));
    }

    // footer 2
    if ( $footer_style_2_switch ) {
        for ( $num = 1; $num <= $footer_widgets; $num++ ) {

            register_sidebar( [
                'name'          => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'klenar' ), $num ),
                'id'            => 'footer-2-' . $num,
                'description'   => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'klenar' ), $num ),
                'before_widget' => '<div id="%1$s" class="tp-footer-widget mb-50 footer-col-'.$num.' %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="tp-footer-widget-title mb-35">',
                'after_title'   => '</h3>',
            ] );
        }
    }
    // footer 3
    if ( $footer_style_3_switch ) {
        for ( $num = 1; $num <= $footer_widgets; $num++ ) {

            register_sidebar( [
                'name'          => sprintf( esc_html__( 'Footer Style 3 : %1$s', 'klenar' ), $num ),
                'id'            => 'footer-3-' . $num,
                'description'   => sprintf( esc_html__( 'Footer Style 3 : %1$s', 'klenar' ), $num ),
                'before_widget' => '<div id="%1$s" class="tp-footer-widget mb-50 footer-col-3-'.$num.' %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="tp-footer-widget-title mb-35">',
                'after_title'   => '</h3>',
            ] );
        }
    }

    /**
    * Service Widget
    */
    register_sidebar(
        array(
            'name'          => esc_html__( 'Service Sidebar', 'klenar' ),
            'id'            => 'services-sidebar',
            'description'   => esc_html__( 'Widgets in this area will be shown on Service Details Sidebar.', 'klenar' ),
            'before_widget' => '<div class="tp-faqs-left-sidebar tp-services-sidebar mb-30 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="tp-faqs-left-sidebar-title mb-30">',
            'after_title'   => '</h4>',
        )
    );  

    /**
    * Portfolio Widget
    */
    register_sidebar(
        array(
            'name'          => esc_html__( 'Portfolio Sidebar', 'klenar' ),
            'id'            => 'portfolio-sidebar',
            'before_widget' => '<div class="tp-faqs-left-sidebar tp-services-sidebar mb-30 %2$s">',
            'after_widget'  => '</div>',
            'description'   => esc_html__( 'Widgets in this area will be shown on Portfolio Details Sidebar.', 'klenar' ),
            'before_title'  => '<h4 class="tp-faqs-left-sidebar-title mb-30">',
            'after_title'   => '</h4>',
        )
    );     

    /**
    * Faq Widget
    */
    register_sidebar(
        array(
            'name'          => esc_html__( 'Faq Sidebar', 'klenar' ),
            'id'            => 'faq-sidebar',
            'before_widget' => '<div class="tp-faqs-left-sidebar tp-services-sidebar mb-30 %2$s">',
            'after_widget'  => '</div>',
            'description'   => esc_html__( 'Widgets in this area will be shown on Portfolio Details Sidebar.', 'klenar' ),
            'before_title'  => '<h4 class="tp-faqs-left-sidebar-title mb-30">',
            'after_title'   => '</h4>',
        )
    );  

}
add_action( 'widgets_init', 'klenar_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

define( 'KLENAR_THEME_DIR', get_template_directory() );
define( 'KLENAR_THEME_URI', get_template_directory_uri() );
define( 'KLENAR_THEME_CSS_DIR', KLENAR_THEME_URI . '/assets/css/' );
define( 'KLENAR_THEME_JS_DIR', KLENAR_THEME_URI . '/assets/js/' );
define( 'KLENAR_THEME_INC', KLENAR_THEME_DIR . '/inc/' );

/**
 * klenar_scripts description
 * @return [type] [description]
 */
function klenar_scripts() {

    /**
     * all css files
     */

    wp_enqueue_style( 'klenar-fonts', klenar_fonts_url(), array(), '1.0.0' );
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', KLENAR_THEME_CSS_DIR.'bootstrap.rtl.min.css', array() );
    }else{
        wp_enqueue_style( 'bootstrap', KLENAR_THEME_CSS_DIR.'bootstrap.min.css', array() );
    }
    wp_enqueue_style( 'animate', KLENAR_THEME_CSS_DIR . 'animate.min.css', [] );
    wp_enqueue_style( 'custom-animation', KLENAR_THEME_CSS_DIR . 'custom-animation.css', [], time(), 'all' );
    wp_enqueue_style( 'fontawesome5pro', KLENAR_THEME_CSS_DIR . 'fontawesome.min.css', [] );
    wp_enqueue_style( 'flaticon', KLENAR_THEME_CSS_DIR . 'flaticon.css', [] );
    wp_enqueue_style( 'meanmenu', KLENAR_THEME_CSS_DIR . 'meanmenu.css', [] );
    wp_enqueue_style( 'magnific-popup', KLENAR_THEME_CSS_DIR . 'magnific-popup.css', [] );
    wp_enqueue_style( 'backtotop', KLENAR_THEME_CSS_DIR . 'backToTop.css', [] );
    wp_enqueue_style( 'nice-select', KLENAR_THEME_CSS_DIR . 'swiper-bundle.css', [] );
    wp_enqueue_style( 'klenar-default', KLENAR_THEME_CSS_DIR . 'default.css', [] );
    wp_enqueue_style( 'klenar-core', KLENAR_THEME_CSS_DIR . 'klenar-core.css', [], time(), 'all' );
    wp_enqueue_style( 'klenar-unit', KLENAR_THEME_CSS_DIR . 'klenar-unit.css', [] );
    wp_enqueue_style( 'klenar-custom', KLENAR_THEME_CSS_DIR . 'klenar-custom.css', [] );
    wp_enqueue_style( 'klenar-style', get_stylesheet_uri() );

    // all js
    wp_enqueue_script( 'bootstrap-bundle', KLENAR_THEME_JS_DIR . 'bootstrap.bundle.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'swiper-bundle', KLENAR_THEME_JS_DIR . 'swiper-bundle.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'backtotop', KLENAR_THEME_JS_DIR . 'backToTop.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'isotope-pkgd', KLENAR_THEME_JS_DIR . 'isotope.pkgd.min.js', [ 'imagesloaded' ], false, true );
    wp_enqueue_script( 'jquery-meanmenu', KLENAR_THEME_JS_DIR . 'jquery.meanmenu.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'magnific-popup', KLENAR_THEME_JS_DIR . 'jquery.magnific-popup.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'wow', KLENAR_THEME_JS_DIR . 'wow.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'jquery-easing', KLENAR_THEME_JS_DIR . 'jquery.easing.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'one-page-nav-min', KLENAR_THEME_JS_DIR . 'one-page-nav-min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'klenar-main', KLENAR_THEME_JS_DIR . 'main.js', [ 'jquery' ], time(), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'klenar_scripts' );

/*
Register Fonts
 */

function klenar_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'klenar' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?'. urlencode('family=Nunito+Sans:wght@300;400;600;700;800;900&family=Roboto:wght@300;400;500;700;900&display=swap');
    }
    return $font_url;
}


// wp_body_open
if ( !function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Implement the Custom Header feature.
 */
require KLENAR_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require KLENAR_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require KLENAR_THEME_INC . 'template-helper.php';

/**
 * initialize kirki customizer class.
 */
include_once KLENAR_THEME_INC . 'kirki-customizer.php';
include_once KLENAR_THEME_INC . 'class-klenar-kirki.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require KLENAR_THEME_INC . 'jetpack.php';
}

/**
 * include klenar functions file
 */
require_once KLENAR_THEME_INC . 'class-breadcrumb.php';
require_once KLENAR_THEME_INC . 'class-navwalker.php';
require_once KLENAR_THEME_INC . 'class-tgm-plugin-activation.php';
require_once KLENAR_THEME_INC . 'add_plugin.php';

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function klenar_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'klenar_pingback_header' );

/**
 *
 * comment section
 *
 */
add_filter( 'comment_form_default_fields', 'klenar_comment_form_default_fields_func' );

function klenar_comment_form_default_fields_func( $default ) {

    $default['author'] = '<div class="row">
    <div class="col-xl-6 col-md-6">
    	<div class="post-input">
        	<input type="text" name="author" placeholder="' . esc_attr__( 'Your Name', 'klenar' ) . '">
        </div>
    </div>';
    $default['email'] = '<div class="col-xl-6 col-md-6">
		<div class="post-input">
        <input type="text" name="email" placeholder="' . esc_attr__( 'Your Email', 'klenar' ) . '">
    	</div>
    </div>';
    // $default['url'] = '';
    $defaults['comment_field'] = '';

    $default['url'] = '<div class="col-xl-12">
		<div class="post-input">
        <input type="text" name="url" placeholder="' . esc_attr__( 'Website', 'klenar' ) . '">
    	</div>
    </div>';
    return $default;
}

add_action( 'comment_form_top', 'klenar_add_comments_textarea' );
function klenar_add_comments_textarea() {
    if ( !is_user_logged_in() ) {
        echo '<div class="row"><div class="col-xl-12"><div class="post-input"><textarea id="comment" name="comment" cols="60" rows="6" placeholder="' . esc_attr__( 'Write your comment here...', 'klenar' ) . '" aria-required="true"></textarea></div></div></div>';
    }
}

add_filter( 'comment_form_defaults', 'klenar_comment_form_defaults_func' );

function klenar_comment_form_defaults_func( $info ) {
    if ( !is_user_logged_in() ) {
        $info['comment_field'] = '';
        $info['submit_field'] = '%1$s %2$s</div>';
    } else {
        $info['comment_field'] = '<div class="post-input"><textarea id="comment" name="comment" cols="30" rows="10" placeholder="' . esc_attr__( 'Comment *', 'klenar' ) . '"></textarea>';
        $info['submit_field'] = '%1$s %2$s</div>';
    }

    $info['submit_button'] = '<div class="col-xl-12"><button class="theme-btn" type="submit"> <i class="flaticon-enter"></i>' . esc_html__( 'Post Comment', 'klenar' ) . ' </button></div>';

    $info['title_reply_before'] = '<div class="post-comments-title">
                                        <h2>';
    $info['title_reply_after'] = '</h2></div>';
    $info['comment_notes_before'] = '';

    return $info;
}

if ( !function_exists( 'klenar_comment' ) ) {
    function klenar_comment( $comment, $args, $depth ) {
        $GLOBAL['comment'] = $comment;
        extract( $args, EXTR_SKIP );
        $args['reply_text'] = '<i class="fal fa-reply"></i> Reply';
        $replayClass = 'comment-depth-' . esc_attr( $depth );
        ?>
			<li id="comment-<?php comment_ID();?>">
				<div class="comments-box">
					<div class="comments-avatar">
						<?php print get_avatar( $comment, 102, null, null, [ 'class' => [] ] );?>
					</div>
					<div class="comments-text">
						<div class="avatar-name">
							<h5><?php print get_comment_author_link();?></h5>
							<span><?php comment_time( get_option( 'date_format' ) );?></span>
						</div>
						<?php comment_text();?>
						<?php comment_reply_link( array_merge( $args, [ 'depth' => $depth, 'max_depth' => $args['max_depth'] ] ) );?>
					</div>
				</div>
		<?php
}
}

/**
 * shortcode supports for removing extra p, spance etc
 *
 */
add_filter( 'the_content', 'klenar_shortcode_extra_content_remove' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function klenar_shortcode_extra_content_remove( $content ) {

    $array = [
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']',
    ];
    return strtr( $content, $array );

}

// klenar_search_filter_form
if ( !function_exists( 'klenar_search_filter_form' ) ) {
    function klenar_search_filter_form( $form ) {

        $form = sprintf(
            '<div class="sidebar__widget-px"><div class="search-px"><form class="sidebar-search-form" action="%s" method="get">
      	<input type="text" value="%s" required name="s" placeholder="%s">
      	<button type="submit"> <i class="far fa-search"></i>  </button>
		</form></div></div>',
            esc_url( home_url( '/' ) ),
            esc_attr( get_search_query() ),
            esc_html__( 'Search', 'klenar' )
        );

        return $form;
    }
    add_filter( 'get_search_form', 'klenar_search_filter_form' );
}

add_action( 'admin_enqueue_scripts', 'klenar_admin_custom_scripts' );

function klenar_admin_custom_scripts() {
    wp_enqueue_media();
    wp_register_script( 'klenar-admin-custom', get_template_directory_uri() . '/inc/js/admin_custom.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'klenar-admin-custom' );
}
