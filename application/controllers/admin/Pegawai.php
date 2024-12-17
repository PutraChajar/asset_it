<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pegawai_model");
        $this->load->model("Komputer_model");
        $this->load->model("Mouse_model");
        $this->load->model("Keyboard_model");
        $this->load->model("Printer_model");
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

	public function get_komputer() {
		$data = $this->Komputer_model->ambil_data();
		echo json_encode($data);
	}

	public function get_mouse() {
		$data = $this->Mouse_model->ambil_data();
		echo json_encode($data);
	}

	public function get_keyboard() {
		$data = $this->Keyboard_model->ambil_data();
		echo json_encode($data);
	}

	public function get_printer() {
		$data = $this->Printer_model->ambil_data();
		echo json_encode($data);
	}
}
