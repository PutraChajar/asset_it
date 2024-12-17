<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mouse_model extends CI_Model
{
    public function ambil_data()
    {
        $sql = "
            select id_mouse, nama_mouse, spesifikasi
            from tb_mouse
        ";

        $data = $this->db->query($sql)->result();
        return $data;
    }
    
    public function simpan_data()
    {
        $id_mouse = $this->input->post('id_mouse');
        $nama_mouse = $this->input->post('nama_mouse');
        $spesifikasi = $this->input->post('spesifikasi');

        $sql = "
            insert into tb_mouse (id_mouse, nama_mouse, spesifikasi)
            values ('$id_mouse', '$nama_mouse', '$spesifikasi')
        ";

        $data = $this->db->query($sql);
        return $data;
    }

    public function edit_data()
    {
        $id_mouse = $this->input->post('id_mouse');
        $nama_mouse = $this->input->post('nama_mouse');
        $spesifikasi = $this->input->post('spesifikasi');

        $sql = "
            update tb_mouse set
            nama_mouse = '$nama_mouse',
            spesifikasi = '$spesifikasi'
            where id_mouse = '$id_mouse'
        ";

        $data = $this->db->query($sql);
        return $data;
    }

    public function hapus_data()
    {
        $id_mouse = $this->input->post('id_mouse');

        $sql = "
            delete from tb_mouse
            where id_mouse = '$id_mouse'
        ";

        $data = $this->db->query($sql);
        return $data;
    }
}