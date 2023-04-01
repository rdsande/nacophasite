<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Service extends BDevs_El_Widget {

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'service';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Service', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net//widgets/icon-box/';
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-preview-medium';
    }

    public function get_keywords() {
        return [ 'service', 'list', 'icon' ];
    }

    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control( 
            'design_style',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevselement' ),
                    'style_2' => __( 'Style 2', 'bdevselement' ),
                    'style_3' => __( 'Style 3', 'bdevselement' ),
                    'style_4' => __( 'Style 4', 'bdevselement' ),
                    'style_5' => __( 'Style 5', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'servic_border_enable',
            [
                'label' => __('Box Border on/off', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'design_style' => ['style_5']
                ],
            ]
        );

        $this->end_controls_section(); 


        $this->start_controls_section(
            '_section_main_image',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_4']
                ],
            ]
        );

        $this->add_control(
            'sv_image',
            [
                'label' => __( 'Main Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
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
                'name' => 'sv_thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                ]
            ]
        );

        $this->end_controls_section();

        // section title
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Heading', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1','style_4']
                ],
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __( 'Sub Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'bdevs Info Box Sub Title', 'bdevselement' ),
                'placeholder' => __( 'Type Info Box Sub Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'bdevs Info Box Title', 'bdevselement' ),
                'placeholder' => __( 'Type Info Box Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Desccription', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Heading Desccription Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'bdevselement' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'bdevselement' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'bdevselement' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'bdevselement' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'bdevselement' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'bdevselement' ),
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
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
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


        // _section_icon

        $this->start_controls_section(
            '_section_icon',
            [
                'label' => __( 'Services List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __( 'Field condition', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevselement' ),
                    'style_2' => __( 'Style 2', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'bg_image',
            [
                'label' => __( 'BG Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_2'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'type',
            [
                'label' => __( 'Media Type', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __( 'Icon', 'bdevselement' ),
                        'icon' => 'far fa-smile',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'bdevselement' ),
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
                'label' => __( 'Image', 'bdevselement' ),
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

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        } 
        else {
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
                'label' => __( 'Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Features Title', 'bdevselement' ),
                'placeholder' => __( 'Type Icon Box Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $repeater->add_control(
            'description',
            [
                'label' => __( 'Description', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Description here ...', 'bdevselement' ),
                'placeholder' => __( 'Icon Description', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Read More', 'bdevselement' ),
                'placeholder' => __( 'Button Text', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_1','style_2'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            's_url',
            [
                'label' => __( 'URL', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'URL Here', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_1','style_2'],
                ], 
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
                    ]
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'bg_thumbnail',
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
            ]
        );

        $this->add_responsive_control(
            'align_slide',
            [
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'toggle' => true,
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {
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

        // services item 
        $this->start_controls_section(
            '_box_section_style_content',
            [
                'label' => __( 'Box Title / Content', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
            '_box_content_padding',
            [
                'label' => __( 'Content Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'box_content_background',
                'selector' => '{{WRAPPER}} .bdevs-box-content',
                'exclude' => [
                    'image'
                ]
            ]
        );
        
        // Box Title
        $this->add_control(
            '_box_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );
        
        $this->add_responsive_control(
            '_box_title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            '_box_title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'boxtitle',
                'selector' => '{{WRAPPER}} .bdevs-box-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );
        
        // description
        $this->add_control(
            '_box_content_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Description', 'bdevselement' ),
                'separator' => 'before'
            ]
        );
        
        $this->add_responsive_control(
            '_box_description_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            '_box_description_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'boxdescription',
                'selector' => '{{WRAPPER}} .bdevs-box-content p',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );
        
        
        $this->end_controls_section();


    }

    /**
     * Render widget output on the frontend.
     *
     * Used to generate the final HTML displayed on the frontend.
     *
     * Note that if skin is selected, it will be rendered by the skin itself,
     * not the widget.
     *
     * @since 1.0.0
     * @access public
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>

        <?php if ( $settings['design_style'] === 'style_2' ): ?>

        <section class="tp-cta-area-two">
            <div class="tp-cta-area-two-bg mt-0">
                <div class="row">
                    <?php foreach ( $settings['slides'] as $key => $slide ):
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                        }
                    ?>  
                    <div class="col-lg-4 col-md-4">
                        <div class="tp-cta-two mb-30 bdevs-el-content">
                            <div class="tp-cta-two-icon">
                            <?php if( !empty($slide['selected_icon']) ): ?>
                            <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                            <?php else: ?>
                                <img src="<?php echo esc_url($image); ?>" alt="icon" />
                            <?php endif; ?>
                            </div>
                            <div class="tp-cta-two-text fix">
                                <?php if( $slide['title'] ) : ?>
                                <h4 class="tp-cta-two-text-title bdevs-el-title">
                                    <a href="<?php echo esc_url( $slide['s_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a>
                                </h4>
                                <?php endif; ?>

                                <?php if( $slide['description'] ): ?>
                                <p><?php echo bdevs_element_kses_intermediate( $slide['description'] ); ?></p>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>        

        <?php elseif ( $settings['design_style'] === 'style_3' ): ?>

        <section class="tp-quality-service-area">
            <div class="container">
                <div class="row mb-35">
                    <?php foreach ( $settings['slides'] as $key => $slide ):
                        if (!empty($slide['bg_image']['id'])) {
                            $bg_image = wp_get_attachment_image_url( $slide['bg_image']['id'], $settings['bg_thumbnail_size'] );
                        }
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url( $slide['image']['id'], 'thumbnail' );
                        }
                    ?>  
                    <div class="col-xl-3 col-md-6">
                        <div class="tp-quality mb-30">
                            <?php if( !empty($bg_image) ): ?>
                            <div class="tp-quality-img">
                                <img src="<?php print esc_url($bg_image); ?>" class="img-fluid" alt="img not found">
                            </div>
                            <?php endif; ?>
                            <div class="tp-quality-text text-center">
                                <div class="tp-quality-text-icon mb-10">
                                    <a href="<?php echo esc_url( $slide['s_url'] ); ?>">
                                        <?php if( !empty($slide['selected_icon']) ): ?>
                                        <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'tp-quality-text-icon1'] ); ?>
                                        <?php else: ?>
                                            <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                        <?php endif; ?>

                                        <i class="fal fa-plus tp-quality-text-icon2"></i>
                                    </a>
                                </div>
                                <?php if( $slide['description'] ): ?>
                                <span><?php echo bdevs_element_kses_intermediate( $slide['description'] ); ?></span>
                                <?php endif; ?>
                                <?php if( $slide['title'] ): ?>
                                <h4 class="tp-quality-text-title m-0"><a href="<?php echo esc_url( $slide['s_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a></h4>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_4' ): 
            $title = bdevs_element_kses_basic( $settings['title' ] );
            $this->add_render_attribute( 'title', 'class', 'tp-section-title-two' );

            if (!empty($settings['sv_image']['id'])) {
                $sv_image = wp_get_attachment_image_url( $settings['sv_image']['id'], $settings['sv_thumbnail_size'] );
            }
        ?>
        <section class="tp-feature-area-two">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title-wrapper-two mb-45">
                            <?php if ($settings['sub_title']) : ?>
                            <h5 class="tp-section-subtitle common-yellow-shape mb-20 bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                            <?php endif; ?>
                            
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                    </div>

                    <?php if ($settings['description']) : ?>
                    <div class="col-lg-6">
                        <div class="tp-feature-title-desc mb-45">
                            <p <?php $this->print_render_attribute_string('details'); ?>><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="row justify-content-between align-items-xl-center">
                    <?php if( !empty($sv_image) ) : ?>
                    <div class="col-xl-5 col-lg-6">
                        <div class="tp-feature-img mb-30">
                            <img src="<?php echo esc_url($sv_image); ?>" alt="img not found">
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-xl-6 col-lg-6">
                        <div class="row">
                            <?php foreach ( $settings['slides'] as $key => $slide ):
                                if (!empty($slide['image']['id'])) {
                                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                }
                            ?>
                            <div class="col-sm-6">
                                <div class="tp-feature mb-45">
                                    <div class="tp-feature-icon yellow-circle-shape mb-20">
                                        <?php if( !empty($slide['selected_icon']) ): ?>
                                        <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                        <?php else: ?>
                                            <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                        <?php endif; ?>
                                    </div>

                                    <?php if( !empty($slide['title']) ) : ?>
                                    <h4 class="tp-feature-title mb-15">
                                        <a href="<?php echo esc_url( $slide['s_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a>
                                    </h4>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['description']) ): ?>
                                    <p><?php echo bdevs_element_kses_intermediate( $slide['description'] ); ?></p>
                                    <?php endif; ?>

                                    <?php if( !empty($slide['button_text']) ): ?>
                                    <div class="tp-services-text-link mt-15">
                                        <a href="<?php echo esc_url( $slide['s_url'] ); ?>"><i class="flaticon-enter"></i> <?php echo bdevs_element_kses_intermediate( $slide['button_text'] ); ?></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>        

        <?php elseif ( $settings['design_style'] === 'style_5' ): 
            $title = bdevs_element_kses_basic( $settings['title' ] );
            $this->add_render_attribute( 'title', 'class', 'tp-section-title-two' );

            if (!empty($settings['servic_border_enable'])) {
                $border_enable =  $settings['servic_border_enable'] ? 'tp-service-four' : ''; 
            }
        ?>
        <section class="tp-service-area-three">
            <div class="container">
                <div class="row">
                    <?php foreach ( $settings['slides'] as $key => $slide ):
                        if (!empty($slide['bg_image']['url'])) {
                            $bg_image = wp_get_attachment_image_url( $slide['bg_image']['id'], $settings['bg_thumbnail_size'] );
                            if ( ! $bg_image ) {
                                $bg_image = $slide['bg_image']['url'];
                            } 
                        }
                        if (!empty($slide['image']['url'])) {
                            $image = wp_get_attachment_image_url( $slide['image']['id'], 'thumbnail' );
                             if ( ! $image ) {
                                $image = $slide['image']['url'];
                            } 
                        }
                    ?>  
                    <div class="col-lg-6">
                        <div class="tp-service-three <?php echo esc_attr($border_enable); ?> mb-30">
                            <div class="tp-service-three-img">
                                <?php if( !empty($bg_image) ): ?>
                                <img src="<?php print esc_url($bg_image); ?>" class="img-fluid" alt="img-not-found">
                                <?php endif; ?>
                                <div class="tp-service-three-img-icon">
                                    <?php if( !empty($slide['selected_icon']) ): ?>
                                    <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                    <?php else: ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="tp-service-three-text fix">
                                <?php if( $slide['title'] ) : ?>
                                <h4 class="tp-service-three-title mb-20">
                                    <a href="<?php echo esc_url( $slide['s_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a>
                                </h4>
                                <?php endif; ?>

                                <?php if( $slide['description'] ): ?>
                                <p class="mb-30"><?php echo bdevs_element_kses_intermediate( $slide['description'] ); ?></p>
                                <?php endif; ?>

                                <?php if( $slide['button_text'] ): ?>
                                <div class="tp-service-three-text-btn">
                                    <a href="<?php echo esc_url( $slide['s_url'] ); ?>" class="yellow-btn"><i class="flaticon-enter"></i> <?php echo bdevs_element_kses_intermediate( $slide['button_text'] ); ?></a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php else: 
        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'tp-section-title' );
        ?>

        <section class="tp-services-area theme-dark-bg">
            <div class="tp-custom-container">
                <div class="tp-services-bg grey-bg pt-120 pb-90 z-index">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="tp-section-title-wrapper text-center mb-55">
                                    <?php if ($settings['sub_title']) : ?>
                                    <h5 class="tp-section-subtitle common-yellow-shape mb-20 bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                                    <?php endif; ?>
                                    
                                    <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                    ); ?>

                                    <?php if ($settings['description']) : ?>
                                        <p <?php $this->print_render_attribute_string('details'); ?>><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ( $settings['slides'] as $key => $slide ):
                                if (!empty($slide['image']['id'])) {
                                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                }
                            ?>                            
                            <div class="col-xl-4 col-sm-6">
                                <div class="tp-services white-bg mb-30">
                                    <div class="tp-services-icon yellow-circle-shape">
                                        <?php if( !empty($slide['selected_icon']) ): ?>
                                        <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon'] ); ?>
                                        <?php else: ?>
                                            <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="tp-services-text fix">
                                        <?php if( $slide['title'] ) : ?>
                                        <h4 class="tp-services-text-title mb-15 hover-theme-color">
                                            <a href="<?php echo esc_url( $slide['s_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a>
                                        </h4>
                                        <?php endif; ?>

                                        <?php if( $slide['description'] ): ?>
                                        <p class="mb-20"><?php echo bdevs_element_kses_intermediate( $slide['description'] ); ?></p>
                                        <?php endif; ?>

                                        <?php if( $slide['button_text'] ): ?>
                                        <div class="tp-services-text-link">
                                            <a href="<?php echo esc_url( $slide['s_url'] ); ?>"><i class="flaticon-enter"></i> <?php echo bdevs_element_kses_intermediate( $slide['button_text'] ); ?></a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php endif; ?>
        
        <?php
    }

}