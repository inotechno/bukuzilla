<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class TransaksiJurnal extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('TransaksiModel');
		}
	
		public function index()
		{
			$def['title'] = 'Transaksi Jurnal';
			$def['breadcrumb'] = 'Transaksi Jurnal';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('transaksijurnal');
			$this->load->view('partials/footer');
			$this->load->view('plugins/transaksijurnal');
		}

		public function pageAddJurnal()
		{
			$def['title'] = 'Tambah Transaksi Jurnal';
			$def['breadcrumb'] = 'Tambah Transaksi Jurnal';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('addJurnal');
			$this->load->view('partials/footer');
			$this->load->view('plugins/addJurnal');
		}

		public function pageUpdateJurnal()
		{
			$data['id'] = str_replace("'", "", htmlspecialchars($this->input->get('id'), ENT_QUOTES));
			$def['title'] = 'Update Transaksi Jurnal';
			$def['breadcrumb'] = 'Update Transaksi Jurnal';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('updateJurnal');
			$this->load->view('partials/footer');
			$this->load->view('plugins/updateJurnal', $data);
		}

		public function getJurnal()
		{
			$list = $this->TransaksiModel->getJurnal();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {
				$row = array();
				$row[] = $ls->no_voucher;
				$row[] = $ls->description;
				$row[] = $ls->tgl_voucher;
				$row[] = 'T';
				$row[] = $ls->status_post;
				$row[] = date('d-m-Y H:i:s', strtotime($ls->created_at));
				$row[] = $ls->nama_lengkap;
				$row[] = '<div class="btn-group btn-group">
	                          <a class="btn btn-sm btn-info update-data" href="'.site_url('TransaksiJurnal/pageUpdateJurnal?id='.$ls->id_jurnal).'"><i class="ni ni-settings"></i></a>
	                          <a class="btn btn-sm btn-danger delete-data" href="#" data-no-voucher="'.$ls->no_voucher.'" data-id-jurnal="'.$ls->id_jurnal.'"><span class="fa fa-times"></span></a>
	                      </div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->TransaksiModel->count_all(),
	            "recordsFiltered" => $this->TransaksiModel->count_filtered(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function getDataJurnal()
		{
			$id = $this->input->get('id');
			$data = $this->TransaksiModel->getJurnalById($id);
			echo json_encode($data);
		}

		public function getDetailTransaksi()
		{
			$html = '';
			$id = $this->input->get('id');
			$data = $this->TransaksiModel->getDetailTransaksi($id);
			$no = 1;
			foreach ($data as $dt) {
				$html .= '<tr id="data'.$no.'">
                        	<td class="text-center">'.$dt->no_akun.'.'.$dt->sub_no_akun.'
                            <input type="hidden" name="trx_id_account[]" placeholder="Nomor Akun" value="'.$dt->trx_id_account.'">
	                        </td>
	                        <td class="text-center">
		                        '.$dt->nama_akun.'
		                        <input type="hidden" name="nama_akun[]" value="'.$dt->nama_akun.'">
	                        </td>
	                        <td class="text-center">
	                           '.$dt->trx_debit.'
	                            <input type="hidden" name="trx_debit[]" value="'.$dt->trx_debit.'" class="valueDebit">
	                        </td>
	                        <td class="text-center">
	                            '.$dt->trx_kredit.'
	                            <input type="hidden" name="trx_kredit[]" value="'.$dt->trx_kredit.'" class="valueKredit">
	                        </td>
	                        <td class="text-center">
	                            '.$dt->trx_description.'
	                            <input type="hidden" name="trx_description[]" value="'.$dt->trx_description.'">
	                        </td>
	                        <td class="text-center">
	                            <div class="btn-group btn-group">
	                                <a href="#" class="btn btn-sm btn-info btn-edit-trx" data-row="data'.$no.'" data-trx-id="'.$dt->trx_id.'" data-no-akun="'.$dt->no_akun.'.'.$dt->sub_no_akun.'" data-id-akun="'.$dt->id.'" data-nama="'.$dt->nama_akun.'" data-debit="'.$dt->trx_debit.'" data-kredit="'.$dt->trx_kredit.'" data-deskripsi="'.$dt->trx_description.'"><i class="ni ni-settings"></i></a>
	                                <a href="#" data-row="data'.$no.'"" class="btn btn-sm btn-danger btn-delete-trx"><span class="fa fa-times"></span></a>
	                            </div>
	                        </td>
	                    </tr>';	

	                    $no++;
			}

			echo $html;
		}

		public function validasiNoVoucher()
		{
			$no_voucher = $this->input->post('no_voucher');
			$act = $this->db->get_where('jurnal', array('no_voucher' => $no_voucher));
			if ($act->num_rows() > 0) {
				$response = array(
					'type' => 'danger',
					'message' => 'No Voucher Sudah Tersedia'
				);
			}else{
				$response = array(
					'type' => 'success',
					'message' => 'No Voucher Tersedia'
				);
			}

			echo json_encode($response);
		}

		public function addTransaksi()
		{
			$jurnal['no_voucher'] = $this->input->post('no_voucher');
			$jurnal['tgl_voucher'] = $this->input->post('tgl_voucher');
			$jurnal['description'] = $this->input->post('description');
			$jurnal['created_by'] = $this->session->userdata('id');

			$trx_id_account = $this->input->post('trx_id_account', TRUE);

			$act = $this->TransaksiModel->addTransaksi($jurnal, $trx_id_account);

			if (!$act) {
				$response = array(
					'type' => 'danger',
					'message' => 'Transaksi Gagal Ditambah'
				);
			}else{
				$response = array(
					'type' => 'success',
					'message' => 'Transaksi Berhasil Ditambah'
				);
			}

			echo json_encode($response);
		}

		public function updateJurnal()
		{
			$id_jurnal = $this->input->post('id_jurnal');
			$data['no_voucher'] = $this->input->post('no_voucher');
			$data['tgl_voucher'] = $this->input->post('tgl_voucher');
			$data['description'] = $this->input->post('description');

			$act = $this->TransaksiModel->updateJurnal($id_jurnal, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Jurnal Berhasil Diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Jurnal Gagal Diubah'
				);
			}

			echo json_encode($response);
		}

		public function deleteJurnal()
		{
			$id = $this->input->post('id_jurnal_delete');
			$act = $this->TransaksiModel->deleteJurnal($id);
			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Jurnal Berhasil Dihapus'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Jurnal Gagal Dihapus'
				);
			}

			echo json_encode($response);
		}

		public function addDetailTransaksi()
		{
			$data['trx_id_jurnal'] = $this->input->post('trx_id_jurnal');
			$data['trx_id_account'] = $this->input->post('trx_id_account');
			$data['trx_debit'] = $this->input->post('trx_debit');
			$data['trx_kredit'] = $this->input->post('trx_kredit');
			$data['trx_description'] = $this->input->post('trx_description');

			$act = $this->TransaksiModel->addDetailTransaksi($data);
			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Detail Transaksi Berhasil Ditambah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Detail Transaksi Gagal Ditambah'
				);
			}

			echo json_encode($response);
		}

		public function updateDetailTransaksi()
		{
			$trx_id = $this->input->post('trx_id');
			$data['trx_id_jurnal'] = $this->input->post('trx_id_jurnal');
			$data['trx_id_account'] = $this->input->post('trx_id_account');
			$data['trx_debit'] = $this->input->post('trx_debit');
			$data['trx_kredit'] = $this->input->post('trx_kredit');
			$data['trx_description'] = $this->input->post('trx_description');

			$act = $this->TransaksiModel->updateDetailTransaksi($trx_id, $data);
			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Detail Transaksi Berhasil Diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Detail Transaksi Gagal Diubah'
				);
			}

			echo json_encode($response);
		}

	
	}
	
	/* End of file TransaksiJurnal.php */
	/* Location: ./application/controllers/TransaksiJurnal.php */
?>