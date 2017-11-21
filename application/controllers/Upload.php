<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller {
	function __construct(){ 
	parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{
	}
	
	public function send_authors()
	{
		$error['error'] = null;
		$this->template->load('templates/default', 'authors', $error);
	}
	
	public function send_books()
	{
		$error['error'] = null;
		$this->template->load('templates/default', 'books', $error);
	}
	/**
	 * Método para fazer upload do arquivo
	 */
	public function upload_file(){

		$error = null;
		$id_author = null;

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'json|txt';
		$path = "./uploads/";
		
		// verifica se o diretório existe
		// se não existe é criado com permissão de leitura e escrita
		if ( ! is_dir($path)) {
			mkdir($path, 0777, $recursive = true);
		}

		$file_type = $this->input->post('ref');
		if($this->input->post('id_autor')){
			$id_author = $this->input->post('id_autor');
		}
				
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('arquivo'))
		{
			$msg = array('error' => $this->upload->display_errors());
			if($file_type == 1){
				$this->template->load('templates/default', 'authors', $msg);
			}
			if($file_type == 2){
				$this->template->load('templates/default', 'books', $msg);
			}
		}
		else
		{	
			$file_name = $this->upload->data('file_name');
			$arr = $this->upload->data();
			$this->Read_file($file_name, $file_type, $id_author);				
		}
	}

	public function Read_file($file_name = null, $file_type = null, $id_author = null){
		
		$url = null;
		$msg_sucess = null;
		$File = file_get_contents(base_url()."uploads/".$file_name); 

		if($id_author){
			$decoded = json_decode($File, true);			
			$File = json_encode(array_merge($decoded, array('authorId' => intval($id_author))));
		}
		
		if($file_type == 1){
			$url = 'http://bibliapp.herokuapp.com/api/authors';
			$msg_sucess = 'Autor Inserido';
			$template = 'authors';
		}
		if($file_type == 2){
			$url = 'http://bibliapp.herokuapp.com/api/books';
			$msg_sucess = 'Livro Inserido';
			$template = 'books';
		}

		$this->load->library('HttpClient', array(
			'headers' => array(
				 'Content-Type: application/json',
			),
			'data' => $File,
			'url' => $url,
		));

		if($this->httpclient->post()){
			$msg = null;			
			$return = $this->httpclient->getResultsArray();

			if(isset($return['error'])){
				$msg = array('error' => $return['error']['message']);
			} else {
				$msg = array('success' => $msg_sucess);
				if($file_type == 1){
					$_SESSION['author'][] = $return;
				}				
			}

			$this->template->load('templates/default', $template, $msg);

		} else {
			$msg = null;
			$msg = array('error' => $this->httpclient->getErrorMsg());
			$this->template->load('templates/default', $template, $msg);
		}

	}

}