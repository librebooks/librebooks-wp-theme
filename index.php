<?php get_header(); ?>

<div class="mnote">
	<?php if (get_theme_mod('librebooks_front_page_welcome_message') != '') { echo get_theme_mod('librebooks_front_page_welcome_message'); } else {?>موقع <b>كتب عربية حرة</b> هو منصة للكتب الحرة باللغة العربية، يهدف الموقع لإثراء المحتوى العربي والتعريف بالكتب والثقافة الحرة وأهميتها عربياً، بالإضافة إلى التشجيع على إنتاج المزيد من <a href="//librebooks.org/free-books/">الكتب الحرة</a> ذات جودة عالية. الموقع مفتوح لكافة المجالات المتنوعة ويمكن نشر أي كتاب طالما كان حراً<span style="font-family:'Droid Arabic Kufi';font-weight:bold;font-size:10px;">.<?php } ?></span>
</div>

<div id="content">

	<div id="content_inside">
 		<?php
    global $wp_query;

    $args = array_merge( $wp_query->query, array( 'posts_per_page' => 12 ) );
    query_posts( $args );
		get_template_part('list-content');
		?>
  </div><!--//content_inside-->

  <div class="clear"></div>
  <?php echo librebooks_load_more(); ?>
	<!--//load_more_cont-->
  <?php wp_reset_query(); ?>

</div><!--//content-->

<?php get_footer(); ?>