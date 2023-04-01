<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package klenar
 */

get_header();

$blog_column = is_active_sidebar( 'blog-sidebar' ) ? 8 : 12;

?>

<section class="blog-details-area pt-120 pb-70">
    <div class="container">
		<div class="tp-custom-container-box">
			<div class="row">
				<div class="col-lg-<?php print esc_attr( $blog_column );?>">
					<div class="blog__details--wrapper mr-50 mb-50">
						<?php
							while ( have_posts() ):
							the_post();
	
							get_template_part( 'template-parts/content', get_post_format() );
	
							?>
	
							<?php
								if ( get_previous_post_link() AND get_next_post_link() ): ?>
	
								<div class="blog-details-border d-none">
									<div class="row align-items-center">
										<?php
											if ( get_previous_post_link() ): ?>
											<div class="col-lg-6 col-md-6">
												<div class="theme-navigation b-next-post text-left mb-30">
													<span><?php print esc_html__( 'Prev Post', 'klenar' );?></span>
													<h4><?php print get_previous_post_link( '%link ', '%title' );?></h4>
												</div>
											</div>
										<?php
											endif;?>
	
									<?php
										if ( get_next_post_link() ): ?>
										<div class="col-lg-6 col-md-6">
											<div class="theme-navigation b-next-post text-left text-md-right  mb-30">
												<span><?php print esc_html__( 'Next Post', 'klenar' );?></span>
												<h4><?php print get_next_post_link( '%link ', '%title' );?></h4>
											</div>
										</div>
									<?php
										endif;?>
	
								</div>
							</div>
	
							<?php
								endif;?>
							<?php
	
								get_template_part( 'template-parts/biography' );
	
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ):
									comments_template();
								endif;
	
								endwhile; // End of the loop.
							?>
							
					</div>
				</div>
				<?php
					if ( is_active_sidebar( 'blog-sidebar' ) ) {?>
						<div class="col-lg-4 sidebar-blog right-side">
							<?php get_sidebar();?>
						</div>
					<?php
					}
				?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
