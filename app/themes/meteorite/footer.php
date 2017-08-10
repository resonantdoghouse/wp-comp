<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Meteorite
 */

?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->

	<?php do_action('meteorite_before_footer'); ?>

	<div class="footer-area">

	<?php meteorite_footer_sidebar(); ?>

	<a class="scroll-to-top" href="#"><span class="upbutton"><i class="fa fa-angle-up"></i></span></a>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php meteorite_footer_credits(); ?>

			<?php meteorite_footer_menu(); ?>
		</div><!-- .container -->
	</footer><!-- #colophon -->
	</div>

	<?php do_action('meteorite_after_footer'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
