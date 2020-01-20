<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        // if(!$this->session->userdata('status')){
        //     redirect(base_url('login'));
        // }
		$this->load->model('Pasien_Model');
		$this->load->library('form_validation');
		if (!$this->session->userdata('login')) {
			redirect(base_url('login'));
		}
	}

	function index()
	{
		$dPasien = $this->Pasien_Model->getPasien();
		$data = array(
			'pasien' => $dPasien,
		);
		$this->load->view('pasien/list_pasien', $data);
	}

	function delete($id)
	{
		$this->Pasien_Model->delete($id);
		redirect(base_url('pasien'));
	}

	function edit($id)
	{
		$row = $this->Pasien_Model->getPasienID($id);
		if ($row) {
			$data = array(
				'page' => "Edit",
				'action' => base_url('pasien/processedit'),
				'id_pasien' => set_value('id_pasien', $row->id_pasien),
				'nama_pasien' => set_value('nama_pasien', $row->nama_pasien),
				'j_kelamin' => set_value('j_kelamin', $row->j_kelamin),
				'ttl_pasien' => set_value('ttl_pasien', $row->ttl_pasien),
				'usia' => set_value('usia', $row->usia),
				'alamat_pasien' => set_value('alamat_pasien', $row->alamat_pasien),
				'kota_pasien' => set_value('kota_pasien', $row->kota_pasien),
			);
			$this->load->view('pasien/form_pasien', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(base_url('pasien'));
		}
	}

	function processedit()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->Pasien_Model->update($this->input->post('id_pasien', TRUE), $data);
		} else {
			$data = array(
				'nama_pasien' => $this->input->post('nama_pasien', TRUE),
				'j_kelamin' => $this->input->post('j_kelamin', TRUE),
				'ttl_pasien' => $this->input->post('ttl_pasien', TRUE),
				'usia' => $this->input->post('usia', TRUE),
				'alamat_pasien' => $this->input->post('alamat_pasien', TRUE),
				'kota_pasien' => $this->input->post('kota_pasien', TRUE),
			);
			$this->Pasien_Model->updateData($this->input->post('id_pasien', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Data Success');
			redirect(base_url('pasien'));
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
	}
}
