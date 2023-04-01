<?php

namespace BdevsElement\Widget;

Use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined('ABSPATH') || die();

class About extends BDevs_El_Widget
{

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'about';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return __('About', 'bdevselement');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-single-post';
    }

    public function get_keywords()
    {
        return ['info', 'blurb', 'box', 'about', 'content'];
    }

    /**
     * Register content related controls
     */
    protected function register_content_controls()
    {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __('Design Style', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevselement'),
                    'style_2' => __('Style 2', 'bdevselement'),
                    'style_3' => __('Style 3', 'bdevselement'),
                    'style_4' => __('Style 4', 'bdevselement'),
                    'style_5' => __('Style 5', 'bdevselement'),
                    'style_6' => __('Style 6', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'shape_switch',
            [
                'label' => __('Shape on/off', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        $this->end_controls_section();


        // Title & Description
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Sub Title', 'bdevselement'),
                'placeholder' => __('Type Info Box Sub Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('bdevs Info Box Title', 'bdevselement'),
                'placeholder' => __('Type Info Box Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('bdevs info box description goes here', 'bdevselement'),
                'placeholder' => __('Type info box description', 'bdevselement'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __('H1', 'bdevselement'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => __('H2', 'bdevselement'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => __('H3', 'bdevselement'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => __('H4', 'bdevselement'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => __('H5', 'bdevselement'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => __('H6', 'bdevselement'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __('Alignment', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevselement'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bdevselement'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevselement'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();


        // img
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => __('Big Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'small_image',
            [
                'label' => __('Small Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2','style_3','style_5'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();


        // section_author_info
        $this->start_controls_section(
            '_section_author_info',
            [
                'label' => __('Author Info', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1','style_2','style_5'],
                ],
            ]
        );
       
        $this->add_control(
            'author_avatar',
            [
                'label' => __('Author Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'author_name',
            [
                'label' => __('Author Name', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Daniel Martyn', 'bdevselement'),
                'placeholder' => __('Type Name Here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'author_designation',
            [
                'label' => __('Author Designation', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('CEO - Fetoxe', 'bdevselement'),
                'placeholder' => __('Type Name Here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();

        // _section_exp_info
        $this->start_controls_section(
            '_section_exp_info',
            [
                'label' => __('Experience Info', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2','style_4','style_5'],
                ],
            ]
        );

        $this->add_control(
            'exp_num',
            [
                'label' => __('Experience Number', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('20', 'bdevselement'),
                'placeholder' => __('Type number Here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'exp_title',
            [
                'label' => __('Experience Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Years Experience', 'bdevselement'),
                'placeholder' => __('Type phone number', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();

        // _section_phone_info
        $this->start_controls_section(
            '_section_phone_info',
            [
                'label' => __('Phone Info', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['layout-2'],
                ],
            ]
        );

        $this->add_control(
            'phone_num_label',
            [
                'label' => __('Phone Label', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Free Consutacy', 'bdevselement'),
                'placeholder' => __('Type Name Here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'phone_num',
            [
                'label' => __('Phone Number Designation', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('02 (552) 662 0808', 'bdevselement'),
                'placeholder' => __('Type phone number', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();

        // Features List
        $this->start_controls_section(
            '_section_features_list',
            [
                'label' => __('Features List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field condition', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'type',
            [
                'label' => __('Media Type', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __('Icon', 'bdevselement'),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __('Image', 'bdevselement'),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
                'condition' => [
                    'type' => 'image'
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        }

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevselement'),
                'default' => __('Title here', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'desc',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Description', 'bdevselement'),
                'default' => __('Type content here', 'bdevselement'),
                'placeholder' => __('Type content here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        $this->end_controls_section();

        // Button
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true, 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => 'http://elementor.bdevs.net/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Register styles related controls
     */
    protected function register_style_controls()
    {

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Title / Content', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-el-content',
                'exclude' => [
                    'image'
                ]
            ]
        );

        // Title
        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .bdevs-el-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        // Subtitle    
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Subtitle', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-subtitle',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        // description
        $this->add_control(
            '_content_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Description', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .bdevs-el-content p',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );


        $this->end_controls_section();


        // list style content
        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __('List Item', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'item_icon_size',
            [
                'label' => __('Size', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list i' => 'font-size: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'item_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-list ul li span, {{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'selector' => '{{WRAPPER}} .bdevs-el-list ul li span,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list i',
            ]
        );

        $this->add_control(
            'item_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker, {{WRAPPER}} .bdevs-el-list i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'item_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker, {{WRAPPER}} .bdevs-el-list i',
            ]
        );

        $this->add_control(
            'hr_2',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_lits_tabs_button');

        $this->start_controls_tab(
            '_list_tab_button_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'list_item_link_color_2',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_item_border_color_2',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_item_bg_color_2',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_icon_translate_2',
            [
                'label' => __('Icon Translate X', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .bdevs-el-list ul li span i,{{WRAPPER}} .bdevs-el-list ol li::marker,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3, {{WRAPPER}} .bdevs-el-list i' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_list_tab_button_hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'list_link_hover_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3:hover, {{WRAPPER}} .achievement__item i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_border_hover_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .bdevs-el-list ol li::marker,,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3:hover, {{WRAPPER}} .bdevs-el-list i:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i, {{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .bdevs-el-list h3:hover, {{WRAPPER}} .bdevs-el-list i:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_hover_icon_translate',
            [
                'label' => __('Icon Translate X', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .bdevs-el-list ol li::marker,,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3:hover, {{WRAPPER}} .bdevs-el-list i:hover' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .bdevs-el-list ul li:hover span i,{{WRAPPER}} .bdevs-el-list ol li::marker,,{{WRAPPER}} .bdevs-el-list ol li, {{WRAPPER}} .bdevs-el-list h3:hover, {{WRAPPER}} .bdevs-el-list i:hover' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        
        // Button 1 style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs( '_tabs_button' );

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $title = bdevs_element_kses_basic($settings['title']);
        ?>

        <?php if ($settings['design_style'] === 'style_2'):

        if (!empty($settings['bg_image']['url'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
            if ( ! $bg_image ) {
                $bg_image = $settings['bg_image']['url'];
            } 
        }
        if (!empty($settings['small_image']['url'])) {
            $small_image = wp_get_attachment_image_url($settings['small_image']['id'], $settings['thumbnail_size']);
            if ( ! $small_image ) {
                $small_image = $settings['small_image']['url'];
            } 
        }

        if (!empty($settings['author_avatar']['url'])) {
            $author_avatar = wp_get_attachment_image_url($settings['author_avatar']['id'], 'thumbnail');
            if ( ! $author_avatar ) {
                $author_avatar = $settings['author_avatar']['url'];
            } 
        }


        $this->add_render_attribute('title', 'class', 'tp-section-title-two translate-y--10 bdevs-el-title');
        ?>
        <section class="tp-about-area-two pb-50 fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-10">
                        <div class="tp-about-img-two position-relative mr-80">
                            <?php if (!empty($bg_image)): ?>
                            <img src="<?php echo esc_url($bg_image); ?>" class="img-fluid" alt="img not found">
                            <?php endif; ?>

                            <?php if (!empty($small_image)): ?>
                            <img src="<?php echo esc_url($small_image); ?>" class="img-fluid img-second" alt="img not found">
                            <?php endif; ?>

                            <?php if ($settings['exp_num']): ?>
                            <div class="tp-about-img-two-badge">
                                <h3><?php echo bdevs_element_kses_intermediate($settings['exp_num']); ?></h3>
                                <h5><?php echo bdevs_element_kses_intermediate($settings['exp_title']); ?></h5>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tp-about-text-two">
                            <div class="section-title-wrapper mb-20">
                                <?php if ($settings['sub_title']): ?>
                                <h5 class="tp-section-subtitle common-yellow-shape mb-20"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                                <?php endif; ?>

                                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                                ); ?>
                            </div>
                            <?php if ($settings['description']): ?>
                                <p class="mb-40"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>

                            <div class="tp-about-text-two-service">
                                <?php foreach ($settings['slides'] as $slide): 
                                    if ( !empty($slide['image']['id']) ) {
                                        $image = wp_get_attachment_image_url( $slide['image']['id'], 'thumbnail' );
                                        if ( ! $image ) {
                                            $image = $slide['image']['url'];
                                        } 
                                    }
                                ?> 
                                <div class="tp-about-text-two-service-single mb-65">
                                    <div class="tp-about-text-two-service-single-icon">
                                        <span>
                                            <?php if( !empty($slide['selected_icon']) ): ?>
                                            <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                            <?php else: ?>
                                                <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    <div class="tp-about-text-two-service-single-text">
                                        <?php if (!empty($slide['title'])) : ?>
                                        <h4 class="tp-about-text-two-service-title">
                                            <?php echo bdevs_element_kses_basic($slide['title']); ?>
                                        </h4>
                                        <?php endif; ?>
                                        <?php if (!empty($slide['desc'])) : ?>
                                        <p><?php echo bdevs_element_kses_basic($slide['desc']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                            <?php if ($settings['author_name']): ?>
                            <div class="tp-about-text-two-sign pt-10">
                                <?php if (!empty($author_avatar)) : ?>
                                <div class="tp-about-text-two-sign-img">
                                    <img src="<?php echo esc_url($author_avatar); ?>" class="img-fluid" alt="img not found">
                                </div>
                                <?php endif; ?>
                                <div class="tp-about-text-two-sign-text">
                                    <h4 class="tp-about-text-two-sign-name"><?php echo bdevs_element_kses_basic($settings['author_name']); ?></h4>
                                    <?php if ($settings['author_designation']): ?>
                                    <span><?php echo bdevs_element_kses_basic($settings['author_designation']); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_3'):

        if (!empty($settings['bg_image']['url'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
            if ( ! $bg_image ) {
                $bg_image = $settings['bg_image']['url'];
            } 
        }

        if (!empty($settings['small_image']['url'])) {
            $small_image = wp_get_attachment_image_url($settings['small_image']['id'], 'full');
            if ( ! $small_image ) {
                $small_image = $settings['small_image']['url'];
            } 
        }

        $this->add_render_attribute('title', 'class', 'tp-section-title-two color-theme-blue bdevs-el-title');
        ?>

        <section class="tp-about-area-two position-relative">
            <div class="container">
                <div class="row justify-content-xl-between justify-content-md-center">
                    <?php if (!empty($bg_image) || !empty($small_image)): ?>
                    <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-10">
                        <div class="tp-about-img-three pt-40 position-relative mb-30">
                            <?php if (!empty($bg_image)): ?>
                            <img src="<?php echo esc_url($bg_image); ?>" class="img-fluid" alt="img-not-found">
                            <?php endif; ?>

                            <?php if (!empty($small_image)): ?>
                            <img src="<?php echo esc_url($small_image); ?>" class="img-fluid tp-about-img-three-second" alt="img-not-found">
                            <?php endif; ?>

                            <img src="<?php print get_template_directory_uri(); ?>/assets/img/about/about-img-shape-3.png" class="img-fluid tp-about-img-three-third" alt="img-not-found">
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-xxl-6 col-xl-6 col-md-10">
                        <div class="tp-about-text tp-about-text-three mb-30">
                            <div class="section-title-wrapper mb-25">
                                <?php if ($settings['sub_title']): ?>
                                <h5 class="tp-section-subtitle-three mb-20"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                                <?php endif; ?>

                                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                                ); ?>
                            </div>
                            <?php if ($settings['description']): ?>
                                <p class="mb-40"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($settings['slides'])): ?>
                            <div class="row mb-10">
                                <?php foreach ($settings['slides'] as $slide): 
                                    if ( !empty($slide['image']['id']) ) {
                                        $image = wp_get_attachment_image_url( $slide['image']['id'], 'thumbnail' );
                                    }
                                ?> 
                                <div class="col-sm-6">
                                    <div class="tp-about-service mb-35">
                                        <div class="tp-about-service-icon yellow-circle-shape mb-20">
                                            <?php if( !empty($slide['selected_icon']) ): ?>
                                            <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                            <?php else: ?>
                                                <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="tp-about-service-text">
                                            <?php if (!empty($slide['title'])) : ?>
                                            <h4 class="tp-about-service-text-title mb-15">
                                                <?php echo bdevs_element_kses_basic($slide['title']); ?>
                                            </h4>
                                            <?php endif; ?>
                                            <?php if (!empty($slide['desc'])) : ?>
                                            <p><?php echo bdevs_element_kses_basic($slide['desc']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>

                            <?php if ( !empty($settings['button_text']) ) : ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="tp-about-three-btn">
                                        <a href="<?php echo esc_url($settings['button_link']); ?>" class="theme-btn"><i class="flaticon-enter"></i> <?php echo esc_html($settings['button_text']);?></a>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_4'):
        if (!empty($settings['bg_image']['url'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
            if ( ! $bg_image ) {
                $bg_image = $settings['bg_image']['url'];
            } 
        }

        $this->add_render_attribute('title', 'class', 'tp-section-title-two color-theme-blue bdevs-el-title');
        ?>

        <section class="tp-choose-area-three position-relative">
            <div class="tp-choose-area-three-img">
                <?php if (!empty($bg_image)): ?>
                <img src="<?php echo esc_url($bg_image); ?>" alt="img-not-found">
                <?php endif; ?>
                <?php if ($settings['exp_num']): ?>
                <div class="tp-choose-three-year tp-choose-three-year-responsive mb-50">
                    <div class="tp-choose-three-year-inner">
                        <h3><?php echo bdevs_element_kses_intermediate($settings['exp_num']); ?></h3>
                        <h4><?php echo bdevs_element_kses_intermediate($settings['exp_title']); ?></h4>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="container">
                <div class="row align-items-end justify-content-center">
                    <?php if ($settings['exp_num']): ?>
                    <div class="col-xl-6 text-end d-xl-block d-none">
                        <div class="tp-choose-three-year mb-50">
                            <div class="tp-choose-three-year-inner">
                                <h3><?php echo bdevs_element_kses_intermediate($settings['exp_num']); ?></h3>
                                <h4><?php echo bdevs_element_kses_intermediate($settings['exp_title']); ?></h4>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-xl-6 col-lg-10">
                        <div class="tp-choose-three">
                            <div class="section-title-wrapper mb-25">
                                <?php if ($settings['sub_title']): ?>
                                <h5 class="tp-section-subtitle-three mb-20"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                                <?php endif; ?>

                                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                                ); ?>
                            </div>
                            <?php if ($settings['description']): ?>
                                <p class="mb-45"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>

                            <div class="row mb-10">
                                <?php foreach ($settings['slides'] as $slide): 
                                    if ( !empty($slide['image']['url']) ) {
                                        $image = wp_get_attachment_image_url( $slide['image']['id'], 'thumbnail' );
                                        if ( ! $image ) {
                                            $image = $slide['image']['url'];
                                        } 
                                    }
                                ?> 
                                <div class="col-sm-6">
                                    <div class="tp-about-service mb-55">
                                        <div class="tp-about-service-icon yellow-circle-shape mb-20">
                                            <?php if( !empty($slide['selected_icon']) ): ?>
                                            <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                            <?php else: ?>
                                                <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="tp-about-service-text">
                                            <?php if (!empty($slide['title'])) : ?>
                                            <h4 class="tp-about-service-text-title mb-15">
                                                <?php echo bdevs_element_kses_basic($slide['title']); ?>
                                            </h4>
                                            <?php endif; ?>
                                            <?php if (!empty($slide['desc'])) : ?>
                                            <p><?php echo bdevs_element_kses_basic($slide['desc']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_5'):
        if (!empty($settings['bg_image']['url'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
            if ( ! $bg_image ) {
                $bg_image = $settings['bg_image']['url'];
            } 
        }
        if (!empty($settings['small_image']['url'])) {
            $small_image = wp_get_attachment_image_url($settings['small_image']['id'], $settings['thumbnail_size']);
            if ( ! $small_image ) {
                $small_image = $settings['small_image']['url'];
            } 
        }

        if (!empty($settings['author_avatar']['url'])) {
            $author_avatar = wp_get_attachment_image_url($settings['author_avatar']['id'], 'thumbnail');
            if ( ! $author_avatar ) {
                $author_avatar = $settings['author_avatar']['url'];
            } 
        }

        $this->add_render_attribute('title', 'class', 'tp-section-title bdevs-el-title');
        ?>

        <section class="tp-about-area tp-abouts-area position-relative fix">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="tp-about-img-two tp-abouts-img-two position-relative mr-80">
                            <?php if (!empty($bg_image)): ?>
                            <img src="<?php echo esc_url($bg_image); ?>" class="img-fluid" alt="img not found">
                            <?php endif; ?>

                            <?php if (!empty($small_image)): ?>
                            <img src="<?php echo esc_url($small_image); ?>" class="img-fluid img-second" alt="img not found">
                            <?php endif; ?>

                            <?php if ($settings['exp_num']): ?>
                            <div class="tp-about-img-two-badge">
                                <h3><?php echo bdevs_element_kses_intermediate($settings['exp_num']); ?></h3>
                                <h5><?php echo bdevs_element_kses_intermediate($settings['exp_title']); ?></h5>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-10">
                        <div class="tp-about-text tp-about-inner-page-text z-index">
                            <div class="section-title-wrapper mb-30">
                                <?php if ($settings['sub_title']): ?>
                                <h5 class="tp-section-subtitle common-yellow-shape mb-20"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                                <?php endif; ?>

                                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                                ); ?>
                            </div>
                            <?php if ($settings['description']): ?>
                                <p class="mb-40"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['slides'])): ?>
                            <div class="row mb-10">
                                <?php foreach ($settings['slides'] as $slide): 
                                    if ( !empty($slide['image']['url']) ) {
                                        $image = wp_get_attachment_image_url( $slide['image']['id'], 'thumbnail' );
                                        if ( ! $image ) {
                                            $image = $slide['image']['url'];
                                        } 
                                    }
                                ?>    
                                <div class="col-sm-6">
                                    <div class="tp-about-service mb-30">
                                        <div class="tp-about-service-icon yellow-circle-shape mb-15">
                                            <?php if( !empty($slide['selected_icon']) ): ?>
                                            <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                            <?php else: ?>
                                                <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="tp-about-service-text">
                                            <?php if (!empty($slide['title'])) : ?>
                                            <h4 class="tp-about-service-text-title mb-15 hover-theme-color">
                                                <?php echo bdevs_element_kses_basic($slide['title']); ?>
                                            </h4>
                                            <?php endif; ?>
                                            <?php if (!empty($slide['desc'])) : ?>
                                            <p><?php echo bdevs_element_kses_basic($slide['desc']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
 
                            <div class="row">
                                <?php if ($settings['phone_num']): ?>
                                <div class="col-sm-6">
                                    <div class="tp-about-number mb-30">
                                        <div class="tp-about-number-icon">
                                            <i class="flaticon-phone-call-1"></i>
                                        </div>
                                        <div class="tp-about-number-text">
                                            <?php if ($settings['phone_num_label']): ?>
                                            <span><?php echo bdevs_element_kses_basic($settings['phone_num_label']); ?></span>
                                            <?php endif; ?>

                                            <?php if ($settings['phone_num']): ?>
                                            <a href="tel:<?php echo ($settings['phone_num']); ?>"><?php echo bdevs_element_kses_basic($settings['phone_num']); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if ($settings['author_name']): ?>
                                <div class="col-sm-6">
                                    <div class="tp-about-author mb-30">
                                        <?php if (!empty($author_avatar)) : ?>
                                        <div class="tp-about-author-img">
                                            <img src="<?php echo esc_url($author_avatar); ?>" class="img-fluid" alt="img not found">
                                        </div>
                                        <?php endif; ?>
                                        <div class="tp-about-author-text">
                                            <?php if ($settings['author_name']): ?>
                                            <h4 class="tp-about-author-text-title heading-color-black"><?php echo bdevs_element_kses_basic($settings['author_name']); ?></h4>
                                            <?php endif; ?>

                                            <?php if ($settings['author_designation']): ?>
                                            <span class="heading-color-black"><?php echo bdevs_element_kses_basic($settings['author_designation']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php else:
        if (!empty($settings['bg_image']['url'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
            if ( ! $bg_image ) {
                $bg_image = $settings['bg_image']['url'];
            } 
        } 

        if (!empty($settings['author_avatar']['url'])) {
            $author_avatar = wp_get_attachment_image_url($settings['author_avatar']['id'], 'thumbnail');
            if ( ! $author_avatar ) {
                $author_avatar = $settings['author_avatar']['url'];
            } 
        }

        $this->add_render_attribute('title', 'class', 'tp-section-title bdevs-el-title');

        ?>

        <section class="tp-about-area position-relative pt-120 pb-90 fix">
            <?php if (!empty($settings['shape_switch'])) : ?>
            <div class="tp-about-shape">
                <img src="<?php print get_template_directory_uri(); ?>/assets/img/about/about-shape-1.jpg" class="img-fluid" alt="img not found">
            </div>
            <?php endif; ?>
            <div class="container">
                <div class="row justify-content-xl-between justify-content-md-center">
                    <?php if (!empty($bg_image)): ?>
                    <div class="col-xl-5 col-12">
                        <div class="tp-about-img z-index">
                            <img src="<?php echo esc_url($bg_image); ?>" alt="img not found">
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-xl-6 col-md-10">
                        <div class="tp-about-text z-index">
                            <div class="section-title-wrapper mb-30">
                                <?php if ($settings['sub_title']): ?>
                                <h5 class="tp-section-subtitle common-yellow-shape mb-20"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                                <?php endif; ?>

                                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                                ); ?>
                            </div>
                            <?php if ($settings['description']): ?>
                                <p class="mb-40"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['slides'])): ?>
                            <div class="row mb-10">
                                <?php foreach ($settings['slides'] as $slide): 
                                    if ( !empty($slide['image']['url']) ) {
                                        $image = wp_get_attachment_image_url( $slide['image']['id'], 'thumbnail' );
                                        if ( ! $image ) {
                                            $image = $slide['image']['url'];
                                        } 
                                    }
                                ?>    
                                <div class="col-sm-6">
                                    <div class="tp-about-service mb-30">
                                        <div class="tp-about-service-icon yellow-circle-shape mb-15">
                                            <?php if( !empty($slide['selected_icon']) ): ?>
                                            <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                            <?php else: ?>
                                                <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="tp-about-service-text">
                                            <?php if (!empty($slide['title'])) : ?>
                                            <h4 class="tp-about-service-text-title mb-15 hover-theme-color">
                                                <?php echo bdevs_element_kses_basic($slide['title']); ?>
                                            </h4>
                                            <?php endif; ?>
                                            <?php if (!empty($slide['desc'])) : ?>
                                            <p><?php echo bdevs_element_kses_basic($slide['desc']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
 
                            <div class="row">
                                <?php if ($settings['author_name']): ?>
                                <div class="col-sm-6">
                                    <div class="tp-about-author mb-30">
                                        <?php if (!empty($author_avatar)) : ?>
                                        <div class="tp-about-author-img">
                                            <img src="<?php echo esc_url($author_avatar); ?>" class="img-fluid" alt="img not found">
                                        </div>
                                        <?php endif; ?>
                                        <div class="tp-about-author-text">
                                            <?php if ($settings['author_name']): ?>
                                            <h4 class="tp-about-author-text-title"><?php echo bdevs_element_kses_basic($settings['author_name']); ?></h4>
                                            <?php endif; ?>

                                            <?php if ($settings['author_designation']): ?>
                                            <span><?php echo bdevs_element_kses_basic($settings['author_designation']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if ($settings['phone_num']): ?>
                                <div class="col-sm-6">
                                    <div class="tp-about-number mb-30">
                                        <div class="tp-about-number-icon">
                                            <i class="flaticon-phone-call-1"></i>
                                        </div>
                                        <div class="tp-about-number-text">
                                            <?php if ($settings['phone_num_label']): ?>
                                            <span><?php echo bdevs_element_kses_basic($settings['phone_num_label']); ?></span>
                                            <?php endif; ?>

                                            <?php if ($settings['phone_num']): ?>
                                            <a href="tel:<?php echo ($settings['phone_num']); ?>"><?php echo bdevs_element_kses_basic($settings['phone_num']); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>
        <?php
    }
}
