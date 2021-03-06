<?php
/**
 * @author	Philipp Bornemann
 * @copyright	2015-2017 Philipp Bornemann
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 */
class KnightManager {
	public function get_version() {
		$version = '1.0.0 Pre-Alpha 1';
		echo $version;
	}
	
	public function get_version_code() {
		$version_code = 1000; // Wichtig für die Kompatibilität der Plugins und Styles
		echo $version_code;
	}
	
	public function get_status() {
		$status = 0; // 0 = Test, 1 = Final
		
		if ($status == 0) {
			require_once('./template/get_status.html');
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
	
	public function db_connect() {
		require_once('mysql_login.php');
		
		try {
			$c = new PDO("mysql:host=".$dbhost.";dbname=".$dbname."", "".$dbuser."", "".$dbpassword."");
		}
		catch (PDOException $e) {
			print_r($e);
		}
		
		$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	public function db_connect_close() {
		$c = null;
	}
	
	public function login($username, $email, $password) {
		$this->db_connect();
		
		try {
			$query = 'SELECT username, password, email, activated FROM km_user';
			$data = $c->query($query);
			
			if ($data->username !== $username OR $data->email !== $email) {
				require_once('./template/login_wrong_username.html');
			}
			else if (!password_verify($password, $data->password)) {
				require_once('./template/login_wrong_password.html');
			}
			else {
				header('Location: user.php');
			}
		}
		catch (PDOException $e) {
			print_r($e);
		}
		
		$this->db_connect_close();
	}
	
	public function login_acp($username, $email, $password) {
		$this->db_connect();
		
		try {
			$query = 'SELECT username, password, email, activated, user_group FROM km_user';
			$data = $c->query($query);
			
			if ($data->username !== $username OR $data->email !== $email) {
				require_once('./template/login_wrong_username.html');
			}
			else if (!password_verify($password, $data->password)) {
				require_once('./template/login_wrong_password.html');
			}
			else {
				header('Location: index.php');
			}
		}
		catch (PDOException $e) {
			print_r($e);
		}
		
		$this->db_connect_close();
	}
}
?>