<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_menu');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['title2'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', "required");

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Menu Added! </div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Menu Management';
        $data['title2'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', "required");
        $this->form_validation->set_rules('menu_id', 'Menu', "required");
        $this->form_validation->set_rules('url', 'Url', "required");
        $this->form_validation->set_rules('icon', 'Icon', "required");

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Sub Menu Added! </div>');
            redirect('menu/submenu');
        }
    }

    public function deletemenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Dihapus! </div>');
        redirect('menu');
    }

    public function deletesubmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Dihapus! </div>');
        redirect('menu/submenu');
    }

    public function editmenu($id)
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Edit Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['menu'] = $this->m_menu->edit_data($where, 'user_menu')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/editmenu', $data);
        $this->load->view('templates/footer');
    }

    function updatemenu()
    {
        $id = $this->input->post('id');
        $menu = $this->input->post('menu');

        $data = array(
            'menu' => $menu
        );

        $where = array(
            'id' => $id
        );

        $this->m_menu->update_data($where, $data, 'user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Diubah! </div>');
        redirect('menu');
    }

    // public function editsubmenu($id)
    // {
    //     $data['title'] = 'Admin - KPPN BLITAR';
    //     $data['title2'] = 'Edit Sub Menu';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $where = array('id' => $id);
    //     $data['submenu'] = $this->m_menu->edit_data($where, 'user_sub_menu')->result();
    //     //$data['subMenu'] = $this->menu->getSubMenu();
    //     $data['menu'] = $this->db->get('user_menu')->result_array();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('menu/editsubmenu', $data);
    //     $this->load->view('templates/footer');
    // }

    // function updatesubmenu()
    // {
    //     $id = $this->input->post('id');
    //     $menu = $this->input->post('menu');

    //     $data = array(
    //         'menu' => $menu
    //     );

    //     $where = array(
    //         'id' => $id
    //     );

    //     $this->m_menu->update_data($where, $data, 'user_sub_menu');
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Diubah! </div>');
    //     redirect('menu/submenu');
    // }
}
