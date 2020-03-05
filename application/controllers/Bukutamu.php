<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bukutamu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data['title'] = 'Selamat Datang';

        $this->load->view('templates/header_bukutamu', $data);
        $this->load->view('bukutamu/index');
        $this->load->view('templates/footer_bukutamu');
    }

    public function bukutamu()
    {
        $data['title'] = 'Buku Tamu KPPN Blitar';
        $data['butam'] = $this->db->get('bukutamu')->result_array();

        $this->form_validation->set_rules('tgl', 'Tgl', 'required');
        $this->form_validation->set_rules('uraian', 'Uraian', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_bukutamu', $data);
            $this->load->view('bukutamu/bukutamu', $data);
            $this->load->view('templates/footer_bukutamu');
        } else {
            $data = [
                'tgl' => $this->input->post('tgl'),
                'uraian' => $this->input->post('uraian'),
                'keterangan' => $this->input->post('keterangan'),
                'jam' => time()
            ];
            $this->db->insert('bukutamu', $data);
            $this->session->set_flashdata('message', '<div class="container alert alert-success col-6" role="alert"> Bukutamu ditambahkan </div>');
            redirect('bukutamu/bukutamu');
        }
    }

    public function laporan()
    {
        $data['title'] = 'Laporan Security';
        $data['lapor'] = $this->db->get('laporan')->result_array();
        $data['jam'] = $this->db->get('laporan_jam')->result_array();
        $data['lokasi'] = $this->db->get('laporan_lokasi')->result_array();

        $this->form_validation->set_rules('id_lokasi', 'Id_lokasi', 'required');
        $this->form_validation->set_rules('id_jam', 'Id_jam', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('tgl', 'tgl', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_bukutamu', $data);
            $this->load->view('bukutamu/laporan', $data);
            $this->load->view('templates/footer_bukutamu');
        } else {
            $data = [
                'tgl' => $this->input->post('tgl'),
                'kondisi' => $this->input->post('kondisi'),
                'id_jam' => $this->input->post('id_jam'),
                'id_lokasi' => $this->input->post('id_lokasi'),
            ];
            $this->db->insert('laporan', $data);
            $this->session->set_flashdata('message', '<div class="container alert alert-success col-6" role="alert"> Laporan ditambahkan </div>');
            redirect('bukutamu/laporan');
        }
    }
}
