<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
 ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<h3 class="top_title"><?php echo __('نتائج البحث :', 'LibreBooks'); ?></h3>
  <div id="content">
		<div id="content_inside">
			<?php
      get_template_part('list-content');
      ?>

    </div><!--//content_inside-->
		<div class="clear"></div>
    <?php librebooks_load_more(); ?>
  </div>
<?php else : ?>
  <div id="search_content">
    <h3><?php echo __('عذراً لم نجد ما يطابق بحثك، جرب مجدداً بكلمات مختلفة', 'LibreBooks'); ?></h3>
    <form method="get" role="search" action="<?php bloginfo('url'); ?>/" id="searchform" title="<?php echo __('ابحث في الموقع', 'LibreBooks'); ?>">
	     <div>
         <input name="s" type="text" size="40" placeholder="" />
	       <input type="submit" id="searchsubmit" value="<?php echo __('بحث', 'LibreBooks'); ?>" />
	     </div>
	  </form>
		<div class="related-search">
      <?php wp_related_posts()?>
    </div>
  </div>
<?php endif; ?>
<div class="clear"></div>
<?php get_footer(); ?>