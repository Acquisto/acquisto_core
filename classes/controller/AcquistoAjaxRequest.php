<?php

#$arrPost = $_POST;
#unset($_POST);

define('TL_MODE', 'FE');
require('../../../../../system/initialize.php');

#$_POST = $arrPost;

class AcquistoAjaxRequest extends \Frontend
{
	public function __construct()
	{
		parent::__construct();

		define('BE_USER_LOGGED_IN', $this->getLoginStatus('BE_USER_AUTH'));
		define('FE_USER_LOGGED_IN', $this->getLoginStatus('FE_USER_AUTH'));

		\Controller::setStaticUrls('TL_FILES_URL', $GLOBALS['TL_CONFIG']['staticFiles']);
		\Controller::setStaticUrls('TL_SCRIPT_URL', $GLOBALS['TL_CONFIG']['staticSystem']);
		\Controller::setStaticUrls('TL_PLUGINS_URL', $GLOBALS['TL_CONFIG']['staticPlugins']);
	}

	public function run()
	{
		$objModule = $this->Database->prepare("SELECT * FROM tl_module WHERE id=?")->execute(\Input::get('id'));
		$strClass  = $this->findFrontendModule($objModule->type);

		if ($this->classFileExists($strClass)) {
			$objModule->typePrefix = 'mod_';
			$objModule = new $strClass($objModule, $strColumn);
		}
		else {

		}

#		$objClass->generateAjax();
#
#		if (is_array($GLOBALS['TL_HOOKS']['simpleAjaxFrontend']) && count($GLOBALS['TL_HOOKS']['simpleAjaxFrontend']) > 0) {
#			// execute every registered callback
#			foreach ($GLOBALS['TL_HOOKS']['simpleAjaxFrontend'] as $callback) {
#				$this->import($callback[0]);
#				$this->$callback[0]->$callback[1]();
#			}
#		}
echo 2;
#		header('HTTP/1.1 412 Precondition Failed');
#		die('Invalid AJAX Request.');
	}
}

$AcquistoAjaxRequest = new AcquistoAjaxRequest();
$AcquistoAjaxRequest->run();