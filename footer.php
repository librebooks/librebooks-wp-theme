<div class="clear"></div>

</div><!--//main_container-->
<div id="footer">
	<div class="footer_container">
		<?php if (get_theme_mod('librebooks_footer_rights')) { ?>
		<div class="footer_text" >
			<?php echo do_shortcode(htmlspecialchars_decode(get_theme_mod('librebooks_footer_rights'))); ?>
		</div>
		<?php } ?>
	</div>
</div><!--//footer-->
<?php wp_footer(); ?>
<?php if (get_theme_mod('librebooks_custom_footer_code')) {
	echo get_theme_mod('librebooks_custom_footer_code');
} ?>

</body>
</html>