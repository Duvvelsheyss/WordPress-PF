<?php
/**
 * VW Portfolio Theme Customizer
 *
 * @package VW Portfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_portfolio_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_portfolio_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-portfolio' ),
	    'description' => __( 'Description of what this panel does.', 'vw-portfolio' ),
	) );

	$wp_customize->add_section( 'vw_portfolio_left_right', array(
    	'title'      => __( 'General Settings', 'vw-portfolio' ),
		'priority'   => 30,
		'panel' => 'vw_portfolio_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_portfolio_theme_options',array(
        'default' => __('Right Sidebar','vw-portfolio'),
        'sanitize_callback' => 'vw_portfolio_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_portfolio_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','vw-portfolio'),
        'section' => 'vw_portfolio_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-portfolio'),
            'Right Sidebar' => __('Right Sidebar','vw-portfolio'),
            'One Column' => __('One Column','vw-portfolio'),
            'Three Columns' => __('Three Columns','vw-portfolio'),
            'Four Columns' => __('Four Columns','vw-portfolio'),
            'Grid Layout' => __('Grid Layout','vw-portfolio')
        ),
	) );
    
	//Slider
	$wp_customize->add_section( 'vw_portfolio_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-portfolio' ),
		'priority'   => null,
		'panel' => 'vw_portfolio_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_portfolio_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_portfolio_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_portfolio_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-portfolio' ),
			'description' => __('Slider image size (1500 x 600)','vw-portfolio'),
			'section'  => 'vw_portfolio_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Awesome Service
	$wp_customize->add_section( 'vw_portfolio_services_section' , array(
    	'title'      => __( 'Awesome Services', 'vw-portfolio' ),
		'priority'   => null,
		'panel' => 'vw_portfolio_panel_id'
	) );

	$wp_customize->add_setting('vw_portfolio_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_portfolio_section_title',array(
		'label'	=> __('Section Title','vw-portfolio'),
		'section'=> 'vw_portfolio_services_section',
		'setting'=> 'vw_portfolio_section_title',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_portfolio_awesome_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_portfolio_sanitize_choices',
	));
	$wp_customize->add_control('vw_portfolio_awesome_services',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Services','vw-portfolio'),
		'description' => __('Image size (120 x 120)','vw-portfolio'),
		'section' => 'vw_portfolio_services_section',
	));
	
	//Footer Text
	$wp_customize->add_section('vw_portfolio_footer',array(
		'title'	=> __('Footer','vw-portfolio'),
		'description'=> __('This section will appear in the footer','vw-portfolio'),
		'panel' => 'vw_portfolio_panel_id',
	));	
	
	$wp_customize->add_setting('vw_portfolio_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_portfolio_footer_text',array(
		'label'	=> __('Copyright Text','vw-portfolio'),
		'section'=> 'vw_portfolio_footer',
		'setting'=> 'vw_portfolio_footer_text',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_portfolio_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Portfolio_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Portfolio_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Portfolio_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Portfolio Pro Theme', 'vw-portfolio' ),
					'pro_text' => esc_html__( 'Upgrade Pro', 'vw-portfolio' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-portfolio-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-portfolio-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-portfolio-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Portfolio_Customize::get_instance();