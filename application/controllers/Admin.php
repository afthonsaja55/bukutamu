<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_admin');
    }


    public function index()
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['buku'] = $this->m_admin->bukutamu();
        $data['sec'] = $this->m_admin->security();
        $data['users'] = $this->m_admin->users();
        $data['peg'] = $this->m_admin->pegawai();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'role' => $this->input->post('role')
            ];
            $this->db->insert('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Role Telah Ditambahkan! </div>');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access Changed!</div>');
    }

    public function user()
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/footer');
    }

    public function tambahuser()
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Tambah User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Role_model', 'role');
        $data['RoleId'] = $this->role->getRoleId();

        $data['users'] = $this->db->get('user')->result_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This email has already registered!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', ['min_length' => 'Password to short!']);
        $this->form_validation->set_rules('role_id', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambahuser', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id', true),
                'is_active' => $this->input->post('is_active', true),
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! your account has been created!!</div>');
            redirect('admin/tambahuser');
        }
    }

    public function deleteuser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User has been deleted! </div>');
        redirect('admin/tambahuser');
    }

    public function edituser($id)
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Edit User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['us'] = $this->m_admin->edit_data($where, 'user')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edituser', $data);
        $this->load->view('templates/footer');
    }

    function updateuser()
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'Password dont match !', 'min_length' => 'Password to short!']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        $id = $this->input->post('id');
        $password1 = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

        $data = array(
            'password' => $password1
        );

        $where = array(
            'id' => $id
        );

        $this->m_admin->update_data($where, $data, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Diubah! </div>');
        redirect('admin/tambahuser');
    }

    public function deleterole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Dihapus! </div>');
        redirect('admin/role');
    }

    public function editrole($id)
    {
        $data['title'] = 'Admin - KPPN BLITAR';
        $data['title2'] = 'Edit Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['role'] = $this->m_admin->edit_data($where, 'user_role')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/editrole', $data);
        $this->load->view('templates/footer');
    }

    function updaterole()
    {
        $id = $this->input->post('id');
        $role = $this->input->post('role');

        $data = array(
            'role' => $role
        );

        $where = array(
            'id' => $id
        );

        $this->m_admin->update_data($where, $data, 'user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Telah Diubah! </div>');
        redirect('admin/role');
    }
}
