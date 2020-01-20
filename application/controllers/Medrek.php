<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medrek extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        // if(!$this->session->userdata('status')){
        //     redirect(base_url('login'));
        // }
		$this->load->model('Medrek_Model');
		$this->load->model('Pasien_Model');
		$this->load->model('Dokter_Model');
		$this->load->library('form_validation');
		if (!$this->session->userdata('login')) {
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$dmedrek = $this->Medrek_Model->getData();
		$data = array(
			'medrek' => $dmedrek,
		);
		$this->load->view('medrek/data_medrek', $data);
	}

	public function tambah()
	{
		$dpas = $this->Pasien_Model->getLimit();
		$ddok = $this->Dokter_Model->getbyDay();
		$data = array(
			'dpas' => $dpas,
			'ddok' => $ddok,
			'page' => "Tambah",
			'action' => base_url('medrek/processtambah'),
			'no_medrek' => set_value('no_medrek'),
			'id_pasien' => set_value('id_pasien'),
			'nama_pasien' => set_value('nama_pasien'),
			'j_kelamin' => set_value('j_kelamin'),
			'ttl_pasien' => set_value('ttl_pasien'),
			'usia' => set_value('usia'),
			'alamat_pasien' => set_value('alamat_pasien'),
			'kota_pasien' => set_value('kota_pasien'),
			'keluhan' => set_value('keluhan'),
			'poli' => set_value('poli'),
			'id_dokter' => set_value('id_dokter'),
			'penyakit' => set_value('penyakit'),
			'status' => set_value('status'),
		);
		$this->load->view('medrek/tambah_medrek', $data);
	}

	public function processtambah()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->Medrek_Model->create($data);
		} else {
			$data = array(
				'no_medrek' => $this->input->post('no_medrek', TRUE),
				'id_pasien' => $this->input->post('id_pasien', TRUE),
				'keluhan' => $this->input->post('keluhan', TRUE),
				'poli' => $this->input->post('poli', TRUE),
				'id_dokter' => $this->input->post('id_dokter', TRUE),
				'penyakit' => $this->input->post('penyakit', TRUE),
				'status' => $this->input->post('status', TRUE),
			);
			$this->Medrek_Model->insert($data);
			$data2 = array(
				'id_pasien' => $this->input->post('id_pasien', TRUE),
				'nama_pasien' => $this->input->post('nama_pasien', TRUE),
				'j_kelamin' => $this->input->post('j_kelamin', TRUE),
				'ttl_pasien' => $this->input->post('ttl_pasien', TRUE),
				'usia' => $this->input->post('usia', TRUE),
				'alamat_pasien' => $this->input->post('alamat_pasien', TRUE),
				'kota_pasien' => $this->input->post('kota_pasien', TRUE),
			);
			$this->Pasien_Model->insert($data2);
			$this->session->set_flashdata('message', 'Create Data Success');
			redirect(base_url('medrek'));
		}
	}

	function detail($id)
	{
		$row = $this->Medrek_Model->getMedrekID($id);
		if ($row) {
			$data = array(
				'action' => base_url('medrek/processedit'),
				'no_medrek' => set_value('no_medrek', $row->no_medrek),
				'id_pasien' => set_value('id_pasien', $row->id_pasien),
				'nama_pasien' => set_value('nama_pasien', $row->nama_pasien),
				'j_kelamin' => set_value('j_kelamin', $row->j_kelamin),
				'ttl_pasien' => set_value('ttl_pasien', $row->ttl_pasien),
				'usia' => set_value('usia', $row->usia),
				'alamat_pasien' => set_value('alamat_pasien', $row->alamat_pasien),
				'kota_pasien' => set_value('kota_pasien', $row->kota_pasien),
				'keluhan' => set_value('keluhan', $row->keluhan),
				'poli' => set_value('poli', $row->poli),
				'id_dokter' => set_value('id_dokter', $row->id_dokter),
				'nama_dokter' => set_value('id_dokter', $row->nama_dokter),
				'spesialis' => set_value('id_dokter', $row->spesialis),
				'penyakit' => set_value('penyakit', $row->penyakit),
				'status' => set_value('status', $row->status),
			);
			$this->load->view('medrek/detail_data', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(base_url('medrek'));
		}
	}

	function delete($id)
	{
		$this->Medrek_Model->delete($id);
		redirect(base_url('medrek'));
	}

	function edit($id)
	{
		$row = $this->Medrek_Model->getMedrekID($id);
		$ddokter = $this->Dokter_Model->getbyDay();
		if ($row) {
			$data = array(
				'page' => "Edit",
				'dokter' => $ddokter,
				'action' => base_url('medrek/processedit'),
				'no_medrek' => set_value('no_medrek', $row->no_medrek),
				'id_pasien' => set_value('id_pasien', $row->id_pasien),
				'nama_pasien' => set_value('nama_pasien', $row->nama_pasien),
				'j_kelamin' => set_value('j_kelamin', $row->j_kelamin),
				'ttl_pasien' => set_value('ttl_pasien', $row->ttl_pasien),
				'usia' => set_value('usia', $row->usia),
				'alamat_pasien' => set_value('alamat_pasien', $row->alamat_pasien),
				'kota_pasien' => set_value('kota_pasien', $row->kota_pasien),
				'keluhan' => set_value('keluhan', $row->keluhan),
				'poli' => set_value('poli', $row->poli),
				'id_dokter' => set_value('id_dokter', $row->id_dokter),
				'nama_dokter' => set_value('id_dokter', $row->nama_dokter),
				'spesialis' => set_value('id_dokter', $row->spesialis),
				'penyakit' => set_value('penyakit', $row->penyakit),
				'status' => set_value('status', $row->status),
			);
			$this->load->view('medrek/edit_data', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(base_url('medrek'));
		}
	}

	function processedit()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->Pasien_Model->update($this->input->post('id_pasien', TRUE), $data);
		} else {
			$data = array(
				'id_pasien' => $this->input->post('id_pasien', TRUE),
				'keluhan' => $this->input->post('keluhan', TRUE),
				'poli' => $this->input->post('poli', TRUE),
				'id_dokter' => $this->input->post('id_dokter', TRUE),
				'penyakit' => $this->input->post('penyakit', TRUE),
				'status' => $this->input->post('status', TRUE),
			);
			$this->Medrek_Model->edit($this->input->post('no_medrek', TRUE), $data);
			$data2 = array(
				'nama_pasien' => $this->input->post('nama_pasien', TRUE),
				'j_kelamin' => $this->input->post('j_kelamin', TRUE),
				'ttl_pasien' => $this->input->post('ttl_pasien', TRUE),
				'usia' => $this->input->post('usia', TRUE),
				'alamat_pasien' => $this->input->post('alamat_pasien', TRUE),
				'kota_pasien' => $this->input->post('kota_pasien', TRUE),
			);
			$this->Pasien_Model->updateData($this->input->post('id_pasien', TRUE), $data2);
			$this->session->set_flashdata('message', 'Update Data Success');
			redirect(base_url('medrek'));
		}
	}

	private function _rules()
	{
		$this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'trim|required');
		$this->form_validation->set_rules('j_kelamin', 'j_kelamin', 'trim|required');
		$this->form_validation->set_rules('ttl_pasien', 'ttl_pasien', 'trim|required');
		$this->form_validation->set_rules('usia', 'usia', 'trim|required');
		$this->form_validation->set_rules('alamat_pasien', 'alamat_pasien', 'trim|required');
		$this->form_validation->set_rules('kota_pasien', 'kota_pasien', 'trim|required');
		$this->form_validation->set_rules('id_pasien', 'id_pasien', 'trim');
		$this->form_validation->set_rules('no_medrek', 'no_medrek', 'trim');
		$this->form_validation->set_rules('id_dokter', 'id_dokter', 'trim|required');
		$this->form_validation->set_rules('poli', 'poli', 'trim|required');
		$this->form_validation->set_rules('keluhan', 'keluhan', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
	}
}
?>