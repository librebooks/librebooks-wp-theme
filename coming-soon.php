<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ar" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head>  
<link href='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css' rel='stylesheet' type='text/css'/>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>          
  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <!--[if lt IE 9]>
  <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  <![endif]-->              
  <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
  <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-latest.js"></script>
  <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/scripts.js"></script>
  <script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.js"></script>
  <meta property="fb:app_id" content="291587374300183"/>  
  <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.infinitescroll.js" type="text/javascript" charset="utf-8"></script>    
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" title="no title" charset="utf-8"/>

  <dir="rtl>
<script type="text/javascript">
$(document).ready(
function($){
  $('#content_inside').infinitescroll({
 
    navSelector  : "div.load_more_text",            
                   // selector for the paged navigation (it will be hidden)
    nextSelector : "div.load_more_text a:first",    
                   // selector for the NEXT link (to page 2)
    itemSelector : "#content_inside .home_post_box"
                   // selector for all items you'll retrieve
  },function(arrayOfNewElems){
  
  
	$('.home_post_box').hover(
		function() {
			$(this).find('.home_post_text').css('display','block');
		},
		function () {
			$(this).find('.home_post_text').css('display','none');
		}
	); 

      //$('.home_post_cont img').hover_caption();
 
     // optional callback when new content is successfully loaded in.
 
     // keyword `this` will refer to the new DOM content that was just added.
     // as of 1.5, `this` matches the element you called the plugin on (e.g. #content)
     //                   all the new elements that were found are passed in as an array
 
  });  
}  
);

});

</script>
</head>
<body>
  <div id ="main_container_cs">
   <div class="logo_comming">
    <a class="logo_com" href="<?php bloginfo('url'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
     <h1 class="logo_com">كتب عربية حرة</h1>
     <h2 class="logo_com"><?php bloginfo( 'description' ); ?></h2>
    </a>
   </div>

   <div class="comming_soon">
    <h2>كتب عربية حرة؟</h2>
     <p>
      س	
     </p>
    <div class="video_comming">
     <iframe width="560" height="315" src="//www.youtube.com/embed/46gZDW9RG_Y" frameborder="0" allowfullscreen></iframe>
    </div>
   </div>

   <div class="comming_footer">
    <div id="share-it">
     <h3>تابعنا على الروابط التالية</h3>
      <div style="height: 90px; margin-top: 20px; text-align:center;">
       <a href="#" class="sb twitter withfadeout">Twitter</a>
       <a href="#" class="sb facebook withfadeout">Facebook</a>
       <a href="#" class="sb rss withfadeout">RSS</a>
      </div>
    </div>

</div>
</body>