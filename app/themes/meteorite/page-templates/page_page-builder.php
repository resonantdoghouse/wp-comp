<?php
/*
Template Name: Page Builder
*/

get_header(); ?>

	<div id="primary" class="fp-content-area">
		<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>

				<?php if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif; ?>

		</main>
	</div>

<?php get_footer(); ?>
