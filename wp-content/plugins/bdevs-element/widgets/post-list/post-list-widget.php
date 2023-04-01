<?php

namespace BdevsElement\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Repeater;
use \Elementor\Core\Schemes;
use \Elementor\Group_Control_Background;
Use \Elementor\Core\Schemes\Typography;
use \BdevsElement\BDevs_El_Select2;

defined('ABSPATH') || die();


class Post_List extends BDevs_El_Widget
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
        return 'post_list';
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
        return __('Post List', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/widgets/post-list/';
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
        return 'eicon-parallax';
    }

    public function get_keywords()
    {
        return ['posts', 'post', 'post-list', 'list', 'news'];
    }

    /**
     * Get a list of All Post Types
     *
     * @return array
     */
    public function get_post_types()
    {
        $post_types = bdevs_element_get_post_types([], ['elementor_library', 'attachment']);
        return $post_types;
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_post_list',
            [
                'label' => __('List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'post_type',
            [
                'label' => __('Source', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->get_post_types(),
                'default' => key($this->get_post_types()),
            ]
        );

        $this->add_control(
            'show_post_by',
            [
                'label' => __('Show post by:', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'default' => 'recent',
                'options' => [
                    'recent' => __('Recent Post', 'bdevselement'),
                    'selected' => __('Selected Post', 'bdevselement'),
                ],

            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Item Limit', 'bdevselement'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'dynamic' => ['active' => true],
                'condition' => [
                    'show_post_by' => ['recent']
                ]
            ]
        );

        $repeater = [];

        foreach ($this->get_post_types() as $key => $value) {

            $repeater[$key] = new Repeater();

            $repeater[$key]->add_control(
                'title',
                [
                    'label' => __('Title', 'bdevselement'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => __('Customize Title', 'bdevselement'),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            $repeater[$key]->add_control(
                'post_id',
                [
                    'label' => __('Select ', 'bdevselement') . $value,
                    'label_block' => true,
                    'type' => BDevs_El_Select2::TYPE,
                    'multiple' => false,
                    'placeholder' => 'Search ' . $value,
                    'data_options' => [
                        'post_type' => $key,
                        'action' => 'bdevs_element_post_list_query'
                    ],
                ]
            );

            $this->add_control(
                'selected_list_' . $key,
                [
                    'label' => '',
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater[$key]->get_controls(),
                    'title_field' => '{{ title }}',
                    'condition' => [
                        'show_post_by' => 'selected',
                        'post_type' => $key
                    ],
                ]
            );
        }

        $this->end_controls_section();

        //Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'feature_image',
            [
                'label' => __('Featured Image', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'post_image',
                'default' => 'thumbnail',
                'exclude' => [
                    'custom'
                ],
                'condition' => [
                    'feature_image' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'list_icon',
            [
                'label' => __('List Icon', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'feature_image!' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => __('Icon', 'bdevselement'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
                    'value' => 'far fa-check-circle',
                    'library' => 'reguler'
                ],
                'condition' => [
                    'list_icon' => 'yes',
                    'feature_image!' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'meta',
            [
                'label' => __('Show Meta', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'author_meta',
            [
                'label' => __('Author', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'author_icon',
            [
                'label' => __('Author Icon', 'bdevselement'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-user',
                    'library' => 'reguler',
                ],
                'condition' => [
                    'meta' => 'yes',
                    'author_meta' => 'yes',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'date_meta',
            [
                'label' => __('Date', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'date_icon',
            [
                'label' => __('Date Icon', 'bdevselement'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-calendar-check',
                    'library' => 'reguler',
                ],
                'condition' => [
                    'meta' => 'yes',
                    'date_meta' => 'yes',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'category_meta',
            [
                'label' => __('Category', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes',
                    'post_type' => 'post',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'category_icon',
            [
                'label' => __('Category Icon', 'bdevselement'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-folder-open',
                    'library' => 'reguler',
                ],
                'condition' => [
                    'meta' => 'yes',
                    'category_meta' => 'yes',
                    'post_type' => 'post',
                    'design_style' => ['style_1', 'style_2', 'style_3']
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
                'default' => 'h4',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'item_align',
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
                'selectors_dictionary' => [
                    'left' => 'justify-content: flex-start',
                    'center' => 'justify-content: center',
                    'right' => 'justify-content: flex-end',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item a' => '{{VALUE}};'
                ],
                'condition' => [
                    'view' => 'list',
                ]
            ]
        );

        $this->end_controls_section();
    }

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
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        if (!$settings['post_type']) return;
        $args = [
            'post_status' => 'publish',
            'post_type' => $settings['post_type'],
        ];
        if ('recent' === $settings['show_post_by']) {
            $args['posts_per_page'] = $settings['posts_per_page'];
        }

        $selected_post_type = 'selected_list_' . $settings['post_type'];

        $customize_title = [];
        $ids = [];
        if ('selected' === $settings['show_post_by']) {
            $args['posts_per_page'] = -1;
            $lists = $settings['selected_list_' . $settings['post_type']];
            if (!empty($lists)) {
                foreach ($lists as $index => $value) {
                    $post_id = !empty($value['post_id']) ? $value['post_id'] : 0;
                    $ids[] = $post_id;
                    if ($value['title']) $customize_title[$post_id] = $value['title'];
                }
            }
            $args['post__in'] = (array)$ids;
            $args['orderby'] = 'post__in';
        }

        if ('selected' === $settings['show_post_by'] && empty($ids)) {
            $posts = [];
        } else {
            $posts = get_posts($args);
        }

        $this->add_render_attribute('title', 'class', '');

        if (!empty($settings['design_style']) and $settings['design_style'] == 'style_2'): 

            $this->add_render_attribute('title', 'class', 'tp-blog-title-two mb-15 bdevs-el-title');

            ?>

        <div class="latest-news-area">
           <div class="container">
              <div class="row">
                <?php foreach ($posts as $inx => $post):
                    $categories = get_the_category($post->ID);
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="tp-blog-two mb-30 position-relative">
                            <?php if ('yes' === $settings['feature_image']): ?>
                            <?php if ( has_post_thumbnail($post->ID) ): ?>    
                            <div class="tp-blog-img">
                                <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                    <?php echo get_the_post_thumbnail($post->ID, $settings['post_image_size'], ['class' => 'img-fluid']); ?>
                                </a>
                                <?php if ('yes' === $settings['date_meta']): ?>
                                <div class="tp-blog-date">
                                    <h4><?php echo get_the_date("d",$post->ID); ?></h4>
                                    <span><?php echo get_the_date("M",$post->ID); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>

                            <div class="tp-blog-text-two">
                                <div class="tp-blog-meta-two mb-10">
                                    <ul>
                                        <?php if ('post' === $settings['post_type'] && 'yes' === $settings['category_meta']): $categories = get_the_category($post->ID); ?>
                                        <li>
                                            <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>">
                                            <?php if ($settings['category_icon']):
                                                Icons_Manager::render_icon($settings['category_icon'], ['aria-hidden' => 'true']);
                                            endif;
                                            echo esc_html($categories[0]->name); ?>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                        <li><a href="<?php comments_link(); ?>">// <?php comments_number(); ?></a></li>
                                    </ul>
                                </div>

                                    <?php $title = $post->post_title;
                                    if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_title)) {
                                        $title = $customize_title[$post->ID];
                                    }
                                    printf('<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        esc_html($title),
                                        esc_url(get_the_permalink($post->ID))
                                    ); ?>

                                <div class="tp-blog-link-two">
                                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php echo esc_html__('Details Here','bdevs-element'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
              </div>
           </div>
        </div>


        <?php elseif (!empty($settings['design_style']) and $settings['design_style'] == 'style_3'): 

            $this->add_render_attribute('title', 'class', 'tp-blog-three-title mb-15 bdevs-el-title');

            ?>

        <div class="latest-news-area">
           <div class="container">
              <div class="row">
                <?php foreach ($posts as $inx => $post):
                    $categories = get_the_category($post->ID);
                    ?>

                    <div class="col-lg-4 col-md-6">
                        <div class="tp-blog-three mb-30">
                            <?php if ('yes' === $settings['feature_image']): ?>
                            <?php if ( has_post_thumbnail($post->ID) ): ?>  
                            <div class="tp-blog-three-img">
                                <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                    <?php echo get_the_post_thumbnail($post->ID, $settings['post_image_size'], ['class' => 'img-fluid']); ?>
                                </a>
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>

                            <div class="tp-blog-three-text">
                                <div class="tp-blog-three-text-meta">
                                    <?php if ('yes' === $settings['author_meta']): ?>
                                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                        <?php echo esc_html__('By','bdevs-element'); ?>  <?php if ( $settings['author_icon'] ):
                                        Icons_Manager::render_icon( $settings['author_icon'], [ 'aria-hidden' => 'true' ] );
                                        endif; 
                                            echo esc_html( get_the_author_meta( 'display_name', $post->post_author ) ); 
                                        ?> 
                                    </a>
                                    <?php endif; ?>
                                    <span>_ _</span>
                                    <?php if ('yes' === $settings['date_meta']): ?>
                                    <a href="<?php echo esc_url( get_day_link( false, false, false ) ); ?>">
                                    <?php if ($settings['date_icon']):
                                        Icons_Manager::render_icon($settings['date_icon'], ['aria-hidden' => 'true']);
                                    endif;
                                    echo get_the_date("M d, Y"); ?>
                                    </a>
                                    <?php endif; ?>
                                </div>

                                <?php $title = $post->post_title;
                                if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_title)) {
                                    $title = $customize_title[$post->ID];
                                }
                                printf('<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    esc_html($title),
                                    esc_url(get_the_permalink($post->ID))
                                ); ?>
                                
                                <div class="tp-blog-three-link">
                                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><i class="flaticon-enter"></i> <?php echo esc_html__('Continue Reading','bdevs-element'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
              </div>
           </div>
        </div>


        <?php else:
            $this->add_render_attribute('title', 'class', 'tp-blog-title mb-20 bdevs-el-title');
            if (!empty($posts)): ?>

                <div class="latest-news-area">
                    <div class="container">
                       <div class="row">
                        <?php foreach ($posts as $inx => $post):
                            $categories = get_the_category($post->ID);
                            ?>

                            <div class="col-lg-4 col-md-6">
                                <div class="tp-blog mb-30">
                                    <?php if ('yes' === $settings['feature_image']): ?>
                                    <?php if ( has_post_thumbnail($post->ID) ): ?>    
                                    <div class="tp-blog-img mb-25">
                                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php echo get_the_post_thumbnail($post->ID, $settings['post_image_size'], ['class' => 'img-fluid']); ?></a>

                                        <?php if ('post' === $settings['post_type'] && 'yes' === $settings['category_meta']): $categories = get_the_category($post->ID); ?>
                                        <span class="tp-blog-badge"><a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>">
                                            <?php if ($settings['category_icon']):
                                                Icons_Manager::render_icon($settings['category_icon'], ['aria-hidden' => 'true']);
                                            endif;
                                            echo esc_html($categories[0]->name); ?>
                                        </a></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="tp-blog-text">
                                        <div class="tp-blog-meta mb-10">
                                            <ul>
                                                <?php if ('yes' === $settings['author_meta']): ?>
                                                <li>
                                                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                        // <?php echo esc_html__('By','bdevs-element'); ?>  <?php if ( $settings['author_icon'] ):
                                                        Icons_Manager::render_icon( $settings['author_icon'], [ 'aria-hidden' => 'true' ] );
                                                        endif; 
                                                            echo esc_html( get_the_author_meta( 'display_name', $post->post_author ) ); 
                                                        ?> 
                                                    </a>
                                                </li>
                                                <?php endif; ?>

                                                <?php if ('yes' === $settings['date_meta']): ?>
                                                <li>
                                                    <a href="<?php echo esc_url( get_day_link( false, false, false ) ); ?>">// 
                                                    <?php if ($settings['date_icon']):
                                                        Icons_Manager::render_icon($settings['date_icon'], ['aria-hidden' => 'true']);
                                                    endif;
                                                    echo get_the_date("M d, Y"); ?>
                                                    </a>
                                                </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>

                                        <?php $title = $post->post_title;
                                        if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_title)) {
                                            $title = $customize_title[$post->ID];
                                        }
                                        printf('<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title'),
                                            esc_html($title),
                                            esc_url(get_the_permalink($post->ID))
                                        ); ?>

                                        <div class="tp-blog-link">
                                            <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><i class="flaticon-enter"></i> <?php echo esc_html__('Continue Reading','bdevs-element'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                       </div>
                    </div>
                </div>


            <?php
            else:
                printf('%1$s %2$s %3$s',
                    __('No ', 'bdevselement'),
                    esc_html($settings['post_type']),
                    __('Found', 'bdevselement')
                );
            endif;
            ?>
        <?php endif;
    }
}
