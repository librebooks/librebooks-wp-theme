<?php get_header(); ?>

<div class="blog_page">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php $blog = get_the_term_list( $post->ID, 'blog_tags', '', '، ', '' ) ?>
		<h1 class="single_title">
			<a href="/blog/"><?php echo __('المدونة » ', 'LibreBooks'); ?></a>
			<?php the_title(); ?>
		</h1>
		<span class="blog_detail">
			<?php if ($blog) :?>
				<p class="blog_tags"><?php echo $blog; ?></p>
			<?php endif;?>
			<p class="date"><?php the_date('d F Y'); ?></p>
		</span>
		<div class="single_inside_content">
			<?php the_content(); ?>
		</div><!--//single_inside_content-->
		<br /><br />
		<?php //comments_template(); ?>

	<?php endwhile; else: ?>
		<?php get_template_part('content-none'); ?>
	<?php endif; ?>
	<div class="comments_sec">
		<div class="comments_side"><?php comments_template(); ?></div>
	</div>
</div><!--//single_left-->

<?php get_sidebar(); ?>

<div class="clear"></div>

<?php get_footer(); ?>