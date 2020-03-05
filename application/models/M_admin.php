<?php
class M_admin extends CI_Model
{

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function bukutamu()
    {
        $query = $this->db->query('SELECT * FROM bukutamu');
        return $query->num_rows('id');
    }

    function security()
    {
        $query = $this->db->query('SELECT * FROM laporan');
        return $query->num_rows('id');
    }

    function pegawai()
    {
        $query = $this->db->query('SELECT * FROM pegawai');
        return $query->num_rows('id');
    }

    function users()
    {
        $query = $this->db->query('SELECT * FROM user');
        return $query->num_rows('id');
    }
}
