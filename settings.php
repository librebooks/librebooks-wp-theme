<?php
$themename = "ArtWorks";
$shortname = "neue";
$settings_list = array(
    'custom_logo_url',
'background_image_url',  
    'custom_background_color',
    'header_text',
    'disable_slideshow',
    'facebook_link',
    'twitter_link',
    'dribbble_link',
    'google_plus_link',
    'pinterest_link'
);
function mytheme_add_admin() {
    global $themename, $shortname, $settings_list;
    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {
                  foreach($settings_list as $value) {
                    //echo '<script type="text/javascript">alert("' . $value . '");</script>';
                    //if($_REQUEST[$value] != "")
                      //update_option($shortname . '_' . $value,$_REQUEST[$value]);
                      update_option($shortname . '_' . $value,mysql_real_escape_string($_REQUEST[$value]));
                  }
                  header("Location: themes.php?page=settings.php&saved=true");
                  die;
        }
    }
    add_theme_page($themename." Settings", $themename." Settings", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
function mytheme_admin() {
    global $themename, $shortname, $settings_list;
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<style type="text/css">
table { border: none; }
td { padding: 5px; }
.ss_text { width: 350px; }
</style>
<div class="wrap">
<h2><?php echo $themename; ?> Theme Options</h2>
<form method="post">
<table>
<tr>
  <td>Custom logo URL:</td>
  <td><input type="text" name="custom_logo_url" class="ss_text" value="<?php echo stripslashes(stripslashes(get_option($shortname.'_custom_logo_url',''))); ?>" /><br /><small><a href="<?php bloginfo('url'); ?>/wp-admin/media-new.php" target="_blank">Upload your logo</a> (300px wide x 100px high)</small></td>
</tr>
<tr>
  <td>Custom background image URL:</td>
  <td><input type="text" name="background_image_url" class="ss_text" value="<?php echo stripslashes(stripslashes(get_option($shortname.'_background_image_url',''))); ?>" /> <br /><small><a href="<?php bloginfo('url'); ?>/wp-admin/media-new.php" target="_blank">Upload your background</a></small></td>
</tr>
<tr>
  <td>Header Text:</td>
  <td><input type="text" name="header_text" class="ss_text" value="<?php echo stripslashes(stripslashes(get_option($shortname.'_header_text',''))); ?>" /></td>
</tr>
<tr>
  <td>Facebook Link:</td>
  <td><input type="text" name="facebook_link" class="ss_text" value="<?php echo stripslashes(stripslashes(get_option($shortname.'_facebook_link',''))); ?>" /></td>
</tr>
<tr>
  <td>Twitter Link:</td>
  <td><input type="text" name="twitter_link" class="ss_text" value="<?php echo stripslashes(stripslashes(get_option($shortname.'_twitter_link',''))); ?>" /></td>
</tr>
<tr>
  <td>Dribbble Link:</td>
  <td><input type="text" name="dribbble_link" class="ss_text" value="<?php echo stripslashes(stripslashes(get_option($shortname.'_dribbble_link',''))); ?>" /></td>
</tr>
<tr>
  <td>Google Plus Link:</td>
  <td><input type="text" name="google_plus_link" class="ss_text" value="<?php echo stripslashes(stripslashes(get_option($shortname.'_google_plus_link',''))); ?>" /></td>
</tr>
<tr>
  <td>Pinterest Link:</td>
  <td><input type="text" name="pinterest_link" class="ss_text" value="<?php echo stripslashes(stripslashes(get_option($shortname.'_pinterest_link',''))); ?>" /></td>
</tr>
</table>
<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<?php
}
add_action('admin_menu', 'mytheme_add_admin');
?>