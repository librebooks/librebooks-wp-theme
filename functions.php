<?php
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
  add_theme_support( 'post-thumbnails' );
  add_image_size('list-image',306,410,true);
  add_image_size('single-image',350,440,true);
}

require get_template_directory() . '/settings.php';
require get_template_directory() . '/tgm/class-tgm-plugin-activation.php';
/* --------
start TGM activating plugins
------------------------------------------- */
if ( ! function_exists( 'librebooks_register_required_plugins' ) ) :
function librebooks_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
            'name' => esc_attr__('Advanced Custom Fields', 'librebooks'),
            'slug' => 'advanced-custom-fields',
            'required' => true,
        ),
        array(
            'name' => esc_attr__('AJAX Hits Counter', 'librebooks'),
            'slug' => 'ajax-hits-counter',
            'required' => true,
        ),
        array(
            'name' => esc_attr__('Dynamic To Top', 'librebooks'),
            'slug' => 'dynamic-to-top',
            'required' => true,
        ),
        array(
            'name' => esc_attr__('WordPress Related Posts', 'librebooks'),
            'slug' => 'wordpress-23-related-posts-plugin',
            'required' => true,
        ),
        array(
            'name' => esc_attr__('WP-PostRatings', 'librebooks'),
            'slug' => 'wp-postratings',
            'required' => true,
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_attr__( 'Install Required Plugins', 'librebooks' ),
            'menu_title'                      => esc_attr__( 'Install Plugins', 'librebooks' ),
            'installing'                      => esc_attr__( 'Installing Plugin: %s', 'librebooks' ), // %s = plugin name.
            'oops'                            => esc_attr__( 'Something went wrong with the plugin API.', 'librebooks' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'librebooks' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'librebooks' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'librebooks' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'librebooks' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'librebooks' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'librebooks' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'librebooks' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'librebooks' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'librebooks' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'librebooks' ),
            'return'                          => esc_attr__( 'Return to Required Plugins Installer', 'librebooks' ),
            'plugin_activated'                => esc_attr__( 'Plugin activated successfully.', 'librebooks' ),
            'complete'                        => esc_attr__( 'All plugins installed and activated successfully. %s', 'librebooks' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );
}
endif;
add_action('tgmpa_register', 'librebooks_register_required_plugins');
/* --------
end TGM activating plugins
------------------------------------------- */
//Remove pings to self
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );



add_action( 'wp_enqueue_scripts', 'librebooks_scripts' );
function librebooks_scripts() {

	// Stop devicepx.js script.
	add_action('wp_enqueue_scripts', create_function(null, "wp_dequeue_script('devicepx');"), 20);



	// cdn jquery inclusion
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
		wp_enqueue_script('jquery');
	}

	// Styles

	wp_register_style('librebooks_main_style', get_bloginfo( 'stylesheet_url' ), array(), '1.00', 'all' );
	wp_enqueue_style('librebooks_main_style');

	// scripts

	wp_register_script( 'jquery-latest', get_template_directory_uri() . '/js/jquery-latest.js', array( 'jquery' ), false, true );
	wp_register_script( 'librebooks_main_scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), false, true );
	wp_register_script( 'jquery.infinitescroll', get_template_directory_uri() . '/js/jquery.infinitescroll.js', array( 'jquery' ), false, true );
	wp_register_script( 'jquery.jetpack', WP_PLUGIN_URL . '/jetpack/modules/sharedaddy/sharing.js?ver=20121205', array( 'jquery' ), false, true );
	wp_enqueue_script('jquery-latest');
	wp_enqueue_script('jquery.jetpack');
	wp_enqueue_script('jquery.infinitescroll');
	wp_enqueue_script('librebooks_main_scripts');
}
add_action('admin_enqueue_scripts', 'theme_admin_scripts');
function theme_admin_scripts() {
    wp_register_style('librebooks_admin-css', get_template_directory_uri().'/admin-css.css', array(), '', 'all' );
    wp_enqueue_style('librebooks_admin-css');
    wp_register_script('librebooks_admin-js', get_template_directory_uri() . '/js/admin-js.js', array( 'jquery' ) );
		wp_enqueue_script('librebooks_admin-js');
		wp_enqueue_script('jquery-ui-sortable');
}
// Remove share buttons under post.
// http://wordpress.org/support/topic/share-buttons-position-above-other-plugins
function jptweak_remove_share() {
	remove_filter( 'the_content', 'sharing_display',19 );
	remove_filter( 'the_excerpt', 'sharing_display',19 );
}
add_action( 'loop_end', 'jptweak_remove_share' );

if ( function_exists('register_sidebar') ) {
        register_sidebar(array(
                'name'=>'Sidebar',
								'id' => '1',
		'before_widget' => '<div class="side_box">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="side_title">',
		'after_title' => '</h3>',
	));

        register_sidebar(array(
                'name'=>'Footer Widget 1',
								'id' => '2',
		'before_widget' => '<div class="footer_box">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer_title">',
		'after_title' => '</h3>',
	));

        register_sidebar(array(
                'name'=>'Footer Widget 2',
								'id' => '3',
		'before_widget' => '<div class="footer_box">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer_title">',
		'after_title' => '</h3>',
	));

        register_sidebar(array(
                'name'=>'Footer Widget 3',
								'id' => '4',
		'before_widget' => '<div class="footer_box">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer_title">',
		'after_title' => '</h3>',
	));
}
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/post_default.png";
  }
  return $first_img;
}

/* Register Book Tags */
function build_taxonomies() {
    // code will go here
	register_taxonomy( 'writer', 'post', array( 'hierarchical' => false, 'label' => 'المؤلف-المترجم', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'release', 'post', array( 'hierarchical' => false, 'label' => 'سنة الإصدار', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'license', 'post', array( 'hierarchical' => false, 'label' => 'الترخيص', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'featured', 'post', array( 'hierarchical' => false, 'label' => 'المواضيع المميزة', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'blog_tags', 'blog', array( 'hierarchical' => false, 'label' => 'وسوم المدونة', 'query_var' => true, 'rewrite' => array( 'slug' => 'blogtags' ) ) );
}
add_action( 'init', 'build_taxonomies', 0 );

/* Search Scope */

 function SearchFilter($query) {
    if ($query->is_search) {
    $query->set('post_type', 'post');
    }
    return $query;
  }

add_filter('pre_get_posts','SearchFilter');

/* Set Admin Language to English */
add_filter('locale', 'wpse27056_setLocale');
function wpse27056_setLocale($locale) {
    if ( is_admin() ) {
        return 'en_US';
    }
    return $locale;
}


function atom_search_where($where){
  global $wpdb;
  if (is_search())
    $where .= "OR (t.name LIKE '%".get_search_query()."%' AND {$wpdb->posts}.post_status = 'publish')";
  return $where;
}

function atom_search_join($join){
  global $wpdb;
  if (is_search())
    $join .= "LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id=tr.term_taxonomy_id INNER JOIN {$wpdb->terms} t ON t.term_id = tt.term_id";
  return $join;
}

function atom_search_groupby($groupby){
  global $wpdb;

  // we need to group on post ID
  $groupby_id = "{$wpdb->posts}.ID";
  if(!is_search() || strpos($groupby, $groupby_id) !== false) return $groupby;

  // groupby was empty, use ours
  if(!strlen(trim($groupby))) return $groupby_id;

  // wasn't empty, append ours
  return $groupby.", ".$groupby_id;
}

add_filter('posts_where','atom_search_where');
add_filter('posts_join', 'atom_search_join');
add_filter('posts_groupby', 'atom_search_groupby');

/*
 * Corrects count in term_taxonomy table for terms which are are not in published posts
 */

add_action('edited_term_taxonomy','yoursite_edited_term_taxonomy',10,2);

function yoursite_edited_term_taxonomy($term,$taxonomy) {
  global $wpdb;
  $sql = "UPDATE wp_term_taxonomy tt
        SET count =
        (SELECT count(p.ID) FROM  wp_term_relationships tr
        LEFT JOIN wp_posts p
        ON (p.ID = tr.object_id AND p.post_type = '[post_type]' AND p.post_status = 'publish')
        WHERE tr.term_taxonomy_id = tt.term_taxonomy_id)
        WHERE tt.taxonomy = '[taxonomy_name]'
    ";
  $wpdb->query($sql);
}

/** Register Blog Post Type **/

function codex_custom_init() {
    $args = array(
      'public' => true,
      'label'  => 'Blog',
      'rewrite' => array('slug'=>'','with_front'=>false)
    );
    register_post_type( 'blog', $args );
}
add_action( 'init', 'codex_custom_init' );


// Add the Meta Box
function add_custom_meta_box() {
    add_meta_box(
        'ex_release', // $id
        'Ex-Releases', // $title
        'show_custom_meta_box', // $callback
        'post', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_custom_meta_box');


// The Callback
function show_custom_meta_box() {
global $custom_meta_fields, $post;
// Use nonce for verification
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Begin the field table and loop


    echo '<div class="form-table repeatable_form post_options">';

		$releaseNo = get_post_meta($post->ID, 'custom_release_no', true);
		$releaseUrl = get_post_meta($post->ID, 'custom_release_url', true);

		if ($releaseNo && is_array($releaseNo)) {
			foreach ($releaseNo as $key => $value) {
				echo '<div class="repeatable_group">';
				echo '<div class="holder">|||</div>';
				theme_post_options( array(
						'name'=> 'Release no.',
						'desc'  => 'رقم الإصدارة',
						'id'    => 'custom_release_no[]',
						'value' => $value,
						'class' => 'release_no_item',
						'type'  => 'repeatable_text'
				));
	    	theme_post_options( array(
						'name'=> 'Release URL',
						'desc'  => 'رابط الإصدارة',
						'id'    => 'custom_release_url[]',
						'value' => $releaseUrl[$key],
						'class' => 'release_url_item',
						'type'  => 'repeatable_text'
				));
				echo '<a class="repeatable-remove" href="#">'.__('حذف', 'LibreBooks').'</a>';
				echo "</div>";
			}
		} else {
			echo '<div class="repeatable_group">';
			echo '<div class="holder">|||</div>';
			theme_post_options( array(
					'name'=> 'Release no.',
					'desc'  => 'رقم الإصدارة',
					'id'    => 'custom_release_no[]',
					'value' => '',
					'class' => 'release_no_item',
					'type'  => 'repeatable_text'
			));
			theme_post_options( array(
					'name'=> 'Release URL',
					'desc'  => 'رابط الإصدارة',
					'id'    => 'custom_release_url[]',
					'value' => '',
					'class' => 'release_url_item',
					'type'  => 'repeatable_text'
			));
			echo '<a class="repeatable-remove" href="#">'.__('حذف', 'LibreBooks').'</a>';
			echo "</div>";
		}

			echo '<a class="repeatable-add button" href="#">'.__('أضف جديد', 'LibreBooks').'</a>';

    echo '</div>'; // end table
}
function theme_post_options($value){
	global $post;
?>
	<div class="option-item<?php echo ' '.$value['class'] ?>" id="<?php echo $value['id'] ?>-item">
		<span class="label"><?php  echo $value['name']; ?></span>
		<span class="desc"><?php echo $value['desc']; ?></span>
	<?php
		$id = $value['id'];
		$get_meta = get_post_custom($post->ID);

		if( isset( $get_meta[$id][0] ) ){
			$current_value = $get_meta[$id][0];
		}else{
			$current_value = '';
		}

	switch ( $value['type'] ) {

		case 'text': ?>
			<input  name="<?php echo $value['id']; ?>" id="<?php  echo $value['id']; ?>" type="text" value="<?php echo $current_value; ?>" />
		<?php
		break;

		case 'repeatable_text': ?>
			<input name="<?php echo $value['id']; ?>" id="<?php  echo $value['id']; ?>" type="text" value="<?php echo $value['value']; ?>" />
		<?php
		break;

		case 'select':
		?>
			<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
				<?php foreach ($value['options'] as $key => $option) { ?>
				<option value="<?php echo $key ?>" <?php if ( $current_value == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
				<?php } ?>
			</select>
		<?php
		break;

		case 'textarea':
		?>
			<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo $current_value ?></textarea>
		<?php
		break;
	} ?>
	</div>
<?php
}
    // Save the Data
    function save_custom_meta($post_id) {
        global $custom_meta_fields;

        // verify nonce
        if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
            return $post_id;
        // check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;
        // check permissions
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id))
                return $post_id;
            } elseif (!current_user_can('edit_post', $post_id)) {
                return $post_id;
        }
				$custom_meta_fields = array(
					'custom_release_no',
					'custom_release_url'
				);
        // loop through fields and save the data
        foreach ($custom_meta_fields as $field) {
            $old = get_post_meta($post_id, $field, true);
            $new = $_POST[$field];
            if ($new && $new != $old) {
                update_post_meta($post_id, $field, $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field, $old);
            }
        } // end foreach
    }
    add_action('save_post', 'save_custom_meta');

/*
 * Replace Taxonomy slug with Post Type slug in url
 * Version: 1.1
*/

function taxonomy_slug_rewrite($wp_rewrite) {
    $rules = array();
    // get all custom taxonomies
    $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
    // get all custom post types
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects');

    foreach ($post_types as $post_type) {
        foreach ($taxonomies as $taxonomy) {

            // go through all post types which this taxonomy is assigned to
            foreach ($taxonomy->object_type as $object_type) {

                // check if taxonomy is registered for this custom type
                if ($object_type == $post_type->rewrite['slug']) {

                    // get category objects
                    $terms = get_categories(array('type' => $object_type, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0));

                    // make rules
                    foreach ($terms as $term) {
                        $rules[$object_type . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                    }
                }
            }
        }
    }
    // merge with global rules
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'taxonomy_slug_rewrite');

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Custom walker class.
 */
class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu {

		public $break_point  = null;
		public $displayed = 0;
		public $close_more = null;

    /**
     * Starts the list before the elements are added.
     *
     * Adds classes to the unordered list sub-menus.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {

        // Depth-dependent classes.
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );

        // Build HTML for output.
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    /**
     * Start the element output.
     *
     * Adds main/sub-classes to the list items and links.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;

				if( !isset( $this->break_point ) ) {
		        $menu_elements = wp_get_nav_menu_items( $args->menu );
		        $top_level_elements = 0;

		        foreach( $menu_elements as $el ) {
		            if( $el->menu_item_parent === '0' ) {
		                $top_level_elements++;
		            }
		        }
		        $this->break_point = 3;
		     }
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // Depth-dependent classes.
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        // Passed classes.
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // Build HTML.
				if( $this->break_point == $this->displayed ) {
					$output .= $indent . '</ul><ul class="more"><li><a href="#more"> المزيد </a><ul class="menu"><li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
				} else {
					$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
				}

        // Link attributes.
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        // Build HTML output and pass through the proper filter.
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
				if( $item->menu_item_parent === '0' ) {
				    $this->displayed++;
				}
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
		function end_el( &$output, $item, $depth = 0, $args = array() ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
        $t = '';
        $n = '';
    } else {
        $t = "\t";
        $n = "\n";
    }
		$closemenu = false;
		if (!$this->close_more) {
			$menu_elements = wp_get_nav_menu_items( $args->menu );
			$top_level_elements = 0;

			foreach( $menu_elements as $el ) {
					if( $el->menu_item_parent === '0' ) {
							$top_level_elements++;
					}
			}
			if ($this->displayed == $top_level_elements) {
				$closemenu = true;
			}
		}
		if ($closemenu) {
			$output .= "</li>{$n}</li></ul>";
		} else {
			$output .= "</li>{$n}";
		}
}
}

if (!function_exists('librebooks_load_more')) {
	function librebooks_load_more() {
		?>
		<div class="load_more_cont">
	    <div align="center">
				<div class="load_more_text down_but">
	    		<?php next_posts_link(__('المزيد', 'LibreBooks')); ?>
	      </div>
			</div>
	  </div>
		<?php
	}
}
?>