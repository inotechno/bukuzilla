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

		public function postTransaksi()
		{
			
			$options = array(
				'cluster' => 'ap1',
				'useTLS' => true
			);
			$pusher = new Pusher\Pusher(
				'77dcc346fc9dd134feb0', //ganti dengan App_key pusher Anda
				'84d3137eef6f9cca0bae', //ganti dengan App_secret pusher Anda
				'1166156', //ganti dengan App_key pusher Anda
				$options
			);

			$trx_id = $this->TransaksiModel->getAllDetailTransaksi()->result();
			// $set['posting_at'] = NULL;
			$set['posting_at'] = date('Y-m-d H:i:s');
			$i = 0;
			foreach ($trx_id as $trx => $t) {
				$i++;
				$this->TransaksiModel->updateDetailTransaksi($t->trx_id, $set);
				
				$data['message'] = 'success';
				$data['dataKe'] = $i;
				$pusher->trigger('GeneralLedger', 'postTransaksi', $data);
			}

		}
	}
	
	/* End of file PostingTransaksi.php */
	
?>
