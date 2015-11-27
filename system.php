<?php
/**
 * @author	Philipp Bornemann
 * @copyright	2015-2017 Philipp Bornemann
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 */
class KnightManager {
	public function show_version() {
		$version = "1.0.0 Pre-Alpha 1";
		echo $version;
	}
	public function show_version_code() {
		$version_code = 0100;
		echo $version_code;
	}
	public function show_status() {
		$status = 0;
		// Wenn Status = 0, soll eine Meldung ausgegeben werden, dass sich die Software in der Testphase befindet
	}
}
?>