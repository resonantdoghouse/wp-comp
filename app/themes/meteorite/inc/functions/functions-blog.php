<?php
/**
 * Blog functions
 *
 * @package Meteorite
 */

/**
 * Echo the post date
 */
if ( ! function_exists('meteorite_get_time_string') ) :
function meteorite_get_time_string() {
	$time_string = '<time class="published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	echo $time_string;
}
endif;

/**
 * Remove archives labels
 */
function meteorite_category_label($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } elseif ( is_day() ) {
		$title = '<h1>' . get_the_date() . '</h1>';
	} elseif ( is_month() ) {
		$title = '<h1>' . get_the_date( 'F Y' ) . '</h1>';
	} elseif ( is_year() ) {
		$title = '<h1>' . get_the_date( 'Y' ) . '</h1>';
	}

    return $title;
}
add_filter('get_the_archive_title', 'meteorite_category_label');

/**
 * Change the excerpt length
 */
function meteorite_excerpt_length( $length ) {
  $excerpt = get_theme_mod('excerpt_length', '55');
  return $excerpt;
}
add_filter( 'excerpt_length', 'meteorite_excerpt_length', 999 );