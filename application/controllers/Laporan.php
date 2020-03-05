<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('m_laporan');
    }


    public function index()
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Laporan Bukutamu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['butam'] = $this->db->get('bukutamu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/butam', $data);
        $this->load->view('templates/footer');
    }

    public function editbutam($id)
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Edit Data Bukutamu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['butam'] = $this->m_laporan->edit_data($where, 'bukutamu')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/editbutam', $data);
        $this->load->view('templates/footer');
    }

    function updatebutam()
    {
        $id = $this->input->post('id');
        $uraian = $this->input->post('uraian');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'uraian' => $uraian,
            'keterangan' => $keterangan
        );

        $where = array(
            'id' => $id
        );

        $this->m_laporan->update_data($where, $data, 'bukutamu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Diubah! </div>');
        redirect('laporan');
    }

    public function deletebutam($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('bukutamu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Dihapus! </div>');
        redirect('laporan');
    }

    public function security()
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Laporan Security';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['laporan'] = $this->db->get('laporan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        // $this->load->view('auth/blocked', $data);
        $this->load->view('laporan/security', $data);
        $this->load->view('templates/footer');
    }

    public function editsecurity($id)
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Edit Data Security';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['lapor'] = $this->m_laporan->edit_data($where, 'laporan')->result();
        $data['lap_jam'] = $this->db->get('laporan_jam')->result_array();
        $data['lap_lok'] = $this->db->get('laporan_lokasi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/editsecurity', $data);
        $this->load->view('templates/footer');
    }

    function updatesecurity()
    {
        $id = $this->input->post('id');
        $lokasi = $this->input->post('id_lokasi');
        $jam = $this->input->post('id_jam');
        $kondisi = $this->input->post('kondisi');

        $data = array(
            'id_lokasi' => $lokasi,
            'id_jam' => $jam,
            'kondisi' => $kondisi
        );

        $where = array(
            'id' => $id
        );

        $this->m_laporan->update_data($where, $data, 'laporan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Diubah! </div>');
        redirect('laporan/security');
    }

    public function deletesecurity($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('laporan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Dihapus! </div>');
        redirect('laporan/security');
    }
}
