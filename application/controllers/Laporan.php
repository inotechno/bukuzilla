<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	// require('vendor/autoload.php');
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	class Laporan extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('LaporanModel');
		}
	
		public function RugiLaba()
		{
			$def['title'] = 'Rugi Laba';
			$def['breadcrumb'] = 'Laporan Rugi Laba';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('rugilaba');
			$this->load->view('partials/footer');
			$this->load->view('plugins/laporan');
		}

		public function Neraca()
		{
			$def['title'] = 'Neraca';
			$def['breadcrumb'] = 'Laporan Neraca';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('neraca');
			$this->load->view('partials/footer');
			$this->load->view('plugins/laporan');
		}

		public function BukuBesar()
		{
			$def['title'] = 'Buku Besar';
			$def['breadcrumb'] = 'Laporan Buku Besar';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('bukubesar');
			$this->load->view('partials/footer');
			$this->load->view('plugins/laporan');
		}

		// public function getRugiLaba()
		// {
		// 	$html = '';
		// 	$get = $this->LaporanModel->getSaldo();
		// 	// echo $this->db->last_query($get);
		// 	foreach ($get as $l => $ls) {
		// 		$saldoAkhir = $this->LaporanModel->getSaldoAkhir($ls->id);
		// 		// echo $this->db->last_query($saldoAkhir);
		// 			$html .= '<tr>';
		// 		if ($ls->level_akun == 1) {
		// 			$html .= '
		// 					<td class="font-weight-bold">'.$ls->no_akun.'.'.$ls->sub_no_akun.'</td>
		// 					<td class="font-weight-bold">'.$ls->level_akun.'</td>
		// 					<td class="font-weight-bold">'.$ls->nama_akun.'</td>
		// 					<td class="font-weight-bold">'.number_format($saldoAkhir).'</td>
		// 					<td class="font-weight-bold">'.number_format($saldoAkhir - $ls->total).'</td>';	
		// 		}elseif ($ls->level_akun == 2) {
		// 			$html .= '
		// 					<td>'.$ls->no_akun.'.'.$ls->sub_no_akun.'</td>
		// 					<td>'.$ls->level_akun.'</td>
		// 					<td>'.$ls->nama_akun.'</td>
		// 					<td>'.number_format($saldoAkhir).'</td>
		// 					<td>'.number_format($saldoAkhir - $ls->total).'</td>';
		// 		}else{
		// 			$html .= '
		// 					<td>'.$ls->no_akun.'.'.$ls->sub_no_akun.'</td>
		// 					<td>'.$ls->level_akun.'</td>
		// 					<td>'.$ls->nama_akun.'</td>
		// 					<td>'.number_format($saldoAkhir).'</td>
		// 					<td>'.number_format($saldoAkhir - $ls->total).'</td>';
		// 		}
					
		// 			$html .= '</tr>
		// 					';
		// 	}

		// 	echo $html;
		// }

		public function getRugiLaba()
		{
			$get = $this->LaporanModel->getRugiLaba();
			// echo json_encode($get);
			// echo $this->db->last_query($get);
			$spr = new Spreadsheet;
				$spr->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spr->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
				$spr->setActiveSheetIndex(0)
					->setCellValue('A1', DATE('Y-m-d H:i:s'))
					->setCellValue('A2', $this->session->userdata('nama_lengkap'))
					->mergeCells('B1:D1')
					->mergeCells('B2:D2')
					->setCellValue('B1', SITE_URL)
					->setCellValue('B2', 'LAPORAN RUGI LABA')
					->setCellValue('E1', $this->session->userdata('nama_akses'))

					->setCellValue('A4', 'Nomor Perkiraan')
					->setCellValue('B4', 'Level')
					->setCellValue('C4', 'Nama Perkiraan')
					->setCellValue('D4', 'Periode Saat ini')
					->setCellValue('E4', 'Periode Lalu');

					$column = 5;
					foreach ($get as $gt) {
						
						$saldoAkhir = $this->LaporanModel->getSaldoAkhir($gt->id);
						if ($gt->level_akun == 1) {
							$column = $column+1;
							$styleArray = [
							    'font' => [
							        'bold' => true,
							    ],
							];
							$spr->getActiveSheet()->getStyle('D5:E700')->getNumberFormat()->setFormatCode('#,##0.00');
							$spr->getActiveSheet()->getStyle('C'.$column)->applyFromArray($styleArray);
							
						}elseif ($gt->level_akun == 2) {
							$column = $column+1;
							$styleArray = [
							    'alignment' => [
							        'indent' => 2,
							    ],
							];

							$spr->getActiveSheet()->getStyle('D5:E700')->getNumberFormat()->setFormatCode('#,##0.00');
							$spr->getActiveSheet()->getStyle('C'.$column)->applyFromArray($styleArray);

						}elseif ($gt->level_akun == 3) {
							$column = $column+1;
							$styleArray = [
							    'alignment' => [
							        'indent' => 3,
							    ],
							];

							$spr->getActiveSheet()->getStyle('D5:E700')->getNumberFormat()->setFormatCode('#,##0.00');
							$spr->getActiveSheet()->getStyle('C'.$column)->applyFromArray($styleArray);

						}elseif ($gt->level_akun == 4) {
							$styleArray = [
							    'alignment' => [
							        'indent' => 4,
							    ],
							];
							
							$spr->getActiveSheet()->getStyle('D5:E700')->getNumberFormat()->setFormatCode('#,##0.00');
							$spr->getActiveSheet()->getStyle('C'.$column)->applyFromArray($styleArray);

						}elseif ($gt->level_akun == 5) {
							$styleArray = [
							    'alignment' => [
							        'indent' => 5,
							    ],
							];
							
							$spr->getActiveSheet()->getStyle('D5:E700')->getNumberFormat()->setFormatCode('#,##0.00');
							$spr->getActiveSheet()->getStyle('C'.$column)->applyFromArray($styleArray);

						}

						$spr->setActiveSheetIndex(0)
							->setCellValue('A'.$column, $gt->no_akun.' . '.$gt->sub_no_akun)
							->setCellValue('B'.$column, $gt->level_akun)
							->setCellValue('C'.$column, $gt->nama_akun)
							->setCellValue('D'.$column, $saldoAkhir - $gt->total)
							->setCellValue('E'.$column, $saldoAkhir);


						$column++;
					}

				$writer = new Xlsx($spr);

	          header('Content-Type: application/vnd.ms-excel');
			  header('Content-Disposition: attachment;filename="Laporan Rugi Laba '.$this->input->post('startDate').' - '.$this->input->post('endDate').'.xlsx"');
			  header('Cache-Control: max-age=0');

			  $writer->save('php://output');
		}

		public function getNeraca()
		{
			$get = $this->LaporanModel->getNeraca();
			// echo json_encode($get);
			// echo $this->db->last_query($get);
			$spr = new Spreadsheet;
				$spr->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spr->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
				$spr->setActiveSheetIndex(0)
					->setCellValue('A1', DATE('Y-m-d H:i:s'))
					->setCellValue('A2', $this->session->userdata('nama_lengkap'))
					->mergeCells('B1:D1')
					->mergeCells('B2:D2')
					->setCellValue('B1', SITE_URL)
					->setCellValue('B2', 'LAPORAN NERACA')
					->setCellValue('E1', $this->session->userdata('nama_akses'))

					->setCellValue('A4', 'Nomor Perkiraan')
					->setCellValue('B4', 'Level')
					->setCellValue('C4', 'Nama Perkiraan')
					->setCellValue('D4', 'Periode Saat ini')
					->setCellValue('E4', 'Periode Lalu');

					$column = 5;
					foreach ($get as $gt) {
						
						$saldoAkhir = $this->LaporanModel->getSaldoAkhir($gt->id);
						if ($gt->level_akun == 1) {
							$column = $column+1;
							$styleArray = [
							    'font' => [
							        'bold' => true,
							    ],
							];
							$spr->getActiveSheet()->getStyle('D5:E700')->getNumberFormat()->setFormatCode('#,##0.00');
							$spr->getActiveSheet()->getStyle('C'.$column)->applyFromArray($styleArray);
							
						}elseif ($gt->level_akun == 2) {
							$column = $column+1;
							$styleArray = [
							    'alignment' => [
							        'indent' => 2,
							    ],
							];

							$spr->getActiveSheet()->getStyle('D5:E700')->getNumberFormat()->setFormatCode('#,##0.00');
							$spr->getActiveSheet()->getStyle('C'.$column)->applyFromArray($styleArray);

						}elseif ($gt->level_akun == 3) {
							$column = $column+1;
							$styleArray = [
							    'alignment' => [
							        'indent' => 3,
							    ],
							];

							$spr->getActiveSheet()->getStyle('D5:E700')->getNumberFormat()->setFormatCode('#,##0.00');
							$spr->getActiveSheet()->getStyle('C'.$column)->applyFromArray($styleArray);

						}elseif ($gt->level_akun == 4) {
							$styleArray = [
							    'alignment' => [
							        'indent' => 4,
							    ],
							];
							
							$spr->getActiveSheet()->getStyle('D5:E700')->getNumberFormat()->setFormatCode('#,##0.00');
							$spr->getActiveSheet()->getStyle('C'.$column)->applyFromArray($styleArray);

						}elseif ($gt->level_akun == 5) {
							$styleArray = [
							    'alignment' => [
							        'indent' => 5,
							    ],
							];
							
							$spr->getActiveSheet()->getStyle('D5:E700')->getNumberFormat()->setFormatCode('#,##0.00');
							$spr->getActiveSheet()->getStyle('C'.$column)->applyFromArray($styleArray);

						}

						$spr->setActiveSheetIndex(0)
							->setCellValue('A'.$column, $gt->no_akun.' . '.$gt->sub_no_akun)
							->setCellValue('B'.$column, $gt->level_akun)
							->setCellValue('C'.$column, $gt->nama_akun)
							->setCellValue('D'.$column, $saldoAkhir - $gt->total)
							->setCellValue('E'.$column, $saldoAkhir);


						$column++;
					}

				$writer = new Xlsx($spr);

	          header('Content-Type: application/vnd.ms-excel');
			  header('Content-Disposition: attachment;filename="Laporan Neraca '.$this->input->post('startDate').' - '.$this->input->post('endDate').'.xlsx"');
			  header('Cache-Control: max-age=0');

			  $writer->save('php://output');
		}

		public function getBukuBesar()
		{
			$get = $this->LaporanModel->getAccount();
			$spr = new Spreadsheet;
			$spr->getActiveSheet()->getStyle('B1:E2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$spr->getActiveSheet()->getStyle('B1:E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

			$spr->getActiveSheet()->getStyle('C4:F5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

			$spr->setActiveSheetIndex(0)
				->setCellValue('A1', DATE('Y-m-d H:i:s'))
				->setCellValue('A2', $this->session->userdata('nama_lengkap'))
				->mergeCells('B1:E1')
				->mergeCells('B2:E2')
				->mergeCells('C4:C5')
				->mergeCells('D4:D5')
				->mergeCells('E4:E5')
				->mergeCells('F4:F5')
				->setCellValue('B1', SITE_URL)
				->setCellValue('B2', 'LAPORAN BUKU BESAR')
				->setCellValue('F1', $this->session->userdata('nama_akses'))

				->setCellValue('A4', 'Nomor Perkiraan')
				->setCellValue('A5', 'Tanggal Transaksi')
				->setCellValue('B4', 'Nama Perkiraan')
				->setCellValue('B5', 'Keterangan Transaksi Jurnal')
				->setCellValue('C4', 'No Voucher')
				->setCellValue('D4', 'Debit')
				->setCellValue('E4', 'Kredit')
				->setCellValue('F4', 'Saldo');

			$column = 6;
			foreach ($get as $gt) {
				$saldoAkhir = $this->LaporanModel->getSaldoAkhirPeriode($gt->id);
				$column = $column+1;
				$spr->setActiveSheetIndex(0)
					->setCellValue('A'.$column, $gt->no_akun.' . '.$gt->sub_no_akun)
					->setCellValue('B'.$column, $gt->nama_akun)
					->setCellValue('F'.$column, $saldoAkhir);
				
				$trx = $this->LaporanModel->getBukuBesar($gt->id);
				foreach ($trx as $tr) {
					$column = $column+1;
					
					$saldo = $saldoAkhir + $tr->trx_debit - $tr->trx_kredit;
					$debit = $tr->trx_debit;
					$kredit = $tr->trx_kredit;
					
					if ($tr->trx_debit != 0) {
						$debit = $debit + $tr->trx_debit;
						$saldo = $saldo + $tr->trx_debit;
					}else{
						$kredit = $kredit + $tr->trx_kredit;
						$saldo = $saldo - $tr->trx_kredit;
					}


					$styleArray = [
					    'alignment' => [
					        'indent' => 5,
					    ],
					];
					
					$spr->getActiveSheet()->getStyle('D5:F3000')->getNumberFormat()->setFormatCode('#,##0.00');
					$spr->getActiveSheet()->getStyle('A'.$column)->applyFromArray($styleArray);
					$spr->getActiveSheet()->getStyle('B'.$column)->applyFromArray($styleArray);

					$spr->setActiveSheetIndex(0)
						->setCellValue('A'.$column, $tr->tgl_voucher)
						->setCellValue('B'.$column, $tr->trx_description)
						->setCellValue('C'.$column, $tr->no_voucher)
						->setCellValue('D'.$column, $tr->trx_debit)
						->setCellValue('E'.$column, $tr->trx_kredit)
						->setCellValue('F'.$column, $saldo);
				}
			}

			$writer = new Xlsx($spr);

          	header('Content-Type: application/vnd.ms-excel');
		  	header('Content-Disposition: attachment;filename="Laporan Buku Besar Periode '.$this->input->post('periode').'.xlsx"');
		  	header('Cache-Control: max-age=0');

		  	$writer->save('php://output');
		}
	
	}
	
	/* End of file Laporan.php */
	/* Location: ./application/controllers/Laporan.php */
?>