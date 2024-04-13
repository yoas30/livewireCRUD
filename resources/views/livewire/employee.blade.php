<div class="container">
    <!-- START FORM -->

    @if ($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
    @endif

    @if (session()->has('pesanberhasil'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{ session ('pesanberhasil') }}
            </div>
        </div>
    @endif

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <form>
            <br>
            <h1 style="align-content: center">FORM PENGISIAN</h1>
            <br><br>
            {{-- NIK --}}
            <div class="mb-3 row">
                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model="nik" >
                </div>
            </div>
            {{-- No KK --}}
            <div class="mb-3 row">
                <label for="nokk" class="col-sm-2 col-form-label">No KK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model="nokk" >
                </div>
            </div>
            {{-- nama --}}
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap (tanpa gelar)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model="nama" >
                </div>
            </div>
            {{-- Gelar Kesarjanaan --}}
            <div class="mb-3 row">
                <label for="sarjana" class="col-sm-2 col-form-label">Gelar Kesarjanaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model="sarjana" >
                </div>
            </div>
            {{-- Jenis Kelamin --}}
            <div class="mb-3 row">
                <label for="kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model="kelamin" >
                </div>
            </div>
            {{-- Tempat Lahir --}}
            <div class="mb-3 row">
                <label for="tempatlahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model="tempatlahir" >
                </div>
            </div>
            {{-- Agama --}}
            <div class="mb-3 row">
                <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model="agama" >
                </div>
            </div>
            {{-- Status Perkawinan --}}
            <div class="mb-3 row">
                <label for="kawin" class="col-sm-2 col-form-label">Status Perkawinan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model="kawin" >
                </div>
            </div>
            {{-- Alamat Tinggal --}}
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat Tempat Tinggal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model="alamat" >
                </div>
            </div>  
            {{-- No HP --}}
            <div class="mb-3 row">
                <label for="nohp" class="col-sm-2 col-form-label">No HP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model="nohp" >
                </div>
            </div>                              
            {{-- E-Mail --}}
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" wire:model="email" >
                </div>
            </div>
            {{-- Tombol Simpan --}}
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">

                {{-- Kondisi Pemisah Antara SIMPAN DATA dan UPDATE DATA --}}

                    @if ($updateData == false)
                        <button type="button" class="btn btn-primary" name="submit" wire:click="store()">SIMPAN</button>
                    @else
                        <button type="button" class="btn btn-primary" name="submit" wire:click="update()">UPDATE</button>
                    @endif
                    <button type="button" class="btn btn-secondary" name="submit" wire:click="clear()">CLEAR</button>
                    
                </div>
            </div>
        </form>
    </div>
    <!-- AKHIR FORM -->

    <!-- START DATA -->
    
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h1>DATA PEGAWAI</h1>
        <div class="pb-3 pt-3">
            <input type="text" class="form-control mb-3 w-25" placeholder="Search.." wire:model.live="katakunci">
        </div>

        {{ $dataEmployees->links() }}    

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-4">Nama</th>
                    <th class="col-md-3">Email</th>
                    <th class="col-md-2">Alamat</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataEmployees as $key => $value)

                <tr>
                    <td>{{ $dataEmployees->firstItem() + $key }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->alamat }}</td>
                    <td>
                        <a wire:click="edit({{ $value->id }})" class="btn btn-warning btn-sm">Edit</a>
                    {{-- Memanggil tampilan konfirmasi dibawah #exampleModal --}}                    
                        <a wire:click="delete_confirmation({{ $value->id }})" class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" data-bs-target="#exampleModal">Del</a> 
                    </td>
                </tr>  

                @endforeach
            </tbody>
        </table>

        {{ $dataEmployees->links() }}

    </div>
  

    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Delete</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Yakin akan menghapus data ini ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TIDAK</button>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="delete()">YA</button>
            </div>
          </div>
        </div>
      </div>
  <!-- AKHIR DATA -->
</div>