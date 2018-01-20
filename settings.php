<?php
function librebooks_register_theme_customizer( $wp_customize ) {
	class Nt_Customize_Control_Multiple_Select extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 */
	public $type = 'multiple-select';

	/**
	 * Displays the multiple select on the customize screen.
	 */
	public function render_content() {

	if ( empty( $this->choices ) )
	    return;
	?>
	    <label>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
	            <?php
	                foreach ( $this->choices as $value => $label ) {
	                    $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
	                    echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
	                }
	            ?>
	        </select>
	    </label>
	<?php }}
	/**
	 * Validate the options against the existing categories
	 * @param  string[] $input
	 * @return string
	 */
	function nt_sanitize_cat( $input )
	{
	    $valid = nt_cats();

	    foreach ($input as $value) {
	        if ( !array_key_exists( $value, $valid ) ) {
	            return [];
	        }
	    }

	    return $input;
	}

	$wp_customize->add_section( 'librebooks_site_info' , array(
		'title'      => __('Add Site Info','librebooks'),
		'priority'   => 20,
) );

$wp_customize->add_setting(
		'librebooks_front_page_welcome_message',
		array(
				'default'     => '',

				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_front_page_welcome_message', array(
		'label'      => __('Home Page Welcome Message', 'librebooks'),
		'section'    => 'librebooks_site_info',
		'settings'   => 'librebooks_front_page_welcome_message',
		'type'       => 'textarea',
));

$wp_customize->add_setting(
		'librebooks_enable_taxonomies_menu',
		array(
				'default'     => false,

				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_enable_taxonomies_menu', array(
		'label'      => __('Enable Taxonomies Menu at Top Bar', 'librebooks'),
		'section'    => 'librebooks_site_info',
		'settings'   => 'librebooks_enable_taxonomies_menu',
		'type'       => 'checkbox',
));

function librebooks_enable_taxs( $control ) {
        if (( $control->manager->get_setting('librebooks_enable_taxonomies_menu')->value() == true)) {
            return true;
        } else {
            return false;
        }
    }
$wp_customize->add_setting(
		'librebooks_taxonomies_link',
		array(
				'default'     => '',

				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_taxonomies_link', array(
		'label'      => __('Taxonomies Page URL', 'librebooks'),
		'section'    => 'librebooks_site_info',
		'settings'   => 'librebooks_taxonomies_link',
		'active_callback' => 'librebooks_enable_taxs',
		'type'       => 'text',
));

$args = array(
	'public'   => true,
	'_builtin' => false,
	'object_type' => array('post')
);
$output = 'objects'; // or objects
$operator = 'and'; // 'and' or 'or'
$taxonomies = get_taxonomies( $args, $output, $operator );
$categories_top_menu = array();

if ($taxonomies) {
	foreach ($taxonomies as $taxonomy) {
		$categories_top_menu[$taxonomy->name] = $taxonomy->labels->name;
	}
}
$categories_top_menu['post_tag'] = __('الوسوم', 'LibreBooks');

$wp_customize->add_setting(
		'librebooks_taxonomies_to_show',
		array(
				'default'     => '',
				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control(new Nt_Customize_Control_Multiple_Select (
        $wp_customize, 'librebooks_taxonomies_to_show', array(
		'label'      => __('Add Header Content Code', 'librebooks'),
		'section'    => 'librebooks_site_info',
		'settings'   => 'librebooks_taxonomies_to_show',
		'type'       => 'multiple-select',
		'choices' => $categories_top_menu
)));

$wp_customize->add_setting(
		'librebooks_footer_rights',
		array(
				'default'     => 'بكل الفخر هذا الموقع يعمل <a href="http://librebooks.org/about-site/#software-used-in-website">باستخدام</a> برمجيات حرة مفتوحة المصدر، ومحتواه منشور برخصة المشاع الإبداعي <a target="_blank" href="http://creativecommons.org/licenses/by-sa/3.0/">النسبة-بذات الرخصة، الإصدارة ٣.٠</a>.',
				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_footer_rights', array(
		'label'      => __('Footer Copyright Text', 'librebooks'),
		'section'    => 'librebooks_site_info',
		'settings'   => 'librebooks_footer_rights',
		'type'       => 'textarea',
));

$wp_customize->add_setting(
		'librebooks_fb_id',
		array(
				'default'     => '',

				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_fb_id', array(
		'label'      => __('Facebook App ID', 'librebooks'),
		'section'    => 'librebooks_site_info',
		'settings'   => 'librebooks_fb_id',
		'type'       => 'text',
));
$wp_customize->add_setting(
		'librebooks_fb_page',
		array(
				'default'     => '',

				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_fb_page', array(
		'label'      => __('Facebook Page', 'librebooks'),
		'section'    => 'librebooks_site_info',
		'settings'   => 'librebooks_fb_page',
		'type'       => 'text',
));
$wp_customize->add_setting(
		'librebooks_twt_account',
		array(
				'default'     => '',

				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_twt_account', array(
		'label'      => __('Twitter Account', 'librebooks'),
		'section'    => 'librebooks_site_info',
		'settings'   => 'librebooks_twt_account',
		'type'       => 'text',
));
	$wp_customize->add_section( 'librebooks_custom_code' , array(
		'title'      => __('Add Header/Footer Content','librebooks'),
		'priority'   => 20,
) );
	/* Custom Content Section */

$wp_customize->add_setting(
		'librebooks_custom_header_code',
		array(
				'default'     => '',

				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_custom_header_code', array(
		'label'      => __('Add Header Content Code', 'librebooks'),
		'section'    => 'librebooks_custom_code',
		'settings'   => 'librebooks_custom_header_code',
		'type'       => 'textarea',
));

$wp_customize->add_setting(
		'librebooks_custom_footer_code',
		array(
				'default'     => '',
				'transport'   => 'postMessage',
		)
);

		$wp_customize->add_control('librebooks_custom_footer_code', array(
		'label'      => __('Add Footer Content Code', 'librebooks'),
		'section'    => 'librebooks_custom_code',
		'settings'   => 'librebooks_custom_footer_code',
		'type'       => 'textarea',
));

}
add_action( 'customize_register', 'librebooks_register_theme_customizer' );


?>