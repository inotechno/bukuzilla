<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class UsersModel extends CI_Model {
	
		var $column_order = array(null, 'u.username','u.nama_lengkap','u.level', 'u.status', 'ug.nama_group'); 
	    var $column_search = array('u.username','u.nama_lengkap','u.level', 'u.status', 'ug.nama_group'); //field yang diizin untuk pencarian 
	    var $order = array('u.nama_lengkap' => 'asc'); // default order 
	
	// Datatable
		private function _get_datatables_query()
		{
			$this->db->select('u.id, u.username,u.nama_lengkap,u.level, u.foto, u.status, ug.nama_group');
			$this->db->from('users as u');
 			$this->db->join('users_group as ug', 'u.level = ug.level', 'left');
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
	        $this->db->from('users');
	        return $this->db->count_all_results();
	    }
	// Datatable

	    function validasi_username($username)
	    {
	    	return $this->db->get_where('users', array('username' => $username));
	    }

	    function addUsers($data)
	    {
	    	return $this->db->insert('users', $data);
	    }

	    function updateUsers($id, $data)
	    {
	    	return $this->db->update('users', $data, array('id' => $id));
	    }
	
	}
	
	/* End of file UsersModel.php */
	/* Location: ./application/models/UsersModel.php */
?>