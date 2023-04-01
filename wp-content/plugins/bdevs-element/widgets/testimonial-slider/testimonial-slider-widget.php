<?php

namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined('ABSPATH') || die();

class Testimonial_Slider extends BDevs_El_Widget
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
        return 'testimonial_slider';
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
        return __('Testimonial Slider', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/slider/';
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
        return 'eicon-blockquote';
    }

    public function get_keywords()
    {
        return ['slider', 'testimonial', 'gallery', 'carousel'];
    }

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
            ]
        );

        $this->end_controls_section();


        // section title
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
                'condition' => [
                    'design_style' => ['style_10']
                ],
                'dynamic' => [
                    'active' => true,
                ]
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

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('Image', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Slides', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field condition', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevselement')
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('profile Image', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'message',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'default' => __('Erat dapibus interdum consequat eleifend', 'bdevselement'),
                'placeholder' => __('Message', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'client_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'default' => __('Rich Gragory', 'bdevselement'),
                'placeholder' => __('Client Name', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'default' => __('CEO of Klenar', 'bdevselement'),
                'placeholder' => __('Designation Name', 'bdevselement'),
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
                'title_field' => '<# print(client_name || "Carousel Item"); #>',
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
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        $this->end_controls_section();

        // _section_cf7
        $this->start_controls_section(
            '_section_cf7',
            [
                'label' => bdevs_element_is_cf7_activated() ? __('Contact Form 7', 'bdevselement') : __('Missing Notice', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2']
                ],
            ]
        );

        if (!bdevs_element_is_cf7_activated()) {
            $this->add_control(
                '_cf7_missing_notice',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => sprintf(
                        __('Hello %2$s, looks like %1$s is missing in your site. Please click on the link below and install/activate %1$s. Make sure to refresh this page after installation or activation.', 'bdevselement'),
                        '<a href="' . esc_url(admin_url('plugin-install.php?s=Contact+Form+7&tab=search&type=term'))
                        . '" target="_blank" rel="noopener">Contact Form 7</a>',
                        bdevs_element_get_current_user_display_name()
                    ),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

            $this->add_control(
                '_cf7_install',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<a href="' . esc_url(admin_url('plugin-install.php?s=Contact+Form+7&tab=search&type=term')) . '" target="_blank" rel="noopener">Click to install or activate Contact Form 7</a>',
                ]
            );
            $this->end_controls_section();
            return;
        }

        $this->add_control(
            'form_id',
            [
                'label' => __('Select Your Form', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => ['' => __('', 'bdevselement')] + \bdevs_element_get_cf7_forms(),
            ]
        );

        $this->add_control(
            'html_class',
            [
                'label' => __('HTML Class', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'description' => __('Add CSS custom class to the form.', 'bdevselement'),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

       $this->add_control(
            'ts_slider_autoplay',
            [
                'label' => esc_html__( 'Autoplay', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'bdevselement' ),
                'label_off' => esc_html__( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'default' => 'no'
            ]
        );

        $this->add_control(
            'ts_slider_speed',
            [
               'label' => esc_html__( 'Slider Speed', 'bdevselement' ),
               'type' => Controls_Manager::NUMBER,
               'placeholder' => esc_html__( 'Enter Slider Speed', 'bdevselement' ),
               'default' => '5000',
               // 'default' => 5000,
               'condition' => ["ts_slider_autoplay" => ['yes']],
            ]
          );

        $this->add_control(
        'ts_slider_nav_show',
            [
            'label' => esc_html__( 'Nav show', 'bdevselement' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'bdevselement' ),
            'label_off' => esc_html__( 'No', 'bdevselement' ),
            'return_value' => 'yes',
            'default' => 'yes'
            ]
        );
        $this->add_control(
         'ts_slider_dot_nav_show',
             [
             'label' => esc_html__( 'Dot nav', 'bdevselement' ),
             'type' => Controls_Manager::SWITCHER,
             'label_on' => esc_html__( 'Yes', 'bdevselement' ),
             'label_off' => esc_html__( 'No', 'bdevselement' ),
             'return_value' => 'yes',
             'default' => 'yes'
             ]
         );

        $this->end_controls_section();


    }

    protected function register_style_controls(){
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


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // ================
        $show_navigation   =   $settings["ts_slider_nav_show"]=="yes"?true:false;
        $auto_nav_slide    =   $settings['ts_slider_autoplay'];
        $dot_nav_show      =   $settings['ts_slider_dot_nav_show'];
        $ts_slider_speed   =   $settings['ts_slider_speed'] ? $settings['ts_slider_speed'] : '5000';

        $slide_controls    = [
            'show_nav'=>$show_navigation, 
            'dot_nav_show'=>$dot_nav_show, 
            'auto_nav_slide'=>$auto_nav_slide, 
            'ts_slider_speed'=>$ts_slider_speed, 
        ];
   
        $slide_controls = \json_encode($slide_controls); 
        // ================


        if (empty($settings['slides'])) {
            return;
        }


        ?>
        <?php if ($settings['design_style'] == 'style_2'): 
        if (!empty($settings['image']['url'])) {
            $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
            if ( ! $image ) {
                $image = $settings['image']['url'];
            } 
        }

        $this->add_render_attribute('title', 'class', 'tp-section-title-two bdevs-el-title');
        $title = bdevs_element_kses_basic($settings['title']);
        ?>
        <section class="tp-testimonial-area-two position-relative">
            <div class="tp-testimonial-area-two-shape"></div>
            <div class="container position-relative">
                <div class="tp-testimonial-title-wrapper pt-110">
                    <?php if (!empty($settings['sub_title'])): ?>
                        <h5 class="tp-section-subtitle common-yellow-shape mb-20 bdevs-el-subtitle"><?php echo bdevs_element_kses_basic($settings['sub_title']); ?></h5>
                    <?php endif; ?>

                    <?php printf('<%1$s %2$s>%3$s</%1$s>',
                        tag_escape($settings['title_tag']),
                        $this->get_render_attribute_string('title'),
                        $title
                    ); ?>

                    <?php if (!empty($settings['description'])): ?>
                        <p><?php echo bdevs_element_kses_basic($settings['description']); ?></p>
                    <?php endif; ?>

                </div>
            </div>
            <div class="tp-testimonial-divide">
                <?php if (!empty($settings['slides'])): ?>
                <div class="tp-testimonial-two-wrapper z-index">
                    <div class="tp-testimonial-two-active swiper-container common-dots ">
                        <div class="swiper-wrapper pb-35">
                            <?php foreach ($settings['slides'] as $slide) :
                                if (!empty($slide['image']['url'])) {
                                    $image = wp_get_attachment_image_url($slide['image']['id'], 'thumbnail');
                                    if ( ! $image ) {
                                        $image = $slide['image']['url'];
                                    } 
                                }
                            ?>
                            <div class="tp-testimonial-two position-relative swiper-slide mb-30">
                                <div class="tp-testimonial-two-author mb-20">
                                    <?php if (!empty($image)): ?>
                                    <div class="tp-testimonial-two-author-img">
                                        <img src="<?php print esc_url($slide['image']['url']); ?>" class="img-fluid" alt="img not found">
                                    </div>
                                    <?php endif; ?>
                                    <div class="tp-testimonial-two-author-text">
                                        <?php if ($slide['designation_name']): ?>
                                        <span>
                                            <?php echo bdevs_element_kses_basic($slide['designation_name']); ?>
                                        </span>
                                        <?php endif; ?>

                                        <?php if ($slide['client_name']): ?>
                                        <h4 class="tp-testimonial-two-name"> 
                                            <?php echo bdevs_element_kses_basic($slide['client_name']); ?>
                                        </h4>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if ($slide['message']): ?>
                                    <p><?php echo bdevs_element_kses_basic($slide['message']); ?></p>
                                <?php endif; ?>
                                <div class="tp-testimonial-two-qoute">
                                    <i class="fal fa-quote-left"></i>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- If we need pagination -->
                        <div class="swiper-pagination-testimonial slide-dots "></div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (!empty($settings['form_id'])) : ?>
                <div class="tp-testimonial-two-form pt-120 z-index" data-background="<?php print esc_url($bg_image); ?>">
                    <div class="text-start tp-testimonial-two-form-wrapper">
                        <?php
                            if (!empty($settings['form_id'])) {
                                echo bdevs_element_do_shortcode('contact-form-7', [
                                    'id' => $settings['form_id'],
                                    'html_class' => 'bdevs-cf7-form ' . bdevs_element_sanitize_html_class_param($settings['html_class']),
                                ]);
                            }
                        ?>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </section>

    <?php elseif ($settings['design_style'] == 'style_3'): ?>
        <section class="tp-testimonial-area-three">
            <div class="container">
                <div class="tp-testimonial-three-shadow common-dots">
                    <div class="tp-testimonial-three-active swiper-container">
                        <div class="swiper-wrapper">
                            <?php foreach ($settings['slides'] as $slide) :
                                if (!empty($slide['image']['url'])) {
                                    $image = wp_get_attachment_image_url($slide['image']['id'], 'thumbnail');
                                    if ( ! $image ) {
                                        $image = $slide['image']['url'];
                                    } 
                                }
                            ?>

                            <div class="tp-testimonial-two position-relative swiper-slide">
                                <div class="tp-testimonial-two-author mb-20">
                                    <?php if (!empty($image)): ?>
                                    <div class="tp-testimonial-two-author-img">
                                        <img src="<?php print esc_url($slide['image']['url']); ?>" class="img-fluid" alt="img not found">
                                    </div>
                                    <?php endif; ?>
                                    <div class="tp-testimonial-two-author-text">
                                        <?php if ($slide['designation_name']): ?>
                                        <span>
                                            <?php echo bdevs_element_kses_basic($slide['designation_name']); ?>
                                        </span>
                                        <?php endif; ?>

                                        <?php if ($slide['client_name']): ?>
                                        <h4 class="tp-testimonial-two-name"> 
                                            <?php echo bdevs_element_kses_basic($slide['client_name']); ?>
                                        </h4>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if ($slide['message']): ?>
                                    <p><?php echo bdevs_element_kses_basic($slide['message']); ?></p>
                                <?php endif; ?>
                                <div class="tp-testimonial-two-qoute">
                                    <i class="fal fa-quote-left"></i>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination-testimonial slide-dots "></div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] == 'style_4'): 
        if (!empty($settings['image']['url'])) {
            $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
            if ( ! $image ) {
                $image = $settings['image']['url'];
            } 
        }

        $this->add_render_attribute('title', 'class', 'tp-section-title mb-20 heading-color-black bdevs-el-title');
        $title = bdevs_element_kses_basic($settings['title']);
    ?>
        <section class="tp-testimonial-area position-relative">
            <?php if (!empty($settings['shape_switch'])) : ?>
            <div class="tp-testimonial-shape tp-about-testimonial-shape"></div>
            <?php endif; ?>
            <div class="container">
                <div class="tp-testimonial-bg white-bg z-index">
                    <div class="row align-items-center">
                        <?php if (!empty($image)): ?>
                        <div class="col-xl-5 col-lg-6">
                            <div class="tp-testimonial-img">
                                <img src="<?php print esc_url($image); ?>" alt="img bot found">
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-xl-7 col-lg-6">
                            <div class="tp-testimonial tp-abouts-testimonial ml-70">
                                <div class="section-title-wrapper">
                                    <?php if (!empty($settings['sub_title'])): ?>
                                        <h5 class="tp-section-subtitle common-yellow-shape mb-20 heading-color-black bdevs-el-subtitle"><?php echo bdevs_element_kses_basic($settings['sub_title']); ?></h5>
                                    <?php endif; ?>

                                    <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                    ); ?>

                                    <?php if (!empty($settings['description'])): ?>
                                        <p><?php echo bdevs_element_kses_basic($settings['description']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="tp-testimonial-active swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($settings['slides'] as $slide) :
                                            if (!empty($slide['image']['url'])) {
                                                $image = wp_get_attachment_image_url($slide['image']['id'], 'thumbnail');
                                                if ( ! $image ) {
                                                    $image = $slide['image']['url'];
                                                } 
                                            }
                                        ?>
                                        <div class="tp-testimonial-single swiper-slide z-index">
                                            <?php if ($slide['message']): ?>
                                                <p class="mb-45"><?php echo bdevs_element_kses_basic($slide['message']); ?></p>
                                            <?php endif; ?>
                                            <div class="tp-testimonial-author">
                                                <?php if (!empty($image)): ?>
                                                <div class="tp-testimonial-author-img">
                                                    <img src="<?php print esc_url($slide['image']['url']); ?>" class="img-fluid" alt="img not found">
                                                </div>
                                                <?php endif; ?>
                                                <div class="tp-testimonial-author-text">
                                                    <?php if ($slide['client_name']): ?>
                                                    <h4 class="tp-testimonial-author-text-name"> 
                                                        <?php echo bdevs_element_kses_basic($slide['client_name']); ?>
                                                    </h4>
                                                    <?php endif; ?>
                                                    <?php if ($slide['designation_name']): ?>
                                                    <span class="tp-testimonial-author-text-designation">
                                                        <?php echo bdevs_element_kses_basic($slide['designation_name']); ?>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="tp-testimonial-qoute">
                                                <img src="<?php print get_template_directory_uri(); ?>/assets/img/icon/test-qoute.png" alt="img not found">
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="tp-testimonial-slider-arrow tp-testimonial-slider-arrow-s">
                        <div class="testimonial-button-next slide-next"><i class="far fa-chevron-right"></i></div>
                        <div class="testimonial-button-prev slide-prev"><i class="far fa-chevron-left"></i></div>
                    </div>
                </div>
            </div>
        </section>
    <?php else:
        if (!empty($settings['image']['url'])) {
            $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
            if ( ! $image ) {
                $image = $settings['image']['url'];
            } 
        }

        $this->add_render_attribute('title', 'class', 'tp-section-title mb-20 bdevs-el-title');
        $title = bdevs_element_kses_basic($settings['title']);
        ?>

        <section class="tp-testimonial-area position-relative">
            <div class="container">
                <div class="tp-testimonial-bg white-bg z-index">
                    <div class="row align-items-center">
                        <?php if (!empty($image)): ?>
                        <div class="col-xl-5 col-lg-6">
                            <div class="tp-testimonial-img">
                                <img src="<?php print esc_url($image); ?>" alt="img bot found">
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="col-xl-7 col-lg-6">
                            <div class="tp-testimonial ml-70">
                                <div class="section-title-wrapper">
                                    <?php if (!empty($settings['sub_title'])): ?>
                                        <h5 class="tp-section-subtitle common-yellow-shape mb-20 bdevs-el-subtitle"><?php echo bdevs_element_kses_basic($settings['sub_title']); ?></h5>
                                    <?php endif; ?>

                                    <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                    ); ?>

                                    <?php if (!empty($settings['description'])): ?>
                                        <p><?php echo bdevs_element_kses_basic($settings['description']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($settings['slides'])): ?>
                                <div class="tp-testimonial-active swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($settings['slides'] as $slide) :
                                        if (!empty($slide['image']['url'])) {
                                            $image = wp_get_attachment_image_url($slide['image']['id'], 'thumbnail');
                                            if ( ! $image ) {
                                                $image = $slide['image']['url'];
                                            } 
                                        }
                                        ?>
                                        <div class="tp-testimonial-single swiper-slide z-index">
                                            <?php if ($slide['message']): ?>
                                                <p class="mb-45"><?php echo bdevs_element_kses_basic($slide['message']); ?></p>
                                            <?php endif; ?>
                                            <div class="tp-testimonial-author">
                                                <?php if (!empty($image)): ?>
                                                <div class="tp-testimonial-author-img">
                                                    <img src="<?php print esc_url($slide['image']['url']); ?>" class="img-fluid" alt="img not found">
                                                </div>
                                                <?php endif; ?>
                                                <div class="tp-testimonial-author-text">
                                                    <?php if ($slide['client_name']): ?>
                                                    <h4 class="tp-testimonial-author-text-name"> 
                                                        <?php echo bdevs_element_kses_basic($slide['client_name']); ?>
                                                    </h4>
                                                    <?php endif; ?>
                                                    <?php if ($slide['designation_name']): ?>
                                                    <span class="tp-testimonial-author-text-designation">
                                                        <?php echo bdevs_element_kses_basic($slide['designation_name']); ?>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="tp-testimonial-qoute">
                                                <img src="<?php print get_template_directory_uri(); ?>/assets/img/icon/test-qoute.png" alt="img not found">
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="tp-testimonial-slider-arrow">
                        <div class="testimonial-button-next slide-next"><i class="far fa-chevron-right"></i></div>
                        <div class="testimonial-button-prev slide-prev"><i class="far fa-chevron-left"></i></div>
                    </div>
                </div>
            </div>
            <?php if (!empty($settings['shape_switch'])) : ?>
            <div class="tp-testimonial-shape"></div>
            <?php endif; ?>
        </section>
    <?php endif; ?>
        <?php
    }
}
