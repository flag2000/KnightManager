<?php
/**
 * @author	Philipp Bornemann
 * @copyright	2015-2017 Philipp Bornemann
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 */
class KnightManager {
	public function show_version() {
		$version = '1.0.0 Pre-Alpha 1';
		echo $version;
	}
	
	public function show_version_code() {
		$version_code = 1000; // Wichtig für die Kompatibilität der Plugins und Styles
		echo $version_code;
	}
	
	public function show_status() {
		$status = 0; // 0 = Test, 1 = Final
		
		if ($status == 0) {
			require_once('./template/show_status.html');
		}
	}
	
	public function check_requirements() {
		$php_version = phpversion();
		$memory_limit = ini_get('memory_limit');
		
		if ($php_version < '5.6.0') {
			die('System requirements: PHP Version 5.6.0');
		}
		
		if ($memory_limit < '128M') {
			die('System requirements: PHP memory_limit 128M');
		}
		
		if (!extension_loaded('pdo')) {
			die('System requirements: PHP extension pdo');
		}
	}
}
?>