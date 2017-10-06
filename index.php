<?php get_header(); ?>	
<?php $shortname = "neue"; ?>

<div class="mnote">
موقع <b>كتب عربية حرة</b> هو منصة للكتب الحرة باللغة العربية، يهدف الموقع لإثراء المحتوى العربي والتعريف بالكتب والثقافة الحرة وأهميتها عربياً، بالإضافة إلى التشجيع على إنتاج المزيد من <a href="//librebooks.org/free-books/">الكتب الحرة</a> ذات جودة عالية. الموقع مفتوح لكافة المجالات المتنوعة ويمكن نشر أي كتاب طالما كان حراً<span style="font-family:'Droid Arabic Kufi';font-weight:bold;font-size:10px;">.</span>
</div>



<div id="content">

	<div id="content_inside">
 <?php
    global $wp_query;
        
    $args = array_merge( $wp_query->query, array( 'posts_per_page' => 12 , 'cat' => '1') );
    query_posts( $args );        
    $x = 0;
    
    while (have_posts()) : the_post(); ?>                        
	<?php $box_type = ''; ?>
	<?php if($x == 2 || $x == 5 || $x == 8 || $x == 11 || $x == 14 || $x == 17 || $x == 20 || $x == 23 || $x == 26|| $x == 28 || $x == 31 || $x == 34 || $x == 37 || $x == 40 || $x == 43 || $x == 46 || $x == 49 || $x == 52 || $x == 55 || $x == 58 || $x == 61 || $x == 64) { ?>
		<?php $box_type .= ' home_post_box_last'; ?>
	<?php } ?>
	
	<?php if($x == 2 || $x == 5 || $x == 8 || $x == 11 || $x == 14 || $x == 17 || $x == 20 || $x == 23 || $x == 26|| $x == 28 || $x == 31 || $x == 34 || $x == 37 || $x == 40 || $x == 43 || $x == 46 || $x == 49 || $x == 52 || $x == 55 || $x == 58 || $x == 61 || $x == 64) { ?>
		<?php $box_type .= ' home_post_box_tablet_last'; ?>
	<?php } ?>	
		<?php $featured_list = get_the_term_list( $post->ID, 'featured', ' --', ', ', '' );
			
			if ($featured_list[1]) { ?>
	    <div class="home_featured_box<?php echo $box_type; ?>">
		<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('home-image'); ?>

		<div class="home_featured_text">
			<h3><?php the_title(); ?></h3>
			<div class="rate"><?php if(function_exists('the_ratings')) { the_ratings(); } ?></div>
			
					<div class="hits">
						<?php if(function_exists('the_views')) { the_views(); } ?>
					</div>

		

		</div><!--//home_post_text-->	
		</a>
	</div><!--//home_post_box-->
    		
	<?php if($x == 2 || $x == 5 || $x == 8 || $x == 11 || $x == 14 || $x == 17 || $x == 20 || $x == 23 || $x == 26|| $x == 28 || $x == 31 || $x == 34 || $x == 37 || $x == 40 || $x == 43 || $x == 46 || $x == 49 || $x == 52 || $x == 55 || $x == 58 || $x == 61 || $x == 64) { ?>
		<div class="desktop_clear"></div>
	<?php } ?>
	
	<?php if($x == 2 || $x == 5 || $x == 8 || $x == 11 || $x == 14 || $x == 17 || $x == 20 || $x == 23 || $x == 26|| $x == 28 || $x == 31 || $x == 34 || $x == 37 || $x == 40 || $x == 43 || $x == 46 || $x == 49 || $x == 52 || $x == 55 || $x == 58 || $x == 61 || $x == 64) { ?>
		<div class="tablet_clear"></div>
	<?php } ?>

    <?php $x++; ?>
	<?php } ?>

    <?php endwhile; ?>            
    
    <div class="clear"></div>	
    
    <?php
    global $wp_query;
        
    $args = array_merge( $wp_query->query, array( 'posts_per_page' => 12 ) );
    query_posts( $args );        
    $x = 0;
    while (have_posts()) : the_post(); ?>                        
    
	<?php $box_type = ''; ?>
	<?php if($x == 2 || $x == 5 || $x == 8 || $x == 11 || $x == 14 || $x == 17 || $x == 20 || $x == 23 || $x == 26|| $x == 28 || $x == 31 || $x == 34 || $x == 37 || $x == 40 || $x == 43 || $x == 46 || $x == 49 || $x == 52 || $x == 55 || $x == 58 || $x == 61 || $x == 64) { ?>
		<?php $box_type .= ' home_post_box_last'; ?>
	<?php } ?>
	
	<?php if($x == 2 || $x == 5 || $x == 8 || $x == 11 || $x == 14 || $x == 17 || $x == 20 || $x == 23 || $x == 26|| $x == 28 || $x == 31 || $x == 34 || $x == 37 || $x == 40 || $x == 43 || $x == 46 || $x == 49 || $x == 52 || $x == 55 || $x == 58 || $x == 61 || $x == 64) { ?>
		<?php $box_type .= ' home_post_box_tablet_last'; ?>
	<?php } ?>	
	    <div class="home_post_box<?php echo $box_type; ?>">
		<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('home-image'); ?>
		
		<div class="home_post_text">
			<h3><?php the_title(); ?></h3>
			<div class="rate"><?php if(function_exists('the_ratings')) { the_ratings(); } ?></div>
			
					<div class="hits">
						<?php if(function_exists('the_views')) { the_views(); } ?>
					</div>

		

		</div><!--//home_post_text-->	
		</a>
	</div><!--//home_post_box-->
    
	<?php if($x == 2 || $x == 5 || $x == 8 || $x == 11 || $x == 14 || $x == 17 || $x == 20 || $x == 23 || $x == 26|| $x == 28 || $x == 31 || $x == 34 || $x == 37 || $x == 40 || $x == 43 || $x == 46 || $x == 49 || $x == 52 || $x == 55 || $x == 58 || $x == 61 || $x == 64) { ?>
		<div class="desktop_clear"></div>
	<?php } ?>
	
	<?php if($x == 2 || $x == 5 || $x == 8 || $x == 11 || $x == 14 || $x == 17 || $x == 20 || $x == 23 || $x == 26|| $x == 28 || $x == 31 || $x == 34 || $x == 37 || $x == 40 || $x == 43 || $x == 46 || $x == 49 || $x == 52 || $x == 55 || $x == 58 || $x == 61 || $x == 64) { ?>
		<div class="tablet_clear"></div>
	<?php } ?>
    <?php $x++; ?>
    <?php endwhile; ?>            
    
    <div class="clear"></div>	
    
    </div><!--//content_inside-->
    
    <div class="clear"></div>
    <div class="load_more_cont">
        <div align="center"><div class="load_more_text down_but">
        
        <?php
        

	
	next_posts_link('المزيد');
        
        ?>
        
        </div></div>
    </div><!--//load_more_cont-->                    
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
    
    <?php wp_reset_query(); ?>                            
    
</div><!--//content-->    

	
<?php get_footer(); ?>
