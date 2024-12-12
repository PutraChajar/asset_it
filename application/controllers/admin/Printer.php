<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Printer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Printer_model");
    }

    public function index()
    {
        $data["datas"] = $this->Printer_model->ambil_data();
        $this->load->view("admin/Printer_view", $data);
    }

    public function simpan_data()
	{
		$data = $this->Printer_model->simpan_data();
		echo json_encode($data);
	}

	public function edit_data()
	{
		$data = $this->Printer_model->edit_data();
		echo json_encode($data);
	}

	public function hapus_data()
	{
		$data = $this->Printer_model->hapus_data();
		echo json_encode($data);
	}
}
