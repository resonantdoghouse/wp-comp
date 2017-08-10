<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Meteorite
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<?php if ( get_theme_mod('header_titlebar', 'off') != 'on' ) : ?>
					<header class="page-header col-md-12">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'meteorite' ); ?></h1>
					</header><!-- .page-header -->
				<?php endif; ?>

				<div class="page-content">


					<div class="error-message-404 col-md-4">
						<?php esc_html_e('404', 'meteorite'); ?>
					</div>

					<div class="helpful-links-404 col-md-4">
						<h3><?php esc_html_e( 'Helpful links', 'meteorite' ) ?></h3>
						<?php wp_nav_menu( array(
							'theme_location' => '404_pages',
							'depth'          => 1,
							'container'      => false,
							'menu_id'        => 'error404-nav',
							'menu_class'     => 'error-menu',
							'echo'           => 1,
						) ); ?>
					</div>

					<div class="col-md-4">
						<h3><?php esc_html_e( 'Search Our Website', 'meteorite' ); ?></h3>
						<p><?php esc_html_e( 'Can\'t find what you need? Take a moment and do a search below!', 'meteorite' ); ?></p>
						<div class="search-page-search-form">
							<?php get_search_form(); ?>
						</div>
					</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
