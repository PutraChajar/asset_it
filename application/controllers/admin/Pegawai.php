<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pegawai_model");
    }

    public function index()
    {
        $data["datas"] = $this->Pegawai_model->ambil_data();
        $this->load->view("admin/Pegawai_view", $data);
    }

    public function simpan_data()
	{
		$data = $this->Pegawai_model->simpan_data();
		echo json_encode($data);
	}

	public function edit_data()
	{
		$data = $this->Pegawai_model->edit_data();
		echo json_encode($data);
	}

	public function hapus_data()
	{
		$data = $this->Pegawai_model->hapus_data();
		echo json_encode($data);
	}
}
