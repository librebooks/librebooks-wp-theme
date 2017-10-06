<?php
include('settings.php');
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}
function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
  add_theme_support( 'post-thumbnails' );
  add_image_size('slide-image',852,282,true);
  add_image_size('home-image',306,410,true);
  add_image_size('blog-image',680,280,true);
}

//Remove pings to self
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );

// Stop devicepx.js script.
add_action('wp_enqueue_scripts', create_function(null, "wp_dequeue_script('devicepx');"), 20);



// cdn jquery inclusion
if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
	wp_enqueue_script('jquery');
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
		'before_widget' => '<div class="side_box">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="side_title">',
		'after_title' => '</h3>',
	));
        
        register_sidebar(array(
                'name'=>'Footer Widget 1',
		'before_widget' => '<div class="footer_box">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer_title">',
		'after_title' => '</h3>',
	));        
        
        register_sidebar(array(
                'name'=>'Footer Widget 2',
		'before_widget' => '<div class="footer_box">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer_title">',
		'after_title' => '</h3>',
	));                
        
        register_sidebar(array(
                'name'=>'Footer Widget 3',
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
function ds_get_excerpt($num_chars) {
    $temp_str = substr(strip_tags(get_the_content()),0,$num_chars);
    $temp_parts = explode(" ",$temp_str);
    $temp_parts[(count($temp_parts) - 1)] = '';
    
    if(strlen(strip_tags(get_the_content())) > 125)
      return implode(" ",$temp_parts) . '...';
    else
      return implode(" ",$temp_parts);
}
// **** PRODUCTION - Template1 Search START ****
class template1_search extends WP_Widget {
	function template1_search() {
		parent::WP_Widget(false, 'ArtWorks Search');
	}
	function widget($args, $instance) {
                $args['search_title'] = $instance['search_title'];
		t1_func_search($args);
	}
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	function form($instance) {
                $search_title = esc_attr($instance['search_title']);
?>
                <p><label for="<?php echo $this->get_field_id('search_title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('search_title'); ?>" name="<?php echo $this->get_field_name('search_title'); ?>" type="text" value="<?php echo $search_title; ?>" /></label></p>
<?php
	}
 }
function t1_func_search($args = array(), $displayComments = TRUE, $interval = '') {
	global $wpdb;
        echo $args['before_widget']; 
        
        if($args['search_title'] != '')
            echo $args['before_title'] . $args['search_title'] . $args['after_title']; ?>
        <div class="t1_search_cont">
            <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
            <input type="text" name="s" id="s" />
            <INPUT TYPE="image" SRC="<?php bloginfo('stylesheet_directory'); ?>/images/search-icon.jpg" class="t1_search_icon" BORDER="0" ALT="Submit Form">
            </form>
        </div><!--//t1_search_cont-->
        <?php
        echo $args['after_widget'];
        wp_reset_query();
        
}
register_widget('template1_search');  
// **** PRODUCTION - Template1 Search END ****
// EX POST CUSTOM FIELD START
$prefix = 'ex_';
$meta_box = array(
    'id' => 'my-meta-box',
    'title' => 'Custom meta box',
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
/*        array(
            'name' => 'Text box',
            'desc' => 'Enter something here',
            'id' => $prefix . 'text',
            'type' => 'text',
            'std' => 'Default value 1'
        ),
        array(
            'name' => 'Textarea',
            'desc' => 'Enter big text here',
            'id' => $prefix . 'textarea',
            'type' => 'textarea',
            'std' => 'Default value 2'
        ),
        array(
            'name' => 'Select box',
            'id' => $prefix . 'select',
            'type' => 'select',
            'options' => array('Option 1', 'Option 2', 'Option 3')
        ),
        array(
            'name' => 'Radio',
            'id' => $prefix . 'radio',
            'type' => 'radio',
            'options' => array(
                array('name' => 'Name 1', 'value' => 'Value 1'),
                array('name' => 'Name 2', 'value' => 'Value 2')
            )
        ),*/
        array(
            'name' => 'Box',
            'id' => $prefix . 'show_in_slideshow',
            'type' => 'checkbox'
        )
    )
);
add_action('admin_menu', 'mytheme_add_box');
// Add meta box
function mytheme_add_box() {
    global $meta_box;
    add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}
// Callback function to show fields in meta box
function mytheme_show_box() {
    global $meta_box, $post;
    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" value="Yes" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '<td>',
            '</tr>';
    }
    echo '</table>';
}
add_action('save_post', 'mytheme_save_data');
// Save data from meta box
function mytheme_save_data($post_id) {
    global $meta_box;
    // verify nonce
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
// EX POST CUSTOM FIELD END


function build_taxonomies() {  
    // code will go here  
	register_taxonomy( 'writer', 'post', array( 'hierarchical' => false, 'label' => 'المؤلف-المترجم', 'query_var' => true, 'rewrite' => true ) ); 
	register_taxonomy( 'release', 'post', array( 'hierarchical' => false, 'label' => 'سنة الإصدار', 'query_var' => true, 'rewrite' => true ) );  
	register_taxonomy( 'license', 'post', array( 'hierarchical' => false, 'label' => 'الترخيص', 'query_var' => true, 'rewrite' => true ) );  
	register_taxonomy( 'featured', 'post', array( 'hierarchical' => false, 'label' => 'المواضيع المميزة', 'query_var' => true, 'rewrite' => true ) ); 
register_taxonomy( 'blog_tags', 'blog', array( 'hierarchical' => false, 'label' => 'وسوم المدونة', 'query_var' => true, 'rewrite' => array( 'slug' => 'blogtags' ) ) ); 
}
add_action( 'init', 'build_taxonomies', 0 );

 function SearchFilter($query) {
    if ($query->is_search) {
    $query->set('post_type', 'post');
    }
    return $query;
    }

    add_filter('pre_get_posts','SearchFilter');

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

/** blog **/

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

    // Field Array  
    $prefix = 'custom_';  
    $custom_meta_fields = array(  
        array(  
            'label'=> 'Release no.',  
            'desc'  => 'رقم الإصدارة',  
            'id'    => $prefix.'release_no',  
            'type'  => 'repeatable'  
        ),
	array(  
            'label'=> 'Release URL',  
            'desc'  => 'رابط الإصدارة',  
            'id'    => $prefix.'release_url',  
            'type'  => 'repeatable'  
        )  

    );  

// The Callback  
function show_custom_meta_box() {  
global $custom_meta_fields, $post;  
// Use nonce for verification  
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
      
    // Begin the field table and loop  
    echo '<table class="form-table">';  
    foreach ($custom_meta_fields as $field) {  
        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);  
        // begin a table row with  
        echo '<tr> 
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
                <td>';  

    echo '<a class="repeatable-add button" href="#">+</a> 
            <ul id="'.$field['id'].'-repeatable" class="custom_repeatable">';  
    $i = 0;  
    if ($meta) {  
        foreach($meta as $row) {  
            echo '<li><span class="sort hndle">|||</span> 
                        <input type="text" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" value="'.$row.'" size="30" /> 
                        <a class="repeatable-remove button" href="#">-</a></li>';  
            $i++;  
        }  
    } else {  
        echo '<li><span class="sort hndle">|||</span> 
                    <input type="text" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" value="" size="30" /> 
                    <a class="repeatable-remove button" href="#">-</a></li>';  
    }  
    echo '</ul> 
        <span class="description">'.$field['desc'].'</span>';  

        echo '</td></tr>';  
    } // end foreach  
    echo '</table>'; // end table  
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
          
        // loop through fields and save the data  
        foreach ($custom_meta_fields as $field) {  
            $old = get_post_meta($post_id, $field['id'], true);  
            $new = $_POST[$field['id']];  
            if ($new && $new != $old) {  
                update_post_meta($post_id, $field['id'], $new);  
            } elseif ('' == $new && $old) {  
                delete_post_meta($post_id, $field['id'], $old);  
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


?>
