<?php

namespace App\Livewire;

use App\Models\Employee as ModelsEmployee;
use Livewire\Component;

class Employee extends Component
{
    public $nama;
    public $email;
    public $alamat;

    public function store(){
        $aturan = [
                'nama' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
        ];

        $pesan=[
            'nama.required' => 'Nama Wajib Diisi !',
            'email.required' => 'Email Wajib Diisi !',
            'email.email' => 'Format Email Tidak Sesuai !',
            'alamat.required' => 'Alamat Wajib Diisi !',
            
        ];

        $validasi = $this->validate($aturan,$pesan);
        ModelsEmployee::create($validasi);
        session()->flash('pesanberhasil','Data berhasil dimasukkan');

    }
    public function render()
    {
        return view('livewire.employee');
    }
}
