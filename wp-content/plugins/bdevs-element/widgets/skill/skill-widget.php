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

defined( 'ABSPATH' ) || die();

class Skill extends BDevs_El_Widget {

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
        return 'skill';
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
        return __( 'Our Skill', 'bdevselement' );
    }

	public function get_custom_help_url() {
		return 'http://elementor.bdevs.net//widgets/fact/';
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
        return 'eicon-skill-bar';
    }

    public function get_keywords() {
        return [ 'fact', 'image', 'counter', 'skill' ];
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

        // title
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'big_title',
            [
                'label' => __( 'Big Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Big Title', 'bdevselement' ),
                'placeholder' => __( 'Type Big Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
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
                'type' => Controls_Manager::TEXT,
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
                'label' => __( 'Description', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'bdevs info box description goes here', 'bdevselement' ),
                'placeholder' => __( 'Type info box description', 'bdevselement' ),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        ); 


        $this->add_control(
            'image',
            [
                'label' => __( 'Image', 'bdevselement' ),
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

        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Fact List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'number',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Circle Number', 'bdevselement' ),
                'default' => __( '70', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );          
      

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
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

    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __( 'Slider Item', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'selector' => '{{WRAPPER}} .bdevs-slick-item',
            ]
        );

        $this->add_responsive_control(
            'item_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Slide Content', 'bdevselement' ),
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
                    '{{WRAPPER}} .bdevs-slick-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-slick-content',
                'exclude' => [
                    'image'
                ]
            ]
        );

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
                    '{{WRAPPER}} .bdevs-slick-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .bdevs-slick-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

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
                    '{{WRAPPER}} .bdevs-slick-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-slick-subtitle',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_arrow',
            [
                'label' => __( 'Navigation - Arrow', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow_position_toggle',
            [
                'label' => __( 'Position', 'bdevselement' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __( 'None', 'bdevselement' ),
                'label_on' => __( 'Custom', 'bdevselement' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label' => __( 'Vertical', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_position_x',
            [
                'label' => __( 'Horizontal', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slick-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'selector' => '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next',
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_arrow' );

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_arrow_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'arrow_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_dots',
            [
                'label' => __( 'Navigation - Dots', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'dots_nav_position_y',
            [
                'label' => __( 'Vertical Position', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_spacing',
            [
                'label' => __( 'Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_align',
            [
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->start_controls_tabs( '_tabs_dots' );
        $this->start_controls_tab(
            '_tab_dots_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_hover_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:hover:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_active',
            [
                'label' => __( 'Active', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_active_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots .slick-active button:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        $title = bdevs_element_kses_basic( $settings['title' ] );

        if ( empty( $settings['slides'] ) ) {
            return;
        }
        ?>

        <?php if ( $settings['design_style'] === 'style_2' ): 
            $this->add_render_attribute('title', 'class', 'tp-section-title mb-25 heading-color-black bdevs-el-title');   
            if ( !empty($settings['image']['url']) ) {
                $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
                if ( ! $image ) {
                    $image = $settings['image']['url'];
                } 
            } 
        ?>
        <section class="tp-progress-area tp-team-progress-area pb-90">
            <div class="tp-progress-area-inner position-relative pt-25">
                <?php if (!empty($settings['shape_switch'])) : ?>
                <div class="tp-progress-shape">
                    <img src="<?php print get_template_directory_uri(); ?>/assets/img/team/team-shape-1.jpg" alt="img not found">
                </div>
                <?php endif; ?>
                <div class="container z-index">
                    <div class="row">
                        <?php if( !empty($image) ): ?>
                        <div class="col-lg-6">
                            <div class="tp-progress-img pt-75 mb-30">
                                <img src="<?php echo esc_url($image); ?>" alt="img not found">
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-lg-6">
                            <div class="tp-progress-text tp-team-progress mb-30">
                                <div class="section-title-wrapper">
                                    <?php if ($settings['sub_title']) : ?>
                                    <h5 class="tp-section-subtitle common-yellow-shape mb-20 heading-color-black bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                                    <?php endif; ?>
                                    
                                    <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                    ); ?>
                                </div>
                                <?php if ($settings['description']) : ?>
                                    <p class="mb-40"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                <?php endif; ?>

                                <div class="tp-skill--content">
                                    <?php foreach ( $settings['slides'] as $slide ) :?>
                                    <div class="tp-skill__wrapper mb-45">
                                        <div class="tp-skill--title__wrapper">
                                            <?php if ( !empty( $slide['title'] ) ) : ?>
                                            <h5 class="tp-skill--title heading-color-black"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h5>
                                            <?php endif; ?>

                                            <span style="left:<?php echo esc_attr( $slide['number'] ); ?>%"><?php echo esc_attr( $slide['number'] ); ?>%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.5s" role="progressbar" style="width: <?php echo esc_attr( $slide['number'] ); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span></span></div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php else: 
            $this->add_render_attribute('title', 'class', 'tp-section-title mb-25 bdevs-el-title');   
            if ( !empty($settings['image']['url']) ) {
                $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
                if ( ! $image ) {
                    $image = $settings['image']['url'];
                } 
            } 
        ?>

        <section class="tp-progress-area">
            <div class="tp-progress-area-inner position-relative pt-25">
                <?php if (!empty($settings['shape_switch'])) : ?>
                <div class="tp-progress-shape">
                    <img src="<?php print get_template_directory_uri(); ?>/assets/img/project/progress-bg.jpg" alt="img not found">
                </div>
                <?php endif; ?>
                <div class="container z-index">
                    <div class="row">
                        <?php if( !empty($image) ): ?>
                        <div class="col-lg-6">
                            <div class="tp-progress-img pt-75 mb-30">
                                <img src="<?php echo esc_url($image); ?>" alt="img not found">
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-lg-6">
                            <div class="tp-progress-text mb-30">
                                <div class="section-title-wrapper">
                                    <?php if ($settings['sub_title']) : ?>
                                    <h5 class="tp-section-subtitle common-yellow-shape mb-25 bdevs-el-subtitle"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                                    <?php endif; ?>
                                    
                                    <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                    ); ?>
                                </div>
                                <?php if ($settings['description']) : ?>
                                    <p class="mb-40"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                <?php endif; ?>

                                <div class="tp-skill--content">
                                    <?php foreach ( $settings['slides'] as $slide ) :?>
                                    <div class="tp-skill__wrapper mb-45">
                                        <div class="tp-skill--title__wrapper">
                                            <?php if ( !empty( $slide['title'] ) ) : ?>
                                            <h5 class="tp-skill--title"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h5>
                                            <?php endif; ?>
                                            <span style="left:<?php echo esc_attr( $slide['number'] ); ?>%"><?php echo esc_html( $slide['number'] ); ?>%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.5s" role="progressbar" style="width: <?php echo esc_attr( $slide['number'] ); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span></span></div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
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
