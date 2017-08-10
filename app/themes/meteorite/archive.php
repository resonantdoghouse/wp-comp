<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Meteorite
 */

get_header(); ?>

	<?php if ( get_theme_mod('fullwidth_blog_checkbox') ) { //Check if the post needs to be full width
			$fullwidth = 'fullwidth';
	} else {
			$fullwidth = '';
	} ?>

	<div id="primary" class="content-area col-md-9 <?php echo $fullwidth; ?>">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			
			<?php if ( get_theme_mod('header_titlebar', 'off') != 'on' ) : ?>
			<header class="page-header">
				<?php
				the_archive_title( '<h1>', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
			</header><!-- .page-header -->
			<?php	
			endif; ?>

			<div class="post-wrapper clearfix">
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile; ?>
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
			<?php endif;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if ( get_theme_mod('fullwidth_blog_checkbox', 0) != 1 ) {
	get_sidebar();
}
get_footer();
