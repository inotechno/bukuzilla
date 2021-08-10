<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	use PhpOffice\PhpSpreadsheet\Spreadsheet;

	class Account extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('AccountModel');
		}
	
		public function index()
		{
			$def['title'] = 'Master Akun';
			$def['breadcrumb'] = 'Account Master';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('account');
			$this->load->view('partials/footer');
			$this->load->view('plugins/account');
		}

		public function getSelectAccount()
		{
			$get = $this->AccountModel->getSelectAccount();
			echo json_encode($get);
		}

		public function getAccount()
		{
			$list = $this->AccountModel->get_datatables();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {
				$row = array();
				$row[] = $ls->no_akun.'.'.$ls->sub_no_akun;
				$row[] = $ls->nama_akun;
				$row[] = $ls->level_akun;
				$row[] = $ls->status_akun;
				$row[] = number_format($ls->saldo_awal);
				$row[] = date('d-m-Y H:i:s', strtotime($ls->created_at));
				$row[] = $ls->nama_lengkap;
				$row[] = '<div class="dropdown">
	                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                          <i class="fas fa-ellipsis-v"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
	                          <a class="dropdown-item update-data" href="#" data-no-akun="'.$ls->no_akun.'" data-sub-no-akun="'.$ls->sub_no_akun.'" data-nama="'.$ls->nama_akun.'" data-level="'.$ls->level_akun.'" data-status="'.$ls->status_akun.'">Update</a>
	                          <a class="dropdown-item delete-data" href="#" data-no-akun="'.$ls->no_akun.'" data-sub-no-akun="'.$ls->sub_no_akun.'" data-nama="'.$ls->nama_akun.'">Delete</a>
	                        </div>
	                      </div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->AccountModel->count_all(),
	            "recordsFiltered" => $this->AccountModel->count_filtered(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function addAccount()
		{
			$data['no_akun'] = $this->input->post('no_akun');
			$data['sub_no_akun'] = $this->input->post('sub_no_akun');
			$data['nama_akun'] = $this->input->post('nama_akun');
			$data['level_akun'] = $this->input->post('level_akun');
			$data['status_akun'] = $this->input->post('status_akun');
			$data['created_by'] = $this->session->userdata('id');
			$data['created_at'] = date('Y-m-d H:i:s');

			$validasi = $this->db->get_where('account', array('no_akun' => $data['no_akun'], 'sub_no_akun' => $data['sub_no_akun']));

			if ($validasi->num_rows() > 0) {
				$response = array(
					'type' => 'danger',
					'message' => 'Akun Sudah Tersedia'
				);
			}else{
				$act = $this->AccountModel->addAccount($data);

				$response = array(
					'type' => 'success',
					'message' => 'Akun Berhasil Disimpan'
				);
			}

			echo json_encode($response);
			
		}

		public function updateAccount()
		{
			$no_akun = $this->input->post('no_akun');
			$sub_no_akun = $this->input->post('sub_no_akun');
			$data['nama_akun'] = $this->input->post('nama_akun');
			$data['level_akun'] = $this->input->post('level_akun');
			$data['status_akun'] = $this->input->post('status_akun');

			$act = $this->AccountModel->updateAccount($no_akun, $sub_no_akun, $data);
			
			if ($act) {
				$response = array(
					'message' => 'Akun Berhasil Diubah',
					'type' => 'success'
				);
			}else{
				$response = array(
					'message' => 'Akun Gagal Diubah',
					'type' => 'danger'
				);
			}

			echo json_encode($response);
		}

		public function deleteAccount()
		{
			$no_akun = $this->input->post('no_akun_delete');
			$sub_no_akun = $this->input->post('sub_no_akun_delete');

			$act = $this->AccountModel->deleteAccount($no_akun, $sub_no_akun);
			
			if ($act) {
				$response = array(
					'message' => 'Akun Berhasil Dihapus',
					'type' => 'success'
				);
			}else{
				$response = array(
					'message' => 'Akun Gagal Dihapus',
					'type' => 'danger'
				);
			}

			echo json_encode($response);
		}


	// Saldo Awal

		public function saldoAwal()
		{
			$def['title'] = 'Saldo Awal';
			$def['breadcrumb'] = 'Saldo Awal';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('saldoAwal');
			$this->load->view('partials/footer');
			$this->load->view('plugins/saldoAwal');
		}

		public function getSaldoAccount()
		{
			$list = $this->AccountModel->get_datatables();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {
				$row = array();
				$row[] = $ls->no_akun.'.'.$ls->sub_no_akun;
				$row[] = $ls->nama_akun;
				$row[] = $ls->level_akun;
				$row[] = $ls->status_akun;
				$row[] = number_format($ls->saldo_awal);

				if ($ls->status_akun == 'Y') {
					$row[] = '<a class="update-data btn btn-warning btn-rounded btn-sm" href="#" data-saldo-awal="'.$ls->saldo_awal.'" data-no-akun="'.$ls->no_akun.'" data-sub-no-akun="'.$ls->sub_no_akun.'">Update Saldo</a>';
				}else{
					$row[] = '';
				}

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->AccountModel->count_all(),
	            "recordsFiltered" => $this->AccountModel->count_filtered(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function updateSaldoAwal()
		{
			$no_akun = $this->input->post('no_akun');
			$sub_no_akun = $this->input->post('sub_no_akun');
			$data['saldo_awal'] = $this->input->post('saldo_awal');

			$act = $this->AccountModel->updateAccount($no_akun, $sub_no_akun, $data);
			
			if ($act) {
				$response = array(
					'message' => 'Saldo Awal Berhasil Diubah',
					'type' => 'success'
				);
			}else{
				$response = array(
					'message' => 'Saldo Awal Gagal Diubah',
					'type' => 'danger'
				);
			}

			echo json_encode($response);
		}
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/admin/Dashboard.php */
?>