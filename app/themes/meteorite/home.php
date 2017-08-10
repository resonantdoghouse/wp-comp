<?php
/**
 * The home template file.
 *
 * @package Meteorite
 */

get_header(); ?>

	<?php if ( get_theme_mod('fullwidth_blog_checkbox', 0) ) { // Check if the post needs to be full width
			$fullwidth = 'fullwidth';
	} else {
			$fullwidth = '';
	} ?>

	<?php do_action('meteorite_before_content'); ?>

	<div id="primary" class="content-area col-md-9 <?php echo $fullwidth; ?>">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<div class="posts-layout clearfix">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				<?php endwhile; ?>
			</div>

			<?php 
			if ( get_theme_mod('pagination_type', 'titles') == 'none' ) :
				// empty
			elseif ( get_theme_mod('pagination_type', 'titles') == 'numbers' ) :
				meteorite_post_pagination(); 
			elseif ( get_theme_mod('pagination_type', 'titles') == 'titles' ) :
				the_posts_navigation();
			elseif ( get_theme_mod('pagination_type', 'titles') == 'arrows' ) : ?>
				<div class="posts-navigation-arrows clearfix">
				<?php the_posts_navigation( array(
					'prev_text'			 => '<span class="prev-link-arrow"><i class="fa fa-angle-left"></i></span>',
					'next_text'			 => '<span class="next-link-arrow"><i class="fa fa-angle-right"></i></span>',
					'before_page_number' => '<span class="screen-reader-text">' . __( 'Page Navigation', 'meteorite' ) . ' </span>',
				) ); ?>
				</div>
			<?php endif; ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php do_action('meteorite_after_content'); ?>

<?php if ( get_theme_mod('fullwidth_blog_checkbox', 0) != 1 ) {
	get_sidebar();
}
get_footer();
