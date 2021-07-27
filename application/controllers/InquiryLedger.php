<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class InquiryLedger extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('InquiryModel');
		}
	
		public function index()
		{
			$def['title'] = 'Inquiry Ledger';
			$def['breadcrumb'] = 'Inquiry Ledger';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('inquiryLedger');
			$this->load->view('partials/footer');
			$this->load->view('plugins/inquiryLedger');
		}

		public function getTransaksi()
		{
			$list = $this->InquiryModel->getInquiry();
			// echo $this->db->last_query($list);
			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {
				$row = array();
				$row[] = $ls->tgl_voucher;
				$row[] = $ls->no_voucher;
				$row[] = $ls->trx_debit;
				$row[] = $ls->trx_kredit;

				// $row[] = $saldo;

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->InquiryModel->count_all(),
	            "recordsFiltered" => $this->InquiryModel->count_filtered(),
	            "data" => $data
			);

			echo json_encode($output);
		}
	
	}
	
	/* End of file InquiryLedger.php */
	/* Location: ./application/controllers/InquiryLedger.php */
?>