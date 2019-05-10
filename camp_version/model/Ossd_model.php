<?php
class Ossd_model extends CI_Model
{
	public $db_ossd;
	
    function __construct()
    {
        parent::__construct();
		if( strcmp($this->session->userdata('UsLogin'),'iserl') == 0 ){
			$this->db = $this->load->database('staff', TRUE);
		}else{
			$UsLogin = $this->session->userdata('UsLogin');
			$config = array(
					'dsn'	=> '',
					'hostname' => 'localhost',
					'username' => $UsLogin,
					'password' => $UsLogin,
					'database' => 'camp_s60_'.$UsLogin,
					'dbdriver' => 'mysqli',
					'dbprefix' => '',
					'pconnect' => FALSE,
					'db_debug' => (ENVIRONMENT !== 'production'),
					'cache_on' => FALSE,
					'cachedir' => '',
					'char_set' => 'utf8',
					'dbcollat' => 'utf8_general_ci',
					'swap_pre' => '',
					'encrypt' => FALSE,
					'compress' => FALSE,
					'stricton' => FALSE,
					'failover' => array(),
					'save_queries' => TRUE
				);
			$this->db = $this->load->database($config, TRUE);
		}
        //$this->db = $this->load->database('skill_testdb', TRUE);
        $this->db_ossd = $this->db->database;
    }
	
	function row2attribute($rw) {
		foreach ($rw as $key => $value) {
			if ( is_null($value) ) 
				eval("\$this->$key = NULL;");
			else
				eval("\$this->$key = '$value';");
		}
	}
}
?>