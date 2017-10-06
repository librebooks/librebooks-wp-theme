<?php get_header(); ?>	

<?php 
//Remove share buttons under post
	remove_filter( 'the_content', 'sharing_display',19 );
	remove_filter( 'the_excerpt', 'sharing_display',19 );

 ?>

<?php
// Variables to store each of our possible taxonomy lists  
// This one checks for an Operating System classification  
$release_list = get_the_term_list( $post->ID, 'release', '', '، ', '' );
$license_list = get_the_term_list( $post->ID, 'license', '<h2>الترخيص:</h2> ', '، ', '' ); 
$author_list = get_the_term_list( $post->ID, 'writer', '<h2>المؤلف:</h2> ', '، ', '' );
$translator_list = get_the_term_list( $post->ID, 'writer', '<h2>المترجم:</h2> ', '، ', '' );

$release_url = get_post_meta($post->ID, 'custom_release_url', true); 
$release_no = get_post_meta($post->ID, 'custom_release_no', true);  
 ?>

<div id="single_cont">
  <div class="post_sec">
     <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1 class="single_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
	  <div class="share_bar">
              <span class="snb"><div class="fb-like" data-href="<?php the_permalink() ?>" data-send="false" data-layout="button_count"data-width="450" data-show-faces="false" data-font="arial"></div></span>

	    <span class="rate_post_txt">قيّم الكتاب:</span>
	    <div class="rate_post">
	    <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
	    </div>
	    
	    <div class="social_buttons" data-lang="en"">
<?php echo sharing_display(); ?> 
<style>
.pluginCountButton { margin-left: -98px !important; position: absolute !important; margin-top: -9px !important; }
.uiGrid { width: 109px !important; }
div.sharedaddy .sd-content { float: left !important; width: auto !important; }
div.sharedaddy div.sd-block { border-top: none !important; padding: 0 !important; }
.sharedaddy h3 { font-family: 'Droid Arabic Naskh',serif !important; font-weight: normal !important;  float: right !important; width: auto !important; line-height: 1.9 !important; }
div.sharedaddy .sd-content li { margin: -4px 8px 5px 0px !important; }
li.share-twitter { margin-right: 0 !important; }
H3#reply-title.comment-reply-title { font-weight: normal !important; font-size: 17px; margin: 15px 0;}
</style>

				
	    </div>
	  </div><!--//share_bar-->


<div class="post_right">
  <div class="single_inside_content">
    <div class="article"><?php the_content(); ?></div>
      <div class="summary"><h2>الخلاصة عن كتاب <?php the_title();?>.</h2>
      <p><?php echo the_field('summary');?></p>
      </div>
  </div><!--//single_inside_content-->
</div><!--//post_right-->
				
<div class="post_left">
  <?php the_post_thumbnail(); ?>
</div><!--//post_left-->

    <div class="book_details">
      <div id="bookmark"></div>
      <div class="book_box_right">
        <div class="book_details_right">
	  <ul>
	    <li><?php if (get_field("writer_translator")) {echo $author_list;} else {echo $translator_list;}?></li>
	    <li><h2>الصفحات:</h2><?php the_field('book_pages');?></li>
	  </ul>						
        </div>

      <div class="book_details_center">
	  <ul>
	    <li><h2>الإصدار: </h2><?php echo get_field('book_release');?> - <?php echo $release_list; ?></li>
	    <li><?php echo $license_list; ?></li>
	  </ul>
      </div>

        <div class="tags_box"> <h2>الوسوم: </h2><?php the_tags( "", "، ", $after ); ?></div>
      </div><!--//book_box_right-->

      <div class="or-spacer"><div class="mask"></div></div>
	<div class="buttons">
	  <div class="down_but"> 
	    <a href="<?php 
		$yourls_link = get_post_meta( $post->ID, '_yourls_url', true );
		if ($yourls_link == "")
			{echo get_field('book_download_out');}
		else
			{echo $yourls_link;} ?>" target="_blank"> حمل الكتاب </a>
	  </div>
	<div class="site_but">
	    <a href="<?php echo get_field("book_site");?>" target="_blank">صفحة الكتاب </a>
	</div>
      </div>


</div>


    </div><!--//post_sec-->
<div class="book_details_footer">
<div class="ex-release"> <p> إصدارات سابقة </p> 
<?php if ($release_url[0]) { ?>
<ul>
<?php foreach( $release_url as $index => $url ) { ?>
<li><a href="<?php echo $url; ?>" ><?php echo $release_no[$index]; ?></a></li>
<?php } ?>
</ul>
<?php } 
else { ?>
<ul>
<li>لا يوجد</li>
</ul>
<?php } ?>
</div>
</div>
<div class="books-nav">
<p class="pre-post"><?php previous_post('&laquo; %', 'الكتاب السابق: ', 'yes')?></p>
<p class="ne-post"><?php next_post('% &raquo;', 'الكتاب التالي: ', 'yes') ?> </p>
</div>


<div class="comments_sec">
  <div class="comments_side"><?php comments_template(); ?></div>
  <div class="related_side"><?php wp_related_posts()?></div>
</div>

<?php endwhile; else: ?>
  <h3>عذراً، لا توجد موضوعات تطابق بحثك.</h3>
<?php endif; ?>                    
	
<div class="clear"></div>
	
	</div><!--//single_cont-->
	
<?php get_footer(); ?>