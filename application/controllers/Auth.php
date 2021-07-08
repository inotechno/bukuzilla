<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Auth extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('AuthModel');
			$this->load->helper('String');
		}
	
		public function index()
		{
			$data['page_title'] = 'Login';

			$cookie = get_cookie('dlh');
			if ($this->session->userdata('logged')) {
				redirect('Dashboard','refresh');
			}else if ($cookie <> '') {
				$row = $this->AuthModel->get_by_cookie($cookie)->row();
				if ($row) {
					$this->_reg_session($row);
				}else{
					$this->load->view('login', $data);
				}
			}else{
				$this->load->view('login', $data);
			}
		}

		public function login()
		{
			$username = $this->input->post('username');
			$password = hash('sha512', $this->input->post('password').config_item('encryption_key'));
			$remember = $this->input->post('remember');

			$row = $this->AuthModel->login($username, $password)->row();
			if ($row) {
				if ($remember) {
					$key = random_string('alnum', 64);
					setcookie('auth_bukuzilla', $key, 3600*24*30);
					$update = array('cookie' => $key);

					$this->AuthModel->update($update, $row->id);
				}

				$response = $this->_reg_session($row);
			}else{
				$response = array(
					'status' => 'danger',
					'message' => 'Username atau Password yang anda masukan salah !',
					'redirect' => base_url('Auth'),
				);
			}

			echo json_encode($response);
		}

		public function _reg_session($row)
		{
			$data_session = array(
				'id'			=> $row->id,
				'username'		=> $row->username,
				'nama_lengkap'	=> $row->nama_lengkap,
				'level'			=> $row->level,
				'foto'			=> $row->foto,
				'nama_akses'	=> $row->nama_group,
				'logged' 		=> TRUE
			);

			$this->session->set_userdata($data_session);

			$response = array(
				'status' => 'success',
				'message' => 'Anda Berhasil Login',
				'redirect' => base_url('Dashboard'),
			);

			return $response;
		}

		public function logout()
		{
			delete_cookie('dlh');
			$this->session->sess_destroy();
			redirect('Auth','refresh');
		}
	
	}
	
	/* End of file Login.php */
	/* Location: ./application/controllers/Login.php */
?>