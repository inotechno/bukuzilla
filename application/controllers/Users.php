<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Users extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('UsersModel');
		}	

		public function index()
		{
			$def['title'] = 'Daftar Users';
			$def['breadcrumb'] = 'Daftar Users';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('users');
			$this->load->view('partials/footer');
			$this->load->view('plugins/users');
		}

		public function getUsers()
		{
			$list = $this->UsersModel->get_datatables();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {
				if ($ls->status == 1) {
					$status = 'checked=""';
				}else{
					$status = '';
				}

				$row = array();
				$row[] = '<img width="50" height="50" src="'.base_url('assets/assets/img/users/'.$ls->foto).'">';
				$row[] = $ls->username;
				$row[] = $ls->nama_lengkap;
				$row[] = $ls->nama_group;
				$row[] = '<label class="custom-toggle">
			                  <input type="checkbox" '.$status.'>
			                  <span class="custom-toggle-slider rounded-circle" data-label-off="Tidak Aktif" data-label-on="Aktif"></span>
			                </label>';
				
				$row[] = '<div class="dropdown">
	                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                          <i class="fas fa-ellipsis-v"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
	                          <a class="dropdown-item update-data" href="#" data-username="'.$ls->username.'" data-nama="'.$ls->nama_lengkap.'" data-foto="'.$ls->foto.'" data-id="'.$ls->id.'" data-level="'.$ls->level.'" data-status="'.$ls->status.'">Update</a>
	                          <a class="dropdown-item delete-data" href="#" data-username="'.$ls->username.'" data-nama="'.$ls->nama_lengkap.'" data-level="'.$ls->level.'" data-status="'.$ls->status.'">Delete</a>
	                        </div>
	                      </div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->UsersModel->count_all(),
	            "recordsFiltered" => $this->UsersModel->count_filtered(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function addUsers()
		{
			$validasi = $this->UsersModel->validasi_username($this->input->post('username'));
			if ($validasi->num_rows() > 0) {
				$response = array(
					'type' => 'danger',
					'message' => 'Username Sudah Tersedia'
				);
			}else{
				$config['upload_path'] = './assets/assets/img/users/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg';
		        $config['max_size'] = '1024';
		        $config['overwrite'] = true;
		        $config['file_name'] = $this->input->post('username');
		        $this->load->library('upload', $config);

		        if($this->upload->do_upload("foto")){
					$foto = $this->upload->file_name;
				} else {
					$foto = NULL;
				}

				$data = array(
		 			'username' 			=> $this->input->post('username'),
		 			'nama_lengkap' 		=> $this->input->post('nama_lengkap'),
		 			'password'			=> hash('sha512', $this->input->post('password').config_item('encryption_key')),
		 			'level' 			=> $this->input->post('level'),
		 			'status' 			=> 1,
		 			'created_at'		=> date('Y-m-d H:i:s'),
		 			'foto' 				=> $foto
				);

				$act = $this->UsersModel->addUsers($data);
				
				if ($act) {
					$response = array(
						'type' => 'success',
						'message' => 'Data Berhasil Disimpan'
					);
				}else{
					$response = array(
						'type' => 'danger',
						'message' => 'Data Gagal Disimpan'
					);
				}
			}


			echo json_encode($response);
		}

		public function updateUsers()
		{
			$config['upload_path'] = './assets/assets/img/users/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['overwrite'] = true;
	        $config['file_name'] = $this->input->post('username_update');
	        $this->load->library('upload', $config);

	        if($this->upload->do_upload("foto_update")){
				$data['foto'] = $this->upload->file_name;
	        	// @unlink('./assets/assets/img/users/petugas/'.$foto_lama);
			}

			$id = $this->input->post('id_update');
			$data['nama_lengkap'] = $this->input->post('nama_lengkap_update');
			$data['level'] = $this->input->post('level_update');
			$data['status'] = 1;
			
			if ($this->session->userdata('level') != 1) {
				$data['password'] = hash('sha512', $this->input->post('password').config_item('encryption_key'));
			}

			$act = $this->UsersModel->updateUsers($id, $data);
			
			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Berhasil Diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Gagal Diubah'
				);
			}

			echo json_encode($response);
		}
	
	}
	
	/* End of file Users.php */
	/* Location: ./application/controllers/Users.php */
?>