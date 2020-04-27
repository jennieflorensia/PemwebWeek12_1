<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoviePage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('movies');
	}

	public function index()
	{
	
		$movies['data'] = $this->movies->ShowData();

		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);

		$data['table'] = $this->load->view('template/table_movie', $movies, TRUE);

		$this->load->view('page/movie',$data);
	}

	public function ShowDetail()
	{

		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);
		$data['id'] = $this->input->get('id');

		$data['data'] = $this->movies->ShowDetail($data['id']);

		$this->load->view('page/movie_details', $data);
	}

	public function AddMovie()
	{
		//Type your code here ...
	}

	public function EditMovie($param)
	{
		//Type your code here ...
	}
}
?>