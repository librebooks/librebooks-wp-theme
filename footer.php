<div class="clear"></div>	

</div><!--//main_container-->
<div id="footer">
	<div class="footer_container">
		<div class="footer_text" >
		بكل الفخر هذا الموقع يعمل <a href="http://librebooks.org/about-site/#software-used-in-website">باستخدام</a> برمجيات حرة مفتوحة المصدر، ومحتواه منشور برخصة المشاع الإبداعي <a target="_blank" href="http://creativecommons.org/licenses/by-sa/3.0/">النسبة-بذات الرخصة، الإصدارة ٣.٠</a>.
		</div>
	</div>

</div><!--//footer-->
<?php wp_footer(); ?>
<?php if (get_theme_mod('librebooks_custom_footer_code')) {
	echo get_theme_mod('librebooks_custom_footer_code');
} ?>

<script type="text/javascript">

jQuery(document).ready(function($) {

  $('#content_inside').infinitescroll({
    navSelector  : "div.load_more_text",            
                   // selector for the paged navigation (it will be hidden)
    nextSelector : "div.load_more_text a",    
                   // selector for the NEXT link (to page 2)
    itemSelector : "#content_inside .home_post_box",
                   // selector for all items you'll retrieve
    behavior: "twitter"
  }); 

});

</script>
</body>
</html>