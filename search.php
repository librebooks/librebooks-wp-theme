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
			<h3 class="top_title">نتائج البحث :</h3>


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
			<?php else : ?>
						<div id="search_content">

						<h3>عذراً لم نجد ما يطابق بحثك، جرب مجدداً بكلمات مختلفة</h3>
<form method="get" role="search" action="<?php bloginfo('url'); ?>/" id="searchform" title="ابحث في الموقع">

	<div>
    <input name="s" type="text" size="40" placeholder="" />
	<input type="submit" id="searchsubmit" value="بحث" />
	</div>
	</form>
		<div class="related-search">
<?php wp_related_posts()?>

     </div>
</div>

			<?php endif; ?>

<div class="clear"></div>
	</div>
<?php get_footer(); ?>