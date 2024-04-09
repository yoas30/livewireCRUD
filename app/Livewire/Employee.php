<?php

namespace App\Livewire;

use App\Models\Employee as ModelsEmployee;
use Livewire\Component;

class Employee extends Component
{
    public $nik, $nokk, $nama, $sarjana, $kelamin, $tempatlahir, 
    $agama, $kawin, $alamat, $nohp, $email;

    public $dataEmployees;


    public function store(){
        $aturan = 
        [
                'nik' => 'required',
                'nokk' => 'required',
                'nama' => 'required',
                'sarjana' => 'required',
                'kelamin' => 'required',
                'tempatlahir' => 'required',
                'agama' => 'required',
                'kawin' => 'required',
                'alamat' => 'required',
                'nohp' => 'required',
                'email' => 'required|email',
        ];

        $pesan=
        [
            'nik.required' => 'NIK Wajib Diisi !',
            'nokk.required' => 'No KK Wajib Diisi !',
            'nama.required' => 'Nama Wajib Diisi !',
            'sarjana.required' => 'Sarjana Wajib Diisi !',
            'kelamin.required' => 'Kelamin Wajib Diisi !',
            'tempatlahir.required' => 'Tempat Lahir Wajib Diisi !',
            'agama.required' => 'Agama Wajib Diisi !',
            'kawin.required' => 'Status Perkawinan Wajib Diisi !',
            'alamat.required' => 'Alamat Wajib Diisi !',
            'nohp.required' => 'No HP Wajib Diisi !',
            'email.required' => 'Email Wajib Diisi !',
            'email.email' => 'Format Email Tidak Sesuai !',            
        ];

        $validasi = $this->validate($aturan,$pesan);
        ModelsEmployee::create($validasi);
        session()->flash('pesanberhasil','Data berhasil dimasukkan');

    }
    public function render()
    {
        $this->dataEmployees=ModelsEmployee::orderBy('nama','asc')->get();
        return view('livewire.employee');
    }
}

