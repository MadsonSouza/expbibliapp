<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Base extends CI_Controller {
	function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
	}
	/**
	 * Método para carregar a página principal do exemplo
	 *
	 * @return mixed
	 */
	public function index()
	{
		$error['error'] = null;
		$this->template->load('templates/default', 'index', $error);
	}
}