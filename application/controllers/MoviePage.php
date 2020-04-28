<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoviePage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('movies');
		$this->load->helper(array('form', 'url', 'file'));
		$this->load->library('form_validation');
	}

	public function index()
	{
	
		$movies['data'] = $this->movies->ShowData();

		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);

		$data['table'] = $this->load->view('template/table_movie', $movies, TRUE);

		$this->load->view('page/movie',$data, array('error' => '' ));
		
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

		$this->load->view('page/movie_add', $data);
	}

	public function InsertMovie(){
		$post = $this->input->post();
		$this->Title = $post['title'];
		$this->Year = $post['year'];
		$this->Director = $post['dir'];
		$this->PosterLink = $this->UploadImage();

		$config = array(
			array(
					'field' => 'title',
					'label' => 'Title',
					'rules' => 'required',
					'errors' => array(
						'required' => 'You must provide a string',
					),
			),
			array(
					'field' => 'year',
					'label' => 'Year',
					'rules' => array(
						'required',
						'numeric',
						'min_length[4]',
						'max_length[5]',
					),
					'errors' => array(
							'required' => 'You must provide a string',
							'numeric' => 'You should input a number not string',
					),
			),
			array(
					'field' => 'dir',
					'label' => 'Director',
					'rules' => array(
						'required',
						'max_length[30]',
					),
					'errors' => array(
						'required' => 'You must provide a string',
					),
				),
			array(
					'field' => 'poster',
					'label' => 'PosterLink',
					'rules' => 'callback_poster_check',
			)
	);

	// $this->form_validation->set_rules('title', 'Title', 'required');
	// $this->form_validation->set_rules('year', 'Year', 'required|numeric|min_length[4]|max_length[5]');
	// $this->form_validation->set_rules('dir', 'Director', 'required|max_length[30]');

	$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE){
            $this->AddMovie();
        } else {               
            $this->movies->AddData($this->Title, $this->Year, $this->Director, $this->PosterLink);
        	redirect('MoviePage/index');
        }
		
	}

	public function poster_check($str){
		$allowedType = array('image/jpeg', 'image/png', 'image/pjpeg', 'image/x-png');
		$mime = get_mime_by_extension($_FILES['poster']['name']);
		if(isset($_FILES['poster']['name']) && $_FILES['poster']['name']!=""){
			if(in_array($mime, $allowedType)){
				if($_FILES['poster']['size'] < 1048576){
		  	 		return true;
		  		}
		  		else{
		   			$this->form_validation->set_message('poster_check', 'The uploaded file exceeds the maximum allowed size in your PHP configuration file !');
					return false;
		  		}
		 	}
			 else{
				$this->form_validation->set_message('poster_check', 'The filetype you are attempting to upload is not allowed !');
				return false;
			}
		}
		else{
			$this->form_validation->set_message('poster_check', 'Please choose a file to upload !');
			return false;
		}
	}

	public function UploadImage(){
		$config['upload_path']          = './assets/poster/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']				= 1024;
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('poster')){
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view
		}else{
			$data_poster = array('upload_data' => $this->upload->data());
			$dir = "../../assets/poster/".$data_poster['upload_data']['file_name'];
			return $dir;
		}

	}

	public function EditMovie()
	{
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);
		$data['id'] = $this->input->get('id');

		$data['data'] = $this->movies->ShowDetail($data['id']);

		$this->load->view('page/movie_edit', $data);
	}

	public function MovieEdit(){

		$post = $this->input->post();
		$this->MovieID = $post['id'];
		$this->Title = $post['title'];
		$this->Year = $post['year'];
		$this->Director = $post['dir'];
		$this->PosterLink = $this->UploadImage();

		$config = array(
			array(
					'field' => 'title',
					'label' => 'Title',
					'rules' => 'required',
					'errors' => array(
						'required' => 'You must provide a string',
					),
			),
			array(
					'field' => 'year',
					'label' => 'Year',
					'rules' => array(
						'required',
						'numeric',
						'min_length[4]',
						'max_length[5]',
					),
					'errors' => array(
							'required' => 'You must provide a string',
							'numeric' => 'You should input a number not string',
					),
			),
			array(
					'field' => 'dir',
					'label' => 'Director',
					'rules' => array(
						'required',
						'max_length[30]',
					),
					'errors' => array(
						'required' => 'You must provide a string',
					),
				),
			array(
					'field' => 'poster',
					'label' => 'PosterLink',
					'rules' => 'callback_poster_check',
			)
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE){
			$this->EditMovie();
		} else {               
			$this->movies->UpdateData($this->MovieID, $this->Title, $this->Year, $this->Director, $this->PosterLink);
			redirect('MoviePage/index');
		}
	}
}
?>