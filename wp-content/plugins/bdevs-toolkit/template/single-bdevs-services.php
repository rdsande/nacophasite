<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  medidove
 */
get_header(); ?>

    <section class="tp-service-details-area pt-120 pb-90">
        <div class="container">
            <?php 
            if( have_posts() ):
                while( have_posts() ): the_post();
                    $gallery_images = function_exists('get_field') ? get_field('department_details_gallery') : '';
            ?>
            <div class="row">
                <?php if ( is_active_sidebar( 'services-sidebar' ) ) : ?>
                <div class="col-xl-3 col-lg-4 order-last order-lg-first">
                    <div class="tp-faqs-left">
                        <?php do_action("klenar_service_sidebar"); ?>
                    </div>
                </div>
                <?php endif; ?>

                <div class="col-xl-9 col-lg-8">
                    <div class="tp-service-details">
                        <?php if (!empty($gallery_images)) : ?>
                        <div class="row">
                            <?php foreach( $gallery_images as $image_id ): ?>
                            <div class="col-sm-6">
                                <div class="tp-service-details-img mb-30">
                                    <img src="<?php echo esc_url($image_id['url']); ?>" alt="<?php echo esc_attr($image_id['alt']); ?>">
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php else: ?>
                            <div class="tp-service-details-thumb mb-30">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="tp-service-details-box">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                endwhile; wp_reset_query();
            endif; 
            ?>
        </div>
    </section>


<?php get_footer();  ?>