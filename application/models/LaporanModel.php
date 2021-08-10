<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class LaporanModel extends CI_Model {

		function getSaldoAwal($id)
		{
			return $this->db->get_where('account', array('id' => $id))->row()->saldo_awal;
		}

		function getSaldoAkhir($id)
		{
			$this->db->select('SUM(t.trx_debit) - SUM(t.trx_kredit) as saldoAkhir');
			$this->db->from('transaksi_jurnal as t');
 			$this->db->join('jurnal as j', 'j.id_jurnal = t.trx_id_jurnal', 'left');
 			$this->db->where('t.trx_id_account', $id);
 			$this->db->where('j.tgl_voucher < ', $this->input->post('startDate'));

			$query = $this->db->get()->row();
			// echo $this->db->last_query($query);
			$saldo_akhir = $query->saldoAkhir;

			if ($saldo_akhir == NULL) {
				return $this->getSaldoAwal($id);
			}else{
				return $this->getSaldoAwal($id) + $saldo_akhir;
			}
		}

		function getSaldoAkhirPeriode($id)
		{
			$periode = explode('/', $this->input->post('periode'));
			$bulan = $periode[0];
			$tahun = $periode[1];

			$this->db->select('SUM(t.trx_debit) - SUM(t.trx_kredit) as saldoAkhir');
			$this->db->from('transaksi_jurnal as t');
 			$this->db->where('t.trx_id_account', $id);
			$this->db->where('MONTH(t.posting_at) < ', $bulan);
			// $this->db->where('YEAR(t.posting_at) == ', $tahun);

			$query = $this->db->get()->row();
			// echo $this->db->last_query($query);
			$saldo_akhir = $query->saldoAkhir;

			if ($saldo_akhir == NULL) {
				return $this->getSaldoAwal($id);
			}else{
				return $this->getSaldoAwal($id) + $saldo_akhir;
			}
		}
	
		// function getSaldo()
		// {
		// 	$this->db->select('a.id, a.no_akun, a.sub_no_akun, a.level_akun, a.nama_akun,SUM(tj.trx_kredit) as kredit, SUM(tj.trx_debit) as debit, SUM(tj.trx_debit) - SUM(tj.trx_kredit) as total, j.tgl_voucher');
		// 	$this->db->from('account as a');
 	// 		$this->db->join('transaksi_jurnal as tj', 'tj.trx_id_account = a.id', 'left');
 	// 		$this->db->join('jurnal as j', 'tj.trx_id_jurnal = j.id_jurnal', 'left');
 	// 		$this->db->where('a.no_akun >= ', 4000);
 	// 		$this->db->where('j.tgl_voucher >= ', $this->input->post('startDate'));
 	// 		$this->db->where('j.tgl_voucher <= ', $this->input->post('endDate'));
 	// 		$this->db->group_by('a.id');
		// 	$this->db->order_by('a.no_akun', 'asc');
		// 	$this->db->order_by('a.sub_no_akun', 'asc');
		// 	return $this->db->get()->result();
		// }
		
		function getRugiLaba()
		{
			$this->db->select('a.id, a.no_akun, a.sub_no_akun, a.level_akun, a.nama_akun, DATE(tj.posting_at) as tanggal, SUM(tj.trx_kredit) as kredit, SUM(tj.trx_debit) as debit, SUM(tj.trx_debit) - SUM(tj.trx_kredit) as total');
			$this->db->from('account as a');
 			$this->db->join('transaksi_jurnal as tj', 'a.id = tj.trx_id_account', 'LEFT');
 			$this->db->where('a.no_akun >=', 4000);
 			$this->db->or_where('a.no_akun >=', 4000);
 			$this->db->group_start();
 				$this->db->where('DATE(tj.posting_at) >= ', $this->input->post('startDate'));
 				$this->db->where('DATE(tj.posting_at) <= ', $this->input->post('endDate'));
 			$this->db->group_end();
 			$this->db->group_by('a.id');
			$this->db->order_by('a.no_akun', 'asc');
			$this->db->order_by('a.sub_no_akun', 'asc');
			return $this->db->get()->result();
		}

		function getNeraca()
		{
			$this->db->select('a.id, a.no_akun, a.sub_no_akun, a.level_akun, a.nama_akun, DATE(tj.posting_at) as tanggal, SUM(tj.trx_kredit) as kredit, SUM(tj.trx_debit) as debit, SUM(tj.trx_debit) - SUM(tj.trx_kredit) as total');
			$this->db->from('account as a');
 			$this->db->join('transaksi_jurnal as tj', 'a.id = tj.trx_id_account', 'LEFT');
 			$this->db->where('a.no_akun <', 4000);
 			$this->db->or_where('a.no_akun <', 4000);
 			$this->db->group_start();
 				$this->db->where('DATE(tj.posting_at) >= ', $this->input->post('startDate'));
 				$this->db->where('DATE(tj.posting_at) <= ', $this->input->post('endDate'));
 			$this->db->group_end();
 			$this->db->group_by('a.id');
			$this->db->order_by('a.no_akun', 'asc');
			$this->db->order_by('a.sub_no_akun', 'asc');
			return $this->db->get()->result();
		}

		function getAccount()
		{
			$this->db->where('no_akun >= ', $this->input->post('dari'));
			$this->db->where('no_akun <= ', $this->input->post('sampai'));
			return $this->db->get('account')->result();
		}

		function getBukuBesar($id)
		{
			$periode = explode('/', $this->input->post('periode'));
			$bulan = $periode[0];
			$tahun = $periode[1];

			$this->db->select('j.no_voucher, j.tgl_voucher, tj.trx_debit, tj.trx_kredit, trx_description');
			$this->db->from('transaksi_jurnal as tj');
			$this->db->join('jurnal as j', 'j.id_jurnal = tj.trx_id_jurnal', 'left');
			$this->db->where('tj.trx_id_account', $id);
			$this->db->group_start();
 				$this->db->where('MONTH(tj.posting_at) >= ', $bulan);
 				$this->db->where('YEAR(tj.posting_at) >= ', $tahun);
 			$this->db->group_end();
			return $this->db->get()->result();
		}
	}
	
	/* End of file LaporanModel.php */
	/* Location: ./application/models/LaporanModel.php */
?>