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
            <center><h1>FORM PENGISIAN</h1></center>
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
        <h1>Data Pegawai</h1>

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
                        <a wire:click='edit({{ $value->id }})' class="btn btn-warning btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Del</a>
                    </td>
                </tr>  

                @endforeach
            </tbody>
        </table>

        {{ $dataEmployees->links() }}

    </div>
    <!-- AKHIR DATA -->
</div>