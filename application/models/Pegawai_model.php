<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    public function ambil_data()
    {
        $sql = "
            select id_pegawai, nama_pegawai, id_komputer, id_mouse, id_keyboard, id_printer
            from tb_pegawai
        ";

        $data = $this->db->query($sql)->result();
        return $data;
    }
    
    public function simpan_data()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $nama_pegawai = $this->input->post('nama_pegawai');
        $komputer = $this->input->post('komputer');
        $mouse = $this->input->post('mouse');
        $keyboard = $this->input->post('keyboard');
        $printer = $this->input->post('printer');

        $sql = "
            insert into tb_pegawai (id_pegawai, nama_pegawai, id_komputer, id_mouse, id_keyboard, id_printer)
            values ('$id_pegawai', '$nama_pegawai', '$komputer', '$mouse', '$keyboard', '$printer')
        ";

        $data = $this->db->query($sql);
        return $data;
    }

    public function edit_data()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $nama_pegawai = $this->input->post('nama_pegawai');
        $komputer = $this->input->post('komputer');
        $mouse = $this->input->post('mouse');
        $keyboard = $this->input->post('keyboard');
        $printer = $this->input->post('printer');

        $sql = "
            update tb_pegawai set
            nama_pegawai = '$nama_pegawai',
            id_komputer = '$komputer',
            id_mouse = '$mouse',
            id_keyboard = '$keyboard',
            id_printer = '$printer'
            where id_pegawai = '$id_pegawai'
        ";

        $data = $this->db->query($sql);
        return $data;
    }

    public function hapus_data()
    {
        $id_pegawai = $this->input->post('id_pegawai');

        $sql = "
            delete from tb_pegawai
            where id_pegawai = '$id_pegawai'
        ";

        $data = $this->db->query($sql);
        return $data;
    }
}
