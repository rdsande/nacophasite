<?php
    $author_data = get_the_author_meta( 'description', get_query_var( 'author' ) );
    $author_info = get_the_author_meta( 'klenar_write_by');
    $facebook_url = get_the_author_meta( 'klenar_facebook' );
    $twitter_url = get_the_author_meta( 'klenar_twitter' );
    $linkedin_url = get_the_author_meta( 'klenar_linkedin' );
    $instagram_url = get_the_author_meta( 'klenar_instagram' );
    $klenar_url = get_the_author_meta( 'klenar_youtube' );
    $author_bio_avatar_size = 180;
    if ( $author_data != '' ):
?>


            <div class="blog__author mb-95 d-sm-flex wow fadeInUp">
                <div class="blog__author-img mr-30">
                <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>">
            <?php print get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size, '', '', [ 'class' => 'media-object img-circle' ] );?>  
        </a>
                </div>
                <div class="blog__author-content">
                    <h5>
                        <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>"> <?php print get_the_author(); ?> </a>
                    </h5>
                    <?php if (!empty($author_info)) : ?>
                        <span><?php print esc_html($author_info); ?></span>
                    <?php endif; ?>
                    <p><?php the_author_meta( 'description' );?></p>
                </div>
            </div>

<?php endif;?>
