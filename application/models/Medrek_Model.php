<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medrek_Model extends CI_Model{

	public $table = 'tb_rekmed';
    public $id = 'no_medrek';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // public function getNomorMedrek(){
    //     $this->db->select('*');
    //     return $this->db->get($this->table)->result();
    // }

    // get all
    function getData(){
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien = tb_rekmed.id_pasien');
        $this->db->join('tb_dokter', 'tb_dokter.id_dokter = tb_rekmed.id_dokter');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function getMedrekID($id){
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien = tb_rekmed.id_pasien');
        $this->db->join('tb_dokter', 'tb_dokter.id_dokter = tb_rekmed.id_dokter');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function insert($data){
        $this->db->insert($this->table,$data);
    }

    function edit($id, $data){
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id){
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
?>