<?php

namespace App\Livewire;

use App\Models\Employee as ModelsEmployee;
use Livewire\Component;
use Livewire\WithPagination;

class Employee extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';  //Memanggil CSS Bootstrap di Pagination

    public $nik, $nokk, $nama, $sarjana, $kelamin, $tempatlahir, 
    $agama, $kawin, $alamat, $nohp, $email;

    public $updateData = false; //Kondisi pemisah antara SIMPAN DATA dan UPDATE DATA
    public $employee_id;

    public $katakunci;



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

        ModelsEmployee::create($validasi); //////////////////////////////////////////////

        session()->flash('pesanberhasil','Data berhasil dimasukkan');

        $this->clear();

    }

    public function edit($id){

        $data = ModelsEmployee::find($id); //////////////////////////////////////////////

        $this->nama = $data->nama;
        $this->email = $data->email;
        $this->alamat = $data->alamat;

        $this->updateData = true; //Ubah Booelan False jadi True
        $this->employee_id = $id;
        
        
    }

    public function update(){
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

        $data = ModelsEmployee::find($this->employee_id); //Deklarasikan
        $data->update($validasi);                         // Di Update

        session()->flash('pesanberhasil','Data berhasil di Update');

        $this->clear();
    }

    public function clear(){
        $this->nik = '';
        $this->nokk = '';
        $this->nama = '';
        $this->sarjana = '';
        $this->kelamin = '';
        $this->tempatlahir = '';
        $this->agama = '';
        $this->kawin = '';
        $this->alamat = '';
        $this->nohp = '';
        $this->email = '';

        $this->updateData = false; //Ubah Booelan True jadi False
        $this->employee_id = '';
    }

    public function delete(){
            $id = $this->employee_id;
            ModelsEmployee::find($id)->delete();
            session()->flash('pesanberhasil','Data berhasil di Hapus');
            $this->clear();        
    }

    public function delete_confirmation($id){
        $this->employee_id = $id;
    }

    public function render()
    {
        if( $this->katakunci !=null ){
            $data=ModelsEmployee::where('nama','like','%'.$this->katakunci.'%')
            ->orWhere('email','like','%'.$this->katakunci.'%')
            ->orWhere('alamat','like','%'.$this->katakunci.'%')
            ->orderBy('nama','asc')->paginate(2);
        }else{
            $data=ModelsEmployee::orderBy('nama','asc')->paginate(2); ///////////////////////
        }
    
        return view('livewire.employee',['dataEmployees'=>$data]);
    }
}

