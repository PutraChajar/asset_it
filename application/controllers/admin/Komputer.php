<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Komputer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Komputer_model");
    }

    public function index()
    {
        $data["datas"] = $this->Komputer_model->ambil_data();
        $this->load->view("admin/Komputer_view", $data);
    }

    public function simpan_data()
	{
		$data = $this->Komputer_model->simpan_data();
		echo json_encode($data);
	}

	public function edit_data()
	{
		$data = $this->Komputer_model->edit_data();
		echo json_encode($data);
	}

	public function hapus_data()
	{
		$data = $this->Komputer_model->hapus_data();
		echo json_encode($data);
	}
}
