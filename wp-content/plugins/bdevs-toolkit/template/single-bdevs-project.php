<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  medidove
 */
get_header(); ?>


    <section class="tp-services-details-area pt-120 pb-115">
        <div class="container">
            <?php 
                if( have_posts() ):
                while( have_posts() ): the_post();
                    $project_details_image = function_exists('get_field') ? get_field('project_details_image') : '';
                    $project_info_repeater = function_exists('get_field') ? get_field('project_info_repeater') : '';
            ?> 

            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="tp-faqs-left mb-50">
                        <div class="tp-faqs-left-sidebar mb-30">
                            <h4 class="tp-faqs-left-sidebar-title">Project Info</h4>
                            <ul>
                                <?php 
                                if( have_rows('project_info_repeater') ):
                                    while( have_rows('project_info_repeater') ) : the_row(); 
                                    $project_info_label = get_sub_field('project_info_label');    
                                    $project_info_name = get_sub_field('project_info_name');  
                                ?>

                                    <li><?php echo esc_html($project_info_label); ?> : <span><?php echo esc_html($project_info_name); ?></span></li>

                                    <?php endwhile; ?>

                                <?php else : ?>
                                    <p>Please add your project info list from project post.</p>
                                <?php endif; ?>

                            </ul>
                        </div>
                        <?php if ( is_active_sidebar( 'portfolio-sidebar' ) ) : ?>
                        <div class="tp-project-widget">
                            <?php do_action("klenar_portfolio_sidebar"); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="tp-service-details">
                        <?php if ( !empty($project_details_image['url']) ) : ?>
                        <div class="proj-de-thum mb-30">
                            <img src="<?php echo esc_url($project_details_image['url']); ?>">
                        </div>  
                        <?php endif; ?>

                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <?php 
                endwhile; wp_reset_query();
            endif; 
            ?>
        </div>
    </section>


    <section class="tp-project-details-area tp-prjects-tab-content pb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-wrapper-two mb-55 text-center">
                        <h5 class="tp-section-subtitle common-yellow-shape mb-20 heading-color-black">Some Completed Project</h5>
                        <h2 class="tp-section-title heading-color-black">Every Project is Different <br>Every Client special</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php tp_cats_related_post(); ?>
            </div>
        </div>
    </section>




<?php get_footer();  ?>