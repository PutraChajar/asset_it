<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mouse extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mouse_model");
    }

    public function index()
    {
        $data["datas"] = $this->Mouse_model->ambil_data();
        $this->load->view("admin/Mouse_view", $data);
    }

    public function simpan_data()
	{
		$data = $this->Mouse_model->simpan_data();
		echo json_encode($data);
	}

	public function edit_data()
	{
		$data = $this->Mouse_model->edit_data();
		echo json_encode($data);
	}

	public function hapus_data()
	{
		$data = $this->Mouse_model->hapus_data();
		echo json_encode($data);
	}
}