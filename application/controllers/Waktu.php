<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Waktu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') == 3) {
            redirect('auth/blocked');
        }
        $this->load->model('m_waktu');
        $this->load->model('m_tempat');
    }

    public function index()
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Tambah Waktu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['waktu'] = $this->db->get('laporan_jam')->result_array();

        $this->form_validation->set_rules('jam', 'Jam', "required");

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('waktu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('laporan_jam', ['jam' => $this->input->post('jam')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Jam Telah Ditambahkan! </div>');
            redirect('waktu');
        }
    }

    public function deletewaktu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('laporan_jam');
        $this->load->model('m_tempat');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Jam Telah Dihapus! </div>');
        redirect('waktu');
    }

    public function editwaktu($id)
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Edit Lokasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['waktu'] = $this->m_waktu->edit_data($where, 'laporan_jam')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('waktu/editwaktu', $data);
        $this->load->view('templates/footer');
    }

    function updatewaktu()
    {
        $id = $this->input->post('id');
        $jam = $this->input->post('jam');

        $data = array(
            'jam' => $jam
        );

        $where = array(
            'id' => $id
        );

        $this->m_waktu->update_data($where, $data, 'laporan_jam');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Jam Telah Diubah! </div>');
        redirect('waktu');
    }

    public function tempat()
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Tambah Tempat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['tempat'] = $this->db->get('laporan_lokasi')->result_array();

        $this->form_validation->set_rules('lokasi', 'Lokasi', "required");

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tempat/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('laporan_lokasi', ['lokasi' => $this->input->post('lokasi')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Lokasi Telah Ditambahkan! </div>');
            redirect('waktu/tempat');
        }
    }

    public function deletetempat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('laporan_lokasi');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Lokasi Telah Dihapus! </div>');
        redirect('waktu/tempat');
    }

    public function edittempat($id)
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Edit Lokasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['tempat'] = $this->m_tempat->edit_data($where, 'laporan_lokasi')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tempat/edittempat', $data);
        $this->load->view('templates/footer');
    }

    function updatetempat()
    {
        $id = $this->input->post('id');
        $lokasi = $this->input->post('lokasi');

        $data = array(
            'lokasi' => $lokasi
        );

        $where = array(
            'id' => $id
        );

        $this->m_tempat->update_data($where, $data, 'laporan_lokasi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Lokasi Telah Diubah! </div>');
        redirect('waktu/tempat');
    }
}
