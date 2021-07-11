<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class TransaksiModel extends CI_Model {
	
		var $column_order = array(null, 'j.id_jurnal','j.no_voucher','j.description', 'j.tgl_voucher', 'j.status_post', 'j.created_at', 'j.created_by', 'u.id'); 
	    var $column_search = array('j.no_voucher','j.description', 'j.tgl_voucher', 'j.status_post'); //field yang diizin untuk pencarian 
	    var $order = array('j.created_at' => 'desc'); // default order 
	
	// Datatable
		private function _get_datatables_query()
		{
			$this->db->select('j.*, u.nama_lengkap');
			$this->db->from('jurnal as j');
 			$this->db->join('users as u', 'j.created_by = u.id', 'left');
	        $i = 0;
	     	
	        foreach ($this->column_search as $item) // looping awal
	        {
	            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
	            {
	                 
	                if($i===0) // looping awal
	                {
	                    $this->db->group_start();
	                    $this->db->like($item, $_POST['search']['value']); 
	                }
	                else
	                {
	                    $this->db->or_like($item, $_POST['search']['value']);
	                }
	 
	                if(count($this->column_search) - 1 == $i) 
	                    $this->db->group_end(); 
	            }
	            $i++;
	        }
	         
	        if(isset($_POST['order'])) { // here order processing
	            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	        }  else if(isset($this->order)) {
	            $order = $this->order;
	            $this->db->order_by(key($order), $order[key($order)]);
	        }
		}

		function getJurnal()
		{
			$this->_get_datatables_query();
	        if($_POST['length'] != -1)
	        $this->db->limit($_POST['length'], $_POST['start']);
	    	
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
	        $this->db->from('jurnal');
	        return $this->db->count_all_results();
	    }
	// Datatable End
	    function addTransaksi($jurnal, $trx_id_account)
	    {
	    	$this->db->trans_start();
	    		$this->db->insert('jurnal', $jurnal);
	    		$trx_id_jurnal = $this->db->insert_id();
	    		$result = array();
	    			foreach ($trx_id_account as $key => $value) {
	    				$result[] = array(
	    					'trx_id_jurnal' => $trx_id_jurnal,
	    					'trx_id_account' => $_POST['trx_id_account'][$key],
	    					'trx_debit' => $_POST['trx_debit'][$key],
	    					'trx_kredit' => $_POST['trx_kredit'][$key],
	    					'trx_description' => $_POST['trx_description'][$key],
	    					);
	    			}

	    		$this->db->insert_batch('transaksi_jurnal', $result);
	    	$this->db->trans_complete();	
	    }

	    
	
	}
	
	/* End of file Transaksi_Model.php */
	/* Location: ./application/models/Transaksi_Model.php */
?>