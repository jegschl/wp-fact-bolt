<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'Jgb_Fact_Bolt' ) ) :

	/**
	 * Main Jgb_Fact_Bolt Class.
	 *
	 * @package		FACTBOLT
	 * @subpackage	Classes/Jgb_Fact_Bolt
	 * @since		1.0.0
	 * @author		Jorge Garrido
	 */
	final class Jgb_Fact_Bolt {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Jgb_Fact_Bolt
		 */
		private static $instance;

		/**
		 * FACTBOLT helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Jgb_Fact_Bolt_Helpers
		 */
		public $helpers;

		/**
		 * FACTBOLT settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Jgb_Fact_Bolt_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'jgb-fact-bolt' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'jgb-fact-bolt' ), '1.0.0' );
		}

		/**
		 * Main Jgb_Fact_Bolt Instance.
		 *
		 * Insures that only one instance of Jgb_Fact_Bolt exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Jgb_Fact_Bolt	The one true Jgb_Fact_Bolt
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Jgb_Fact_Bolt ) ) {
				self::$instance					= new Jgb_Fact_Bolt;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Jgb_Fact_Bolt_Helpers();
				self::$instance->settings		= new Jgb_Fact_Bolt_Settings();

				//Fire the plugin logic
				new Jgb_Fact_Bolt_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'FACTBOLT/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once FACTBOLT_PLUGIN_DIR . 'core/includes/classes/class-jgb-fact-bolt-helpers.php';
			require_once FACTBOLT_PLUGIN_DIR . 'core/includes/classes/class-jgb-fact-bolt-settings.php';

			require_once FACTBOLT_PLUGIN_DIR . 'core/includes/classes/class-jgb-fact-bolt-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'jgb-fact-bolt', FALSE, dirname( plugin_basename( FACTBOLT_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.