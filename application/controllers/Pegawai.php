<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pegawai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_pegawai');
    }


    public function index()
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Tambah Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['peg'] = $this->db->get('pegawai')->result_array();
        $data['lappeg'] = $this->db->get('laporan_pegawai')->result_array();

        $this->form_validation->set_rules('nama_peg', 'Nama_peg', "required");

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pegawai/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('pegawai', [
                'nama_peg' => $this->input->post('nama_peg')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pegawai Telah Ditambahkan! </div>');
            redirect('pegawai');
        }
    }

    public function tambah()
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Tambah Jadwal Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['peg'] = $this->db->get('pegawai')->result_array();
        $data['lappeg'] = $this->db->get('laporan_pegawai')->result_array();

        $this->form_validation->set_rules('id_peg', 'Id_peg', "required");
        $this->form_validation->set_rules('id_peg1', 'Id_peg1', "required");
        $this->form_validation->set_rules('id_peg2', 'Id_peg2', "required");

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pegawai/jadwal', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'tgl' => $this->input->post('tgl'),
                'id_peg' => $this->input->post('id_peg'),
                'id_peg1' => $this->input->post('id_peg1'),
                'id_peg2' => $this->input->post('id_peg2'),
                'waktu' => time()
            ];
            $this->db->insert('laporan_pegawai', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Jadwal Telah Ditambah! </div>');
            redirect('pegawai/tambah');
        }
    }

    public function editpeg($id)
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Edit Data Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['peg'] = $this->m_pegawai->edit_data($where, 'pegawai')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/editpegawai', $data);
        $this->load->view('templates/footer');
    }

    function updatepeg()
    {
        $id = $this->input->post('id');
        $nama_peg = $this->input->post('nama_peg');

        $data = array(
            'nama_peg' => $nama_peg
        );

        $where = array(
            'id' => $id
        );

        $this->m_pegawai->update_data($where, $data, 'pegawai');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Diubah! </div>');
        redirect('pegawai');
    }

    public function deletepeg($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pegawai');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Dihapus! </div>');
        redirect('pegawai');
    }

    public function editjadwal($id)
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Edit Jadwal Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['lappeg'] = $this->m_pegawai->edit_data($where, 'laporan_pegawai')->result();
        $data['peg'] = $this->db->get('pegawai')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/editjadwal', $data);
        $this->load->view('templates/footer');
    }

    function updatejadwal()
    {
        $id = $this->input->post('id');
        $id_peg = $this->input->post('id_peg');
        $id_peg1 = $this->input->post('id_peg1');
        $id_peg2 = $this->input->post('id_peg2');

        $data = array(
            'id_peg' => $id_peg,
            'id_peg1' => $id_peg1,
            'id_peg2' => $id_peg2
        );

        $where = array(
            'id' => $id
        );

        $this->m_pegawai->update_data($where, $data, 'laporan_pegawai');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Diubah! </div>');
        redirect('pegawai/tambah');
    }

    public function deletejadwal($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('laporan_pegawai');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Dihapus! </div>');
        redirect('pegawai/tambah');
    }
}
