<?php get_header(); ?>	
<h3 class="top_title">
        <?php if (is_category()) { ?>
              <?php single_cat_title(); ?>
        <?php } elseif( is_tag() ) { ?>
              <?php single_tag_title(); ?>
        <?php } elseif (is_day()) { ?>
              <?php the_time('F jS, Y'); ?>
        <?php } elseif (is_month()) { ?>
              <?php the_time('F, Y'); ?>
        <?php } elseif (is_year()) { ?>
              <?php the_time('Y'); ?>
        <?php } elseif (is_author()) { ?>
              Author Archive
        <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
              Blog Archives
        <?php } ?>   
    </h3>
<div id="content">
	<div id="content_inside">
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
	    <div class="home_post_box<?php echo $box_type; ?>" onClick="location.href='<?php the_permalink(); ?>'">
	
		<?php the_post_thumbnail('home-image'); ?>
		
		<div class="home_post_text">
			<h3><?php the_title(); ?></h3>
			<div class="rate"><?php if(function_exists('the_ratings')) { the_ratings(); } ?></div>
			
					<div class="hits"><?php echo(ajax_hits_counter_get_hits(get_the_ID())); ?> 
					</div>

		</div><!--//home_post_text-->	
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
    
    <?php wp_reset_query(); ?>                            
    
</div><!--//content-->    
	
<?php get_footer(); ?>