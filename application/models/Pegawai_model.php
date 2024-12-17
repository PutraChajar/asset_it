<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    public function ambil_data()
    {
        $sql = "
            select id_pegawai, nama_pegawai, a.id_komputer, a.id_mouse, a.id_keyboard, a.id_printer,
            nama_komputer, nama_mouse, nama_keyboard, nama_printer
            from tb_pegawai a
            left join tb_komputer b on b.id_komputer = a.id_komputer
            left join tb_mouse c on c.id_mouse = a.id_mouse
            left join tb_keyboard d on d.id_keyboard = a.id_keyboard
            left join tb_printer e on e.id_printer = a.id_printer
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
