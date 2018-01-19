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
    get_template_part('list-content');
		?>

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
				<?php get_template_part('content-none'); ?>
			<?php endif; ?>

			</div><!--//content-->


<?php get_footer(); ?>