<?php
require_once get_template_directory() . '/includes/options-config.php';
require_once get_template_directory() . '/admin/control-icon-picker.php';

	if( ! class_exists('Magazine_Awesome_Customizer_API_Wrapper') ) {
			require_once get_template_directory() . '/admin/class-magazine-awesome-customizer-api-wrapper.php';
	}


Magazine_Awesome_Customizer_API_Wrapper::getInstance($options);
