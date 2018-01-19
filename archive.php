<?php get_header(); ?>
<h3 class="top_title">
  <?php if (is_category()) {
          single_cat_title();
        } elseif( is_tag() ) {
          single_tag_title();
        } elseif (is_day()) {
          the_time('F jS, Y');
        } elseif (is_month()) {
          the_time('F, Y');
        } elseif (is_year()) {
          the_time('Y');
        } elseif (is_author()) {
          echo __('Author Archive', 'LibreBooks');
        } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
          echo __('Blog Archives', 'LibreBooks');
   } ?>
</h3>
<div id="content">
  <div id="content_inside">
    <?php
    global $wp_query;

    $args = array_merge( $wp_query->query, array( 'posts_per_page' => 12 ) );
    query_posts( $args );
    if ( have_posts() ) :
    get_template_part('list-content');
    else :
      get_template_part('content-none');
    endif;
    ?>
  </div><!--//content_inside-->

  <div class="clear"></div>
  <div class="load_more_cont">
  <div align="center">
    <div class="load_more_text down_but">
    <?php
    next_posts_link(__('المزيد', 'LibreBooks'));
    ?>
    </div>
  </div>
  </div><!--//load_more_cont-->
  <?php wp_reset_query(); ?>
</div><!--//content-->

<?php get_footer(); ?>