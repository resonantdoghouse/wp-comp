<?php
/**
 * Footer functions
 *
 * @package Meteorite
 */

/**
 * Footer sidebar
 */
if ( ! function_exists('meteorite_footer_sidebar') ) :
function meteorite_footer_sidebar() {
	if ( is_active_sidebar( 'footer-1' ) ) {
		get_sidebar('footer');
	}
}
endif;

/**
 * Footer credits
 */
if ( ! function_exists('meteorite_footer_credits') ) :
function meteorite_footer_credits() { 
	$footer_credits = get_theme_mod('footer_credits');
	?>
	<div class="site-info col-md-6">
	<?php if ( $footer_credits == '' ) : ?>
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'meteorite' ) ); ?>" rel="nofollow"><?php printf( esc_html__( 'Proudly powered by %s', 'meteorite' ), 'WordPress' ); ?></a>
		<span class="sep"> | </span>
		<?php printf( esc_html__( 'Theme: %2$s by %1$s.', 'meteorite' ), 'Terra Themes', '<a href="http://terra-themes.com/theme/meteorite" target="_blank">Meteorite</a>' ); ?>
	<?php else : ?>
		<?php echo wp_kses_post( force_balance_tags( $footer_credits ) ); ?>
	<?php endif; ?>
	</div>
<?php
}
endif;

/**
 * Footer menu
 */
if ( ! function_exists('meteorite_footer_menu') ) :
function meteorite_footer_menu() {
	if ( has_nav_menu('footer') ) :
		if ( get_theme_mod('footersocial_checkbox', 0) != 0 ) { 
		?>
			<div class="col-md-6 social-icons">
				<?php wp_nav_menu( array(
					'theme_location' => 'footer',
					'depth'          => 1,
					'container'      => false,
					'menu_id'        => 'footer-nav',
					'echo'           => 1,
					'link_before'	 => '<span class="screen-reader-text">',
					'link_after' 	 => '</span>',
				) ); ?>
				<div class="clearfix"></div>
			</div> 
		<?php 
		} else { ?>
			<div class="col-md-6">
				<?php wp_nav_menu( array(
					'theme_location' => 'footer',
					'depth'          => 1,
					'container'      => false,
					'menu_id'        => 'footer-nav',
					'echo'           => 1,
				) ); ?>
				<div class="clearfix"></div>
			</div> 
		<?php 
	}
	endif;
}
endif;