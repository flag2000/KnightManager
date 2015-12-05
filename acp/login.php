<?php
/**
 * @author	Philipp Bornemann
 * @copyright	2015-2017 Philipp Bornemann
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 */
require_once('../KnightManager.class.php');
require_once('../template/acp_login.html');

$username = $_POST['inputUsername'];
$email = $_POST['inputUsername'];
$password = password_hash($_POST['inputPassword'], PASSWORD_BCRYPT);

$login = new KnightManager;
$login->login_acp($username, $email, $password);
?>