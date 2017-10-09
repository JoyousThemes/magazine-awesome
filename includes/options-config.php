<?php

function magazine_awesome_theme_page() { 
    $title = esc_html(__('magazine-awesome','magazine-awesome'));  
    add_theme_page( 
        esc_html(__( 'Upgrade To magazine awesome Pro','magazine-awesome')),
        $title.'<i class="fa fa-plane theme-icon"></i>', 
        'edit_theme_options',
        'magazine_awesome_upgrade',
        'magazine_awesome_display_upgrade'
    );
}   

add_action('admin_menu','magazine_awesome_theme_page');

 
function magazine_awesome_display_upgrade() {
     $theme_data = wp_get_theme('magazine-awesome'); ?>
     <div class="magazine awesome-wrapper about-wrap">
        <h1><?php printf(esc_html__('Welcome to %1$s - Version %2$s', 'magazine-awesome'), $theme_data->Name ,$theme_data->Version ); ?></h1><?php
        printf( __('<div class="about-text"> Magazine Awesome is a free WordPress theme to use for multipurpose. It fits for business,commercial Uses and other purposes. You can use multiple sliders and Icon with services, BreadCrumb with related featured image of Post and Page. It has a Clean look of Blog view and widgetized footer. Magazine Awesome is a responsive, Translation Ready and Customizable Options.</div>', 'magazine-awesome') ); ?>
        <p class="about-text upgrade-btn clearfix"><?php printf( __( 'Magazine Awesome is our first theme and me and my friend both are combined to create Magazine Awesome. We will also like to give a PRO version for Magazine Awesome. Help me develop the theme and provide support by <a href="%2$s">donating even a small sum</a>', 'magazine-awesome' ), 'Magazine Awesome', 'https://www.paypal.me/SuganyaSelvakumar' ,'joyousthemes@gmail.com'); ?></p>

        <div class="theme_info info-tab-content">
            <div class="theme_info_column clearfix">
                <div class="theme_info_left">
                    <div class="theme_link">
                        <h3><?php esc_html_e( 'Theme Customizer', 'magazine-awesome' ); ?></h3>
                        <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'magazine-awesome'), $theme_data->Name); ?></p>
                        <p>
                            <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php esc_html_e('Start Customize', 'magazine-awesome'); ?></a>
                        </p>
                    </div>  
                    <div class="theme_link">
                        <h3><?php esc_html_e( 'Having Trouble, Need Support?', 'magazine-awesome' ); ?></h3>
                        <p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through Webulous free support ticket system.', 'magazine-awesome'), $theme_data->Name); ?></p>
                        <p>  
                            <a href="mailto:joyousthemes@gmail.com" target="_blank" class="button button-secondary"><?php esc_html_e('Mail Us', 'magazine-awesome'); ?></a>
                        </p>
                    </div> 
                </div>  
                <div class="theme_info_right">
                    <img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="Theme Screenshot" />
                </div>
            </div>
        </div>
    </div><?php
}        

	$options = array(
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
		'panels' => apply_filters( 'magazine_awesome_customizer_options', array(
			'magazine-awesome' => array(
				'priority'       => 9,
				'title'          => __('Theme Options', 'magazine-awesome'),
				'description'    => __('Theme Options', 'magazine-awesome'),
				'sections' => array(
					'general' => array(
						'title' => __('General', 'magazine-awesome'),
						'description' => __('General settings that affects overall site', 'magazine-awesome'),
						'fields' => array(
							'breadcrumb_section' => array(
								'type' => 'checkbox',
								'label' => __('Enable Breadcrumb Section', 'magazine-awesome'),
								'default' => 1,
								'sanitize_callback' => 'magazine_awesome_boolean',
							),
							'breadcrumb' => array(
								'type' => 'checkbox',
								'label' => __('Enable Breadcrumb', 'magazine-awesome'),
								'default' => 1,
								'sanitize_callback' => 'magazine_awesome_boolean',
							),
							'breadcrumb_bg' => array(
								'type' => 'image',
								'label' => __('Breadcrumb Background Image', 'magazine-awesome'),
								'default' => get_template_directory_uri() .'/images/breadcrumb.png',
							    'sanitize_callback' => 'esc_url_raw',
							),
							'breadcrumb_char' => array(
								'type' => 'select',
								'label' => __('Select Breadcrumb Character', 'magazine-awesome'),
								'choices' => array(
									'1' => '&raquo;',
									'2' => '&#47;',
									'3' => '&gt;'
								),
								'sanitize_callback' => 'magazine_awesome_breadcrumb_char_choices',
								'default' => '1',
							),
							 'numeric_pagination' => array(
                                'type' => 'checkbox',
                                'label' => __('Enable Numeric Page Navigation', 'magazine-awesome'),
                                'description' => __('Check to display numeric page navigation, instead of Previous Posts / Next Posts links.', 'magazine-awesome'),
                                'default' => 1, 
                                'sanitize_callback' => 'magazine_awesome_boolean', 
                            ),
                            'sidebar_position' => array(
                                'type' => 'radio',
                                'label' => __('Website Layout Options', 'magazine-awesome'),
                                'description' => __('Select main content and sidebar alignment.', 'magazine-awesome'),
                                'choices' => array(
                                    'left' => __('Sidebar Left', 'magazine-awesome'),
                                    'right' => __('Sidebar Right', 'magazine-awesome'),
                                    'fullwidth' => __('Full Width', 'magazine-awesome'),
                                    'no-sidebar' => __('No Sidebar', 'magazine-awesome'),
                                ),
                                'default' => 'right',  
                                'sanitize_callback' => 'sanitize_text_field', 
                            ),
						),
					),
					'header' => array(
						'title' => __('Header', 'magazine-awesome'),
						'description' => __('Header options', 'magazine-awesome'),
						'fields' => array(
							'logo_title' => array(
								'type' => 'checkbox',
								'label' => __('Logo as Title', 'magazine-awesome'),
								'default' => 0,
								'sanitize_callback' => 'magazine_awesome_boolean',
							),
							'tagline' => array(
								'type' => 'checkbox',
								'label' => __('Show site Tagline', 'magazine-awesome'),
								'default' => 1,
								'sanitize_callback' => 'magazine_awesome_boolean',
							),
						),
					),
					'footer' => array(
						'title' => __('Footer', 'magazine-awesome'),
						'description' => __('Footer related options', 'magazine-awesome'),
						'fields' => array(
							'footer_widgets' => array(
								'type' => 'checkbox',
								'label' => __('Footer Widget Area', 'magazine-awesome'),
								'default' => 1,
								'sanitize_callback' => 'magazine_awesome_boolean',
							),
							'copyright' => array(
                                'type' => 'textarea',
                                'label' => __('Footer Copyright Text (Validated that it\'s HTML Allowed)', 'magazine-awesome'),
                                'description' => __('HTML Allowed. <b>This field is even HTML validated! </b>', 'magazine-awesome'),
                                'sanitize_callback' => 'magazine_awesome_footer_copyright',
                            ),
						),
					),
					'home' => array(
						'title' => __('Home', 'magazine-awesome'),
						'description' => __('Home Page options', 'magazine-awesome'),
						'fields' => array(
							'slider_field' => array(   
								'type' => 'checkbox',
								'label' => __('Enable Home Page Slider Section', 'magazine-awesome'),
								'default' => 1,
								'sanitize_callback' => 'magazine_awesome_boolean',
							),
							'slider_cat' => array(
								'type' => 'category',
								'label' => __('Slider Posts Category', 'magazine-awesome'),
								'sanitize_callback' => 'absint',
							),
							'slider_count' => array(
								'type' => 'text',
								'label' => __('No. of Sliders', 'magazine-awesome'),
								'sanitize_callback' => 'absint',
								'default' => 3,
							),
							'service_field' => array(   
								'type' => 'checkbox',
								'label' => __('Enable Home Page Service Section', 'magazine-awesome'),
								'default' => 1,
								'sanitize_callback' => 'magazine_awesome_boolean',
							),
							'service_title' => array(   
								'type' => 'text',
								'label' => __('Enter your section title', 'magazine-awesome'),
								'default' => 'Our Services',
							),
							'service_section_icon_1' => array(  
								'type' => 'icons-picker',
								'label' => __('Choose Service Section Icons #1', 'magazine-awesome'),
								'sanitize_callback' => 'esc_html',
							),  
							'service_1' => array(
								'type' => 'dropdown-pages',
								'label' => __('Service Section #1', 'magazine-awesome'),
								'sanitize_callback' => 'absint',
							), 
							'service_color_1' => array( 
								'type' => 'color',
								'label' => __('Service #1 Color', 'magazine-awesome'),
								'default' => '#ff6600',
								'sanitize_callback' => 'sanitize_hex_color',
							),
							'service_section_icon_2' => array(
								'type' => 'icons-picker',
								'label' => __('Choose Service Section Icons #2', 'magazine-awesome'),
								'sanitize_callback' => 'sanitize_text_field',
							),
							'service_2' => array(
								'type' => 'dropdown-pages',
								'label' => __('Service Section #2', 'magazine-awesome'),
								'sanitize_callback' => 'absint',
							),
							'service_color_2' => array( 
								'type' => 'color',
								'label' => __('Service #2 Color', 'magazine-awesome'),
								'default' => '#79b458',  
								'sanitize_callback' => 'sanitize_hex_color',
							), 
							'service_section_icon_3' => array( 
								'type' => 'icons-picker',
								'label' => __('Choose Service Section Icons #3', 'magazine-awesome'),
								'sanitize_callback' => 'esc_html',
							),
							'service_3' => array(
								'type' => 'dropdown-pages',
								'label' => __('Service Section #3', 'magazine-awesome'),
								'sanitize_callback' => 'absint',
							),
							'service_color_3' => array( 
								'type' => 'color',
								'label' => __('Service #3 Color', 'magazine-awesome'),
								'default' => '#8080ff',
								'sanitize_callback' => 'sanitize_hex_color',
							),  
							'image_content_section_status' => array(   
								'type' => 'checkbox',
								'label' => __('Check this box to Show Image section', 'magazine-awesome'),
								'default' => 1,
								'sanitize_callback' => 'magazine_awesome_boolean',
							),
							'image_content_section_1' => array(
								'type' => 'dropdown-pages',
								'label' => __('Image content Section #1', 'magazine-awesome'),
								'sanitize_callback' => 'absint',
							),
							'image_content_section_2' => array(
								'type' => 'dropdown-pages',
								'label' => __('Image content Section #2', 'magazine-awesome'),
								'sanitize_callback' => 'absint',
							), 
							'enable_recent_post_service' => array(
                                'type' => 'checkbox',
                                'label' => __('Enable Home Page Recent Post Section', 'magazine-awesome'),
                                'default' => 1,
                                'sanitize_callback' => 'magazine_awesome_boolean',  
                            ), 
                            'recent_post_title' => array(   
								'type' => 'text',
								'label' => __('Enter your section title', 'magazine-awesome'),
								'default' => 'Read our Blog Posts',
							),
							'recent_posts_count' => array(
								'type' => 'text',
								'label' => __('No. of Recent Posts', 'magazine-awesome'),
								'sanitize_callback' => 'absint',
								'default' => 3,  
							), 
							'enable_home_default_content' => array(
                                'type' => 'checkbox',
                                'label' => __('Enable Home Page Default Content', 'magazine-awesome'),
                                'default' => 0,  
                                'sanitize_callback' => 'magazine_awesome_boolean',
                            ),
						),
					),
					'blog' => array(
						'title' => __('Blog', 'magazine-awesome'),
						'description' => __('Blog Related Posts options', 'magazine-awesome'),
						'fields' => array(
							'featured_image' => array(  
								'type' => 'checkbox',
								'label' => __('Enable Featured Image', 'magazine-awesome'),
								'default' => 1,
								'sanitize_callback' => 'magazine_awesome_boolean',
							),
                           'featured_image_size' => array(
                                'type' => 'radio',
                                'label' => __('Choose the featured image display type for Blog Page ', 'magazine-awesome'),
                                'choices' => array(
                                    '1' => __('Large Featured Image', 'magazine-awesome'),
                                    '2' => __('Small Featured Image', 'magazine-awesome'),        
                                ),
                                'default' => '1', 
                                'sanitize_callback' => 'absint',
                            ),
							'single_featured_image' => array(
								'type' => 'checkbox',
								'label' => __('Enable Single Post Featured Image', 'magazine-awesome'),
								'default' => 0,
								'sanitize_callback' => 'magazine_awesome_boolean',
							),
                            'single_featured_image_size' => array(
                                'type' => 'radio',
                                'label' => __('Choose the featured image display type for Single Page ', 'magazine-awesome'),
                                'choices' => array(
                                    '1' => __('Large Featured Image', 'magazine-awesome'),
                                    '2' => __('Small Featured Image', 'magazine-awesome'),       
                                ),
                                'default' => '1', 
                                'sanitize_callback' => 'absint',  
                            ),
                             'author_bio_box' => array(
                                'type' => 'checkbox',
                                'label' => __(' Enable Author Bio Box below single post', 'magazine-awesome'),
                                'description' => __('Show Author information box below single post.', 'magazine-awesome'),
                                'default' => 0,
                                'sanitize_callback' => 'magazine_awesome_boolean',    
                            ),
                            'related_posts' => array(
                                'type' => 'checkbox',
                                'label' => __('Show Related posts', 'magazine-awesome'),
                                'description' => __('Show related posts.', 'magazine-awesome'),
                                'default' => 0, 
                                'sanitize_callback' => 'magazine_awesome_boolean', 
                            ),
                            'related_posts_hierarchy' => array(
                                'type' => 'radio',
                                'label' => __('Related Posts Must Be Shown As:', 'magazine-awesome'),
                                'choices' => array(
                                    '1' => __('Related Posts By Tags', 'magazine-awesome'),
                                    '2' => __('Related Posts By Categories', 'magazine-awesome'),      
                                ),
                               'default' => '1', 
                               'sanitize_callback' => 'absint',    
                            ),
                            'comments' => array(
                                'type' => 'checkbox',
                                'label' => __(' Show Comments', 'magazine-awesome'),
                                'description' => __('Show Comments', 'magazine-awesome'),
                                'default' => 1,  
                                'sanitize_callback' => 'magazine_awesome_boolean',
                            ),
						),
					),

				)
			),
		) 
	)
	);

function magazine_awesome_boolean($value) {
	if(is_bool($value)) {
		return $value;
	} else {
		return false;
	}
}

function magazine_awesome_breadcrumb_char_choices($value='') {
	$choices = array('1','2','3');

	if( in_array($value, $choices)) {
		return $value;
	} else {
		return '1';
	}
}

if ( ! function_exists( 'magazine_awesome_footer_copyright' ) ) {

    function magazine_awesome_footer_copyright($string) {
        $allowed_tags = array(    
                            'a' => array(
                            	'href' => array(),
								'title' => array(),
								'target' => array(),
                            ),
							'img' => array(
								'src' => array(),  
								'alt' => array(),
							),
							'p' => array(),
							'br' => array(),
							'em' => array(),
                            'strong' => array(),
        );
        return wp_kses( $string,$allowed_tags);

    }
}

