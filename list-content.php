<?php
$x = 0;
while (have_posts()) : the_post();

  $box_type = '';
  $tablet_case = $desktop_case = false;

  if (((($x - 2) % 3) == 0)) {
    $desktop_case = true;
    $tablet_case = true;
  }

  if ($tablet_case) {
    $box_type .= ' home_post_box_tablet_last';
  }
  if ($desktop_case) {
    $box_type .= ' home_post_box_last';
  }
  ?>
  <div class="home_post_box<?php echo $box_type; ?>">
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('home-image'); ?>

      <div class="home_post_text">
        <h3><?php the_title(); ?></h3>
        <?php if(function_exists('the_ratings')) { ?>
          <!-- Rate -->
          <div class="rate">
             <?php the_ratings(); ?>
          </div>
        <?php  } ?>
        <?php if(function_exists('the_views')) { ?>
          <!-- Views -->
          <div class="hits">
            <?php the_views(); ?>
          </div>
        <?php  } ?>
      </div><!--//home_post_text-->
    </a>
  </div><!--//home_post_box-->
  <?php if($desktop_case) { ?>
    <div class="desktop_clear"></div>
  <?php } ?>

  <?php if($tablet_case) { ?>
    <div class="tablet_clear"></div>
  <?php } ?>
  <?php $x++; ?>
<?php endwhile; ?>
<div class="clear"></div>