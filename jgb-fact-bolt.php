<?php
/**
 * Factura/Boleta para Woocommerce
 *
 * @package       FACTBOLT
 * @author        Jorge Garrido
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Factura/Boleta para Woocommerce
 * Plugin URI:    https://mydomain.com
 * Description:   Agrega campos en el checkout para Factura/Boleta
 * Version:       1.0.0
 * Author:        Jorge Garrido
 * Author URI:    https://your-author-domain.com
 * Text Domain:   jgb-fact-bolt
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Factura/Boleta para Woocommerce. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin name
define( 'FACTBOLT_NAME',			'Factura/Boleta para Woocommerce' );

// Plugin version
define( 'FACTBOLT_VERSION',		'1.0.0' );

// Plugin Root File
define( 'FACTBOLT_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'FACTBOLT_PLUGIN_BASE',	plugin_basename( FACTBOLT_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'FACTBOLT_PLUGIN_DIR',	plugin_dir_path( FACTBOLT_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'FACTBOLT_PLUGIN_URL',	plugin_dir_url( FACTBOLT_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once FACTBOLT_PLUGIN_DIR . 'core/class-jgb-fact-bolt.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Jorge Garrido
 * @since   1.0.0
 * @return  object|Jgb_Fact_Bolt
 */
function FACTBOLT() {
	return Jgb_Fact_Bolt::instance();
}

FACTBOLT();
