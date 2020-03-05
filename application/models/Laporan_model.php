<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public function get_where($from = null, $where = null)
    {

        $this->db->from($from);
        $this->db->where($where);

        return $this->db->get();
    }

    public function get_tgl($from = null, $where = null)
    {

        $this->db->from($from);
        $this->db->where($where);
        $query = $this->db->get();
        return $result = $query->row();
    }

    public function getLaporan()
    {
        $query = "SELECT `laporan`.*, `laporan_jam`.`jam`, `laporan_lokasi`.`lokasi`
                From `laporan` JOIN `laporan_jam`
                ON `laporan`.`id_jam` = `laporan_jam`.`id`
                JOIN `laporan_lokasi` ON `laporan`.`id_lokasi` = `laporan_lokasi`.`id`
        ";

        return $this->db->query($query)->result_array();
    }
}
