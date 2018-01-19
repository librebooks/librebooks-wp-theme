<?php
$x = 0;
while (have_posts()) : the_post();

  $box_type = '';
  $tablet_case = $desktop_case = false;
  if($x == 2 || $x == 5 || $x == 8 || $x == 11 || $x == 14 || $x == 17 || $x == 20 || $x == 23 || $x == 26|| $x == 28 || $x == 31 || $x == 34 || $x == 37 || $x == 40 || $x == 43 || $x == 46 || $x == 49 || $x == 52 || $x == 55 || $x == 58 || $x == 61 || $x == 64) {
    $desktop_case = true;
  }

  if($x == 2 || $x == 5 || $x == 8 || $x == 11 || $x == 14 || $x == 17 || $x == 20 || $x == 23 || $x == 26|| $x == 28 || $x == 31 || $x == 34 || $x == 37 || $x == 40 || $x == 43 || $x == 46 || $x == 49 || $x == 52 || $x == 55 || $x == 58 || $x == 61 || $x == 64) {
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