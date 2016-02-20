<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chotot extends CI_Controller {

	// store list thumbs
	public $listing_thumbs=array();
	// index request
	public function index()
	{
		$this->load->helper('url'); // load helper url
		$this->load->view('chotot'); // load view chotot
	}
	// Function return result type json
	public function getResult(){
		// Using curl get html from chotot.vn
		$site=$this->curl->simple_get('http://www.chotot.vn/tp-ho-chi-minh/mua-ban/#');
		// Use preg match to filter images if user have images.
		preg_match_all('#chotot-list-row.*?([^\"]+/listing_thumbs/[^\"]+)#mis', $site, $output_array, PREG_SET_ORDER);
		foreach($output_array as $key=>$val){
			array_push($this->listing_thumbs,$val[1]);
		}
		echo json_encode($this->listing_thumbs);
	}


}
