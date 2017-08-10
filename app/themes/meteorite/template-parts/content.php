<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Meteorite
 */

?>


<?php if ( is_search() ) {
	if ( get_theme_mod('search_layout', 'fullwidth') == 'fullwidth') { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-type-fullwidth">

				<div class="post-wrapper">
					<?php if ( has_post_thumbnail() && ( get_theme_mod( 'search_feat_image' ) != 1 ) ) : ?>
						<div class="entry-thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
					<?php endif; ?>

					<div class="post-inner">
						<header class="entry-header">
							<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						</header><!-- .entry-header -->

						<?php if ( 'post' == get_post_type() && get_theme_mod('hide_meta_search') != 1 ) : ?>
						<div class="post-meta">
							<?php meteorite_meta_info(); ?>
						</div>
						<?php endif; ?>

						<div class="entry-content">
							<?php if ( get_theme_mod('full_content_search') == 1 ) : ?>
								<?php the_content(); ?>
							<?php else : ?>
								<?php the_excerpt(); ?>
								<?php if ( get_theme_mod( 'hide_read_more' ) != 1 ) : ?>
								<div class="read-more">
									<a class="button post-button" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e('Read more', 'meteorite'); ?></a>
								</div>
								<?php endif; ?>
							<?php endif; ?>

							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'meteorite' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
					</div>
				</div>

			</div>
		</article><!-- #post-## -->
	<?php } elseif ( get_theme_mod('search_layout', 'fullwidth') == 'img-left' ) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-type-img-left">

				<div class="post-wrapper clearfix">
					<header class="entry-header">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header><!-- .entry-header -->

					<?php if ( 'post' == get_post_type() && get_theme_mod('hide_meta_search') != 1 ) : ?>
					<div class="post-meta">
						<?php meteorite_meta_info(); ?>
					</div>
					<?php endif; ?>

					<?php if ( has_post_thumbnail() && ( get_theme_mod( 'search_feat_image' ) != 1 ) ) : ?>
						<div class="entry-thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('meteorite-medium-thumb'); ?></a>
						</div>
					<?php endif; ?>

					<div class="post-inner">
						<div class="entry-content">
							<?php if ( get_theme_mod('full_content_search') == 1 ) : ?>
								<?php the_content(); ?>
							<?php else : ?>
								<?php the_excerpt(); ?>
								<?php if ( get_theme_mod( 'hide_read_more' ) != 1 ) : ?>
								<div class="read-more">
									<a class="button post-button" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e('Read more', 'meteorite'); ?></a>
								</div>
								<?php endif; ?>
							<?php endif; ?>
							
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'meteorite' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
					</div>
				</div>

			</div>
		</article><!-- #post-## -->
	<?php } elseif ( get_theme_mod('search_layout', 'fullwidth') == 'grid_2_col' ) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-type-grid-2-col'); ?>>

				<div class="post-wrapper">
					<?php if ( has_post_thumbnail() && ( get_theme_mod( 'search_feat_image' ) != 1 ) ) : ?>
						<div class="entry-thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
					<?php endif; ?>

					<div class="post-inner">
						<header class="entry-header">
							<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						</header><!-- .entry-header -->

						<?php if ( 'post' == get_post_type() && get_theme_mod('hide_meta_search') != 1 ) : ?>
						<div class="post-meta">
							<?php meteorite_meta_info(); ?>
						</div>
						<?php endif; ?>

						<div class="entry-content">
							<?php if ( get_theme_mod('full_content_search') == 1 ) : ?>
								<?php the_content(); ?>
							<?php else : ?>
								<?php the_excerpt(); ?>
								<?php if ( get_theme_mod( 'hide_read_more' ) != 1 ) : ?>
								<div class="read-more">
									<a class="button post-button" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e('Read more', 'meteorite'); ?></a>
								</div>
								<?php endif; ?>
							<?php endif; ?>

							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'meteorite' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
					</div>
				</div>

		</article><!-- #post-## -->
	<?php } elseif ( get_theme_mod('search_layout', 'fullwidth') == 'fullwidth_grid' ) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-type-fullwidth-grid'); ?>>

				<div class="post-wrapper">
					<?php if ( has_post_thumbnail() && ( get_theme_mod( 'search_feat_image' ) != 1 ) ) : ?>
						<div class="entry-thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
					<?php endif; ?>

					<div class="post-inner">
						<header class="entry-header">
							<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						</header><!-- .entry-header -->

						<?php if ( 'post' == get_post_type() && get_theme_mod('hide_meta_search') != 1 ) : ?>
						<div class="post-meta">
							<?php meteorite_meta_info(); ?>
						</div>
						<?php endif; ?>

						<div class="entry-content">
							<?php if ( (get_theme_mod('full_content_home') == 1 && is_home() ) || (get_theme_mod('full_content_archives') == 1 && is_archive() ) ) : ?>
								<?php the_content(); ?>
							<?php else : ?>
								<?php the_excerpt(); ?>
								<?php if ( get_theme_mod( 'hide_read_more' ) != 1 ) : ?>
								<div class="read-more">
									<a class="button post-button" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e('Read more', 'meteorite'); ?></a>
								</div>
								<?php endif; ?>
							<?php endif; ?>

							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'meteorite' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
					</div>
				</div>

		</article><!-- #post-## -->
	<?php }
} else {
	if ( get_theme_mod('blog_layout', 'fullwidth') == 'fullwidth') { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-type-fullwidth">

				<div class="post-wrapper">
					<?php if ( has_post_thumbnail() && ( get_theme_mod( 'index_feat_image' ) != 1 ) ) : ?>
						<div class="entry-thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
					<?php endif; ?>

					<div class="post-inner">
						<header class="entry-header">
							<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						</header><!-- .entry-header -->

						<?php if ( 'post' == get_post_type() && get_theme_mod('hide_meta_index') != 1 ) : ?>
						<div class="post-meta">
							<?php meteorite_meta_info(); ?>
						</div>
						<?php endif; ?>

						<div class="entry-content">
							<?php if ( (get_theme_mod('full_content_home') == 1 && is_home() ) || (get_theme_mod('full_content_archives') == 1 && is_archive() ) ) : ?>
								<?php the_content(); ?>
							<?php else : ?>
								<?php the_excerpt(); ?>
								<?php if ( get_theme_mod( 'hide_read_more' ) != 1 ) : ?>
								<div class="read-more">
									<a class="button post-button" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e('Read more', 'meteorite'); ?></a>
								</div>
								<?php endif; ?>
							<?php endif; ?>

							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'meteorite' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
					</div>
				</div>

			</div>
		</article><!-- #post-## -->
	<?php } elseif ( get_theme_mod('blog_layout', 'fullwidth') == 'img-left' ) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-type-img-left">

				<div class="post-wrapper clearfix">
					<header class="entry-header">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header><!-- .entry-header -->

					<?php if ( 'post' == get_post_type() && get_theme_mod('hide_meta_index') != 1 ) : ?>
					<div class="post-meta">
						<?php meteorite_meta_info(); ?>
					</div>
					<?php endif; ?>

					<?php if ( has_post_thumbnail() && ( get_theme_mod( 'index_feat_image' ) != 1 ) ) : ?>
						<div class="entry-thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('meteorite-medium-thumb'); ?></a>
						</div>
					<?php endif; ?>

					<div class="post-inner">
						<div class="entry-content">
							<?php if ( (get_theme_mod('full_content_home') == 1 && is_home() ) || (get_theme_mod('full_content_archives') == 1 && is_archive() ) ) : ?>
								<?php the_content(); ?>
							<?php else : ?>
								<?php the_excerpt(); ?>
								<?php if ( get_theme_mod( 'hide_read_more' ) != 1 ) : ?>
								<div class="read-more">
									<a class="button post-button" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e('Read more', 'meteorite'); ?></a>
								</div>
								<?php endif; ?>
							<?php endif; ?>
							
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'meteorite' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
					</div>
				</div>

			</div>
		</article><!-- #post-## -->
	<?php } elseif ( get_theme_mod('blog_layout', 'fullwidth') == 'grid_2_col' ) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-type-grid-2-col'); ?>>

				<div class="post-wrapper">
					<?php if ( has_post_thumbnail() && ( get_theme_mod( 'index_feat_image' ) != 1 ) ) : ?>
						<div class="entry-thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
					<?php endif; ?>

					<div class="post-inner">
						<header class="entry-header">
							<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						</header><!-- .entry-header -->

						<?php if ( 'post' == get_post_type() && get_theme_mod('hide_meta_index') != 1 ) : ?>
						<div class="post-meta">
							<?php meteorite_meta_info(); ?>
						</div>
						<?php endif; ?>

						<div class="entry-content">
							<?php if ( (get_theme_mod('full_content_home') == 1 && is_home() ) || (get_theme_mod('full_content_archives') == 1 && is_archive() ) ) : ?>
								<?php the_content(); ?>
							<?php else : ?>
								<?php the_excerpt(); ?>
								<?php if ( get_theme_mod( 'hide_read_more' ) != 1 ) : ?>
								<div class="read-more">
									<a class="button post-button" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e('Read more', 'meteorite'); ?></a>
								</div>
								<?php endif; ?>
							<?php endif; ?>

							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'meteorite' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
					</div>
				</div>

		</article><!-- #post-## -->
	<?php } elseif ( get_theme_mod('blog_layout', 'fullwidth') == 'fullwidth_grid' ) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-type-fullwidth-grid'); ?>>

				<div class="post-wrapper">
					<?php if ( has_post_thumbnail() && ( get_theme_mod( 'index_feat_image' ) != 1 ) ) : ?>
						<div class="entry-thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
					<?php endif; ?>

					<div class="post-inner">
						<header class="entry-header">
							<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						</header><!-- .entry-header -->

						<?php if ( 'post' == get_post_type() && get_theme_mod('hide_meta_index') != 1 ) : ?>
						<div class="post-meta">
							<?php meteorite_meta_info(); ?>
						</div>
						<?php endif; ?>

						<div class="entry-content">
							<?php if ( (get_theme_mod('full_content_home') == 1 && is_home() ) || (get_theme_mod('full_content_archives') == 1 && is_archive() ) ) : ?>
								<?php the_content(); ?>
							<?php else : ?>
								<?php the_excerpt(); ?>
								<?php if ( get_theme_mod( 'hide_read_more' ) != 1 ) : ?>
								<div class="read-more">
									<a class="button post-button" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e('Read more', 'meteorite'); ?></a>
								</div>
								<?php endif; ?>
							<?php endif; ?>

							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'meteorite' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
					</div>
				</div>

		</article><!-- #post-## -->
	<?php }
}