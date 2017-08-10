<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Meteorite
 */

get_header(); ?>

	<?php if ( get_theme_mod('fullwidth_single_project_checkbox', 1) == 1 ) { // Check if the post needs to be full width
			$fullwidth = 'fullwidth';
	} else {
			$fullwidth = '';
	} ?>

	<?php do_action('meteorite_before_content'); ?>

	<div id="primary" class="content-area col-md-9 <?php echo $fullwidth; ?>">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'projects' );

			if ( get_theme_mod('project_pagination_type', 'titles') == 'none' ) :
				// empty
			elseif ( get_theme_mod('project_pagination_type', 'titles') == 'titles' ) :
				meteorite_project_navigation();
			elseif ( get_theme_mod('project_pagination_type', 'titles') == 'titles_images' ) :
				meteorite_extended_project_navigation();
			elseif ( get_theme_mod('project_pagination_type', 'titles') == 'arrows' ) :
				meteorite_project_navigation_arrows();
			endif;

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php do_action('meteorite_after_content'); ?>

<?php if ( get_theme_mod('fullwidth_single_project_checkbox', 1) != 1 ) {
	get_sidebar();
}
get_footer();
