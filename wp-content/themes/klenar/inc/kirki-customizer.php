<?php
/**
 * klenar customizer
 *
 * @package klenar
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function klenar_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'klenar_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Klenar Customizer', 'klenar' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'header_top_setting', [
        'title'       => esc_html__( 'Header Info Setting', 'klenar' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'klenar_customizer',
    ] );


    $wp_customize->add_section( 'header_social', [
        'title'       => esc_html__( 'Header Social', 'klenar' ),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'klenar_customizer',
    ] );

    $wp_customize->add_section( 'section_header_logo', [
        'title'       => esc_html__( 'Header Setting', 'klenar' ),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'klenar_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'klenar' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'klenar_customizer',
    ] );

    $wp_customize->add_section( 'header_side_setting', [
        'title'       => esc_html__( 'Side Info', 'klenar' ),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'klenar_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'klenar' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'klenar_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'klenar' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'klenar_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'klenar' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'klenar_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'klenar' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'klenar_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'klenar' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'klenar_customizer',
    ] );

    $wp_customize->add_section( 'slug_setting', [
        'title'       => esc_html__( 'Slug Settings', 'klenar' ),
        'description' => '',
        'priority'    => 22,
        'capability'  => 'edit_theme_options',
        'panel'       => 'klenar_customizer',
    ] );

    $wp_customize->add_section( 'typo_setting', [
        'title'       => esc_html__( 'Typography Setting', 'klenar' ),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'klenar_customizer',
    ] );

}

add_action( 'customize_register', 'klenar_customizer_panels_sections' );




// for top fields
function _header_top_fields( $fields ) {
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'klenar_topbar_switch',
        'label'    => esc_html__( 'Topbar Swicher', 'klenar' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'klenar_preloader',
        'label'    => esc_html__( 'Preloader On/Off', 'klenar' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'klenar_preloader_logo',
        'label'       => esc_html__( 'Preloader Logo', 'klenar' ),
        'description' => esc_html__( 'Upload Your Logo.', 'klenar' ),
        'section'     => 'header_top_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/preloader-icon.png',
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'klenar_backtotop',
        'label'    => esc_html__( 'Back To Top On/Off', 'klenar' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'klenar_header_right',
        'label'    => esc_html__( 'Header Right On/Off', 'klenar' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];


    // klenar_address_text

    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_address_text',
        'label'    => esc_html__( 'Address Text', 'klenar' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '28/4 Palmal, London', 'klenar' ),
        'priority' => 10,
    ];



    // klenar_email_text
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_email_text',
        'label'    => esc_html__( 'Email Text', 'klenar' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'info@klenar.com', 'klenar' ),
        'priority' => 10,
    ];
    // klenar_email_link
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_email_link',
        'label'    => esc_html__( 'Email Link', 'klenar' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'info@klenar.com', 'klenar' ),
        'priority' => 10,
    ];

    // klenar_contact_number

    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_contact_number',
        'label'    => esc_html__( 'Contact Number', 'klenar' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '333 888 200 - 55', 'klenar' ),
        'priority' => 10,
    ];

    // klenar_contact_link

    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_contact_link',
        'label'    => esc_html__( 'Contact Link', 'klenar' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '333 888 200 - 55', 'klenar' ),
        'priority' => 10,
    ];


    // klenar_button
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_button_text',
        'label'    => esc_html__( 'Button Text', 'klenar' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'Free Quote', 'klenar' ),
        'priority' => 10,
    ];
    // klenar_button_link
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_button_link',
        'label'    => esc_html__( 'Button Link', 'klenar' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '#', 'klenar' ),
        'priority' => 10,
    ];


    return $fields;

}
add_filter( 'kirki/fields', '_header_top_fields' );

/*
Header Social
 */
function _header_social_fields( $fields ) {
    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_topbar_fb_url',
        'label'    => esc_html__( 'Facebook Url', 'klenar' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'klenar' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_topbar_twitter_url',
        'label'    => esc_html__( 'Twitter Url', 'klenar' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'klenar' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_topbar_instagram_url',
        'label'    => esc_html__( 'Instagram Url', 'klenar' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'klenar' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_topbar_google_url',
        'label'    => esc_html__( 'Google Plus Url', 'klenar' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'klenar' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_topbar_linkedin_url',
        'label'    => esc_html__( 'linkedin Url', 'klenar' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'klenar' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_topbar_youtube_url',
        'label'    => esc_html__( 'Youtube Url', 'klenar' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'klenar' ),
        'priority' => 10,
    ];


    return $fields;
}
add_filter( 'kirki/fields', '_header_social_fields' );

/*
Header Settings
 */
function _header_header_fields( $fields ) {

    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__( 'Select Header Style', 'klenar' ),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__( 'Select an option...', 'klenar' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
            'header-style-3' => get_template_directory_uri() . '/inc/img/header/header-3.png',

            'header-style-onepage-1'   => get_template_directory_uri() . '/inc/img/header/onepage-1.png',
            'header-style-onepage-2' => get_template_directory_uri() . '/inc/img/header/onepage-2.png',
            'header-style-onepage-3' => get_template_directory_uri() . '/inc/img/header/onepage-3.png',
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'klenar' ),
        'description' => esc_html__( 'Upload Your Logo.', 'klenar' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-black.png',
    ];

    // klenar_header_bg
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'klenar_header_bg',
        'label'       => __( 'Header BG Color', 'klenar' ),
        'description' => esc_html__( 'This is a Header bg color control.', 'klenar' ),
        'section'     => 'section_header_logo',
        'default'     => '#075f33',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'seconday_logo',
        'label'       => esc_html__( 'Header Secondary Logo', 'klenar' ),
        'description' => esc_html__( 'Header Logo Black', 'klenar' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'klenar_logo_bg',
        'label'       => esc_html__( 'Header Secondary Logo BG', 'klenar' ),
        'description' => esc_html__( 'Header Secondary Logo BG', 'klenar' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-white-bg.png',
    ];


    return $fields;
}
add_filter( 'kirki/fields', '_header_header_fields' );

/*
Header Side Info
 */
function _header_side_fields( $fields ) {
    // side info settings
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'klenar_hamburger_hide',
        'label'    => esc_html__( 'Show Hamburger On/Off', 'klenar' ),
        'section'  => 'header_side_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'klenar_side_contact_hide',
        'label'    => esc_html__( 'Side Contact Info On/Off', 'klenar' ),
        'section'  => 'header_side_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];


    // address
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_side_address',
        'label'    => esc_html__( 'Office Address', 'klenar' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '28/4 Palmal, London', 'klenar' ),
        'priority' => 10,
    ];

    // phone
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_side_phone',
        'label'    => esc_html__( 'Phone Number', 'klenar' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '333 888 200 - 55', 'klenar' ),
        'priority' => 10,
    ];

    // phone link
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_side_phone_link',
        'label'    => esc_html__( 'Phone Number Link', 'klenar' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '333 888 200 - 55', 'klenar' ),
        'priority' => 10,
    ];

    // mail id
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_side_mail',
        'label'    => esc_html__( 'Email ID', 'klenar' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'info@klenar.com', 'klenar' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_side_mail_link',
        'label'    => esc_html__( 'Email ID Link', 'klenar' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'info@klenar.com', 'klenar' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_side_fields' );

/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {
    // Breadcrumb Setting

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'klenar_breadcrumb_switch',
        'label'    => esc_html__( 'Breadcrumb Show/Hide', 'klenar' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__( 'Breadcrumb Background Image', 'klenar' ),
        'description' => esc_html__( 'Breadcrumb Background Image', 'klenar' ),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/slider/breadcrumb-bg-1.jpg',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'klenar_breadcrumb_bg_color',
        'label'       => __( 'Breadcrumb BG Color', 'klenar' ),
        'description' => esc_html__( 'This is a Breadcrumb bg color control.', 'klenar' ),
        'section'     => 'breadcrumb_setting',
        'default'     => '#f3ebde',
        'priority'    => 10,
    ];    

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'klenar_breadcrumb_title_color',
        'label'       => __( 'Breadcrumb Title Color', 'klenar' ),
        'description' => esc_html__( 'This is a Breadcrumb title color control.', 'klenar' ),
        'section'     => 'breadcrumb_setting',
        'default'     => '#09150f',
        'priority'    => 10,
    ];

     $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_breadcrumb_pad_top',
        'label'    => esc_html__( 'Breadcrumb Padding Top', 'klenar' ),
        'section'  => 'breadcrumb_setting',
        'default'  => esc_html__( '180px', 'klenar' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_breadcrumb_pad_bottom',
        'label'    => esc_html__( 'Breadcrumb Padding Bottom', 'klenar' ),
        'section'  => 'breadcrumb_setting',
        'default'  => esc_html__( '185px', 'klenar' ),
        'priority' => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_page_title_fields' );

/*
Header Social
 */
function _header_blog_fields( $fields ) {
// Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'klenar_blog_btn_switch',
        'label'    => esc_html__( 'Blog BTN On/Off', 'klenar' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];
    // klenar_blog_author
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'klenar_blog_author',
        'label'    => esc_html__( 'Blog Author Meta On/Off', 'klenar' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'klenar_blog_date',
        'label'    => esc_html__( 'Blog Date Meta On/Off', 'klenar' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'klenar_blog_comments',
        'label'    => esc_html__( 'Blog Comments Meta On/Off', 'klenar' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'klenar_blog_cat',
        'label'    => esc_html__( 'Blog Category Meta On/Off', 'klenar' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'klenar' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'klenar' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'klenar' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'klenar' ),
        'priority' => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_blog_fields' );

/*
Footer
 */
function _header_footer_fields( $fields ) {

    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'klenar' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'klenar' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
            'footer-style-2' => get_template_directory_uri() . '/inc/img/footer/footer-2.png',
            'footer-style-3' => get_template_directory_uri() . '/inc/img/footer/footer-3.png',
        ],
        'default'     => 'footer-style-1',
    ];


    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__( 'Widget Number', 'klenar' ),
        'section'     => 'footer_setting',
        'default'     => '4',
        'placeholder' => esc_html__( 'Select an option...', 'klenar' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            '4' => esc_html__( 'Widget Number 4', 'klenar' ),
            '3' => esc_html__( 'Widget Number 3', 'klenar' ),
            '2' => esc_html__( 'Widget Number 2', 'klenar' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_2_switch',
        'label'    => esc_html__( 'Footer Style 2 On/Off', 'klenar' ),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_3_switch',
        'label'    => esc_html__( 'Footer Style 3 On/Off', 'klenar' ),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'klenar_footer_bg',
        'label'       => esc_html__( 'Footer Background Image.', 'klenar' ),
        'description' => esc_html__( 'Footer Background Image.', 'klenar' ),
        'section'     => 'footer_setting',
        'default'     => '',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'klenar_footer_bg_color',
        'label'       => __( 'Footer BG Color', 'klenar' ),
        'description' => esc_html__( 'This is a Footer bg color control.', 'klenar' ),
        'section'     => 'footer_setting',
        'default'     => '#075f33',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'klenar_footer_bg_color_bottom',
        'label'       => __( 'Copyright BG Color', 'klenar' ),
        'description' => esc_html__( 'This is a Footer Copyright bg color control.', 'klenar' ),
        'section'     => 'footer_setting',
        'default'     => '#084d2b',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'klenar_footer_bg_color_3',
        'label'       => __( 'Footer Style 3 BG Color', 'klenar' ),
        'description' => esc_html__( 'This is a Footer bg color control.', 'klenar' ),
        'section'     => 'footer_setting',
        'default'     => '#041459',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'klenar_footer_bg_color_bottom_3',
        'label'       => __( 'Copyright Style 3 BG Color', 'klenar' ),
        'description' => esc_html__( 'This is a Footer Copyright bg color control.', 'klenar' ),
        'section'     => 'footer_setting',
        'default'     => '#18255e',
        'priority'    => 10,
    ];


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_subcriber_switch',
        'label'    => esc_html__( 'Footer Subscribe On/Off', 'klenar' ),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_subcriber2_switch',
        'label'    => esc_html__( 'Footer Subscribe 2 On/Off', 'klenar' ),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'klenar' ),
            'off' => esc_html__( 'Disable', 'klenar' ),
        ],
    ];
     $fields[] = [
        'type'     => 'text',
        'settings' => 'footer__copyright_text',
        'label'    => esc_html__( 'Footer Copyright Text', 'klenar' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Copyright ©2022 Theme_pure. All Rights Reserved Copyright ', 'klenar' ),
        'priority' => 10,
    ];


    return $fields;
}
add_filter( 'kirki/fields', '_header_footer_fields' );

// color
function klenar_color_fields( $fields ) {
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'klenar_color_option',
        'label'       => __( 'Theme Color', 'klenar' ),
        'description' => esc_html__( 'This is a Theme color control.', 'klenar' ),
        'section'     => 'color_setting',
        'default'     => '#06ae5a',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'klenar_color_option_prim',
        'label'       => __( 'Primary Color', 'klenar' ),
        'description' => esc_html__( 'This is a Primary color control.', 'klenar' ),
        'section'     => 'color_setting',
        'default'     => '#fed10c',
        'priority'    => 10,

    ];  

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'klenar_color_option_sec',
        'label'       => __( 'Secondary Color', 'klenar' ),
        'description' => esc_html__( 'This is a Secondary color control.', 'klenar' ),
        'section'     => 'color_setting',
        'default'     => '#075f33',
        'priority'    => 10,
    ];    

    // color settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'klenar_color_option_third',
        'label'       => __( 'Third Color', 'klenar' ),
        'description' => esc_html__( 'This is a Third color control.', 'klenar' ),
        'section'     => 'color_setting',
        'default'     => '#084d2b',
        'priority'    => 10,
    ];

    // color settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'klenar_color_option_fourth',
        'label'       => __( 'Fourth Color', 'klenar' ),
        'description' => esc_html__( 'This is a Fourth color control.', 'klenar' ),
        'section'     => 'color_setting',
        'default'     => '#102579',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', 'klenar_color_fields' );

// 404
function klenar_404_fields( $fields ) {
    // 404 settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_error_404_text',
        'label'    => esc_html__( '400 Text', 'klenar' ),
        'section'  => '404_page',
        'default'  => esc_html__( '404', 'klenar' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_error_title',
        'label'    => esc_html__( 'Not Found Title', 'klenar' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Page not found', 'klenar' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'klenar_error_desc',
        'label'    => esc_html__( '404 Description Text', 'klenar' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Oops! The page you are looking for does not exist. It might have been moved or deleted', 'klenar' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'klenar' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'klenar' ),
        'priority' => 10,
    ];
    return $fields;

}
add_filter( 'kirki/fields', 'klenar_404_fields' );

/**
 * Added Fields
 */
function klenar_typo_fields( $fields ) {
    // typography settings
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__( 'Body Font', 'klenar' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__( 'Heading h1 Fonts', 'klenar' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__( 'Heading h2 Fonts', 'klenar' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__( 'Heading h3 Fonts', 'klenar' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__( 'Heading h4 Fonts', 'klenar' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__( 'Heading h5 Fonts', 'klenar' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__( 'Heading h6 Fonts', 'klenar' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter( 'kirki/fields', 'klenar_typo_fields' );


/**
 * Added Fields
 */
function klenar_slug_setting( $fields ) {
    // slug settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_sv_slug',
        'label'    => esc_html__( 'Service Slug', 'klenar' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourservices', 'klenar' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'klenar_cases_slug',
        'label'    => esc_html__( 'Project Slug', 'klenar' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourproject', 'klenar' ),
        'priority' => 10,
    ];

    return $fields;
}

add_filter( 'kirki/fields', 'klenar_slug_setting' );

/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function KLENAR_THEME_option( $name ) {
    $value = '';
    if ( class_exists( 'klenar' ) ) {
        $value = Kirki::get_option( klenar_get_theme(), $name );
    }

    return apply_filters( 'KLENAR_THEME_option', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function klenar_get_theme() {
    return 'klenar';
}
