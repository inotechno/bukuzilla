<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class AccountModel extends CI_Model {
			
	    var $column_order = array(null, 'a.nama_akun','a.no_akun','a.sub_no_akun', 'a.status_akun', 'a.level_akun', 'a.saldo_awal', 'a.created_at', 'a.created_by', 'a.id', 'u.id'); 
	    var $column_search = array('a.nama_akun','a.no_akun','a.sub_no_akun', 'a.status_akun', 'a.level_akun'); //field yang diizin untuk pencarian 
	    var $order = array('a.level_akun' => 'asc'); // default order 
	
	// Datatable
		private function _get_datatables_query()
		{
			$this->db->select('a.*, u.nama_lengkap');
			$this->db->from('account as a');
 			$this->db->join('users as u', 'a.created_by = u.id', 'left');
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

		function get_datatables()
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
	        $this->db->from('account');
	        return $this->db->count_all_results();
	    }
	// Datatable

		function addAccount($data)
		{
			return $this->db->insert('account', $data);
		}
	
		function deleteAccount($no_akun, $sub_no_akun)
		{
			return $this->db->delete('account', array('no_akun' => $no_akun, 'sub_no_akun' => $sub_no_akun));
		}

		function updateAccount($no_akun, $sub_no_akun, $data)
		{
			return $this->db->update('account', $data, array('no_akun' => $no_akun, 'sub_no_akun' => $sub_no_akun));
		}

	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>