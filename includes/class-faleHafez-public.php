<?php

namespace faleHafez;

/**
 * Class faleHafez_Public
 * @package faleHafez
 */
require_once('functions.php');

class faleHafez_Public {
	/**
	 * faleHafez_Public constructor.
	 */
	
	//public $plugin_url;
	public $value;
	public $id;
	public $ip;
	public $name;
	protected $db;
	//private $wpdb;
	
	public function __construct() {


		global $wpdb;
		$this->db = $wpdb;
		add_shortcode('faleHafez_hafez_random', array( $this,'faleHafez_hafez_random_fun'));
		
		
		add_shortcode('faleHafez_hafez_poem', array( $this,'faleHafez_hafez_poem_fun'));
		
	}


	public function hide_toolmenu(){
		// this function hide admin bar in bublic side for subscribers user
		if(is_user_logged_in()){
			$user = wp_get_current_user();
			if ( in_array( 'subscriber', (array) $user->roles ) ) {
					//hide admin bar in public pages
					show_admin_bar( false );
			}
		}
	}

	public function faleHafez_hafez_random_fun(){
		$table_name = $this->db->prefix . "hafez_";
		$query = "SELECT * FROM {$table_name} ORDER BY RAND() LIMIT 1" ;

		//$this->value = $this->db->get_results( "SELECT * FROM `$table_name` ORDER BY RAND() LIMIT 1" );
		$content = $this->db->get_results( $query );
		//Sani html
		error_log(json_encode($content));
		return $content[0]->content;

	}

	public function faleHafez_hafez_poem_fun($id){
		$table_name = $this->db->prefix . "hafez_";
		
		// Check if $id is an array and get the last element
		$id_ = is_array($id) ? intval(sanitize_text_field(end($id))) : intval(sanitize_text_field($id));
		$query = $this->db->prepare( "SELECT * FROM {$table_name} WHERE omen_id = %d", $id_ );		
		$this->value = $this->db->get_results( $query );
		// Check if the query returned a result before trying to access it
		if (!empty($this->value)) {
			$content = $this->value[0]->content;
			//Sani html
			return ($content);
		} else {
			return null;
		}
	}
}

new faleHafez_Public();