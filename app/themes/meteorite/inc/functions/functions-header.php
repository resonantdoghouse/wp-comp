<?php
/**
 * Header functions
 *
 * @package Meteorite
 */


/**
 * Preloader
 */
function meteorite_preloader() {
	if ( get_theme_mod('preloader_type', 'none') == 'wave' ) : ?>
		<div id="preloader">
			<div class="preloader-type-wave">
				<div class="spinner">
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>
			</div>
		</div>
	<?php
	elseif ( get_theme_mod('preloader_type', 'none') == 'dots' ) : ?>
		<div id="preloader">
			<div class="preloader-type-dots">
				<div class="spinner">
					<div class="dot1"></div>
					<div class="dot2"></div>
				</div>
			</div>
		</div>
	<?php
	elseif ( get_theme_mod('preloader_type', 'none') == 'circles' ) : ?>
		<div id="preloader">
			<div class="preloader-type-circles">
				<div class="spinner">
				</div>
			</div>
		</div>
	<?php
	endif;
}
add_action('meteorite_before_site', 'meteorite_preloader', 7);

/**
 * Fullscreen Search
 */
function meteorite_fullscreen_search() {
	if ( get_theme_mod('search_type', 'search_fullscreen') == 'search_fullscreen' ) : ?> 
	<div id="search-fullscreen" class="meteorite-header-search">
		<div class="overlay-search">
			<div class="overlay-search-close"><a href="#" title="<?php esc_html_e( 'Close search', 'meteorite' ); ?>"><i class="fa fa-remove"></i></a></div>
			<div class="search-form">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	<?php 
	endif;
}
add_action('meteorite_before_site', 'meteorite_fullscreen_search', 8);

/**
 * Topbar
 */
if ( ! function_exists('meteorite_nav_topbar') ) :
function meteorite_nav_topbar() {
	if ( get_theme_mod('topbar_type', 'none') != 'none' ) {

		$claim = '';
		if ( get_theme_mod('claim', 'Display your clame here.') != '' ) {
			$claim .= "<span class='claim'>" . esc_html(get_theme_mod("claim", __("Display your claim here.", 'meteorite'))) . "</span>";
		}
		$contact = '';
		if ( get_theme_mod('tel', '111.222.333') != '' ) {
			$contact .= "<span class='tel'>" . esc_html(get_theme_mod("tel", "+1 (0) 999-000")) . "</span>";
		} 
		if ( get_theme_mod('email', 'example@company.com') != '' ) {
			$contact .= "<a href='mailto:" . antispambot(sanitize_email(get_theme_mod('email', 'example@company.com'))) . "'><span class='email'>" . antispambot(sanitize_email(get_theme_mod('email', 'example@company.com'))) . "</span></a>";
		}
		$social = '';
		if ( get_theme_mod('social-media-one', 'www.facebook.com') != '' ) {
			$social .= "<li><a href='" . esc_url(get_theme_mod('social-media-one', 'www.facebook.com')) . "' target='_blank'></a></li>";
		}
		if ( get_theme_mod('social-media-two', 'plus.google.com') != '' ) {
			$social .= "<li><a href='" . esc_url(get_theme_mod('social-media-two', 'plus.google.com')) . "' target='_blank'></a></li>";
		}
		if ( get_theme_mod('social-media-three', 'www.youtube.com') != '' ) {
			$social .= "<li><a href='" . esc_url(get_theme_mod('social-media-three', 'www.youtube.com')) . "' target='_blank'></a></li>";
		}
		if ( get_theme_mod('social-media-four', 'twitter.com') != '' ) {
			$social .= "<li><a href='" . esc_url(get_theme_mod('social-media-four', 'twitter.com')) . "' target='_blank'></a></li>";
		}
		if ( get_theme_mod('social-media-five', 'linkedin.com') != '' ) {
			$social .= "<li><a href='" . esc_url(get_theme_mod('social-media-five', 'linkedin.com')) . "' target='_blank'></a></li>";
		}
		if ( get_theme_mod('social-media-six', 'pinterest.com') != '' ) {
			$social .= "<li><a href='" . esc_url(get_theme_mod('social-media-six', 'pinterest.com')) . "' target='_blank'></a></li>";
		} ?>
		
		<div class="topbar">
			<div class="container">
				<div class="row">
					<?php if ( get_theme_mod('topbar_type', 'none') == 'topbar_1' ) { ?>
						<div class="contact-field contact-field-left col-md-8">
							<?php echo $contact; ?>
						</div>
						<div class="social-icons social-nav social-nav-right col-md-4">
							<nav>
								<ul>
									<?php echo $social; ?>
								</ul>
							</nav>
						</div>
					<?php } elseif ( get_theme_mod('topbar_type', 'none') == 'topbar_2' ) { ?>
						<div class="social-icons social-nav social-nav-left col-md-4">
							<nav>
								<ul>
									<?php echo $social; ?>
								</ul>
							</nav>
						</div>
						<div class="claim-field claim-field-right col-md-8">
							<?php echo $claim; ?>
						</div>
					<?php } elseif ( get_theme_mod('topbar_type', 'none') == 'topbar_3' ) { ?>
						<div class="contact-field contact-field-left col-md-6">
							<nav>
								<?php echo $contact; ?>
							</nav>
						</div>
						<div class="claim-field claim-field-right col-md-6">
							<?php echo $claim; ?>
						</div>
					<?php } elseif ( get_theme_mod('topbar_type', 'none') == 'topbar_4' ) { ?>
						<div class="topbar-nav topbar-nav-left col-md-8">
							<nav>
								<?php if ( has_nav_menu('topbar') ) {
									wp_nav_menu( array('theme_location' => 'topbar', 'menu_id' => 'topbar-menu', 'depth' => 1 ) ); ?>
								<?php } ?>
							</nav>
						</div>
							<div class="social-icons social-nav social-nav-right col-md-4">
							<nav>
								<ul>
									<?php echo $social; ?>
								</ul>
							</nav>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
	}
}
endif;

/**
 * Site branding
 */
if ( ! function_exists('meteorite_sitebranding') ):
function meteorite_sitebranding() {
	$logo_light = get_theme_mod( 'logo_light', '' );
	$has_custom_logo = has_custom_logo();
	
	if ( $has_custom_logo || $logo_light) {
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			the_custom_logo();
		}
		if ( $logo_light ) {
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr(get_bloginfo('name')) . '"><img class="site-logo light" src="' . esc_url($logo_light) . '" alt="' . esc_attr(get_bloginfo('name')) . '" /></a>'; 
		}
	} else {
		echo '<div class="site-brand">';
		if ( is_front_page() && is_home() ) :
			echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo('name', 'display') . '</a></h1>';
		else :
			echo '<p class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo('name', 'display') . '</a></p>';
		endif;
		echo '<p class="site-description">' . get_bloginfo('description', 'display') . '</p>';
		echo '</div>'; // /.site-brand
	}
}
endif;

/**
 * Main Navigation
 */
if ( ! function_exists('meteorite_nav') ) :
function meteorite_nav() { 
	do_action('meteorite_before_header');
	?>
	<header id="masthead" class="site-header <?php meteorite_menu_position(); ?>" role="banner">
		<?php meteorite_nav_topbar(); ?>
		<div class="nav-container <?php meteorite_sticky_menu(); ?>">
			<div class="container">
				<div class="row">
					<div class="logo-container col-md-3 col-sm-9 col-xs-9">
						<?php meteorite_sitebranding(); ?>
					</div>
					<div class="navicon col-sm-9 col-xs-3">
						<?php if ( get_theme_mod('mobile_menu_type', 'fancy') == 'fancy' ) : ?>
							<button type="button" class="btn-menu fancy"><span></span></button>
						<?php else : ?>
							<button type="button" class="btn-menu classic"><i class="fa fa-bars"></i></button>
						<?php endif; ?>
					</div>
					<nav id="main-nav" class="col-md-9" role="navigation">
						<ul id="primary-menu" class="menu">
							<?php 
							wp_nav_menu( array('theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => '', 'items_wrap' => '%3$s', 'fallback_cb' => 'meteorite_menu_fallback' ) ); ?>
							<?php 
							if ( get_theme_mod('search_checkbox', 1) != 0 ) : ?>
								<li class="search-button"> 
									<div class="search-wrapper">
										<a href="#" class="search-button-toggle">
											<i class="fa fa-search"></i>
										</a>
									</div>
									<?php if ( get_theme_mod('search_type', 'search_fullscreen') == 'search_under_header' ) : ?> 
									<div id="search-under-header" class="meteorite-header-search">
										<div class="overlay-search">
											<div class="search-form">
												<?php get_search_form(); ?>
											</div>
										</div>
									</div>
									<?php endif; ?>
								</li>
							<?php 
							endif;
							?>
						</ul>
					</nav>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div id="mobile-menu">
			<div class="container">
				<ul>
					<?php 
					wp_nav_menu( array('theme_location' => 'primary', 'menu_id' => 'primary-mobile-menu', 'container' => '', 'items_wrap' => '%3$s', 'fallback_cb' => 'meteorite_menu_fallback' ) );

					if ( get_theme_mod('search_checkbox', 1) != 0 ) : ?>
						<li id="searchform-mobile"> 
							<?php get_search_form(); ?>
						</li>
					<?php 
					endif;
					?>
				</ul>
			</div>
		</div>
	</header>
	<?php 
	do_action('meteorite_after_header');
}
endif;

/**
 * Check if header exsists and echo class for use in #page
 */
if ( ! function_exists('meteorite_has_header') ) :
function meteorite_has_header() {
	
	$terra_themes_header_slider_shortcode = '';
	global $post;
	// Pages with no posts (like 404 or search without results) don't have a page ID
	$id = ( isset( $post->ID ) ? get_the_ID() : NULL );

	if ( is_home() && get_option('page_for_posts') ) {
		$terra_themes_header_slider_shortcode = get_post_meta(get_option('page_for_posts'), '_terra_themes_header_slider', true);
	} elseif ( get_post_meta($post->ID, '_terra_themes_header_slider', true) ) {
		$terra_themes_header_slider_shortcode = get_post_meta($post->ID, '_terra_themes_header_slider', true);
	}

	if ( get_theme_mod('header_image_active', 1) == 1 ) {
		if ( !is_single() && !is_archive() && !is_search() && !is_404() && ( is_page() && has_post_thumbnail() || is_home() && get_option('page_for_posts') && has_post_thumbnail( get_option('page_for_posts') ) ) ) { 
			echo ' has-header';
		} elseif ( get_theme_mod('header_image_active', 1) == 1 && ( is_singular( 'post' ) && has_post_thumbnail() && get_theme_mod('single_header_image') == 'full_width_image' ) ) {
			echo ' has-header';
		} elseif ( get_theme_mod('header_image_active', 1) == 1 && ( is_singular( 'projects' ) && has_post_thumbnail() && get_theme_mod('projects_header_image') == 'full_width_image' ) ) {
			echo ' has-header';
		} elseif ( shortcode_exists('terra-themes-header-slider') && !empty($terra_themes_header_slider_shortcode) && ( is_page() || is_singular('post') && get_theme_mod('single_header_image', 'none') == 'full_width_image' || is_singular('projects') && get_theme_mod('projects_header_image', 'none') == 'full_width_image' ) ) {
			echo ' has-header has-slider';
		} else {
			echo ' has-not-header';
		}
	} else {
		echo ' has-not-header';
	}
}
endif;

/**
 * Check if header exsists and return value
 */
if ( ! function_exists('meteorite_check_header') ) :
function meteorite_check_header() {
	
	$terra_themes_header_slider_shortcode = '';
	global $post;
	// Pages with no posts (like 404 or search without results) don't have a page ID
	$id = ( isset( $post->ID ) ? get_the_ID() : NULL );

	if ( is_home() ) {
		$terra_themes_header_slider_shortcode = get_post_meta(get_option('page_for_posts'), '_terra_themes_header_slider', true);
	} elseif ( isset($id) && get_post_meta($post->ID, '_terra_themes_header_slider', true) ) {
		$terra_themes_header_slider_shortcode = get_post_meta($post->ID, '_terra_themes_header_slider', true);
	}

	if ( get_theme_mod('header_image_active', 1) == 1 ) {
		if ( 
			( shortcode_exists('terra-themes-header-slider') && !empty( $terra_themes_header_slider_shortcode ) && ( is_page() || is_singular('post') && get_theme_mod('single_header_image', 'none') == 'full_width_image' || is_singular('projects') && get_theme_mod('projects_header_image', 'none') == 'full_width_image' )  )
			|| ( !is_archive() && !is_search() && !is_404() )
			&& ( 
				is_page() && has_post_thumbnail() 
				|| ( is_home() && has_post_thumbnail( get_option('page_for_posts') ) )
				|| ( is_singular( 'post' ) && has_post_thumbnail() && get_theme_mod('single_header_image') == 'full_width_image' )
				|| ( is_singular( 'projects' ) && has_post_thumbnail() && get_theme_mod('projects_header_image') == 'full_width_image' )
				) 
		) { 
			return 'has-header';
		} else {
			return 'has-not-header';
		}
	} else {
		return 'has-not-header';
	}
}
endif;

/**
 * Echo menu position class
 */
if ( ! function_exists('meteorite_menu_position') ) :
function meteorite_menu_position() {
	if ( get_theme_mod('menu_pos', 'above') == 'below' ) { 
		echo ' below';
	} else if ( get_theme_mod('menu_pos', 'above') == 'above_solid' ) {
		echo ' above above-solid';
	} else {
		echo ' above';
	}
}
endif;

/**
 * Echo sticky class
 */
if ( ! function_exists('meteorite_sticky_menu') ) :
function meteorite_sticky_menu() {
	if ( get_theme_mod('sticky_menu', 'sticky') == 'sticky' ) {
		echo ' sticky';
	} else {
		echo ' static';
	}
}
endif;

/**
 * Header Titlebar
 */
if ( ! function_exists('meteorite_header_titlebar') ) :
function meteorite_header_titlebar() {
	if ( get_theme_mod('header_titlebar', 'off') == 'on' && ! is_front_page() ) : ?>
		<header class="titlebar entry-header">
			<div class="container">
				<div class="row">
					<div class="titlebar-content clearfix">
						<div class="col-md-9">
						<?php 
						if ( is_page() ) :
							echo '<h1 class="entry-title">' . get_the_title() . '</h1>';

						elseif ( is_single() && ( get_theme_mod('hide_title_single') != 1 && is_singular( 'post' ) || get_theme_mod('hide_title_single_projects') != 1 && is_singular( 'projects' ) ) ) :
							echo '<h1 class="entry-title">' . get_the_title() . '</h1>';

						elseif ( is_home() ) :
							echo '<h1 class="entry-title">' . get_the_title( get_option( 'page_for_posts' ) ) . '</h1>';

						elseif ( is_category() ) :
							echo '<h1 class="entry-title">' . single_cat_title( '', false ) . '</h1>';

						elseif ( is_search() ) : 
						?>
							<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'meteorite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						<?php
						elseif ( is_404() ) :
							echo '<h1 class="entry-title">' . esc_html__( 'Oops! That page can&rsquo;t be found.', 'meteorite' ) . '</h1>';
						
						elseif ( is_tag() ) :
							echo '<h1 class="entry-title">' . single_tag_title() . '</h1>';

						elseif ( is_day() ) :
							echo '<h1 class="entry-title">' . get_the_date() . '</h1>';

						elseif ( is_month() ) :
							echo '<h1 class="entry-title">' . get_the_date( 'F Y' ) . '</h1>';

						elseif ( is_year() ) :
							echo '<h1 class="entry-title">' . get_the_date( 'Y' ) . '</h1>';

						elseif ( is_tax() ) :
							echo '<h1 class="entry-title">' . single_term_title('', false) . '</h1>';

						// must be after is_year/month/day; otherwise they won't execute because is_archive would be true
						elseif ( is_archive() ) :
							the_archive_title( '<h1 class="entry-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );

						elseif ( class_exists( 'Woocommerce') && is_woocommerce() && !is_archive() ) :
							echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
							remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 8 );
						endif;
						?>
						</div>

						<?php 
						// breadcrumbs
						$yoast_bc = false;
						$woo_bc = false;
						if ( function_exists('yoast_breadcrumb') && get_theme_mod('enable_yoast_breadcrumbs', 0) == 1 ) {
							$yoast_bc = true;
						}
						if ( class_exists('WooCommerce') && get_theme_mod('enable_woocommerce_breadcrumbs', 0) == 1 ) {
							$woo_bc = true;
						}

						if ( $yoast_bc || $woo_bc ) {
							if ( is_woocommerce() && $woo_bc ) { ?>
								<div class="meteorite-breadcrumb meteorite-woo">
									<?php
									$delimiter = apply_filters( 'meteorite_woocommerce_delimiter', '/' );
									$args = array(
											'delimiter' => $delimiter
									);
									woocommerce_breadcrumb( $args ); ?>
								</div>
							<?php }
							elseif ( $yoast_bc ) { ?>
								<div class="meteorite-breadcrumb meteorite-yoast">
								<?php
								yoast_breadcrumb('<p id="breadcrumbs">','</p>');
								?>
								</div>
						<?php }
						} ?>

						<?php if ( get_theme_mod('hide_meta_single') != 1 && is_singular( 'post' ) ) : ?>
						<div class="entry-meta post-meta col-md-12">
							<?php meteorite_meta_info(); ?>
						</div><!-- .single-meta -->
						<?php endif; ?>

						<?php if ( get_theme_mod('hide_meta_single_projects', 1) != 1 && is_singular( 'projects' ) ) : ?>
						<div class="entry-meta post-meta col-md-12">
							<?php meteorite_meta_info(); ?>
						</div>
						<?php endif; ?>

					</div>
				</div>
			</div>
			<?php do_action('meteorite_inside_titlebar'); ?>
		</header>
	<?php
	endif;
}
endif;

/**
 * Header hero area
 */
if ( ! function_exists('meteorite_header_hero_area') ) :
function meteorite_header_hero_area() {

	if ( get_theme_mod('header_image_active', 1) == 1 && meteorite_check_header() == 'has-header' ) :
		echo '<div class="header-area">';
		// Header arrow button
		$header_button = '';
		$header_image_arrow_url = get_theme_mod('headerimage_page_button_url', '#content');
		if ( get_theme_mod('headerimage_fp_button_checkbox', 0) == 1 && is_front_page() ) {
			$header_button = '<a href="' . esc_url($header_image_arrow_url) . '" class="header-button header-button-down smooth-scroll"><i class="fa fa-angle-down"></i></a>';
		} elseif ( get_theme_mod('headerimage_page_button_checkbox', 0) == 1 && !is_front_page() ) {
			$header_button = '<a href="' . esc_url($header_image_arrow_url) . '" class="header-button header-button-down smooth-scroll"><i class="fa fa-angle-down"></i></a>';
		}
		// Header overlay
		$overlay = '';
		if ( get_theme_mod('headerimage_overlay_checkbox', 0) == 0 ) {
			$overlay = '<div class="overlay"></div>';
		}
		// Get Header Shortcode
		global $post;
		if ( is_home() ) {
			$terra_themes_header_slider_shortcode = get_post_meta(get_option('page_for_posts'), '_terra_themes_header_slider', true);
		} elseif ( get_post_meta($post->ID, '_terra_themes_header_slider', true) ) {
			$terra_themes_header_slider_shortcode = get_post_meta($post->ID, '_terra_themes_header_slider', true);
		}

		if ( ! empty( $terra_themes_header_slider_shortcode ) && shortcode_exists( 'terra-themes-header-slider' ) ) { 			// Shortcode
			if ( is_page() || is_singular('post') && get_theme_mod('single_header_image', 'none') == 'full_width_image' || is_singular('projects') && get_theme_mod('projects_header_image', 'none') == 'full_width_image' ) {
				echo '<div class="shortcode-header">' . do_shortcode($terra_themes_header_slider_shortcode) . '</div>';
			}
		} elseif ( has_post_thumbnail() || has_post_thumbnail( get_option('page_for_posts') ) ) {						// Image
			if ( is_front_page() || is_page() ) { 

				$responsive_header_image = '';
				if ( get_theme_mod('header_image_responsive', 0) == 1 ) { 
					$responsive_header_image = 'responsive-header-image'; 
				}
				$src = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				// Page details
				$header_image_title  	= get_post_meta($post->ID, '_meteorite_image_header_title', true);
				$header_image_title_tag = get_post_meta($post->ID, '_meteorite_image_header_title_tag', true);
				$header_image_text 	 	= get_post_meta($post->ID, '_meteorite_image_header_text', true);
				$header_image_text_tag 	= get_post_meta($post->ID, '_meteorite_image_header_text_tag', true);
				$cta_button_text_one 	= get_post_meta($post->ID, '_meteorite_header_button_text_one', true);
				$cta_button_link_one 	= get_post_meta($post->ID, '_meteorite_header_button_link_one', true);
				$cta_button_text_two 	= get_post_meta($post->ID, '_meteorite_header_button_text_two', true);
				$cta_button_link_two 	= get_post_meta($post->ID, '_meteorite_header_button_link_two', true);

				$tagOptions = array('', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6');
				if ( in_array($header_image_title_tag, $tagOptions) && !empty($header_image_title_tag) ) {
					$title_tag = $header_image_title_tag;
				} else {
					$title_tag = 'h2';
				}
				if ( in_array($header_image_text_tag, $tagOptions) && !empty($header_image_text_tag) ) {
					$text_tag = $header_image_text_tag;
				} else {
					$text_tag = 'p';
				} ?>
				<div class="header-container <?php echo $responsive_header_image; ?>">
					<div class="parallax-header header-image" style="background-image: url('<?php echo esc_url($src); ?>');">
						<?php if ( get_theme_mod('header_image_responsive', 0) == 1 ) : ?>
							<img class="header-image-small" src="<?php echo esc_url($src) ?>" />
						<?php endif; ?>
						<?php echo $overlay; ?>
						<div class="parallax-text container">
							<?php if ( $header_image_title ) { echo '<' . esc_attr($title_tag) . ' class="header-image-heading">' . esc_html($header_image_title) . '</' . esc_attr($title_tag) . '>'; } ?>
							<?php if ( $header_image_text ) { echo '<' . esc_attr($text_tag) . ' class="header-image-text">' . esc_html($header_image_text) . '</' . esc_attr($text_tag) . '>'; } ?>
							<?php if ( !empty($cta_button_text_one) || !empty($cta_button_text_two) ) { ?>
							<div class="header-cta-buttons">
								<?php if ( !empty($cta_button_text_one) ) { ?>
									<a href="<?php echo esc_url($cta_button_link_one); ?>" class="header-cta-one meteorite-button"><?php echo esc_html($cta_button_text_one); ?></a>
								<?php }
								if ( !empty($cta_button_text_two) ) { ?>
									<a href="<?php echo esc_url($cta_button_link_two); ?>" class="header-cta-two meteorite-button border"><?php echo esc_html($cta_button_text_two); ?></a>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
						<?php echo $header_button; ?>
					</div>
				</div>
			<?php 
			} elseif ( is_singular( 'post' ) ) {

				$responsive_header_image = '';
				if ( get_theme_mod('header_image_responsive', 0) == 1 ) { 
					$responsive_header_image = 'responsive-header-image'; 
				}
				$src = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				// Page details
				$header_image_title  	= get_post_meta($post->ID, '_meteorite_post_image_header_title', true);
				$header_image_title_tag = get_post_meta($post->ID, '_meteorite_post_image_header_title_tag', true);
				$header_image_text 	 	= get_post_meta($post->ID, '_meteorite_post_image_header_text', true);
				$header_image_text_tag 	= get_post_meta($post->ID, '_meteorite_post_image_header_text_tag', true);
				$cta_button_text_one 	= get_post_meta($post->ID, '_meteorite_post_header_button_text_one', true);
				$cta_button_link_one 	= get_post_meta($post->ID, '_meteorite_post_header_button_link_one', true);
				$cta_button_text_two 	= get_post_meta($post->ID, '_meteorite_post_header_button_text_two', true);
				$cta_button_link_two 	= get_post_meta($post->ID, '_meteorite_post_header_button_link_two', true);

				$tagOptions = array('', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6');
				if ( in_array($header_image_title_tag, $tagOptions) && !empty($header_image_title_tag) ) {
					$title_tag = $header_image_title_tag;
				} else {
					$title_tag = 'h2';
				}
				if ( in_array($header_image_text_tag, $tagOptions) && !empty($header_image_text_tag) ) {
					$text_tag = $header_image_text_tag;
				} else {
					$text_tag = 'p';
				} ?>
				<div class="header-container <?php echo $responsive_header_image; ?>">
					<div class="parallax-header header-image" style="background-image: url('<?php echo esc_url($src); ?>');">
						<?php if ( get_theme_mod('header_image_responsive', 0) == 1 ) : ?>
							<img class="header-image-small" src="<?php echo esc_url($src) ?>" />
						<?php endif; ?>
						<?php echo $overlay; ?>
						<div class="parallax-text container">
							<?php if ( $header_image_title ) { echo '<' . esc_attr($title_tag) . ' class="header-image-heading">' . esc_html($header_image_title) . '</' . esc_attr($title_tag) . '>'; } ?>
							<?php if ( $header_image_text ) { echo '<' . esc_attr($text_tag) . ' class="header-image-text">' . esc_html($header_image_text) . '</' . esc_attr($text_tag) . '>'; } ?>
							<?php if ( !empty($cta_button_text_one) || !empty($cta_button_text_two) ) { ?>
							<div class="header-cta-buttons">
								<?php if ( !empty($cta_button_text_one) ) { ?>
									<a href="<?php echo esc_url($cta_button_link_one); ?>" class="header-cta-one meteorite-button"><?php echo esc_html($cta_button_text_one); ?></a>
								<?php }
								if ( !empty($cta_button_text_two) ) { ?>
									<a href="<?php echo esc_url($cta_button_link_two); ?>" class="header-cta-two meteorite-button border"><?php echo esc_html($cta_button_text_two); ?></a>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
						<?php echo $header_button; ?>
					</div>
				</div>
			<?php 
			} elseif ( is_singular( 'projects' ) ) {

				$responsive_header_image = '';
				if ( get_theme_mod('header_image_responsive', 0) == 1 ) { 
					$responsive_header_image = 'responsive-header-image'; 
				}
				$src = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				// Page details
				$header_image_title  	= get_post_meta($post->ID, '_meteorite_project_image_header_title', true);
				$header_image_title_tag = get_post_meta($post->ID, '_meteorite_project_image_header_title_tag', true);
				$header_image_text 	 	= get_post_meta($post->ID, '_meteorite_project_image_header_text', true);
				$header_image_text_tag 	= get_post_meta($post->ID, '_meteorite_project_image_header_text_tag', true);
				$cta_button_text_one 	= get_post_meta($post->ID, '_meteorite_project_header_button_text_one', true);
				$cta_button_link_one 	= get_post_meta($post->ID, '_meteorite_project_header_button_link_one', true);
				$cta_button_text_two 	= get_post_meta($post->ID, '_meteorite_project_header_button_text_two', true);
				$cta_button_link_two 	= get_post_meta($post->ID, '_meteorite_project_header_button_link_two', true);

				$tagOptions = array('', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6');
				if ( in_array($header_image_title_tag, $tagOptions) && !empty($header_image_title_tag) ) {
					$title_tag = $header_image_title_tag;
				} else {
					$title_tag = 'h2';
				}
				if ( in_array($header_image_text_tag, $tagOptions) && !empty($header_image_text_tag) ) {
					$text_tag = $header_image_text_tag;
				} else {
					$text_tag = 'p';
				} ?>
				<div class="header-container <?php echo $responsive_header_image; ?>">
					<div class="parallax-header header-image" style="background-image: url('<?php echo esc_url($src); ?>');">
						<?php if ( get_theme_mod('header_image_responsive', 0) == 1 ) : ?>
							<img class="header-image-small" src="<?php echo esc_url($src) ?>" />
						<?php endif; ?>
						<?php echo $overlay; ?>
						<div class="parallax-text container">
							<?php if ( $header_image_title ) { echo '<' . esc_attr($title_tag) . ' class="header-image-heading">' . esc_html($header_image_title) . '</' . esc_attr($title_tag) . '>'; } ?>
							<?php if ( $header_image_text ) { echo '<' . esc_attr($text_tag) . ' class="header-image-text">' . esc_html($header_image_text) . '</' . esc_attr($text_tag) . '>'; } ?>
							<?php if ( !empty($cta_button_text_one) || !empty($cta_button_text_two) ) { ?>
							<div class="header-cta-buttons">
								<?php if ( !empty($cta_button_text_one) ) { ?>
									<a href="<?php echo esc_url($cta_button_link_one); ?>" class="header-cta-one meteorite-button"><?php echo esc_html($cta_button_text_one); ?></a>
								<?php }
								if ( !empty($cta_button_text_two) ) { ?>
									<a href="<?php echo esc_url($cta_button_link_two); ?>" class="header-cta-two meteorite-button border"><?php echo esc_html($cta_button_text_two); ?></a>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
						<?php echo $header_button; ?>
					</div>
				</div>
			<?php 
			} elseif ( is_home() ) {

				$responsive_header_image = '';
				if ( get_theme_mod('header_image_responsive', 0) == 1 ) { 
					$responsive_header_image = 'responsive-header-image'; 
				}
				$src = wp_get_attachment_url( get_post_thumbnail_id( get_option('page_for_posts') ) );
				// Page details
				$header_image_title  	= get_post_meta( get_option('page_for_posts'), '_meteorite_image_header_title', true);
				$header_image_title_tag = get_post_meta( get_option('page_for_posts'), '_meteorite_image_header_title_tag', true);
				$header_image_text 	 	= get_post_meta( get_option('page_for_posts'), '_meteorite_image_header_text', true);
				$header_image_text_tag 	= get_post_meta( get_option('page_for_posts'), '_meteorite_image_header_text_tag', true);
				$cta_button_text_one 	= get_post_meta( get_option('page_for_posts'), '_meteorite_header_button_text_one', true);
				$cta_button_link_one 	= get_post_meta( get_option('page_for_posts'), '_meteorite_header_button_link_one', true);
				$cta_button_text_two 	= get_post_meta( get_option('page_for_posts'), '_meteorite_header_button_text_two', true);
				$cta_button_link_two 	= get_post_meta( get_option('page_for_posts'), '_meteorite_header_button_link_two', true);

				$tagOptions = array('', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6');
				if ( in_array($header_image_title_tag, $tagOptions) && !empty($header_image_title_tag) ) {
					$title_tag = $header_image_title_tag;
				} else {
					$title_tag = 'h2';
				}
				if ( in_array($header_image_text_tag, $tagOptions) && !empty($header_image_text_tag) ) {
					$text_tag = $header_image_text_tag;
				} else {
					$text_tag = 'p';
				} ?>
				<div class="header-container <?php echo $responsive_header_image; ?>">
					<div class="parallax-header header-image" style="background-image: url('<?php echo esc_url($src); ?>');">
						<?php if ( get_theme_mod('header_image_responsive', 0) == 1 ) : ?>
							<img class="header-image-small" src="<?php echo esc_url($src) ?>" />
						<?php endif; ?>
						<?php echo $overlay; ?>
						<div class="parallax-text container">
							<?php if ( $header_image_title ) { echo '<' . esc_attr($title_tag) . ' class="header-image-heading">' . esc_html($header_image_title) . '</' . esc_attr($title_tag) . '>'; } ?>
							<?php if ( $header_image_text ) { echo '<' . esc_attr($text_tag) . ' class="header-image-text">' . esc_html($header_image_text) . '</' . esc_attr($text_tag) . '>'; } ?>
							<?php if ( !empty($cta_button_text_one) || !empty($cta_button_text_two) ) { ?>
							<div class="header-cta-buttons">
								<?php if ( !empty($cta_button_text_one) ) { ?>
									<a href="<?php echo esc_url($cta_button_link_one); ?>" class="header-cta-one meteorite-button"><?php echo esc_html($cta_button_text_one); ?></a>
								<?php }
								if ( !empty($cta_button_text_two) ) { ?>
									<a href="<?php echo esc_url($cta_button_link_two); ?>" class="header-cta-two meteorite-button border"><?php echo esc_html($cta_button_text_two); ?></a>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
						<?php echo $header_button; ?>
					</div>
				</div>
			<?php 
			}
		}
		do_action('meteorite_inside_hero');
		echo '</div>'; // /.header-area
		do_action('meteorite_after_hero');
	endif;
}
endif;