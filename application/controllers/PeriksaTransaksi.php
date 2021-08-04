<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class PeriksaTransaksi extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('TransaksiModel');
		}
	
		public function index()
		{
			$def['title'] = 'Periksa Transaksi';
			$def['breadcrumb'] = 'Periksa Transaksi';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('periksatransaksi');
			$this->load->view('partials/footer');
			$this->load->view('plugins/periksatransaksi');
		}

		public function statusBalance()
		{
			$html = '';
			$list = $this->TransaksiModel->statusBalance()->result();

			foreach ($list as $ls) {
				if ($ls->totalDebit != $ls->totalKredit) {
					$html .= '<tr>
								<td>'.$ls->no_voucher.'</td>
			 					<td>'.$ls->description.'</td>
			 					<td>'.$ls->tgl_voucher.'</td>
			 					<td>
	                          		<a class="btn btn-sm btn-info update-data" href="'.site_url('TransaksiJurnal/pageUpdateJurnal?id='.$ls->id_jurnal).'"><i class="ni ni-settings"></i></a>
	                      		</td>
			 				  </tr>';
				}
			}
			
			echo $html;
		}

	}
	
	/* End of file TransaksiJurnal.php */
	/* Location: ./application/controllers/TransaksiJurnal.php */
?>