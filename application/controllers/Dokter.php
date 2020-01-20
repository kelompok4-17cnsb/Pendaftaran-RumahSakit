<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        // if(!$this->session->userdata('status')){
        //     redirect(base_url('login'));
        // }
		$this->load->model('Dokter_Model');
		$this->load->library('form_validation');
		if (!$this->session->userdata('login')) {
			redirect(base_url('login'));
		}
	}

	function index()
	{
		$dDokter = $this->Dokter_Model->getDokter();
		$data = array(
			'dokter' => $dDokter,
		);
		$this->load->view('dokter/list_dokter', $data);
	}

	function delete($id)
	{
		$this->Dokter_Model->delete($id);
		$this->session->set_flashdata('message', 'Berhasil Menghapus Data');
		redirect(base_url('dokter'));
	}

	function tambah()
	{
		
		$data = array(
			'action' => base_url('dokter/processtambah'),
			'page' => 'add',
			'id_dokter' => set_value('id_dokter'),
			'nama_dokter' => set_value('nama_dokter'),
			'spesialis' => set_value('spesialis'),
			'lokasi_praktek' => set_value('lokasi_praktek'),
			'jadwal_praktek' => set_value('jadwal_praktek'),
		);
		$this->load->view('dokter/form_dokter', $data);
	}

	function processtambah()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->Dokter_Model->tambahData($data);
		} else {
			$data = array(
				'id_dokter' => $this->input->post('id_dokter', TRUE),
				'nama_dokter' => $this->input->post('nama_dokter', TRUE),
				'spesialis' => $this->input->post('spesialis', TRUE),
				'lokasi_praktek' => $this->input->post('lokasi_praktek', TRUE),
				'jadwal_praktek' => implode(",",$this->input->post('jadwal_praktek', TRUE)),
			);
			$this->Dokter_Model->tambahData($data);
			$this->session->set_flashdata('message', 'Berhasil Tambah Data');
			redirect(base_url('dokter'));
		}
	}

	function edit($id)
	{
		if ($this->session->userdata('username') == "admin") {
			
			$row = $this->Dokter_Model->getdokterID($id);
			if ($row) {
				$data = array(
					'page' => 'edit',
					'action' => base_url('dokter/processedit'),
					'id_dokter' => set_value('id_dokter', $row->id_dokter),
					'nama_dokter' => set_value('nama_dokter', $row->nama_dokter),
					'spesialis' => set_value('spesialis', $row->spesialis),
					'lokasi_praktek' => set_value('lokasi_praktek', $row->lokasi_praktek),
					'jadwal_praktek' => set_value('jadwal_praktek', $row->jadwal_praktek),
				);
				$this->load->view('dokter/form_dokter', $data);
			} else {
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(base_url('dokter'));
			}
		} else {
			$message = $this->session->set_flashdata('message', 'Sorry, you are not allowed to edit this data!');
			redirect(base_url('dokter'), $message);
		}
	}

	function processedit()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->Dokter_Model->update($this->input->post('id_dokter', TRUE), $data);
		} else {
			$data = array(
				'nama_dokter' => $this->input->post('nama_dokter', TRUE),
				'spesialis' => $this->input->post('spesialis', TRUE),
				'lokasi_praktek' => $this->input->post('lokasi_praktek', TRUE),
				'jadwal_praktek' => $this->input->post('jadwal_praktek', TRUE),
			);
			$this->Dokter_Model->updateData($this->input->post('id_dokter', TRUE), $data);
			$this->session->set_flashdata('message', 'Berhasil Mengupdate Data');
			redirect(base_url('dokter'));
		}
	}

	private function _rules()
	{
		$this->form_validation->set_rules('nama_dokter', 'nama_dokter', 'trim|required');
		$this->form_validation->set_rules('spesialis', 'spesialis', 'trim|required');
		$this->form_validation->set_rules('lokasi_praktek', 'lokasi_praktek', 'trim|required');
		$this->form_validation->set_rules('id_dokter', 'id_dokter', 'trim');
	}
}
