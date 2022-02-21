<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Jgb_Fact_Bolt_Run
 *
 * Thats where we bring the plugin to life
 *
 * @package		FACTBOLT
 * @subpackage	Classes/Jgb_Fact_Bolt_Run
 * @author		Jorge Garrido
 * @since		1.0.0
 */
class Jgb_Fact_Bolt_Run{

	/**
	 * Our Jgb_Fact_Bolt_Run constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct(){
		$this->add_hooks();
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOKS
	 * ###
	 * ######################
	 */

	/**
	 * Registers all WordPress and plugin related hooks
	 *
	 * @access	private
	 * @since	1.0.0
	 * @return	void
	 */
	private function add_hooks(){
	
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_backend_scripts_and_styles' ), 20 );
	
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOK CALLBACKS
	 * ###
	 * ######################
	 */

	/**
	 * Enqueue the backend related scripts and styles for this plugin.
	 * All of the added scripts andstyles will be available on every page within the backend.
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function enqueue_backend_scripts_and_styles() {
		wp_enqueue_style( 'factbolt-backend-styles', FACTBOLT_PLUGIN_URL . 'core/includes/assets/css/backend-styles.css', array(), FACTBOLT_VERSION, 'all' );
		wp_enqueue_script( 'factbolt-backend-scripts', FACTBOLT_PLUGIN_URL . 'core/includes/assets/js/backend-scripts.js', array(), FACTBOLT_VERSION, false );
		wp_localize_script( 'factbolt-backend-scripts', 'factbolt', array(
			'plugin_name'   	=> __( FACTBOLT_NAME, 'jgb-fact-bolt' ),
		));
	}

}
