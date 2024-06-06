<?php

namespace faleHafez;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


class faleHafez_panel  {

	public $nounce;
	protected $db;
	public function __construct() {
		
		$this->faleHafez_render_fal_panel();
	}

	public function faleHafez_render_fal_panel() {


		if ( is_admin() ) {
					wp_register_style('faleHafez-style', faleHafez_PLUGIN_URL . 'includes/admin/assets/css/style.css',true,'1.0.0');
					wp_enqueue_style('faleHafez-style');
			
					$icon       = faleHafez_PLUGIN_URL . '/includes/admin/assets/image/logo.png';
					$words =  esc_html__("To use Hafez's horoscope Create a page called \"Hafez Horoscope Display\" and put the short code [faleHafez_hafez_random] in it. After this, create a page called Hafiz horoscope and give a link to the Hafez horoscope screen." , 'fale-hafez');
					$createdby =  esc_html__("Created by ejtem.com" , 'fale-hafez');
								
					wp_enqueue_script('faleHafez-script', faleHafez_PLUGIN_URL . 'includes/admin/assets/js/faleHafez.js', true, '1.0.0' );
					wp_localize_script('faleHafez-script', 'faleHafez', array('icon' => $icon, 'words' => $words, 'createdby' => $createdby));
		}
	}



}