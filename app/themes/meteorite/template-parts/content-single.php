<?php
/**
 * @package Meteorite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php do_action('meteorite_inside_post_top'); ?>

	<?php if ( has_post_thumbnail() ) : ?> 
		<?php if ( get_post_type() == 'post' ) { ?>
			<?php if ( get_theme_mod( 'post_feat_image' ) != 1 ) : ?>
				<div class="single-thumb">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>
		<?php } else { ?>
			<div class="single-thumb">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php } ?>
	<?php endif; ?>

	<header class="single-header">
		<?php if ( get_theme_mod('header_titlebar', 'off') == 'off' ) :
			if ( 'post' === get_post_type() && get_theme_mod('hide_title_single', 0) == 0 ) :
				the_title( '<h1 class="title-post">', '</h1>' );
			endif;
		endif; ?>

		<?php if (get_theme_mod('hide_meta_single') != 1 && 'post' === get_post_type() && get_theme_mod('header_titlebar', 'off') == 'off' ) : ?>
		<div class="post-meta">
			<?php meteorite_meta_info(); ?>
		</div><!-- .single-meta -->
		<?php endif; ?>

	</header><!-- .single-header -->

	<div class="single-content">
		<?php the_content(); ?>
	</div><!-- .single-content -->

	<footer class="single-footer">
		<?php meteorite_entry_footer();
		if ( get_theme_mod('post_author_check', 1) == 1 && 'post' === get_post_type() ) :
			meteorite_about_the_author();
		endif; 
		?>
	</footer><!-- .single-footer -->

	<?php do_action('meteorite_inside_post_bottom'); ?>

</article><!-- #post-## -->