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
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);

		// $validation = $this->form_validation;

        // $validation->set_rules('nama','Nama','required');
        // $validation->set_rules('qty','Quantitiy per Unit','required');
        // $validation->set_rules('price','Harga','required|numeric');

		

		$this->load->view('page/movie_add', $data);
	}

	public function InsertMovie(){
		$post = $this->input->post();
		$this->Title = $post['title'];
		$this->Year = $post['year'];
		$this->Director = $post['dir'];
		$this->PosterLink = $this->UploadImage();

		$this->movies->AddData($this->Title, $this->Year, $this->Director, $this->PosterLink);
        redirect('MoviePage/index');
	}

	public function UploadImage(){
		$config['upload_path']          = './assets/poster/';
		$config['allowed_types']        = 'jpg|png';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('poster')){
			$error = array('error' => $this->upload->display_errors());
		}else{
			$data_poster = array('upload_data' => $this->upload->data());
			$dir = "../../assets/poster/".$data_poster['upload_data']['file_name'];
			return $dir;
		}

	}

	public function EditMovie($param)
	{
		//Type your code here ...
	}
}
?>