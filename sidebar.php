<div id="sidebar">

	<div class="side_box">
		
		<h3 class="side_title">جديد المدونة</h3>
		<ul>
			
		<?php $args = array( 'post_type' => 'blog' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
		</ul>
	</div>
	<!--
	<div class="side_box">
	<h3 class="side_title">وسوم المدونة</h3>
	<?php
	//List terms in a given taxonomy
	$taxonomy = 'blog_tags';
	$term_args=array(
	'hide_empty' => false,
	'orderby' => 'name',
	'order' => 'ASC'
	);
	$tax_terms = get_terms($taxonomy,$term_args);
	?>
	<ul>
	<?php
	foreach ($tax_terms as $tax_term) {
	echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "%s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name . '</a> (' . $tax_term->count . ')</li>';
	}
	?>
	</ul>
	</div>
	-->

	<script type="text/javascript">
	$(document).ready(
	$('.side_box h3').click( function() {
	if ($(this).parent().find('ul').css("display") == "none") {
	$(this).parent().find('ul').css("display","block");
	}
	else {
	$(this).parent().find('ul').css("display","none");
	}
	}) );
	</script>
</div><!--//sidebar-->