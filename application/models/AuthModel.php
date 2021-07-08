<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class AuthModel extends CI_Model {
		private $table = 'users';
		private $group = 'users_group';
		private $pk = 'id';
		
		public function __construct()
		{
			parent::__construct();
		}

		function login($username, $password)
		{
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->join($this->group, $this->group.'.level = '.$this->table.'.level', 'left');
			$this->db->where($this->table.'.username', $username);
			$this->db->where($this->table.'.password', $password);
			$this->db->where($this->table.'.status', 1);
			$this->db->limit(1);
			return $this->db->get();
		}

		function update($data, $id)
		{
			$this->db->where($this->pk, $id);
			$this->db->update($this->table, $data);
		}

		function get_by_cookie($cookie)
		{
			$this->db->where('cookie', $cookie);
			return $this->db->get($this->table);
		}
	
	}
	
	/* End of file AuthModel.php */
	/* Location: ./application/models/AuthModel.php */
?>