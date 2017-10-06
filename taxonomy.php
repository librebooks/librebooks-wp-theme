<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
			<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
			<?php if ( have_posts() ) : ?>
						<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
			<?php $tax_type = $wp_query->queried_object->taxonomy; ?>
			<?php if ( $tax_type == "license" || $tax_type == "LICENSE"):?>
			<h3 class="top_title">الكتب المعروضة تحت تصنيف: <?php  echo $wp_query->queried_object->name; ?>،  تعرف على معلومات أكثر حول <a href ="<?php echo $wp_query->queried_object->description; ?>" title="اضغط لمعرفة تفاصيل أكثر عن رخصة <?php echo $wp_query->queried_object->name; ?>">هذه الرخصة</a>
					</h3>
			<?php elseif ( $tax_type == "blog_tags" || $tax_type == "BLOG_TAGS") :?>
<h3 class="top_title"><a href="/blog">المدونة » </a> التدوينات المعروضة تحت تصنيف: <?php  echo $wp_query->queried_object->name; ?></h3>
			<?php else :?>
			<h3 class="top_title">الكتب المعروضة تحت تصنيف: <?php  echo $wp_query->queried_object->name; ?>  
					</h3>
			<?php endif;?>
					<!--<a href="echo $wp_query->queried_object->description;"><?php  
							echo $wp_query->queried_object->description;   
					?></a>-->
			<?php if ( $tax_type == "blog_tags" || $tax_type == "BLOG_TAGS"):?>
<div class="blog_page">

<?php    
global $wp_query;
        
    $args = array_merge( $wp_query->query, array( 'posts_per_page' => 12 ) );
    query_posts( $args );        
    $x = 0;
 while ( have_posts() ) : the_post(); ?>
        <div><a href="<?php the_permalink(); ?>">
          <h1><?php the_title(); ?>  </h1>
          </a> <p> <?php echo the_field('intro_text');?> ... <a class="more" href="<?php the_permalink(); ?>" >المزيد »</a></p>
<span class="blog_details"><p class="date"> <?php the_date('d F Y'); ?> </p></span>

</div>
        <?php endwhile; ?>

</div>
<?php get_sidebar(); ?>
<?php else :?>
				<div id="content">
				<div id="content_inside">
				<?php /* Start the Loop */ ?>
				<?php     
global $wp_query;
        
    $args = array_merge( $wp_query->query, array( 'posts_per_page' => 12 ) );
    query_posts( $args );        
    $x = 0;
 while ( have_posts() ) : the_post(); ?>
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

          <?php endif; ?>                          
			<?php else : ?>

				
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>

			<?php endif; ?>

			</div><!--//content-->    


<?php get_footer(); ?>