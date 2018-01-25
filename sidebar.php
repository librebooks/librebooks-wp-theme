<div id="sidebar">
	<div class="side_box">
		<h3 class="side_title"><?php echo __('جديد المدونة', 'LibreBooks'); ?></h3>
		<ul>
			<?php $args = array( 'post_type' => 'blog' );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
		</ul>
	</div>

</div><!--//sidebar-->