<?php
/*
Template Name: Full width
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="entry-content">
			<?php while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // end of the loop. ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

