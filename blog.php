<?php
/*
	Template Name: blog
*/
?>
<?php get_header(); ?>

<div class="blog_page">

  <?php $args = array( 'post_type' => 'blog' );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php $blog = get_the_term_list( $post->ID, 'blog_tags', '', '، ', '' ) ?>
    <div>
      <a href="<?php the_permalink(); ?>">
        <h1><?php the_title(); ?>  </h1>
      </a>
      <span class="blog_details">
        <?php if ($blog) :?>
          <p class="blog_tags">
            <?php echo $blog; ?>
          </p>
        <?php endif;?>
        <p class="date">
          <?php the_date('d F Y'); ?>
        </p>
      </span>
       <p class="blog_desc"> <?php the_excerpt(); ?>
         <a class="more" href="<?php the_permalink(); ?>" >
           <?php echo __('المزيد »', 'LibreBooks'); ?>
         </a>
       </p>
    </div>
  <?php endwhile; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>