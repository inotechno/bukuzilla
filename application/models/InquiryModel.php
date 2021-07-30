<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class InquiryModel extends CI_Model {
	
	// 	var $column_order = array(null, 'j.id_jurnal','j.no_voucher','j.description', 'j.tgl_voucher', 'a.no_akun', 'a.sub_no_akun', 'a.nama_akun', 't.trx_debit', 't.trx_kredit', 't.trx_description'); 
	//     var $column_search = array('j.id_jurnal','j.no_voucher','j.description', 'j.tgl_voucher', 'a.no_akun', 'a.sub_no_akun', 'a.nama_akun', 't.trx_debit', 't.trx_kredit', 't.trx_description'); //field yang diizin untuk pencarian 
	//     var $order = array('j.tgl_voucher' => 'asc'); // default order 
	
	// // Datatable
	// 	private function _get_datatables_query()
	// 	{
	// 		$this->db->select('j.id_jurnal, j.no_voucher,j.description, j.tgl_voucher, a.no_akun, a.sub_no_akun, a.nama_akun, t.trx_debit, t.trx_kredit, t.trx_description');
	// 		$this->db->from('transaksi_jurnal as t');
 // 			$this->db->join('jurnal as j', 'j.id_jurnal = t.trx_id_jurnal', 'left');
 // 			$this->db->join('account as a', 'a.id = t.trx_id_account', 'left');
 // 			$this->db->where('t.trx_id_account', $this->input->post('id_account'));
 // 			$this->db->where('j.tgl_voucher >=', $this->input->post('startDate'));
	// 		$this->db->where('j.tgl_voucher <=', $this->input->post('endDate'));
	//         $i = 0;
	     	
	//         foreach ($this->column_search as $item) // looping awal
	//         {
	//             if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
	//             {
	                 
	//                 if($i===0) // looping awal
	//                 {
	//                     $this->db->group_start();
	//                     $this->db->like($item, $_POST['search']['value']); 
	//                 }
	//                 else
	//                 {
	//                     $this->db->or_like($item, $_POST['search']['value']);
	//                 }
	 
	//                 if(count($this->column_search) - 1 == $i) 
	//                     $this->db->group_end(); 
	//             }
	//             $i++;
	//         }
	         
	//         if(isset($_POST['order'])) { // here order processing
	//             $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	//         }  else if(isset($this->order)) {
	//             $order = $this->order;
	//             $this->db->order_by(key($order), $order[key($order)]);
	//         }
	// 	}

		function getSaldoAwal()
		{
			return $this->db->get_where('account', array('id' => $this->input->post('id_account')))->row()->saldo_awal;
		}

		function getSaldoAkhir()
		{
			$this->db->select('SUM(t.trx_debit) - SUM(t.trx_kredit) as saldoAkhir');
			$this->db->from('transaksi_jurnal as t');
 			$this->db->join('jurnal as j', 'j.id_jurnal = t.trx_id_jurnal', 'left');
 			$this->db->where('t.trx_id_account', $this->input->post('id_account'));
 			$this->db->where('j.tgl_voucher < ', $this->input->post('startDate'));
			$this->db->order_by('j.tgl_voucher', 'asc');

			$query = $this->db->get()->row();
			$saldo_akhir = $query->saldoAkhir;

			if ($saldo_akhir == NULL) {
				return $this->getSaldoAwal();
			}else{
				return $this->getSaldoAwal() + $saldo_akhir;
			}

		}

		function getInquiry()
		{
			$this->db->query('SET @saldo = '.$this->getSaldoAkhir().'');
			$this->db->select('j.id_jurnal, j.no_voucher,j.description, j.tgl_voucher, a.no_akun, a.sub_no_akun, a.nama_akun, t.trx_debit, t.trx_kredit, t.trx_description');
			$this->db->select('(@saldo := @saldo + (t.trx_debit-t.trx_kredit)) as saldo');
			$this->db->from('transaksi_jurnal as t');
 			$this->db->join('jurnal as j', 'j.id_jurnal = t.trx_id_jurnal', 'left');
 			$this->db->join('account as a', 'a.id = t.trx_id_account', 'left');
 			$this->db->where('t.trx_id_account', $this->input->post('id_account'));
 			$this->db->where('j.tgl_voucher >=', $this->input->post('startDate'));
			$this->db->where('j.tgl_voucher <=', $this->input->post('endDate'));
			$this->db->order_by('j.tgl_voucher', 'asc');
			$query = $this->db->get();
	        return $query->result();
		}

		function count_filtered()
	    {
	        $this->_get_datatables_query();
	        $query = $this->db->get();
	        return $query->num_rows();
	    }
	 
	    function count_all()
	    {
	        $this->db->from('transaksi_jurnal');
	        return $this->db->count_all_results();
	    }
	// Datatable End
	
	}
	
	/* End of file InquiryModel.php */
	/* Location: ./application/models/InquiryModel.php */
?>