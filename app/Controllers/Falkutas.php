<?php

namespace App\Controllers;

use App\Models\ModelFalkutas;

class Falkutas extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelFalkutas = new ModelFalkutas();
    }

    public function index()
    {
        $data = [
            'title' => 'Falkutas',
            'falkutas' => $this->ModelFalkutas->allData(),
            'isi' => 'admin/v_falkutas'

        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'falkutas' => $this->request->getPost('falkutas'),
        ];
        $this->ModelFalkutas->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('falkutas'));
    }
    public function edit($id_falkutas)
    {
        $data = [
            'id_falkutas' => $id_falkutas,
            'falkutas' => $this->request->getPost('falkutas'),
        ];
        $this->ModelFalkutas->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
        return redirect()->to(base_url('falkutas'));
    }
    public function delete($id_falkutas)
    {
        $data = [
            'id_falkutas' => $id_falkutas,
        ];
        $this->ModelFalkutas->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('falkutas'));
    }

    //--------------------------------------------------------------------

}
