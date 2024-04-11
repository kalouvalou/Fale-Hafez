<?php

namespace ejtemFal;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


class Panel_edit  {

	public $nounce;
	protected $db;
	public function __construct() {
		
		$this->render_fal_panel();
	}

	public function render_fal_panel() {
		$icon       = ejtemFal_PLUGIN_URL . '/includes/admin/assets/image/logo.png';
		$words =  __(" To use Hafez's horoscope Create a page called \"Hafez Horoscope Display\" and put the short code <b>[Hafez_random]</b> in it. After this, create a page called Hafiz horoscope and give a link to the Hafez horoscope screen." , 'hafez-ejtemFal');
		$createdby =  __("Created by ejtem.com" , 'hafez-ejtemFal');
		if ( is_admin() ) {
			
			echo '<div class="text-center"> 
				<style>
				.center {
				display: block;
				margin-left: auto;
				margin-right: auto;
				/* width: 50%; */
				}
				.text-content {
					text-align: center;
				}
				</style>
     
				<br><br><br>
				
				<img src="'. $icon.'"  class="center" width="200px">
					<br>
					<br>
					<p class="text-content">
						'.$words.'
						<br><br>				
					</p>	
				</div>';	
						

					
		}else{
			echo  __("Fale Hafez: You dont access this section" , 'hafez-ejtemFal'); 
		}
	}



}