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
			$html = '';
			$list = $this->InquiryModel->getInquiry();
			
			if ($list->num_rows() > 0) {
				$saldoAwal = $this->InquiryModel->getSaldoAkhir();

					$html .= '<tr>
								<td colspan="4"></td>
								<td>'.number_format($saldoAwal).'</td>
							  </tr>';
				$count = 1;
				
				foreach ($list->result() as $l => $ls) {
					if ($count==1) {
						$saldo = $saldoAwal + $ls->trx_debit - $ls->trx_kredit;
						$debit = $ls->trx_debit;
						$kredit = $ls->trx_kredit;
					}else{
						if ($ls->trx_debit != 0) {
							$debit = $debit + $ls->trx_debit;
							$saldo = $saldo + $ls->trx_debit;
						}else{
							$kredit = $kredit + $ls->trx_kredit;
							$saldo = $saldo - $ls->trx_kredit;
						}
					}
					$html .= '<tr>
								<td>'.$ls->tgl_voucher.'</td>
								<td>'.$ls->trx_description.'</td>
								<td>'.number_format($ls->trx_debit).'</td>
								<td>'.number_format($ls->trx_kredit).'</td>
								<td>'.number_format($saldo).'</td>
							  </tr>
								';
					$count++;
				}
					$html .= '<tr">
							<td colspan="2"></td>
							<td class="font-weight-bold">'.number_format($debit).'</td>
							<td class="font-weight-bold">'.number_format($kredit).'</td>
							<td class="font-weight-bold">'.number_format($saldo).'</td>
						  </tr>';
			}else{
				$html .= '<tr">
							<td colspan="5" class="text-center">Tidak Ada Data</td>
						  </tr>';
			}
			
			echo $html;
		}
	
	}
	
	/* End of file InquiryLedger.php */
	/* Location: ./application/controllers/InquiryLedger.php */
?>