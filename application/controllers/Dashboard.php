<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('TransaksiModel');
			$this->load->model('AccountModel');
			$this->load->model('UsersModel');
		}
	
		public function index()
		{
			$def['title'] = 'Dashboard';
			$def['breadcrumb'] = 'Dashboard';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('dashboard');
			$this->load->view('partials/footer');
			$this->load->view('plugins/dashboard');
		}

		public function getTotal()
		{
			$data['totalJurnal'] = $this->TransaksiModel->count_all();
			$data['totalTransaksi'] = $this->TransaksiModel->count_all_transaksi();
			$data['totalAccount'] = $this->AccountModel->count_all();
			$data['totalUsers'] = $this->UsersModel->count_all();

			echo json_encode($data);
		}
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/admin/Dashboard.php */
?>