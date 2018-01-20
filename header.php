<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ar" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title><?php 	if (is_singular()): ?>تدوينات كتب عربية حرة | نحو معرفة حرة<?php ; else: ?> كتب عربية حرة | نحو معرفة حرة<?php endif; ?></title>

  <?php wp_head('exclude=title'); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <!--[if lt IE 9]>
  <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  <![endif]-->

  <?php if (get_theme_mod('librebooks_custom_header_code')) {
  	echo get_theme_mod('librebooks_custom_header_code');
  } ?>
  <?php if (get_theme_mod('librebooks_fb_id') != '') { ?>
    <div id="fb-root"></div>
    <script type="text/javascript">(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.async=true;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo get_theme_mod('librebooks_fb_id') ?>";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
  <?php } ?>
  <?php if (get_theme_mod('librebooks_twt_account') != '') { ?><script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id; js.async=true; js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script><?php } ?>
</head>
<body <?php body_class('body_width'); ?>>

<?php $shortname = "neue"; ?>
<div class="mainnav"></div>
<div class="headerbg"></div>

<div id="main_container">
	<div id="header">

<div id="sharebox">
<div id="scroll_to_home" class="homesb">
	<a href="<?php bloginfo('url'); ?>" title="<?php echo __('العودة للصفحة الرئيسية', 'LibreBooks'); ?>">𝍖</a>
</div>
<span class="snetworks">
        <?php if (get_theme_mod('librebooks_fb_id') != '' && get_theme_mod('librebooks_fb_page') != '') { ?>
        <span class="face">
           <div class="fb-like" data-href="https://facebook.com/<?php echo get_theme_mod('librebooks_fb_page'); ?>" data-send="false" data-layout="button_count" data-width="70" data-show-faces="false"></div>
        </span>
      <?php } ?>
      <?php if (get_theme_mod('librebooks_twt_account') != '') { ?>
        <span class="twitter">
           <a href="https://twitter.com/<?php echo get_theme_mod('librebooks_twt_account'); ?>" class="twitter-follow-button" data-show-count="true" data-lang="en" >Tweet</a>
        </span>
      <?php } ?>
</span>



<span style="display: inline-block; float:left;">
<?php if (get_theme_mod('librebooks_enable_taxonomies_menu')) { ?>
  <?php $taxonomies_link = ''; if (get_theme_mod('librebooks_taxonomies_link')) { $taxonomies_link = get_theme_mod('librebooks_taxonomies_link'); } ?>
  <ul id="menu">
    <li><a href="<?php echo $taxonomies_link;?>"><?php echo __('التصنيفات', 'LibreBooks'); ?></a>
      <ul>
        <li><a href="<?php echo $taxonomies_link; ?>"><?php echo __('كل التصنيفات', 'LibreBooks'); ?></a></li>
        <?php
        if ( get_theme_mod('librebooks_taxonomies_to_show') ) {
          $taxonomies = get_theme_mod('librebooks_taxonomies_to_show');
          foreach ( $taxonomies  as $taxonomy ) {
            $taxonomy = get_taxonomy($taxonomy);
            echo '<li><a href="'.$taxonomies_link.'/#'.$taxonomy->name.'">' . $taxonomy->labels->name . '</a></li>';
          }
        } ?>
      </ul>
    </li>
  </ul>
<?php } ?>

<span style="display: inline-block; float:left;">
  <?php if (get_theme_mod('librebooks_twt_account') != '') { ?><a href="https://twitter.com/<?php echo get_theme_mod('librebooks_twt_account'); ?>" class="sb min twitter small" title="تويتر" target="blank"></a><?php } ?>
  <?php if (get_theme_mod('librebooks_fb_page') != '') { ?><a href="https://www.facebook.com/<?php echo get_theme_mod('librebooks_fb_page');?>" class="sb min facebook small" title="فيس بوك" target="blank"></a><?php } ?>
  <a href="<?php bloginfo('url'); ?>/feed/" class="sb min rss small" title="الخلاصات"></a>
  <form method="get" role="search" action="<?php bloginfo('url'); ?>/" id="search" title="<?php echo __('ابحث في الموقع', 'LibreBooks'); ?>">
    <input name="s" type="text" size="40" placeholder="" />
  </form>
</span>

</span>

</div>


<div class="right">
	<div class="logo">
	  <a class="logo" href="<?php bloginfo('url'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
	    <h1 class="logo"><?php echo bloginfo('name'); ?></h1>
	    <h2 class="logo"><?php echo bloginfo('description'); ?></h2>
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