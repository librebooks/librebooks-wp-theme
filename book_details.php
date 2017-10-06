<?php
/*
	Template Name: taxonomies
*/
?>
<?php get_header();?>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>

<style>
.fa-tags:before {
    margin-left: 2px !important;
}
</style>


<div id="single_cont">
  <div class="single_left">
  <h1 class="single_title"><?php the_title(); ?></h1>
    <div class="single_inside_content">

<div class="site-tax-stats">
  <h3 style="margin-right: 8px"><i class="fa fa-bar-chart"></i> احصائيات الموقع</h3>
    <div class="stat-box">
      <li class="writer">
          <a href="#author"><i style="font-size: 48px;" class="fa fa-user"></i></a>
          <p><?php echo wp_count_terms( 'writer' ); ?>
          <span>كاتب</span></p>
        </li>

	<li class="book" >
	  <a href="/" target="_blank"><i style="font-size: 46px;" class="fa fa-book"></i></a>
	  <p><?php $post_count = wp_count_posts(); echo $post_count->publish;  ?>
	  <span>كتاب</span></p>
	</li>

	<li class="tag">
	  <a href="#tags"><i style="font-size: 45px;" class="fa fa-tags fa-flip-horizontal"></i></a>
	  <p><?php echo wp_count_terms( 'post_tag' ); ?>
	  <span>وسم</span></p>
	</li>
	
	<li class="license" >
	  <a href="#license"><i style="font-size: 46px;" class="fa  fa-certificate fa-flip-horizontal"></i></a>
	  <p><?php echo wp_count_terms( 'license' ); ?>
	  <span>رخص قانونية</span></p>
	</li>

	<li class="first_last_year" >
	  <a href="#release"><i style="font-size: 41px;" class="fa fa-calendar"></i></a>
	  <p><span>ما بين</span></br>2016-2006</p>
	</li>

	<li class="most_year" >
	  <a href="/release/2013/" target="_blank"><i style="font-size: 46px;" class="fa fa-star"></i></a>
	  <p>2013 <span>الأكثر إصداراً</span></p>
	</li>
    </div>
</div>

      <div class="taxonomies">

	<h2 id="author">المؤلف/المترجم:</h2>
	<?php
	//List terms in a given taxonomy
	$taxonomy = 'writer';
	$term_args=array(
	  'hide_empty' => false,
	  'orderby' => 'name',
	  'order' => 'ASC'
	);
	$tax_terms = get_terms($taxonomy,$term_args);
	?>
	<ul class="tags blue">
	<?php
	foreach ($tax_terms as $tax_term) {
	echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "عرض كتب المؤلف %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name . '<span>' . $tax_term->count . '</span></a></li>';
	}
	?>
	</ul>

	  <!--<p class="words"><?php wp_tag_cloud( array( 'taxonomy' => 'writer', format => 'list', 'smallest' => 15, 'largest' => 15, 'unit' => 'px' ) );?>--></p>

	<h2 id="release">سنة الإصدار:</h2>
	 <?php
	//List terms in a given taxonomy
	$taxonomy = 'release';
	$term_args=array(
	  'hide_empty' => false,
	  'orderby' => 'name',
	  'order' => 'ASC'
	);
	$tax_terms = get_terms($taxonomy,$term_args);
	?>
	<ul class="tags blue">
	<?php
	foreach ($tax_terms as $tax_term) {
	echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "عرض الكتب الصادرة بتاريخ %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name . '<span>' . $tax_term->count . '</span></a></li>';
	}
	?>
	</ul>

	<h2 id="license">الترخيص:</h2>
	  <?php
	//List terms in a given taxonomy
	$taxonomy = 'license';
	$term_args=array(
	  'hide_empty' => false,
	  'orderby' => 'name',
	  'order' => 'ASC'
	);
	$tax_terms = get_terms($taxonomy,$term_args);
	?>
	<ul class="tags blue">
	<?php
	foreach ($tax_terms as $tax_term) {
	echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "عرض الكتب تحت ترخيص %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name . '<span>' . $tax_term->count . '</span></a></li>';
	}
	?>
	</ul>

	<h2 id="tags">الوسوم:</h2>
<?php
	//List terms in a given taxonomy
	$taxonomy = 'post_tag';
	$term_args=array(
	  'hide_empty' => false,
	  'orderby' => 'name',
	  'order' => 'ASC'
	);
	$tax_terms = get_terms($taxonomy,$term_args);
	?>
	<ul class="tags blue">
	<?php
	foreach ($tax_terms as $tax_term) {
	echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all vendors in the %s industry" ), $tax_term->name ) . '" ' . '>' . $tax_term->name . '<span>' . $tax_term->count . '</span></a></li>';
	}
	?>
	</ul>
	  <!--<p class="words"><?php wp_tag_cloud('smallest=15&largest=15&number=25&orderby=name&unit=px'); ?></p>-->

      </div><!--//taxonomies-->
    </div><!--//single_inside_content-->
  </div><!--//single_left-->
<div class="clear"></div>
</div><!--//single_cont-->


<script type="text/javascript">
  $(".site-tax-stats li:nth-child(3n)").addClass("no-separate");

$(document).ready(function(){
$('a').smoothScroll({ speed: 800});
$(window).resize(function(){
  if ($('.taxonomies ul').width() == 300) {
    if ($('.taxonomies a').width() > 200) {
        $(this).css('padding', '5px 5px');
        $('.tags span').css('top', '0');
        $('.tags span').css('bottom', '0');
        $('.tags span').css('left', '0');
  } }

});});
</script>
	
<?php get_footer(); ?>