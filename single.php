<?php get_header(); ?>

<?php
//Remove share buttons under post
	remove_filter( 'the_content', 'sharing_display',19 );
	remove_filter( 'the_excerpt', 'sharing_display',19 );
	$getfields = array('book_release', 'writer_translator', 'book_download_out', 'book_site');
	$fields = array('summary', 'book_pages');
	$fields_records = [];
	foreach ($getfields as $field) {
		if (function_exists('get_field') && get_field($field) != '') {
			$fields_records[$field] = get_field($field);
		} else {
			$fields_records[$field] = '';
		}
	}
	foreach ($fields as $field) {
		if (function_exists('the_field') && the_field($field) != '') {
			$fields_records[$field] = the_field($field);
		} else {
			$fields_records[$field] = '';
		}
	}

	$yourls_link = get_post_meta( $post->ID, '_yourls_url', true );
	if ($yourls_link == "") {
		$book_link = $fields_records['book_download_out'];
	} else {
		$book_link = $yourls_link;
	}
 ?>

<?php
// Variables to store each of our possible taxonomy lists
// This one checks for an Operating System classification
$release_list = get_the_term_list( $post->ID, 'release', '', '، ', '' );
$license_list = get_the_term_list( $post->ID, 'license', '<h2>'.__('الترخيص:', 'LibreBooks').'</h2> ', '، ', '' );
$author_list = get_the_term_list( $post->ID, 'writer', '<h2>'.__('المؤلف:', 'LibreBooks').'</h2> ', '، ', '' );
$translator_list = get_the_term_list( $post->ID, 'writer', '<h2>'.__('المترجم:', 'LibreBooks').'</h2> ', '، ', '' );

$release_url = get_post_meta($post->ID, 'custom_release_url', true);
$release_no = get_post_meta($post->ID, 'custom_release_no', true);
 ?>

<div id="single_cont">
  <div class="post_sec">
     <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h1 class="single_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			  <div class="share_bar">
		      <span class="snb"><div class="fb-like" data-href="<?php the_permalink() ?>" data-send="false" data-layout="button_count"data-width="450" data-show-faces="false" data-font="arial"></div></span>
					<?php if(function_exists('the_ratings')) { ?>
						<span class="rate_post_txt"><?php echo __('قيّم الكتاب:', 'LibreBooks'); ?></span>
				    <div class="rate_post">
				    	<?php the_ratings(); ?>
				    </div>
					<?php } ?>
					<?php if (function_exists('sharing_display')) { ?>
				    <div class="social_buttons" data-lang="en">
							<?php echo sharing_display(); ?>
				    </div>
					<?php } ?>
			  </div><!--//share_bar-->


				<div class="post_right">
				  <div class="single_inside_content">
				    <div class="article"><?php the_content(); ?></div>
						<?php if ($fields_records['summary'] !== '') { ?>
				      <div class="summary"><h2><?php echo __('الخلاصة عن كتاب ', 'LibreBooks'); ?><?php the_title();?>.</h2>
				      <p><?php echo $fields_records['summary'];?></p>
				      </div>
						<?php } ?>
				  </div><!--//single_inside_content-->
				</div><!--//post_right-->

				<div class="post_left">
				  <?php the_post_thumbnail(); ?>
				</div><!--//post_left-->

		    <div class="book_details">
		      <div id="bookmark"></div>
		      <div class="book_box_right">
		        <div class="book_details_right">
						  <ul>
						    <li><?php if ($fields_records['writer_translator']) {echo $author_list;} else {echo $translator_list;}?></li>
						    <li><h2><?php echo __('الصفحات:', 'LibreBooks'); ?></h2><?php $fields_records['book_pages'];?></li>
						  </ul>
		        </div>
			      <div class="book_details_center">
						  <ul>
						    <li><h2><?php echo __('الإصدار: ', 'LibreBooks'); ?></h2><?php echo $fields_records['book_release'];?> - <?php echo $release_list; ?></li>
						    <li><?php echo $license_list; ?></li>
						  </ul>
			      </div>

		        <div class="tags_box">
							 <h2><?php echo __('الوسوم: ', 'LibreBooks'); ?></h2><?php the_tags( "", "، " ); ?>
						</div>
		      </div><!--//book_box_right-->
		      <div class="or-spacer"><div class="mask"></div></div>
					<div class="buttons">
					  <div class="down_but">
					    <a href="<?php echo $book_link; ?>" target="_blank"><?php echo __(' حمل الكتاب ', 'LibreBooks'); ?></a>
					  </div>
						<div class="site_but">
						  <a href="<?php echo $fields_records['book_site'];?>" target="_blank"><?php echo __('صفحة الكتاب ', 'LibreBooks'); ?></a>
						</div>
					</div>
				</div>
    </div><!--//post_sec-->
		<div class="book_details_footer">
			<div class="ex-release">
				<p><?php echo __(' إصدارات سابقة ', 'LibreBooks'); ?></p>
				<?php if (($release_url !== '') && $release_url[0]) { ?>
					<ul>
						<?php foreach( $release_url as $index => $url ) { ?>
							<li><a href="<?php echo $url; ?>" ><?php echo $release_no[$index]; ?></a></li>
						<?php } ?>
					</ul>
				<?php }	else { ?>
					<ul>
						<li><?php echo __('لا يوجد', 'LibreBooks'); ?></li>
					</ul>
				<?php } ?>
			</div>
		</div>
		<div class="books-nav">
			<p class="pre-post"><?php previous_post_link(__('&laquo; الكتاب السابق: %link', 'LibreBooks'))?></p>
			<p class="ne-post"><?php next_post_link(__('&raquo; الكتاب التالي: %link', 'LibreBooks')) ?> </p>
		</div>


		<div class="comments_sec">
		  <div class="comments_side"><?php comments_template(); ?></div>
		  <div class="related_side"><?php if (function_exists('wp_related_posts')) { wp_related_posts(); }?></div>
		</div>
	<?php endwhile; else: ?>
  	<?php get_template_part('content-none'); ?>
	<?php endif; ?>
	<div class="clear"></div>
</div><!--//single_cont-->
<?php get_footer(); ?>