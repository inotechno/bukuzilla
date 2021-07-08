<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class CompanyProfile extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('ProfileModel');
		}
	
		public function index()
		{
			$def['title'] = 'Company Profile';
			$def['breadcrumb'] = 'Company Profile';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('companyprofile');
			$this->load->view('partials/footer');
			$this->load->view('plugins/companyprofile');
		}

		public function get_data()
		{
			$get = $this->ProfileModel->get_data();
			echo json_encode($get);
		}

		public function updateProfile()
		{
			$config['upload_path'] = './assets/assets/img/brand/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['overwrite'] = true;
	        $config['file_name'] = 'logo-perusahaan.png';
	        $this->load->library('upload', $config);

	        if($this->upload->do_upload("logo")){
				$logo = $this->upload->file_name;
			} else {
				$logo = 'logo-perusahaan.png';
			}

			$data = array(
	 			'nama_perusahaan' 			=> $this->input->post('nama_perusahaan'),
	 			'jenis_perusahaan' 			=> $this->input->post('jenis_perusahaan'),
	 			'nama_direktur' 			=> $this->input->post('nama_direktur'),
	 			'email' 					=> $this->input->post('email'),
	 			'telepon' 					=> $this->input->post('telepon'),
	 			'alamat' 					=> $this->input->post('alamat'),
	 			'tgl_pendirian' 			=> $this->input->post('tgl_pendirian'),
	 			'jumlah_karyawan' 			=> $this->input->post('jumlah_karyawan'),
	 			'tgl_pendirian' 			=> $this->input->post('tgl_pendirian'),
	 			'status' 					=> $this->input->post('status'),
	 			
	 			'update_at' 				=> date('Y-m-d H:i:s'),
	 			'logo' 						=> $logo
			);

			$act = $this->ProfileModel->updateProfile($data);
			
			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Profil Berhasil Diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Profil Gagal Diubah'
				);
			}

			echo json_encode($response);
		}
	
	}
	
	/* End of file CompanyProfile.php */
	/* Location: ./application/controllers/CompanyProfile.php */
?>