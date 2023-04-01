<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package klenar
 */

get_header();

$blog_column = is_active_sidebar( 'blog-sidebar' ) ? 8 : 12;

?>

<div class="blog-sidebar-area pt-120 pb-110">
    <div class="container container-box">
    	<div class="tp-custom-container-box">
	        <div class="row">
	            <div class="col-lg-<?php print esc_attr( $blog_column );?>">
	            	<div class="ablog__sidebar--wrapper mr-50">
		                <?php
							if ( have_posts() ):
						?>
						<div class="result-bar page-header d-none">
							<h1 class="page-title"><?php esc_html_e( 'Search Results For:', 'klenar' );?> <?php print get_search_query();?></h1>
						</div>
						<?php
							while ( have_posts() ): the_post();
								get_template_part( 'template-parts/content', 'search' );
							endwhile;
						?>
						<div class="basic-pagination mb-40 pagination justify-content-left">
							   <?php klenar_pagination( '<i class="fal fa-arrow-left"></i>', '<i class="fal fa-arrow-right"></i>', '', ['class' => ''] );?>
						</div>
						<?php
							else:
								get_template_part( 'template-parts/content', 'none' );
							endif;
						?>
	            	</div>
	            </div>
				<?php if ( is_active_sidebar( 'blog-sidebar' ) ): ?>
					<div class="col-lg-4">
						<div class="ablog__sidebar">
							<?php get_sidebar();?>
						</div>
					</div>
				<?php endif;?>
	        </div>
        </div>
    </div>
</div>

<?php
get_footer();
