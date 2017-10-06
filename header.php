<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ar" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<title><?php 	if (is_singular()): ?>تدوينات كتب عربية حرة | نحو معرفة حرة<?php ; else: ?> كتب عربية حرة | نحو معرفة حرة<?php endif; ?>
</title>

  <?php wp_head('exclude=title'); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <!--[if lt IE 9]>
  <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  <![endif]-->              
  
  <?php if (get_theme_mod('librebooks_custom_header_code')) {
  	echo get_theme_mod('librebooks_custom_header_code');
  } ?>
  
</head>
<body>

<?php $shortname = "neue"; ?>
<div class="mainnav"></div>
<div class="headerbg"></div>

<div id="main_container">
	<div id="header">

<div id="sharebox">
<div id="scroll_to_home" class="homesb">
	<a href="/" title="العودة للصفحة الرئيسية">𝍖</a>
</div>
<span class="snetworks">
        <span class="face">
           <div class="fb-like" data-href="https://www.facebook.com/LibreBooks" data-send="false" data-layout="button_count" data-width="70" data-show-faces="false"></div>
        </span>
        <span class="twitter">
           <a href="https://twitter.com/LibreBooksOrg" class="twitter-follow-button" data-show-count="true" data-lang="en" >Tweet</a>
        </span>
</span>



<span style="display: inline-block; float:left;">
<ul id="menu">
  <li><a href="<?php bloginfo('url'); ?>/taxonomies/">التصنيفات</a>
    <ul>
      <li><a href='<?php bloginfo('url'); ?>/taxonomies/'>كل التصنيفات</a></li>
      <li><a href='<?php bloginfo('url'); ?>/taxonomies/#author'>المؤلفون</a></li>
      <li><a href='<?php bloginfo('url'); ?>/taxonomies/#release'>الإصدار</a></li>
      <li><a href='<?php bloginfo('url'); ?>/taxonomies/#license'>الترخيص</a></li>
      <li><a href='<?php bloginfo('url'); ?>/taxonomies/#tags'>الوسوم</a></li>
    </ul>
  </li>
</ul>

<span style="display: inline-block; float:left;">
  <a href="https://twitter.com/LibreBooksOrg" class="sb min twitter small" title="تويتر" target="blank"></a>
  <a href="https://www.facebook.com/LibreBooks" class="sb min facebook small" title="فيس بوك" target="blank"></a>
  <a href="<?php bloginfo('url'); ?>/feed/" class="sb min rss small" title="الخلاصات"></a>
  <form method="get" role="search" action="<?php bloginfo('url'); ?>/" id="search" title="ابحث في الموقع">
    <input name="s" type="text" size="40" placeholder="" />
  </form>
</span>

</span>

</div>


<div class="right">
	<div class="logo">
	  <a class="logo" href="/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
	    <h1 class="logo">كتب عربية حرة</h1>
	    <h2 class="logo">نحو معرفة حرة</h2>
	  </a>
	</div>
</div>


<div class="left">
	<div class="header_menu_con">
    <div class="header_menu" id="more">
				
				<?php wp_nav_menu('menu=header_menu&container=false&menu_id=&exclude=102,838, 19'); ?>
				<ul class="more"><li><a href="#more"> المزيد </a> <?php wp_nav_menu('include=838, 19'); ?></li></ul>
				<div class="clear"></div>
		<!--//header_menu-->
		</div>
	</div><!--//left-->
	<div class="clear"></div>
</div>

<div class="clear"></div>

</div><!--//header-->