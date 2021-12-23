<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {

	function get_table_list($table_name)
	{
		
		return $this->db->list_tables();	
	}

	function get_field_list($table_name)
	{
		return $this->db->field_data($table_name);	
	}


	function get_paged_list($table_name)
	{
		return $this->db->get($table_name);	
	}

	function get_paged_list_order_limit($table_name,$column_order,$type_order,$jml_limit,$batas_limit)
	{
		
		$this->db->order_by($column_order, $type_order);
		$this->db->limit($jml_limit,$batas_limit);
		return $this->db->get($table_name);	
	}

	function get_paged_list_where_order_limit($table_name,$field,$nilai_field,$column_order,$type_order,$jml_limit,$batas_limit)
	{
		$this->db->where($field, $nilai_field);
		$this->db->order_by($column_order, $type_order);
		$this->db->limit($jml_limit,$batas_limit);
		return $this->db->get($table_name);	
	}

	function count_all($table_name)
	{
		return $this->db->count_all($table_name);
	}

	function get_by_id($id,$primary_key,$table_name)
	{
		$this->db->where($primary_key,$id);
		return $this->db->get($table_name);
	}

	function save($person,$table_name)
	{
		$this->db->insert($table_name,$person);
		return $this->db->insert_id();
	}

	function update($id,$primary_key,$person,$table_name)
	{
		$this->db->where($primary_key,$id);
		$this->db->update($table_name,$person);
	}

	function delete($id,$primary_key,$table_name)
	{
		$this->db->where($primary_key,$id);
		$this->db->delete($table_name);
	}

	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	
	function kode_otomatis($primary_key,$table_name){
        $this->db->select('Right('.$primary_key.',3) as kode ',false);
        $this->db->order_by($primary_key, 'desc');
        $this->db->limit(1);
        $query = $this->db->get($table_name);
        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi  = "P".date('Ymd').$kodemax;
        return $kodejadi;

    }
	

}

/* End of file model_admin.php */
/* Location: ./application/models/model_admin.php */