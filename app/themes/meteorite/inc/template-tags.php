<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Meteorite
 */


if ( ! function_exists( 'meteorite_meta_info' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function meteorite_meta_info() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
	
	if ( get_theme_mod('header_titlebar', 'off') == 'on' ) {
		global $post;
		$username = get_userdata( $post->post_author );
		$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( $post->post_author ) ) . '">' . esc_html( $username->display_name ) . '</a></span>';
	} else {
		$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
	}

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

	$categories_list = get_the_category_list( __( ', ', 'meteorite' ) );
	if ( $categories_list && meteorite_categorized_blog() ) {
		printf( '<span class="cat-links">' . ( '%1$s' ) . '</span>', $categories_list );
	}

	if ( 'projects' == get_post_type() ) {
		$project_categories = get_the_term_list( '', 'project-category', '', ', ', '' );
		if ( $project_categories ) {
			printf( '<span class="cat-links">' . ( '%1$s' ) . '</span>', $project_categories );
		}
	}

	if ( !is_single() && !post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'meteorite' ), __( '1 Comment', 'meteorite' ), __( '% Comments', 'meteorite' ) );
		echo '</span>';
	}

	// Hide tags for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'meteorite' ) );
		if ( $tags_list && is_single() ) {
			printf( '<span class="tags-links">' . __( ' %1$s', 'meteorite' ) . '</span>', $tags_list );
		}
	}
}
endif;


if ( ! function_exists( 'meteorite_entry_footer' ) ) :
/**
 * Prints Edit Post Link
 */
function meteorite_entry_footer() {
	edit_post_link( __( 'Edit', 'meteorite' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'meteorite_post_navigation' ) ) :
/**
 * Prints HTML with post titles
 */
function meteorite_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	} ?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'meteorite' ); ?></h2>
		<div class="nav-links clearfix">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div>
	</nav>
	<?php
}
endif;

if ( ! function_exists( 'meteorite_project_navigation' ) ) :
/**
 * Prints HTML with project titles
 */
function meteorite_project_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	} 

	$project_page = get_theme_mod('project_page_url'); ?>

	<nav class="navigation posts-navigation project-single-nav" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'meteorite' ); ?></h2>
		<div class="nav-links clearfix">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				if ( $project_page ) : ?>
					<span class="see-all-link"><a href="<?php echo esc_url($project_page); ?>"><span class="screen-reader-text"><?php _e('Back to the project overview', 'meteorite') ?></span></a></span>
				<?php endif;
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div>
	</nav>
	<?php
}
endif;

if ( ! function_exists( 'meteorite_extended_post_navigation' ) ) :
/**
 * Prints HTML with post titles and its featured images
 */
function meteorite_extended_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}

	$prevPost 		= get_adjacent_post( false, '', true );
	if ( $prevPost ) {
		$prevTitle 		= get_the_title($prevPost->ID);
		$prevLink 		= get_the_permalink($prevPost->ID);
		$prevThumbnail 	= get_the_post_thumbnail($prevPost->ID, 'meteorite-small-thumb');
	}

	$nextPost 		= get_adjacent_post( false, '', false );
	if ( $nextPost ) {
		$nextTitle 		= get_the_title($nextPost->ID);
		$nextLink 		= get_the_permalink($nextPost->ID);
		$nextThumbnail 	= get_the_post_thumbnail($nextPost->ID, 'meteorite-small-thumb');
	} ?>

	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'meteorite' ); ?></h2>
		<div class="nav-links-extended clearfix">
			<?php if ( $prevPost ) : ?>
			<div class="prev-link">
				<a href="<?php echo esc_html($prevLink); ?>">
					<?php echo $prevThumbnail; ?>
					<span class="nav-links-extended-desc">
						<?php _e('Previous Post', 'meteorite'); ?>
					</span>
					<span class="nav-links-extended-title">
						<?php echo esc_html($prevTitle); ?>
					</span>
				</a>
			</div>
			<?php endif; ?>
			<?php if ( $nextPost ) : ?>
			<div class="next-link">
				<a href="<?php echo esc_html($nextLink); ?>">
					<?php echo $nextThumbnail; ?>
					<span class="nav-links-extended-desc">
						<?php _e('Next Post', 'meteorite'); ?>
					</span>
					<span class="nav-links-extended-title">
						<?php echo esc_html($nextTitle); ?>
					</span>
				</a>
			</div>
			<?php endif; ?>
		</div>
	</nav>
	<?php
}
endif;

if ( ! function_exists( 'meteorite_extended_project_navigation' ) ) :
/**
 * Prints HTML with project titles and its featured images
 */
function meteorite_extended_project_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}

	$project_page = get_theme_mod('project_page_url');

	$prevProject 	= get_adjacent_post( false, '', true );
	if ( $prevProject ) {
		$prevTitle 		= get_the_title($prevProject->ID);
		$prevLink 		= get_the_permalink($prevProject->ID);
		$prevThumbnail 	= get_the_post_thumbnail($prevProject->ID, 'meteorite-small-thumb');
	}

	$nextProject = get_adjacent_post( false, '', false );
	if ( $nextProject ) {
		$nextTitle 		= get_the_title($nextProject->ID);
		$nextLink 		= get_the_permalink($nextProject->ID);
		$nextThumbnail 	= get_the_post_thumbnail($nextProject->ID, 'meteorite-small-thumb');
	} ?>

	<nav class="navigation posts-navigation project-single-nav clearfix" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'meteorite' ); ?></h2>
		<div class="nav-links-extended clearfix">
			<?php if ( $prevProject ) : ?>
			<div class="prev-link">
				<a href="<?php echo esc_url($prevLink); ?>">
					<?php echo $prevThumbnail; ?>
					<span class="nav-links-extended-desc">
						<?php _e('Previous Project', 'meteorite'); ?>
					</span>
					<span class="nav-links-extended-title">
						<?php echo esc_html($prevTitle); ?>
					</span>
				</a>
			</div>
			<?php endif; ?>
			<?php if ( $project_page ) : ?>
				<span class="see-all-link"><a href="<?php echo esc_url($project_page); ?>"><span class="screen-reader-text"><?php _e('Back to the project overview', 'meteorite') ?></span></a></span>
			<?php endif; ?>
			<?php if ( $nextProject ) : ?>
			<div class="next-link">
				<a href="<?php echo esc_url($nextLink); ?>">
					<?php echo $nextThumbnail; ?>
					<span class="nav-links-extended-desc">
						<?php _e('Next Project', 'meteorite'); ?>
					</span>
					<span class="nav-links-extended-title">
						<?php echo esc_html($nextTitle); ?>
					</span>
				</a>
			</div>
			<?php endif; ?>
		</div>
	</nav>
	<?php
}
endif;

if ( ! function_exists( 'meteorite_post_pagination' ) ) :
/**
 * Prints HTML with pagination numbers for blog/archives
 */
function meteorite_post_pagination() {
	if ( get_the_posts_pagination() != '' ) :
		echo '<div class="posts-navigation">';
		the_posts_pagination( array(
		    'mid_size' => 2,
		    'prev_text' => __( 'Newer', 'meteorite' ),
		    'next_text' => __( 'Older', 'meteorite' ),
		) );
		echo '</div>';
	endif;
}
endif;

if ( ! function_exists( 'meteorite_post_navigation_arrows' ) ) :
/**
 * Prints HTML arrow buttons to navigate posts
 */
function meteorite_post_navigation_arrows() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	} ?>
	<nav class="navigation posts-navigation posts-navigation-arrows clearfix" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'meteorite' ); ?></h2>
		<div class="nav-links clearfix">
			<?php
				previous_post_link('%link', '<span class="prev-link-arrow"><i class="fa fa-angle-left"></i></span>');
				next_post_link('%link', '<span class="next-link-arrow"><i class="fa fa-angle-right"></i></span>');
			?>
		</div>
	</nav>
	<?php
}
endif;

if ( ! function_exists( 'meteorite_project_navigation_arrows' ) ) :
/**
 * Prints HTML arrow buttons to navigate projects
 */
function meteorite_project_navigation_arrows() {
	$project_page = get_theme_mod('project_page_url');
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	} ?>
	<nav class="project-single-nav navigation posts-navigation posts-navigation-arrows" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'meteorite' ); ?></h2>
		<span class="prev-link-arrow"><?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?></span>
		<?php if ( $project_page ) : ?>
			<span class="see-all-link"><a href="<?php echo esc_url($project_page); ?>"><span class="screen-reader-text"><?php _e('Back to the project overview', 'meteorite') ?></span></a></span>
		<?php endif; ?>
		<span class="next-link-arrow"><?php next_post_link('%link', '<i class="fa fa-angle-right"></i>'); ?></span>
		</ul>
	</nav>
	<?php
}
endif;



if ( ! function_exists( 'meteorite_about_the_author' ) ) :
/**
 * Prints HTML with meta information for the current author.
 */
function meteorite_about_the_author() {

	$byline = sprintf(
		esc_html_x( 'About the author: %s', 'post author', 'meteorite' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	if ( is_single() && get_the_author() != '' ) :
		echo '<div class="about-the-author clearfix"><div class="author-avatar">' . get_avatar( get_the_author_meta( 'ID' ), 100 ) . '</div><div class="author-description"><h4 class="byline"> ' . $byline . '</h4><p class="bio">' . nl2br(get_the_author_meta('description')) . '</p></div></div>';
	endif;

}
endif;


if ( ! function_exists('meteorite_categorized_blog') ) :
/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function meteorite_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'meteorite_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'meteorite_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so meteorite_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so meteorite_categorized_blog should return false.
		return false;
	}
}
endif;

/**
 * Flush out the transients used in meteorite_categorized_blog.
 */
function meteorite_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'meteorite_categories' );
}
add_action( 'edit_category', 'meteorite_category_transient_flusher' );
add_action( 'save_post',     'meteorite_category_transient_flusher' );
