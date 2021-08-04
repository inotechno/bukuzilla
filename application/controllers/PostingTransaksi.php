<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	

	class PostingTransaksi extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('TransaksiModel');
			
		}

		public function index()
		{
			$def['title'] = 'Posting Transaksi';
			$def['breadcrumb'] = 'Posting Transaksi';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('postingtransaksi');
			$this->load->view('partials/footer');
			$this->load->view('plugins/postingtransaksi');
		}
		
		public function getTransaksi()
		{
			$get = $this->TransaksiModel->getAllDetailTransaksi();
			echo json_encode($get->result());
		}
	}
	
	/* End of file PostingTransaksi.php */
	
?>
