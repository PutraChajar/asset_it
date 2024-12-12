<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Komputer_model extends CI_Model
{
    public function ambil_data()
    {
        $sql = "
            select id_komputer, nama_komputer, spesifikasi
            from tb_komputer
        ";

        $data = $this->db->query($sql)->result();
        return $data;
    }
    
    public function simpan_data()
    {
        $id_komputer = $this->input->post('id_komputer');
        $nama_komputer = $this->input->post('nama_komputer');
        $spesifikasi = $this->input->post('spessifikasi');

        $sql = "
            insert into tb_komputer (id_komputer, nama_komputer, spesifikasi)
            values ('$id_komputer', '$nama_komputer', '$spesifikasi')
        ";

        $data = $this->db->query($sql);
        return $data;
    }

    public function edit_data()
    {
        $id_komputer = $this->input->post('id_komputer');
        $nama_komputer = $this->input->post('nama_komputer');
        $spesifikasi = $this->input->post('spesifikasi');

        $sql = "
            update tb_komputer set
            nama_komputer = '$nama_komputer',
            spesifikasi = '$spesifikasi'
            where id_komputer = '$id_komputer'
        ";

        $data = $this->db->query($sql);
        return $data;
    }

    public function hapus_data()
    {
        $id_komputer = $this->input->post('id_komputer');

        $sql = "
            delete from tb_komputer
            where id_komputer = '$id_komputer'
        ";

        $data = $this->db->query($sql);
        return $data;
    }
}
