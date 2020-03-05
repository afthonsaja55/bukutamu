<?php
defined('BASEPATH') or exit('No direct script access allowed');

class printdata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        if (!$this->session->userdata('role_id') == 2) {
            redirect('auth');
        }
    }


    public function index()
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Data Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('printdata/index', $data);
        $this->load->view('templates/footer');
    }

    function lap_bukutamu_pertanggal()
    {
        $tanggal = $this->input->post('tgl');
        $data['title'] = 'Laporan Bukutamu Pertanggal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['buku'] = $this->Laporan_model->get_tgl('bukutamu', array('tgl' => $tanggal));
        $data['buku2'] = $this->Laporan_model->get_where('bukutamu', array('tgl' => $tanggal));

        $data['peg'] = $this->Laporan_model->get_where('laporan_pegawai', array('tgl' => $tanggal));

        $this->load->view('printdata/print_bukutamu_pertanggal', $data);
    }

    function lap_security_pertanggal()
    {
        $tanggal = $this->input->post('tgl');
        $data['title'] = 'Laporan Security Pertanggal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['lapor'] = $this->Laporan_model->get_tgl('laporan', array('tgl' => $tanggal));
        $data['lapor2'] = $this->Laporan_model->get_where('laporan', array('tgl' => $tanggal));

        $data['peg'] = $this->Laporan_model->get_where('laporan_pegawai', array('tgl' => $tanggal));

        $this->load->view('printdata/print_security_pertanggal1', $data);
    }

    function lap_gabungan_pertanggal()
    {
        $tanggal = $this->input->post('tgl');
        $data['title'] = 'Laporan Security Pertanggal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['lapor'] = $this->Laporan_model->get_tgl('laporan', array('tgl' => $tanggal));
        $data['lapor2'] = $this->Laporan_model->get_where('laporan', array('tgl' => $tanggal));
        // $data['buku'] = $this->Laporan_model->get_tgl('bukutamu', array('tgl' => $tanggal));
        // $data['buku2'] = $this->Laporan_model->get_where('bukutamu', array('tgl' => $tanggal));

        $data['peg'] = $this->Laporan_model->get_where('laporan_pegawai', array('tgl' => $tanggal));

        $this->load->view('printdata/print_security_pertanggal1', $data);
        // $this->load->view('printdata/print_gabungan_pertanggal', $data);
    }
}
