<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package klenar
 */

    $klenar_video_url = function_exists( 'get_field' ) ? get_field( 'fromate_style' ) : NULL;
    $categories = get_the_terms( $post->ID, 'category' );
    $klenar_blog_date = get_theme_mod( 'klenar_blog_date', true );
    $klenar_blog_comments = get_theme_mod( 'klenar_blog_comments', true );
    $klenar_blog_author = get_theme_mod( 'klenar_blog_author', true );
    $klenar_blog_cat = get_theme_mod( 'klenar_blog_cat', false );
    if ( is_single() ):
?>

    <article id="post-<?php the_ID();?>" <?php post_class( 'ablog ablog-4 mb-55' );?>>
    <?php if ( has_post_thumbnail() ): ?>
            <div class="ablog__img ablog__img4">
            <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
            <?php if(!empty($klenar_video_url)) : ?>
            <div class="avideo-btn-4">
                <div class="avideo-btn play_btn">
                    <a class="popup-video" href="<?php print esc_url( $klenar_video_url );?>">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

            <div class="ablog__text ablog__text4">
            <div class="ablog__meta ablog__meta4">
                    <ul>
                        <?php if ( !empty($klenar_blog_date) ): ?>
                        <li><span><i class="far fa-calendar-check"></i> <?php the_time( get_option('date_format') ); ?></span></li>
                         <?php endif;?>

                        <?php if ( !empty($klenar_blog_cat) ): ?>
                        <li>
                            <span>
                                <i class="far fa-tag"></i> <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a> 
                            </span>
                        </li>
                        <?php endif;?>

                        <?php if ( !empty($klenar_blog_author) ): ?>
                        <li><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><i class="far fa-user"></i> <?php print get_the_author();?> </a></li>
                        <?php endif;?>

                        <?php if ( !empty($klenar_blog_comments) ): ?>
                        <li><a href="<?php comments_link();?>"><i class="fal fa-comments"></i> <?php comments_number();?></a></li>
                        <?php endif;?>
                    </ul>
                </div>
                <h3 class="ablog__text--title4 mb-20 d-none">
                    <?php the_title();?>
                </h3>
                <div class="post-text mb-30">
                <?php the_content();?>
                    <?php
                        wp_link_pages( [
                            'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'klenar' ),
                            'after'       => '</div>',
                            'link_before' => '<span class="page-number">',
                            'link_after'  => '</span>',
                        ] );
                    ?>
                </div>
                <?php print klenar_get_tag();?>
            </div>
    </article>

<?php
else: ?>


    <article id="post-<?php the_ID();?>" <?php post_class( 'ablog ablog-4 mb-55 format-video' );?> data-wow-delay=".3s">
        <?php if ( has_post_thumbnail() ): ?>
            <div class="ablog__img ablog__img4">
            <a href="blog-details.html"><?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?></a>
            <?php if(!empty($klenar_video_url)) : ?>
            <div class="avideo-btn-4">
                <div class="avideo-btn play_btn">
                    <a class="venobox" data-autoplay="true" data-vbtype="video" href="<?php print esc_url( $klenar_video_url );?>">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="ablog__text ablog__text4">
            <div class="ablog__meta ablog__meta4">
                <ul>
                    <?php if ( !empty($klenar_blog_date) ): ?>
                    <li><span><i class="far fa-calendar-check"></i> <?php the_time( get_option('date_format') ); ?></span></li>
                     <?php endif;?>

                    <?php if ( !empty($klenar_blog_cat) ): ?>
                    <li>
                        <span>
                            <i class="far fa-tag"></i> <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a> 
                        </span>
                    </li>
                    <?php endif;?>

                    <?php if ( !empty($klenar_blog_author) ): ?>
                    <li><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><i class="far fa-user"></i> <?php print get_the_author();?> </a></li>
                    <?php endif;?>

                    <?php if ( !empty($klenar_blog_comments) ): ?>
                    <li><a href="<?php comments_link();?>"><i class="fal fa-comments"></i> <?php comments_number();?></a></li>
                    <?php endif;?>
                </ul>
            </div>
            <h3 class="ablog__text--title4 mb-20">
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </h3>
            <div class="post-text mb-20">
                <?php the_excerpt();?>
            </div>
            <!-- blog btn -->

            <?php
                $klenar_blog_btn = get_theme_mod( 'klenar_blog_btn', 'Read More' );
                $klenar_blog_btn_switch = get_theme_mod( 'klenar_blog_btn_switch', true );
            ?>

            <?php if ( !empty( $klenar_blog_btn_switch ) ): ?>
            <div class="ablog__btn4 mt-30">
                <a href="<?php the_permalink();?>" class="theme-btn"><i class="flaticon-enter"></i><?php print esc_html( $klenar_blog_btn );?></a>
            </div>
            <?php endif;?>
        </div>
    </article>


<?php
endif;?>
