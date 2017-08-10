<?php
/**
 * @package Meteorite
 */

// Get the meta box content
$project_type			= get_post_meta( $post->ID, 'tt-project-type', true );
$detail_heading_one		= get_post_meta( $post->ID, 'tt-project-detail-heading-one', true );
$detail_desc_one		= get_post_meta( $post->ID, 'tt-project-detail-desc-one', true );
$detail_heading_two		= get_post_meta( $post->ID, 'tt-project-detail-heading-two', true );
$detail_desc_two		= get_post_meta( $post->ID, 'tt-project-detail-desc-two', true );
$detail_heading_three	= get_post_meta( $post->ID, 'tt-project-detail-heading-three', true );
$detail_desc_three		= get_post_meta( $post->ID, 'tt-project-detail-desc-three', true );
$detail_heading_four	= get_post_meta( $post->ID, 'tt-project-detail-heading-four', true );
$detail_desc_four		= get_post_meta( $post->ID, 'tt-project-detail-desc-four', true );

$project_type_class = '';
if ( $project_type == 'Half' ) {
	$project_type_class = 'project-layout-half clearfix';
}

// Get the project details if set
$project_details = '';
if ( $detail_heading_one != '' && $detail_desc_one != '' ) {
	$project_details .= '<div class="project-details-box"><h5 class="project-details-heading">' . esc_html($detail_heading_one) . '</h5><p class="project-details-desc">' . wp_kses_post(force_balance_tags($detail_desc_one)) . '</a></p></div>';
}
if ( $detail_heading_two != '' && $detail_desc_two != '' ) {
	$project_details .= '<div class="project-details-box"><h5 class="project-details-heading">' . esc_html($detail_heading_two) . '</h5><p class="project-details-desc">' . wp_kses_post(force_balance_tags($detail_desc_two)) . '</p></div>';
}
if ( $detail_heading_three != '' && $detail_desc_three != '' ) {
	$project_details .= '<div class="project-details-box"><h5 class="project-details-heading">' . esc_html($detail_heading_three) . '</h5><p class="project-details-desc">' . wp_kses_post(force_balance_tags($detail_desc_three)) . '</p></div>';
}
if ( $detail_heading_four != '' && $detail_desc_four != '' ) {
	$project_details .= '<div class="project-details-box"><h5 class="project-details-heading">' . esc_html($detail_heading_four) . '</h5><p class="project-details-desc">' . wp_kses_post(force_balance_tags($detail_desc_four)) . '</p></div>';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($project_type_class); ?>>

	<?php if ( has_post_thumbnail() && ( get_theme_mod( 'project_feat_image' ) != 1 ) ) : ?>
		<div class="single-thumb">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<?php if ( $project_details != '' ) : // with project details ?>
		<div class="project-has-details clearfix">
			<div class="single-content">
				<header class="single-header">
					<?php if ( get_theme_mod('header_titlebar', 'off') == 'off' && get_theme_mod('hide_title_single_projects', 0) == 0 ) : ?>
					<?php the_title( '<h1 class="title-post">', '</h1>' ); ?>
					<?php endif; ?>

					<?php if ( get_theme_mod('hide_meta_single_projects', 1) != 1 && get_theme_mod('header_titlebar', 'off') == 'off' ) : ?>
					<div class="post-meta">
						<?php meteorite_meta_info(); ?>
					</div>
					<?php endif; ?>
				</header>
				<?php the_content(); ?>
			</div>
			<div class="project-details">
				<h4 class="project-details-title"><?php _e('Project Details', 'meteorite'); ?></h4>
				<?php echo $project_details; ?>
			</div>
		</div>
	<?php else : // no project details ?>
		<div class="single-content">
			<header class="single-header">
				<?php if ( get_theme_mod('header_titlebar', 'off') == 'off' && get_theme_mod('hide_title_single_projects', 0) == 0 ) : ?>
				<?php the_title( '<h1 class="title-post">', '</h1>' ); ?>
				<?php endif; ?>

				<?php if ( get_theme_mod('hide_meta_single_projects', 1) != 1 && get_theme_mod('header_titlebar', 'off') == 'off' ) : ?>
				<div class="post-meta">
					<?php meteorite_meta_info(); ?>
				</div>
				<?php endif; ?>
			</header>
			<?php the_content(); ?>
		</div>
	<?php endif; ?>

	<footer class="single-footer">
		<?php meteorite_entry_footer(); ?>
	</footer>
</article>