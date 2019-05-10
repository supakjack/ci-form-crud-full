<?php 
/*
* Class Camp_controller
* Main Controller ของ package SE Training Camp 2561
* @package SE Training Camp 2561
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__).'/../Main_Controller.php');
class Camp_controller extends Main_Controller {
	function __construct(){
		parent::__construct();
	}
	 
	function index(){
		$this->output($this->stdId.'/v_html_ex');
	}

}
?>