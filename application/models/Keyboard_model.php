<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Keyboard_model extends CI_Model
{
    public function ambil_data()
    {
        $sql = "
            select id_keyboard, nama_keyboard, spesifikasi
            from tb_keyboard
        ";

        $data = $this->db->query($sql)->result();
        return $data;
    }
    
    public function simpan_data()
    {
        $id_keyboard = $this->input->post('id_keyboard');
        $nama_keyboard = $this->input->post('nama_keyboard');
        $spesifikasi = $this->input->post('spessifikasi');

        $sql = "
            insert into tb_keyboard (id_keyboard, nama_keyboard, spesifikasi)
            values ('$id_keyboard', '$nama_keyboard', '$spesifikasi')
        ";

        $data = $this->db->query($sql);
        return $data;
    }

    public function edit_data()
    {
        $id_keyboard = $this->input->post('id_keyboard');
        $nama_keyboard = $this->input->post('nama_keyboard');
        $spesifikasi = $this->input->post('spesifikasi');

        $sql = "
            update tb_keyboard set
            nama_keyboard = '$nama_keyboard',
            spesifikasi = '$spesifikasi'
            where id_keyboard = '$id_keyboard'
        ";

        $data = $this->db->query($sql);
        return $data;
    }

    public function hapus_data()
    {
        $id_keyboard = $this->input->post('id_keyboard');

        $sql = "
            delete from tb_keyboard
            where id_keyboard = '$id_keyboard'
        ";

        $data = $this->db->query($sql);
        return $data;
    }
}
