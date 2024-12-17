<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Printer_model extends CI_Model
{
    public function ambil_data()
    {
        $sql = "
            select id_printer, nama_printer, spesifikasi
            from tb_printer
        ";

        $data = $this->db->query($sql)->result();
        return $data;
    }
    
    public function simpan_data()
    {
        $id_printer = $this->input->post('id_printer');
        $nama_printer = $this->input->post('nama_printer');
        $spesifikasi = $this->input->post('spesifikasi');

        $sql = "
            insert into tb_printer (id_printer, nama_printer, spesifikasi)
            values ('$id_printer', '$nama_printer', '$spesifikasi')
        ";

        $data = $this->db->query($sql);
        return $data;
    }

    public function edit_data()
    {
        $id_printer = $this->input->post('id_printer');
        $nama_printer = $this->input->post('nama_printer');
        $spesifikasi = $this->input->post('spesifikasi');

        $sql = "
            update tb_printer set
            nama_printer = '$nama_printer',
            spesifikasi = '$spesifikasi'
            where id_printer = '$id_printer'
        ";

        $data = $this->db->query($sql);
        return $data;
    }

    public function hapus_data()
    {
        $id_printer = $this->input->post('id_printer');

        $sql = "
            delete from tb_printer
            where id_printer = '$id_printer'
        ";

        $data = $this->db->query($sql);
        return $data;
    }
}
