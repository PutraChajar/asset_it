<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Keyboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Keyboard_model");
    }

    public function index()
    {
        $data["datas"] = $this->Keyboard_model->ambil_data();
        $this->load->view("admin/Keyboard_view", $data);
    }

    public function simpan_data()
	{
		$data = $this->Keyboard_model->simpan_data();
		echo json_encode($data);
	}

	public function edit_data()
	{
		$data = $this->Keyboard_model->edit_data();
		echo json_encode($data);
	}

	public function hapus_data()
	{
		$data = $this->Keyboard_model->hapus_data();
		echo json_encode($data);
	}
}
