<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_Model extends CI_Model{

    public $table = 'tb_dokter';
    public $id = 'id_dokter';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function getDokter()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function getbyDay()
    {
        $query = $this->db->query("select id_dokter, nama_dokter, spesialis, substring_index(substring_index(jadwal_praktek, ',', n), ',', -1) as harijadwal from tb_dokter join numbers on char_length(jadwal_praktek) - char_length(replace(jadwal_praktek, ',', '')) >= n - 1 order by spesialis ASC");
        return $query->result();
    }

    function getDokterID($id)
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

    function tambahData($data)
    {
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