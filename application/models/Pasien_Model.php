<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_Model extends CI_Model{

	public $table = 'tb_pasien';
    public $id = 'id_pasien';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function getPasien()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function getPasienID($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function getLimit()
    {
        $this->db->limit(1);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function insert($data){
        $this->db->insert($this->table,$data);
    }

    function updateData($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id){
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
?>