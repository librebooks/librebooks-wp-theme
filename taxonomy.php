<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
		<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
		<?php $tax_type = $wp_query->queried_object->taxonomy; ?>
		<?php $tax_name = $wp_query->queried_object->name; ?>
		<?php $tax_desc = $wp_query->queried_object->description; ?>
		<h3 class="top_title">
			<?php if ( $tax_type == "blog_tags" || $tax_type == "BLOG_TAGS") :?>
				<a href="/blog"><?php echo __('المدونة » ', 'LibreBooks'); ?></a><?php echo __('التدوينات المعروضة تحت تصنيف: ', 'LibreBooks'); ?>
			<?php else :?>
				<?php echo __('الكتب المعروضة تحت تصنيف: ', 'LibreBooks'); ?>
			<?php endif;?>
			<?php echo $tax_name; ?>
			<?php if ( $tax_type == "license" || $tax_type == "LICENSE"):?>
				<?php echo __('،  تعرف على معلومات أكثر حول ', 'LibreBooks'); ?><a href ="<?php echo $tax_desc;?>" title="<?php echo __('اضغط لمعرفة تفاصيل أكثر عن رخصة ', 'LibreBooks'); ?><?php echo $tax_name; ?>"><?php echo __('هذه الرخصة', 'LibreBooks'); ?></a>
			<?php endif; ?>
		</h3>
		<?php if ( $tax_type == "blog_tags" || $tax_type == "BLOG_TAGS"):?>
			<div class="blog_page">

				<?php
				global $wp_query;

		    $args = array_merge( $wp_query->query, array( 'posts_per_page' => 12 ) );
		    query_posts( $args );
		    $x = 0;
				while ( have_posts() ) : the_post(); ?>
  				<div>
						<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
						<p> <?php echo the_field('intro_text');?> ... <a class="more" href="<?php the_permalink(); ?>" ><?php echo __('المزيد »', 'LibreBooks'); ?></a></p>
						<span class="blog_details"><p class="date"> <?php the_date('d F Y'); ?> </p></span>

					</div>
  			<?php endwhile; ?>

			</div>
			<?php get_sidebar(); ?>
		<?php else :?>
			<div id="content">
				<div id="content_inside">
					<?php
					/* Start the Loop */
					global $wp_query;

			    $args = array_merge( $wp_query->query, array( 'posts_per_page' => 12 ) );
			    query_posts( $args );
			    get_template_part('list-content');
					?>
		    </div><!--//content_inside-->
				<div class="clear"></div>
  			<?php librebooks_load_more(); ?>
  			<?php wp_reset_query(); ?>
			</div><!--//content-->
		<?php endif; ?>
<?php else : ?>
	<?php get_template_part('content-none'); ?>
<?php endif; ?>

<?php get_footer(); ?>